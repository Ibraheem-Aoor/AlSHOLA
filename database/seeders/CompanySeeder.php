<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            'Company_1' , 'Company_2' , 'Company_3' , 'Company_4' ,
            'Company_5' , 'Company_6' , 'Company_7' , 'Company_8' ,
        ];

        foreach($companies as $co)
        {
            Company::create(
                [
                    'name' => $co,
                ]
            );
        }
    }
}
