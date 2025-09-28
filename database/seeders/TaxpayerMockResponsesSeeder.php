<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TaxpayerMockResponsesSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now()->toDateTimeString();

        $payload = [
            "resultCode"=>"SUCCESS","hasErrors"=>false,"hasWarnings"=>false,
            "taxpayerDetails"=>[[
                "hasErrors"=>false,"taxpayerType"=>"Organization",
                "organisationDetails"=>[
                    "id"=>12879,"temporaryId"=>12879,"tin"=>"1000039609",
                    "address"=>[["id"=>15671,"primaryIndicator"=>true,"addressType"=>"LBA","houseNumber"=>"6566","streetName"=>"Syke Street","townCity"=>"Freetown","region"=>"401","district"=>"101","country"=>"SL","effectiveDate"=>"2025-05-02"]],
                    "contactDetails"=>[["id"=>9952,"temporaryId"=>9952,"primaryIndicator"=>true,"purpose"=>"BUSINESS","detailType"=>"Email","details"=>"lamin.kamara@technobraingroup.com","effectiveDate"=>"2025-05-02"]],
                    "attachment"=>[],
                    "businessSector"=>[["id"=>8695,"temporaryId"=>8695,"code"=>"6209","description"=>"Other information technology and computer service activities","primaryBusinessSector"=>true]],
                    "taxType"=>[
                        ["id"=>19745,"temporaryId"=>19745,"detailType"=>"CIT","returnType"=>["CIT-FP","CIT-PR"],"edr"=>"2023-01-01","accountStatus"=>"REG"],
                        ["id"=>19744,"temporaryId"=>19744,"detailType"=>"PLT","returnType"=>["PTR"],"edr"=>"2023-01-02","accountStatus"=>"DE-REG"]
                    ],
                    "assignedTaxOffice"=>"BOMTO","status"=>"REG","legalStatus"=>"PRLLC",
                    "registrationDate"=>"2025-05-02","legalName"=>"CONGO TOWN VETERANS","tradingAs"=>"CONGO TOWN VETERANS",
                    "sourceOfCapital"=>"ICT Company","placeOfIncorporation"=>"FREETOWN",
                    "directorDetails"=>[["createdBy"=>"tripsuser","updatedBy"=>"tripsuser","updatedDate"=>"2025-05-02T11:34:52","createdDate"=>"2025-05-02T11:34:52","id"=>21315,"temporaryId"=>21315,"relationshipStartDate"=>"2020-01-01","relationTin"=>"1000034542","relationName"=>"DR Lamin Kamara","primaryIndicator"=>true,"principalDirector"=>false]],
                    "accountComputerised"=>false
                ],
                "officerDeatils"=>["entryOfficer"=>"tripsuser","authorisingOfficer"=>"crm_admin","dateOfEntry"=>"2025-05-02","dateOfAuthorisation"=>"2025-05-02"]
            ]]
        ];

        DB::table('taxpayer_mock_responses')->insert([
            'tin' => '1000039609',
            'response' => json_encode($payload, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE),
            'created_at' => $now, 'updated_at' => $now,
        ]);

        DB::table('taxpayer_mock_responses')->insert([
            'tin' => '0000000000',
            'response' => json_encode(["resultCode"=>"SUCCESS","taxpayerDetails"=>[]]),
            'created_at' => $now, 'updated_at' => $now,
        ]);
    }
}