<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent')->unsigned()->default(0);
            $table->string('name');
            $table->string('title');
            $table->timestamps();
        });

        Schema::create('post_category', function (Blueprint $table) {
            $table->integer('post_id')->unsigned();
            $table->integer('cat_id')->unsigned();

            $table->foreign('post_id')->references('id')->on('posts')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('cat_id')->references('id')->on('post_categories')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['post_id', 'cat_id']);
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_categories');
        Schema::dropIfExists('post_category');
    }
}
