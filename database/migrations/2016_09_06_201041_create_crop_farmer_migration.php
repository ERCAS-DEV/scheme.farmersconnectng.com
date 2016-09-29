<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCropFarmerMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crop_farmer', function (Blueprint $table) {

            $table->integer('crop_id')->unsigned()->index();
            $table->foreign('crop_id')->references('id')->on('crops')->onDelete('cascade');
            
            $table->integer('farmer_id')->unsigned()->index();
            $table->foreign('farmer_id')->references('id')->on('farmers')->onDelete('cascade');
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
        Schema::drop('crop_farmer');
    }
}
