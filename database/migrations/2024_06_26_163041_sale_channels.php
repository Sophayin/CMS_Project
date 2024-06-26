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
        Schema::create('sale_channels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('name')->nullable(true);
            $table->longText('description')->nullable(true);
            $table->foreignId('parent_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('sale_channels');
    }
};
