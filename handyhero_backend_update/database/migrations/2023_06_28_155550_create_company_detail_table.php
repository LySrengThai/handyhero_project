<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_detail', function (Blueprint $table) {
            $table->increments('company_id');
            $table->string('company_name');
            $table->string('company_number');
            $table->string('company_email')->unique();
            $table->string('company_password');
            $table->longText('description');
            $table->string('company_address');
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
        Schema::dropIfExists('company_detail');
    }
}
