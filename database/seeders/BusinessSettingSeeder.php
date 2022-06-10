<?php

namespace Database\Seeders;

use App\Models\BusinessSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinessSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $generalInfo = [
            'facebook' => '' ,
            'instagram' => 'https://www.instagram.com/alshoalagroup/' ,
            'linkedin' => '' ,
            'twitter' => '' ,
            'address' => 'Al Shoala Plaza 1, First Floor, Office 13,
            Bldg 41, Road 3201, Block 332,
            Manama / Bu Ashira, Bahrain,',
            'telephone' => '+973 17720041',
            'email' => 'info@alshola.com',
        ];

        foreach($generalInfo as $key => $value)
        {
            BusinessSetting::create(
                [
                    'key' => $key,
                    'value' => $value,
                ]
            );
        }
    }
}
