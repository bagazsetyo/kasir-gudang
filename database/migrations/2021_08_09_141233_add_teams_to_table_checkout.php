<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTeamsToTableCheckout extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('checkout', function (Blueprint $table) {
            $table->integer('teams_id')->nullable();
            $table->integer('users_id')->nullable();
            $table->string('nama_user')->nullable();
            $table->string('uuid')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('checkout', function (Blueprint $table) {
            $table->dropColumn('teams_id');
            $table->dropColumn('users_id');
            $table->dropColumn('nama_user');
            $table->dropColumn('uuid');
        });
    }
}
