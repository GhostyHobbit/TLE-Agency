<?php

namespace Database\Seeders;

use App\Models\Vacancy;
use Illuminate\Database\Seeder;

class VacancySeeder extends Seeder
{
    /**
     * Voer de database seeds uit.
     */
    public function run(): void
    {
        Vacancy::create([
            'id' => 1,
            'employer_id' => 1,
            'name' => 'Leraar Programmeren',
            'hours' => 40,
            'salary' => 20,
            'description' => 'We zijn op zoek naar een nieuwe docent om ons team te versterken.',
            'location' => 'Rotterdam',
            'tasks' => 'Lesgeven aan studenten',
            'qualifications' => 'HBO Diploma in onderwijs',
            'path' => 'vacancies/hr.png'
        ]);

        Vacancy::create([
            'id' => 2,
            'employer_id' => 2,
            'name' => 'HR Manager',
            'hours' => 36,
            'salary' => 25,
            'description' => 'Verantwoordelijk voor het beheren van HR-processen.',
            'location' => 'Amsterdam',
            'tasks' => 'HR-beleid ontwikkelen en implementeren',
            'qualifications' => 'Bachelor in Human Resources',
            'path' => 'vacancies/openhiring.png'
        ]);

        Vacancy::create([
            'id' => 3,
            'employer_id' => 3,
            'name' => 'Fastfood Medewerker',
            'hours' => 24,
            'salary' => 12,
            'description' => 'Klantvriendelijke service bieden in een fastfoodrestaurant.',
            'location' => 'Middelburg',
            'tasks' => 'Bestellingen opnemen en bereiden',
            'qualifications' => 'Geen specifieke opleiding vereist',
            'path' => 'vacancies/mcdonalds.png'
        ]);

        Vacancy::create([
            'id' => 4,
            'employer_id' => 1,
            'name' => 'Onderwijsassistent',
            'hours' => 32,
            'salary' => 18,
            'description' => 'Ondersteuning bieden aan docenten en studenten.',
            'location' => 'Rotterdam',
            'tasks' => 'Assisteren bij lessen en administratieve taken',
            'qualifications' => 'MBO Diploma in onderwijs',
            'path' => 'vacancies/hr.png'
        ]);

        Vacancy::create([
            'id' => 5,
            'employer_id' => 2,
            'name' => 'Recruiter',
            'hours' => 40,
            'salary' => 22,
            'description' => 'Nieuwe medewerkers werven en selecteren.',
            'location' => 'Amsterdam',
            'tasks' => 'Vacatures opstellen en sollicitatiegesprekken voeren',
            'qualifications' => 'Bachelor in Human Resources of vergelijkbaar',
            'path' => 'vacancies/openhiring.png'
        ]);

        Vacancy::create([
            'id' => 6,
            'employer_id' => 3,
            'name' => 'Keukenhulp',
            'hours' => 20,
            'salary' => 10,
            'description' => 'Ondersteuning bieden in de keuken van een fastfoodrestaurant.',
            'location' => 'Middelburg',
            'tasks' => 'Ingrediënten voorbereiden en schoonmaken',
            'qualifications' => 'Geen specifieke opleiding vereist',
            'path' => 'vacancies/mcdonalds.png'
        ]);

        Vacancy::create([
            'id' => 7,
            'employer_id' => 1,
            'name' => 'ICT Beheerder',
            'hours' => 38,
            'salary' => 30,
            'description' => 'Beheer en onderhoud van ICT-systemen.',
            'location' => 'Rotterdam',
            'tasks' => 'Netwerkbeheer en technische ondersteuning',
            'qualifications' => 'HBO Diploma in ICT',
            'path' => 'vacancies/hr.png'
        ]);

        Vacancy::create([
            'id' => 8,
            'employer_id' => 2,
            'name' => 'Marketing Specialist',
            'hours' => 40,
            'salary' => 28,
            'description' => 'Ontwikkelen en uitvoeren van marketingstrategieën.',
            'location' => 'Amsterdam',
            'tasks' => 'Marketingcampagnes opzetten en analyseren',
            'qualifications' => 'Bachelor in Marketing',
            'path' => 'vacancies/openhiring.png'
        ]);

        Vacancy::create([
            'id' => 9,
            'employer_id' => 3,
            'name' => 'Schoonmaker',
            'hours' => 15,
            'salary' => 11,
            'description' => 'Schoonmaken van het restaurant en de keuken.',
            'location' => 'Middelburg',
            'tasks' => 'Schoonmaken en desinfecteren van ruimtes',
            'qualifications' => 'Geen specifieke opleiding vereist',
            'path' => 'vacancies/mcdonalds.png'
        ]);
    }
}
