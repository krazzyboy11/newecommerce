<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sfname');
            $table->string('slname');
            $table->string('scname');
            $table->string('semail');
            $table->integer('sphone_number');
            $table->string('scountry');
            $table->string('saddress1');
            $table->string('saddress2');
            $table->string('scity');
            $table->string('sstate');
            $table->string('spost_code');
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
        Schema::dropIfExists('shippings');
    }
}
