<?php

namespace Database\Seeders;

use App\Models\JobMainStatus;
use App\Models\JobSubStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mainStatuses = ['Active'  , 'Cancelled' , 'Completed'];
        foreach($mainStatuses as $status)
        {
            JobMainStatus::create(['name' => $status]);
        }

        $substatuses =  [
            'Demand Submitted' , 'Demand Under Proccess' , 'Demand Complete' , 'Demand Cancelled'
        ];

        foreach($substatuses as $subStatus)
        {
            if($subStatus == 'Demand Submitted' || $subStatus == 'Demand Under Proccess')
                $mainStatusId = 1;
            elseif($subStatus ==  'Demand Cancelled')
                $mainStatusId = 2;
            else
                $mainStatusId = 3;

            JobSubStatus::create(
                [
                    'name' => $subStatus ,
                    'job_main_status_id' => $mainStatusId
        ]);
        }
    }
}
