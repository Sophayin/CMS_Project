<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(true);
            $table->string('type')->default("staff");
            $table->string('username');
            $table->string('profile')->nullable(true);
            $table->string('account_code')->unique()->nullable(true);
            $table->string('dialing_code')->nullable(true);
            $table->string('phone')->nullable(true);
            $table->string('email')->unique();
            $table->timestamp('code_verified_by_phone')->nullable(true);
            $table->timestamp('email_verified_at')->nullable(true);
            $table->string('password')->nullable(true);
            $table->foreignId('role_id')->nullable(true);
            $table->json('shop_ids')->nullable(true);
            $table->boolean('active')->default(false);
            $table->boolean('banned')->default(true);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
