<?php

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
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('password', 60);
            $table->string('personalCode');
            $table->integer('numFirstLevel-referrals')->default(0);
            $table->integer('totalOther-referrals')->default(0);
            $table->string('referrerCode')->nullable();
            $table->string('email')->nullable();
            $table->integer('balance')->default(0);
            $table->integer('totalEarnings')->default(0);
            $table->boolean('active');
            $table->date('accountExpirationDate');
            $table->string('securityQuestion')->nullable();
            $table->string('country')->nullable();
            $table->char('gender')->nullable();
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
        Schema::drop('users');
    }
}
