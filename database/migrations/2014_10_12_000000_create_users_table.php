<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('first_name',100)->default(null)->nullable(true);
            $table->string('last_name',100)->default(null)->nullable(true);
            $table->string('mobile',100)->default(null)->nullable(true);
            $table->date('date_of_birth')->default(null)->nullable(true);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->default(null)->nullable();
            $table->string('password');
            $table->string('verification_code',500)->default(null)->nullable(true);
            $table->tinyInteger('user_is_verify')->default(0)->nullable(true);
            $table->tinyInteger('role')->default(2)->nullable(true);
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
