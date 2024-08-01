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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->foreignId('shop_id')->nullable(true);
            $table->foreignId('branch_id')->nullable(true);
            $table->foreignId('client_id')->nullable(true);
            $table->string('client_name')->nullable(true);
            $table->string('client_name_translate')->nullable(true);
            $table->foreignId('occupation_id')->nullable(true);
            $table->string('income')->nullable(true);
            $table->foreignId('co_id')->nullable(true);
            $table->foreignId('product_id')->nullable(true);
            $table->string('product_name')->nullable(true);
            $table->string('condition')->nullable(true);
            $table->float('product_price', 8, 2)->default(0);
            $table->string('respond_by')->nullable(true);
            $table->string('guarantor_name')->nullable(true);
            $table->string('guarantor_name_translate')->nullable(true);
            $table->string('guarantor_phone')->nullable(true);
            $table->integer('status')->default(1); //[0 = Rejected, 1 = Follow UP, 2 = Approved]
            $table->string('action')->default(''); //[kick off, pending, accepted]

            $table->foreignId('loan_company_id')->default(null);
            $table->string('created_by')->nullable(true);
            $table->string('updated_by')->nullable(true);
            $table->foreignId('channel_id')->nullable(true);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
