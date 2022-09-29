<?php
namespace App\Http\Helpers;

use App\Models\Application;
use App\Models\ApplicationMainStatus;
use App\Models\ApplicationStatusHistory;
use App\Models\DemandTerms;
use App\Models\Job;
use App\Models\JobSubStatus;
use App\Models\subStatus;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Facades\Invoice;
use Throwable;

use function PHPUnit\Framework\isEmpty;

class DemandHelper
{
    /**
     * This helper is used to hanlde some operations on Demands.
     */



    public function setDemandTermsAndSendToAgent(Request $request , $id)
    {
        try
        {
            $job = Job::with('terms')->findOrFail($id);
            $validate = Validator::make($request->all() , ['demandTerms.*' => 'required']);
            if($validate->fails())
            {
                return redirect()->back()->withErrors($validate->errors());
            }
            if(count($job->terms) > 0)
                $this->deleteOldTerms($job , $request->agent);
            $this->saveJobTerms($request , $job);
            $this->sendJobToAgent($request->agent , $job);
            HistoryRecordHelper::registerDemandLog('Demand Forwarded To Agent' .'<a href="/admin/demand/'.$job->id.'/details">'.'( '.$job->post_number.' )'.'</a>');
            $job->main_status_id = 1; //Active
            $job->sub_status_id = 2; //Under Proccess
            $job->save();
            notify()->success('Demand Sended Successfully');
            return redirect()->back();
        }catch(Throwable $e)
        {
            notify()->error('Something Went Wrong');
            return redirect()->back();
        }

    }//end method


    public function deleteOldTerms($job , $agent_id)
    {
        $job->terms()->whereUserId($agent_id)->delete();
    }//End deleteOldTerms

    public function saveJobTerms($request , $job)
    {
        foreach($request->demandTerms as $term)
        {
            $demand  = DemandTerms::create([
                'user_id' => $request->agent,
                'job_id' => $job->id,
                'currency' => $request->currency,
                'title' => $term['title'],
                'serivce_charge' => $term['service_charge'],
                'per' => $term['per'],
                'acceptence_duration' => $request->acceptence_duration ,
                'submission_duration' => $request->submission_duration ,
                'completion_duration' => $request->completion_duration ,
                'pay_from' => $request->pay_from ,
                'pay_to' => $request->pay_to ,
                'after_before' => $request->after_before ,
            ]);
            $demand->save();
        }
    }//End saveJobTerms


    //This method send the Demand to talent using many to many relationship
    public function sendJobToAgent($agentId , $job)
    {
        $agent = User::findOrFail($agentId);
        if($agent->hasJob($job))
        {
            notify()->error('The Job is Already Sent to the Agent');
            return back();
        }
        DB::table('job_user')->insert([
            'user_id' => $agent->id,
            'job_id' => $job->id,
        ]);
    }//end method



    public function testInvoice(Request $request)
    {
        $client = new Party([
            'name'          => 'Roosevelt Lloyd',
            'phone'         => '(520) 318-9486',
            'custom_fields' => [
                'note'        => 'IDDQD',
                'business id' => '365#GG',
            ],
        ]);

        $customer = new Party([
            'name'          => 'Ashley Medina',
            'address'       => 'The Green Street 12',
            'code'          => '#22663214',
            'custom_fields' => [
                'order number' => '> 654321 <',
            ],
        ]);

        $items = [

            (new InvoiceItem())
                ->title('Service 1')
                ->description('Your product or service description')
                ->pricePerUnit(47.79)
                ->quantity(2)
                ->discount(10),
            (new InvoiceItem())->title('Service 2')->pricePerUnit(71.96)->quantity(2),
            (new InvoiceItem())->title('Service 3')->pricePerUnit(4.56),
            (new InvoiceItem())->title('Service 4')->pricePerUnit(87.51)->quantity(7)->discount(4)->units('kg'),
        ];

        $notes = [
            'your multiline',
            'additional notes',
            'in regards of delivery or something else',
        ];
        $notes = implode("<br>", $notes);

        $invoice = Invoice::make('TAX INVOICE')
            ->series($this->generateInvoiceNumber())
            // ability to include translated invoice status
            // in case it was paid
            ->status(__('invoices::invoice.paid'))
            ->serialNumberFormat('{SEQUENCE}-{SERIES}')
            ->seller($client)
            ->buyer($customer)
            ->date(now()->subWeeks(3))
            ->dateFormat('m/d/Y')
            ->payUntilDays(14)
            ->currencySymbol('$')
            ->currencyCode('USD')
            ->currencyFormat('{SYMBOL}{VALUE}')
            ->currencyThousandsSeparator('.')
            ->currencyDecimalPoint(',')
            ->filename($client->name . ' ' . $customer->name)
            ->addItems($items)
            ->notes($notes)
            // ->logo(public_path('vendor/invoices/sample-logo.png'))
            // You can additionally save generated invoice to configured disk
            ->save('public');

        $link = $invoice->url();
        // Then send email to party with link

        // And return invoice itself to browser or have a different view
        return $invoice->stream();
    }



    function generateInvoiceNumber() {
        $number = mt_rand(100, 999); // better than rand()

        // call the same function if the barcode exists already
        if ($this->applicationRefExists($number)) {
            return $this->generateInvoiceNumber();
        }

        // otherwise, it's valid and can be used
        return $number;
    }//End generateInvoiceNumber

    function applicationRefExists($number) {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return Application::where('ref' , $number)->exists();
    }//End applicationRefExists



    /**
     * Ajax get demand substatus
     */
    public function getSubStatuses($id)
    {
        return JobSubStatus::where('job_main_status_id' , $id)->get();
    }//End getSubStatuses

    /**
     * Change Demand Status (main status and sub status)
     */

    public function postChangeDemandStatus(Request $request  , $id)
    {
        Validator::make($request->all() ,  ['mainStatus' => 'required' , 'subStatus' => 'required']);
        $job = Job::with(['subStatus' , 'mainStatus' , 'applications.mainStatus'])->findOrFail($id);

        //Not Allowed To cancel Demand that have an active applicatinos.
        if($request->mainStatus == 2)
        {
            $jobActiveApplicationsCount = $job->applications()->whereHas('mainStatus' , function($mainStatus){
                $mainStatus->where([ ['name' , '!=' , 'Cancelled'] , ['name' , '!=' , 'Completed'] ]);
            })->count();
            if($jobActiveApplicationsCount > 0)
            {
                notify()->error('This Demand Has Active Applications');
                return back();
            }
        }
        $job->sub_status_id = $request->subStatus;
        $job->main_status_id = $request->mainStatus;
        $job->save();
        HistoryRecordHelper::registerDemandLog('Status Changed'.'<a href="/admin/demand/'.$job->id.'/details">'.'( '.$job->post_number.' )'.'</a>');
        Artisan::call('cache:clear');
        notify()->success('Demand status changed Successfully');
        return redirect()->back();
    }//End postChangeDemandStatus



}//end class
