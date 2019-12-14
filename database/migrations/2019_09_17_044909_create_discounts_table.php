<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->integer('use_count')->default(10);
            $table->float('percentage')->default(10.0);
            $table->timestamp('expired_at');
            $table->timestamps();
        });

        Schema::create('discount_eventtime', function (Blueprint $table) {
            $table->integer('discount_id')->unsigned();
            $table->integer('eventtime_id')->unsigned();

            $table->foreign('discount_id')->references('id')->on('discounts')
                ->onUpdate('cascade');
            $table->foreign('eventtime_id')->references('id')->on('eventtimes')
                ->onUpdate('cascade');

            $table->primary(['discount_id', 'eventtime_id']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discounts');
        Schema::dropIfExists('discount_eventtime');
    }
}
