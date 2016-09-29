<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchemeWorkerMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scheme_worker', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('worker_id')->unsigned()->index();
            $table->foreign('worker_id')->references('id')->on('workers')->onDelete('cascade');
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
        Schema::drop('scheme_worker');
    }
}
