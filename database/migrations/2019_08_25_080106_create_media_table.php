<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url');
            $table->boolean('thumbnail');
            $table->timestamps();
        });

        Schema::create('event_media', function (Blueprint $table) {
            $table->integer('event_id')->unsigned();
            $table->integer('media_id')->unsigned();

            $table->foreign('event_id')->references('id')->on('events')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('media_id')->references('id')->on('media')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['event_id', 'media_id']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media');
        Schema::dropIfExists('event_media');
    }
}
