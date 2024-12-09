<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPreferencesToEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('preference1')->nullable(); // Add preference1 column
            $table->integer('preference2')->nullable(); // Add preference2 column
            $table->integer('preference3')->nullable(); // Add preference3 column
            $table->integer('preference4')->nullable(); // Add preference4 column
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
            $table->dropColumn('preference1');
            $table->dropColumn('preference2');
            $table->dropColumn('preference3');
            $table->dropColumn('preference4');
        });
    }
}
