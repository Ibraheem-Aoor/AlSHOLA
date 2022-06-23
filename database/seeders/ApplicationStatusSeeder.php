<?php

namespace Database\Seeders;

use App\Models\ApplicationMainStatus;
use App\Models\subStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicationStatusSeeder extends Seeder
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
            ApplicationMainStatus::create(['name' => $status]);
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
                
            subStatus::create(
                [
                    'name' => $subStatus ,
                    'main_status_id' => $mainStatusId
        ]);
        }
    }
}
