<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Donor', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_donor');
            $table->string('donor_name');
            $table->string('donor_lastname');
            $table->string('adress');
            $table->string('e_mail');
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Donor');
    }
}
