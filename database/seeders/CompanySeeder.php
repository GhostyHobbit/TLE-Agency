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
            'name' => 'Hogeschool Rotterdam',
            'city' => 'Rotterdam',
            'adress' => '123 Education Lane'
        ]);

        Company::create([
            'id' => 2,
            'name' => 'Open Hiring',
            'city' => 'Amsterdam',
            'adress' => '789 Opportunity Road'
        ]);

        Company::create([
            'id' => 3,
            'name' => 'McDonald\'s',
            'city' => 'Middelburg',
            'adress' => '101 Fast Food Blvd'
        ]);
    }
}
