<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    public function up()
    {
        // Drop the table if it already exists
        Schema::dropIfExists('messages');

        Schema::create('messages', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('message'); // Message content
            $table->date('date'); // Date of the message
            $table->time('time'); // Time of the message
            $table->string('location'); // Location (optional)
            $table->timestamps();
        });

        // Add the foreign key for message_id in employee_vacancy table
        Schema::table('employee_vacancy', function (Blueprint $table) {
            $table->foreignId('message_id')->nullable()->after('status')->constrained('messages')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('employee_vacancy', function (Blueprint $table) {
            // Drop the foreign key first
            $table->dropForeign(['message_id']);

            // Then drop the column
            $table->dropColumn('message_id');
        });

        Schema::dropIfExists('messages');
    }
}
