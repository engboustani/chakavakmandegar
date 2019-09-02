<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFactorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('seat_id')->unsigned();
            $table->foreign('seat_id')->references('id')->on('seats')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('factor_ticket', function (Blueprint $table) {
            $table->integer('factor_id')->unsigned();
            $table->integer('ticket_id')->unsigned();

            $table->foreign('factor_id')->references('id')->on('factors')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('ticket_id')->references('id')->on('tickets')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['factor_id', 'ticket_id']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factors');
        Schema::dropIfExists('factor_ticket');
    }
}
