<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FileTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'medical' , 'contract'
        ];
        foreach($names as $name)
        {
            DB::table('file_types')->insert(
                [
                    'name' => $name,
                ]
            );
        }
    }
}
