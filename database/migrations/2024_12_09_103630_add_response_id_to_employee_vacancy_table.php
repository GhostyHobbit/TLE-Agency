<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('employee_vacancy', function (Blueprint $table) {
            $table->foreignId('response_id')->nullable()->after('message_id')->constrained('responses')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employee_vacancy', function (Blueprint $table) {
            $table->dropForeign(['response_id']);
            $table->dropColumn('response_id');
        });
    }
};
