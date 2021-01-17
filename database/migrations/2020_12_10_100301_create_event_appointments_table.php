<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_appointments', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');

            $table->dateTimeTz('start');

            $table->dateTimeTz('end');

            $table->integer('userId')->nullable();
            $table->integer('appointmentUserId')->nullable();
            $table->integer('status');

            $table->string('color');

            $table->string('display')->nullable();

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
        Schema::dropIfExists('event_appointments');
    }
}
