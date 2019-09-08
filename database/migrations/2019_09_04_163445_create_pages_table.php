<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('name_fa')->nullable();
            $table->longText('content')->nullable();
            $table->boolean('visiable')->default(true);
            $table->string('guid', 255)->nullable();
            $table->integer('auther_id')->unsigned();
            $table->foreign('auther_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('header_id')->unsigned()->nullable();
            $table->foreign('header_id')->references('id')->on('media');
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
        Schema::dropIfExists('pages');
    }
}
