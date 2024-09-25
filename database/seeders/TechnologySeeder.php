<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\Technology;
use App\Functions\Helper;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Laravel', 'VueJs', 'MySQL', 'Angular', 'Git'
        ];

        foreach($data as $technology){
            $new_technology = new Technology();
            $new_technology->name = $technology;
            $new_technology->slug = Helper::generateSlug($new_technology->name, Technology::class);
            $new_technology->save();
        }
    }
}
