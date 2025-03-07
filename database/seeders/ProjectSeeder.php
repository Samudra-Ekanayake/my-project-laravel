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
        for ($i=0; $i < 10 ; $i++) { 

            $project = new Project();

            $project->name = $faker->sentence(3);
            $project->description = $faker->sentence(4);
            $project->creation_date=$faker->date('d_m_y');
            $project->cover_image = $faker->imageUrl(640, 480, 'project', true, format:'jpg',);
            $project->link = $faker->sentence(3);
            $project->save();     
        }
    }
}
