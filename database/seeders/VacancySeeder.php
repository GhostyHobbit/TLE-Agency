<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vacancy;
use App\Models\Employer;

class VacancySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employers = Employer::all();

        foreach ($employers as $employer) {
            for ($i = 0; $i < 20; $i++) {
                Vacancy::create([
                    'name' => 'Vacancy ' . $i,
                    'employer_id' => $employer->id,
                    'hours' => rand(20, 40),
                    'salary' => rand(30000, 100000),
                ]);
            }
        }
    }
}
