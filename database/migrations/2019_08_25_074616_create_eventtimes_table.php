<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventtimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventtimes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('start');
            $table->timestamp('end');
            $table->timestamp('deadline');
            $table->integer('event_id')->unsigned();
            $table->foreign('event_id')->references('id')->on('events')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('enable')->default(true);
            $table->timestamps();
        });

        Schema::create('eventtime_ticket', function (Blueprint $table) {
            $table->integer('eventtime_id')->unsigned();
            $table->integer('ticket_id')->unsigned();

            $table->foreign('eventtime_id')->references('id')->on('eventtimes')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('ticket_id')->references('id')->on('tickets')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['eventtime_id', 'ticket_id']);
        });

        Schema::create('eventtime_seat', function (Blueprint $table) {
            $table->integer('eventtime_id')->unsigned();
            $table->integer('seat_id')->unsigned();

            $table->foreign('eventtime_id')->references('id')->on('eventtimes')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('seat_id')->references('id')->on('seats')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['eventtime_id', 'seat_id']);
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventtimes');
        Schema::dropIfExists('eventtime_ticket');
        Schema::dropIfExists('eventtime_seat');
    }
}
