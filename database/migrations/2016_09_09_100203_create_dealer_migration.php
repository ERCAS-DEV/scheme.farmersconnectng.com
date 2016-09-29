<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealerMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key');
            $table->string('name_of_company');
            $table->string('company_email');
            $table->string('company_phone');
            $table->text('address');
            $table->string('website');
            $table->string('contact_person');
            $table->string('person_phone');
            $table->string('person_email');
            $table->string('agricultural_expertise');
            $table->string('years_in_business');
            $table->string('similar_project');
            $table->text('references');
            $table->string('company_tin');
            $table->string('bvn');
            $table->string('account_number');
            $table->string('account_name');
            $table->string('logo');
            $table->string('image');
            $table->enum('status', ['pending', 'active','suspend']);
            $table->enum('assign', [0, 1]);
            $table->string('token');
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
        Schema::drop('dealers');
    }
}
