<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        Project::truncate();
        
        for ($i=0; $i < 12 ; $i++) { 

            $project = new Project();

            $project->name = $faker->sentence(3);
            $project->description = $faker->sentence(10);
            $project->creation_date=$faker->date('y_m_d');
            $project->cover_image = "https://picsum.photos/id/" . $faker->numberBetween(1, 500) . "/1920/1080";
            $project->link = $faker->sentence(3);
            $project->save();     
        }
    }
}
