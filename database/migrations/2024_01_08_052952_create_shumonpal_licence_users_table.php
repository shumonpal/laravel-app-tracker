<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shumonpal_licence_users', function (Blueprint $table) {
            $table->id('id');
            $table->string('hash_password');
            $table->string('password');
            $table->string('email');
            $table->string('domain');
            $table->string('ip');
            $table->string('location')->nullable();
            $table->string('device')->nullable();
            $table->integer('status')->default(1);
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
        Schema::drop('shumonpal_licence_users');
    }
};
