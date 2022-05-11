<?php

namespace Database\Seeders;

use App\Models\Sector;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sectors = [
            'Project Management' , 'Marketing' , 'Business Development' , 'Customer Service',
            'Human Resource' , 'Teaching & Education' , 'Design & Creative' , 'Sales & Communication'
            ];

            foreach($sectors as $sector)
            {
                Sector::create(
                    [
                        'name' => $sector,
                    ]
                );
            }
    }
}
