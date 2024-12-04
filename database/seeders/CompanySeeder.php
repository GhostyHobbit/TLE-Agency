<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'id' => 1,
            'name' => 'Tech Corp',
            'city' => 'San Francisco',
            'adress' => '123 Tech Street'
        ]);

        Company::create([
            'id' => 2,
            'name' => 'Business Inc',
            'city' => 'New York',
            'adress' => '456 Business Avenue'
        ]);

        // Add more companies as needed
    }
}
