<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('taxpayer_mock_responses', function (Blueprint $table) {
            $table->id();
            $table->string('tin')->index();
            $table->json('response');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('taxpayer_mock_responses');
    }
};
