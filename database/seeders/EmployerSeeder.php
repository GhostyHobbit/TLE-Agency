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
            'company_id' => 1,
            'name' => 'Tech Corp',
            'email' => 'contact@techcorp.com'
        ]);

        Employer::create([
            'company_id' => 2,
            'name' => 'Business Inc',
            'email' => 'info@businessinc.com'
        ]);

        // Add more employers as needed
    }
}
