<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\Project;
use App\Models\Admin\Technology;

class ProjectTechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // creo ciclo per inserire dati
        for($i = 0; $i < 80; $i++){

            // ad ogni ciclo estraggo un project
            $project = Project::inRandomOrder()->first();

            // ad ogni ciclo estraggo una tech e prendo l'id
            $technology_id = Technology::inRandomOrder()->first()->id;

            // aggiungo la relazione tra il progetto estratto e l'id della tech
            $project->technologies()->attach($technology_id);
        }
    }
}
