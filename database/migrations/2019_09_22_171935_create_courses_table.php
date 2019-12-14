<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('description');
            $table->string('teacher');
            $table->integer('price');
            $table->integer('poster')->unsigned()->nullable();
            $table->boolean('indexed')->default(true);
            $table->integer('limit_count')->unsigned();
            $table->timestamp('limit_time');
            $table->integer('auther_id')->unsigned();
            $table->foreign('auther_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('course_user', function (Blueprint $table) {
            $table->integer('course_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('course_id')->references('id')->on('courses')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['course_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
        Schema::dropIfExists('course_user');
    }
}
