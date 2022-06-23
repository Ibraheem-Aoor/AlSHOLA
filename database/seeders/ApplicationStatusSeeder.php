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
        $mainStatuses = ['Active' , 'Hold' , 'Cancelled' , 'Completed'];
        foreach($mainStatuses as $status)
        {
            ApplicationMainStatus::create(['name' => $status]);
        }

        $substatuses =  [
            'waiting for visa'  , 'CV Submitted' , 'For Selection' , 'waiting for medical'
            ,'waiting for interview'  , 'Hold' , 'LMRA Process',
            'Ready for Payment' , 'Embassy' , 'Emigrate Process' , 'To Be Arrived' , 'Arrival Scheduled' , 'Arrived' , 'For Exited' ,
            'Exited ' , 'Worker Refuse to Work' , 'UNFIT' , 'Runaway' , 'For Local Transfer' , 'Cancelled Application'
        ];

        foreach($substatuses as $subStatus)
        {
            if($subStatus == 'Cancelled Application' || $subStatus == 'For Exited' || $subStatus == 'Exited' || $subStatus == 'Worker Refuse to Work' || $subStatus == 'UNFIT' || $subStatus == 'Runaway')
                $mainStatusId = 3;
            elseif($subStatus == 'Hold')
                $mainStatusId = 2;
            elseif($subStatus == 'Arrived')
                $mainStatusId = 4;
            else
                $mainStatusId = 1;

            subStatus::create(
                [
                    'name' => $subStatus ,
                    'main_status_id' => $mainStatusId
        ]);
        }
    }
}
