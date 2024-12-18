<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPreferencesToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('preference1')->default(1);  // Default to 1
            $table->integer('preference2')->default(1);  // Default to 2
            $table->integer('preference3')->default(1);  // Default to 3
            $table->integer('preference4')->default(1);  // Default to 4
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
            $table->dropColumn(['preference1', 'preference2', 'preference3', 'preference4']);
        });
    }
}
