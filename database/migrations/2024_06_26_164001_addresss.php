<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('addresss', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable(true);
            $table->foreignId('country_id')->nullable(true);
            $table->foreignId('city_id')->nullable(true);
            $table->foreignId('district_id')->nullable(true);
            $table->foreignId('commune_id')->nullable(true);
            $table->foreignId('village_id')->nullable(true);
            $table->string('house_no')->nullable(true);
            $table->string('street_no')->nullable(true);
            $table->string('latitude')->nullable(true);
            $table->string('longitude')->nullable(true);
            $table->string('remark')->nullable(true);
            $table->foreignId('user_id')->nullable(true);
            $table->foreignId('client_id')->nullable(true);
            $table->foreignId('shop_id')->nullable(true);
            $table->foreignId('application_id')->nullable(true);
            $table->foreignId('loan_company_id')->nullable(true);
            $table->foreignId('branch_id')->nullable(true);
            $table->foreignId('co_id')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresss');
        //
    }
};
