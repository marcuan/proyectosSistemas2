<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Donation', function (Blueprint $table) {
            $table->increments('id_donation');
            $table->float('monto');
            $table->string('descripcion');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('id_donor')->unsigned();
            $table->foreign('id_donor')->references('id')->on('Donor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Donation');
    }
}