<?php

namespace Database\Seeders;

use App\Models\Technology;
use App\Models\University;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class initialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    // fully hardcoded seeder
    public function run(): void
    {
        Technology::create([
            'technology_name' => 'PHP',
        ]);
        Technology::create([
            'technology_name' => 'Laravel',
        ]);
        Technology::create([
            'technology_name' => 'JavaScript',
        ]);
        Technology::create([
            'technology_name' => 'C++',
        ]);
        Technology::create([
            'technology_name' => 'Swift',
        ]);
        Technology::create([
            'technology_name' => 'React',
        ]);
        Technology::create([
            'technology_name' => 'Ruby',
        ]);
        Technology::create([
            'technology_name' => 'Java',
        ]);
        Technology::create([
            'technology_name' => 'Go',
        ]);
        Technology::create([
            'technology_name' => 'Kotlin',
        ]);


        University::create([
            'university_name' => 'TU Varna',
            'university_score' => 7,
        ]);
        University::create([
            'university_name' => 'TU Sofia',
            'university_score' => 9,
        ]);
        University::create([
            'university_name' => 'Sofia University St.Kliment Ohridski',
            'university_score' => 10,
        ]);
        University::create([
            'university_name' => 'TU Plovdiv',
            'university_score' => 7,
        ]);
        University::create([
            'university_name' => 'Burgas Free University',
            'university_score' => 5,
        ]);
        University::create([
            'university_name' => 'University of Economics Varna',
            'university_score' => 5,
        ]);
        University::create([
            'university_name' => 'American University in Bulgaria',
            'university_score' => 9,
        ]);

    }
}
