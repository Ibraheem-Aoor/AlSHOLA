<?php

namespace Database\Seeders;

use App\Models\Title;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = [
            'project manager' , 'Marketing Manager',  'Sales Manager' ,
            'graphic designer' , 'Teacher' , 'Customer Service Agent',
        ];

        $i = 1;
        foreach($titles as $title)
        {
            Title::create(
                [
                    'name' => $title,
                    'sector_id' => $i++,
                ]
            );
        }
    }
}
