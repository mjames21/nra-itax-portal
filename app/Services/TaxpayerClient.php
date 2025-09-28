<?php
namespace App\Services;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class TaxpayerClient
{
    public function fetchByTin(string $tin): ?array
    {
        return config('services.taxpayer_api.driver','mock') === 'api'
            ? $this->viaApi($tin)
            : $this->viaMock($tin);
    }

    protected function viaApi(string $tin): ?array
    {
        $base = rtrim(config('services.taxpayer_api.base',''), '/');
        if (!$base) return null;

        $from = now()->startOfMonth()->toDateString();
        $to   = now()->endOfMonth()->toDateString();

        $req = Http::timeout(config('services.taxpayer_api.timeout'))
            ->withOptions(['verify'=>config('services.taxpayer_api.verify_ssl')]);

        if ($t = config('services.taxpayer_api.bearer')) $req = $req->withToken($t);
        elseif ($b = config('services.taxpayer_api.basic')) { [$u,$p]=array_pad(explode(':',$b,2),2,''); $req=$req->withBasicAuth($u,$p); }

        $res = $req->post("$base/cxf/trips/registration/taxpayerInformation", [
            'tin'=>$tin,'taxpayerUpdatedFromDate'=>$from,'taxpayerUpdatedToDate'=>$to,
        ]);

        if (!$res->ok()) return null;
        $data = $res->json();
        return is_array($data) ? $data : null;
    }

    protected function viaMock(string $tin): ?array
    {
        $row = DB::table('taxpayer_mock_responses')->where('tin',$tin)->first();
        return $row ? (json_decode($row->response, true) ?: null) : ["resultCode"=>"SUCCESS","taxpayerDetails"=>[]];
    }

    public static function summarize(array $payload): array
    {
        $org = Arr::get($payload,'taxpayerDetails.0.organisationDetails');
        $type = Arr::get($payload,'taxpayerDetails.0.taxpayerType');
        $name = $org['tradingAs'] ?? ($org['legalName'] ?? null);
        $status = $org['status'] ?? null;
        $year = !empty($org['registrationDate']) ? substr($org['registrationDate'],0,4) : null;
        $email = collect($org['contactDetails'] ?? [])->filter(fn($c)=>($c['detailType']??'')==='Email')
            ->sortByDesc(fn($c)=> (bool)($c['primaryIndicator']??false))->pluck('details')->first();

        return [
            'is_valid' => $status === 'REG' && strtolower((string)$type) === 'organization',
            'business_name' => $name,
            'registration_year' => $year,
            'contact_email' => $email,
            'status' => $status,
            'raw' => $org,
        ];
    }
}