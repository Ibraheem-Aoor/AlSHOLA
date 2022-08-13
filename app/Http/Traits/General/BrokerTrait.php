<?php
namespace App\Http\Traits\General;

use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Support\Arr;

trait BrokerTrait
{
    /**
     * This trait contains the broker detaisl methods
     */

      /**
     * getting all the broker "total" sales in all months
     */
    public function getBrokerJobsByMonth($month = null)
    {
        $jobmcount = [];
        $jobArr = [];
            //Group Demands By Months
            $jobsByMonth = Job::where('broker_id' , $this->broker->id)->select('id' , 'created_at')->get()->groupBy(function($date)
            {
                return Carbon::parse($date->created_at)->format('m');
            });

            foreach ($jobsByMonth as $key => $value) {
                $jobmcount[(int)$key] = count($value);
            }

            for($i = 1; $i <= 12; $i++){
                if(!empty($jobmcount[$i])){
                    $jobArr[$i] = $jobmcount[$i];
                }else{
                    $jobArr[$i] = 0;
                }
            }//End Group Demands By Month
            return  $month ? $this->slectMonthJobs($month , $jobArr) : $jobArr;
    }//End getBrokerJobsByMonth



    /**
     * Get The Current month sales after calculating all of the broker sales in all months
     */
    public function slectMonthJobs($month  , $jobArr)
    {
        switch($month)
        {
            case 'jan' : return $jobArr[1];
            case 'feb' : return $jobArr[2];
            case 'mar' : return $jobArr[3];
            case 'apr' : return $jobArr[4];
            case 'may' : return $jobArr[5];
            case 'jun' : return $jobArr[6];
            case 'jul' : return $jobArr[7];
            case 'aug' : return $jobArr[8];
            case 'sep' : return $jobArr[9];
            case 'oct' : return $jobArr[10];
            case 'nov' : return $jobArr[11];
            case 'dec' : return $jobArr[12];
        }
    }//End  slectMonthJobs



    public function saveGoalAndCommission()
    {
        $this->validate(['thisMonthGoal' => 'required|numeric' , 'comissionRate' => 'required|numeric']);
        $this->broker->commission_rate = $this->comissionRate;
        $this->broker->brokerSalesGoal()->updateOrCreate(['broker_id' => $this->broker->id ], [
            $this->getCurrentMonth() => $this->thisMonthGoal,
        ]);
        $this->broker->commission_rate = $this->comissionRate;
        $this->broker->save();
        notify()->success('Saved successfully');
        session()->flash('success' , 'Saved Successfully');
        return redirect(route('brokers.details' , $this->broker->id));
    }//End saveGoalAndCommission


    /**
     *  get the current month name in lowercase
     * @return string
     */
    public function getCurrentMonth()
    {
        return strtolower(Carbon::today()->format('M'));
    }//End getCurrentMonth


    public function updateBrokerSalesData()
    {
        $salesData = $this->broker->brokerSalesGoal->getAttributes();
        $salesData = Arr::except($salesData , ['id' , 'broker_id' , 'commission_rate' , 'created_at' , 'updated_at']);
        $this->broker->total_required_sales = array_sum($salesData);
        $this->broker->total_achived = $this->broker->brokerJobs()->count();
        $this->broker->save();
    }//End updateBrokerSalesData


    public function getTotalncome()
    {
        $sum = 0;
        foreach($this->broker->brokerJobs() as $job)
            foreach($job->invoices() as $invoice)
                $sum += $invoice->totalCharge();
        return $sum;
    }//End getThisMonthIncome


    public function getThisMonthTotalIncome()
    {
        $jobs = Job::with('invoices')->whereMonth('created_at' , Carbon::now()->month(date('m')))->get();
        $sum = 0;
        foreach($jobs  as $job)
            foreach($job->invoices()->get() as $invoice)
                $sum += $invoice->totalCharge();
        return $sum;
    }//End getThisMonthTotalIncome


}
