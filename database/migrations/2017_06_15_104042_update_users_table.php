<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('status_id')->default(0);
            $table->string('username')->unique()->nullable();
            $table->string('lastname')->nullable();
            $table->string('facebook_token')->nullable();
            $table->string('google_token')->nullable();
            $table->string('country_id', 2)->default('PT'); 
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('status_id');
            $table->dropColumn('username');
            $table->dropColumn('lastname');
            $table->dropColumn('facebook_token');
            $table->dropColumn('google_token');
            $table->dropColumn('country_id');
			$table->dropColumn('deleted_at');
        });
    }
}
