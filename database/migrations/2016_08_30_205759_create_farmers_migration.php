<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmersMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key');
            $table->integer('scheme_id')->unsigned()->index();
            $table->foreign('scheme_id')->references('id')->on('schemes')->onDelete('cascade');
            $table->string('fullname');
            $table->enum('gender', ['m', 'f']);
            $table->string('email');
            $table->string('phone');
            $table->string('state');
            $table->string('lga');
            $table->string('village');
            $table->string('farm_size');
            $table->string('crop');
            $table->string('no_of_pack');
            $table->enum('used_before', ['y', 'n']);
            $table->string('bank')->nullable();
            $table->string('account_no')->nullable();
            $table->string('image');
            $table->enum('assign', [0, 1]);
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
        Schema::drop('farmers');
    }
}
