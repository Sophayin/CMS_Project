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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('client_facebook')->nullable(true);
            $table->foreignId('address_id')->nullable(true);
            $table->string('client_name')->nullable(true);
            $table->string('client_name_translate')->nullable(true);
            $table->string('phone')->nullable(true);
            $table->string('gender')->nullable(true);
            $table->string('khmer_identity_card')->nullable(true);
            $table->foreignId('occupation_id')->nullable(true);
            $table->string('income')->nullable(true);
            $table->foreignId('product_id')->nullable(true);
            $table->string('product_name')->nullable(true);
            $table->string('condition')->nullable(true);
            $table->float('product_price', 8, 2)->default(0);
            $table->integer('status')->default(1); //[0 = inactive, 1 = active]
            $table->datetime('registered_date')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
