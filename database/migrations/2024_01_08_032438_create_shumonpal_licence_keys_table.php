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
        Schema::create('shumonpal_licence_keys', function (Blueprint $table) {
            $table->id('id');
            $table->string('code', 191);
            $table->string('domain')->nullable();
            $table->integer('status')->default(1)->comment('1: Active, 2: Inactive');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('shumonpal_licence_keys');
    }
};
