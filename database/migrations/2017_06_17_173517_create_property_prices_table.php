<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id')->unique();
            $table->float('base');
            $table->float('guest');
            $table->float('weekly');
            $table->float('fortnight');
            $table->float('monthly');
            $table->float('tourist_tax')->default(0);
            $table->float('cleaning')->default(0);
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
        Schema::drop('property_prices');
    }
}
