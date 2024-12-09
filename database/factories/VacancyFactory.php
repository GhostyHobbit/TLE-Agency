<?php

namespace Database\Factories;

use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Factories\Factory;

class VacancyFactory extends Factory
{
    protected $model = Vacancy::class;

    public function definition()
    {
        return [
            'employer_id' => \App\Models\Employer::factory(),
            'name' => $this->faker->jobTitle,
            'hours' => $this->faker->numberBetween(0, 40),
            'salary' => $this->faker->numberBetween(1500, 5000),
            'location' => $this->faker->city,
            'description' => $this->faker->paragraph,
            'path' => 'vacancies/' . $this->faker->image('public/storage/vacancies', 640, 480, null, false),
        ];
    }
}
