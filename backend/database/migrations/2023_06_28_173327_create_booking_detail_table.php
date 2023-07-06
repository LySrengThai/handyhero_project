<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_detail', function (Blueprint $table) {
            $table->increments('book_id');
            $table->string('f_name');
            $table->string('l_name');
            $table->string('address');
            $table->string('number');
            $table->string('email');
            $table->date('book_date');
            $table->tinyInteger('status')->default(0);
            $table->unsignedInteger('service_id');
            $table->timestamps();

            $table->foreign('service_id')->references('service_id')->on('service_detail');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_detail');
    }
}
