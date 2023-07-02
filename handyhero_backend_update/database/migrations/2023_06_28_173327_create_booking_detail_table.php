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
            $table->date('book_date');
            $table->date('booking_date');
            $table->tinyInteger('status');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('service_id');
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('user_detail');
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
