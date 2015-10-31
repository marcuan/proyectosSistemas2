<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Activity', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 25);
            $table->string('address', 25);
            $table->string('description', 100);
            $table->datetime('date_start');
            $table->datetime('date_end');
            $table->integer('capacity');
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
        Schema::drop('Activity');
    }
}
