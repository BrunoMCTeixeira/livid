<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id')->unique();
            $table->string('excerpt');
            $table->text('description');
            $table->string('directions');
            $table->time('checkin');
            $table->time('checkout');
            $table->integer('max_guests')->default(2);
            $table->integer('min_nights')->default(1);
            $table->integer('rooms')->default(0);
            $table->integer('beds')->default(1);
            $table->integer('bathrooms')->default(1)->nullable();
            $table->boolean('shared_bathroom');
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
        Schema::drop('property_details');
    }
}
