<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employer;

class EmployerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employer::create([
            'id' => 1,
            'name' => 'John Doe',
            'company_id' => 1,
            'email' => 'johndoe@hr.com'
        ]);

        Employer::create([
            'id' => 2,
            'name' => 'Jane Smith',
            'company_id' => 2,
            'email' => 'janesmith@oh.com'
        ]);

        Employer::create([
            'id' => 3,
            'name' => 'Alice Johnson',
            'company_id' => 3,
            'email' => 'alicejohnson@mcdonalds.com'
        ]);
    }
}
