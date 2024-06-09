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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('owner')->nullable(true);
            $table->string('shop_name')->nullable(true);
            $table->string('shop_name_translate')->nullable(true);
            $table->string('abbreviation')->nullable(true);
            $table->string('phone')->nullable(true)->comment('seller phone shop');
            $table->string('telephone')->nullable(true)->comment('owner phone');
            $table->string('profile')->nullable(true);
            $table->string('email')->nullable(true);
            $table->string('description')->nullable(true);
            $table->string('facebook_page')->nullable(true);
            $table->string('creator')->nullable(true);
            $table->string('post_code')->nullable(true);
            $table->string('code')->nullable(true);
            $table->foreignId('user_id')->nullable(true);
            $table->foreignId('address_id')->nullable(true);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
