<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Vacancy;

class VacancySeeder extends Seeder
{
    public function run()
    {
        // Backup the last two rows
        $lastTwoVacancies = Vacancy::orderBy('id', 'desc')->take(2)->get()->toArray();

        // Disable foreign key checks
        DB::statement('PRAGMA foreign_keys = OFF;');

        // Truncate the table
        Vacancy::truncate();

        // Re-enable foreign key checks
        DB::statement('PRAGMA foreign_keys = ON;');

        // Reinsert the last two rows
        Vacancy::insert($lastTwoVacancies);

        // Seed the table with new data
        Vacancy::factory()->count(10)->create(); // Adjust the count as needed
    }
}
