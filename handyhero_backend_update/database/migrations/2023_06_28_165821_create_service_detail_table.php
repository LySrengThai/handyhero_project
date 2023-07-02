<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_detail', function (Blueprint $table) {
            $table->increments('service_id');
            $table->string('service_name');
            $table->longtext('service_description');
            $table->string('service_price');
            $table->integer('cate_id');
            $table->unsignedInteger('company_id');
            $table->timestamps();

            $table->foreign('company_id')->references('company_id')->on('company_detail');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_detail');
    }
}
