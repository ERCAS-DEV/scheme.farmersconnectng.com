<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
           $table->increments('id');
           $table->string('key');
           $table->integer('scheme_id')->unsigned()->index()->nullable();
           $table->foreign('scheme_id')->references('id')->on('schemes')->onDelete('cascade');
           $table->string('activity');
           $table->string('quantity');
           $table->text('description');
           $table->string('payment_range');
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
        Schema::drop('quotations');
    }
}
