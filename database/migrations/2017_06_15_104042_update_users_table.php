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
            $table->tinyInteger('status')->default(0);
            $table->string('username')->unique()->nullable();
            $table->string('lastname')->nullable();
            $table->string('facebookid')->nullable();
            $table->string('googleid')->nullable();
            $table->string('gender', 1)->default('M');
            $table->date('birthday')->nullable();
            $table->string('photo')->nullable();
            $table->string('cover')->nullable();
            $table->string('from')->nullable();
            $table->string('country_id', 2)->default('PT');
            $table->text('description')->nullable();
            $table->string('profession')->nullable();
            $table->string('idioms')->nullable();
            $table->string('website')->nullable();
            $table->date('foundationdate')->nullable();
            $table->string('visitedcountries')->nullable();
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
            $table->dropColumn('status');
            $table->dropColumn('username');
            $table->dropColumn('lastname');
            $table->dropColumn('facebookid');
            $table->dropColumn('googleid');
            $table->dropColumn('gender');
            $table->dropColumn('birthday');
            $table->dropColumn('photo');
            $table->dropColumn('cover');
            $table->dropColumn('from');
            $table->dropColumn('country_id');
            $table->dropColumn('description');
            $table->dropColumn('profession');
            $table->dropColumn('idioms');
            $table->dropColumn('website');
            $table->dropColumn('foundationdate');
            $table->dropColumn('visitedcountries');
        });
    }
}
