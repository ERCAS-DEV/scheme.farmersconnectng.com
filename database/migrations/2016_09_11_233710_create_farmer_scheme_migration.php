<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmerSchemeMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmer_scheme', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('farmer_id')->unsigned()->index();
            $table->foreign('farmer_id')->references('id')->on('farmers')->onDelete('cascade');
            $table->integer('scheme_id')->unsigned()->index();
            $table->foreign('scheme_id')->references('id')->on('schemes')->onDelete('cascade');
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
        Schema::drop('farmer_scheme');
    }
}
