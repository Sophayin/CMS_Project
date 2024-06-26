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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('title')->nullable();
            $table->foreignId('category_id')->nullable();
            $table->foreignId('brand_id')->nullable();
            $table->string('year_of_manufacture')->nullable(true);
            $table->string('condition')->nullable(true);
            $table->string('description')->nullable(true);
            $table->float('price', 8, 2)->default(0);
            $table->boolean('status')->default(1)->comment('1=active, 2=draft, 2=unpublish');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
