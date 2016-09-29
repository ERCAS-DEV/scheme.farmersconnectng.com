<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchemeMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schemes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key');
            $table->string('name_of_scheme');
            $table->string('facilitator_of_scheme');
            $table->text('discription_of_scheme');
            $table->text('address');
            $table->string('logo');
             $table->string('facilitator_name');
             $table->string('bvn');
             $table->string('tin');
             $table->string('nature_of_bussiness');
             $table->string('email');
             $table->string('phone');
             $table->text('objective_of_scheme');
             $table->text('partners_of_scheme');
             $table->text('image');
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
        Schema::drop('schemes');
    }
}
