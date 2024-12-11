<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployerFactory extends Factory
{
    protected $model = Employer::class;

    public function definition()
    {
        return [
            'company_id' => \App\Models\Company::factory(), // Assuming you have a CompanyFactory
            'name' => $this->faker->company,
            'email' => $this->faker->companyEmail,
        ];
    }
}
