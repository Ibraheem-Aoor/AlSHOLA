<?php
namespace App\Http\Helpers;

use App\Models\BusinessSetting;
use App\Models\Invoice;
use App\Models\Job;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Facades\Invoice as FacadesInvoice;
use LaravelDaily\Invoices\Invoice as InvoicesInvoice;

class InvoiceHelper
{
    public function setInvoicePayer(Request $request)
    {
        $valdiate = Validator::make($request->all() , ['job_id' => 'required' ,  'payer' => 'required']);
        $job = Job::with('user')->findOrFail($request->job_id);
        if($valdiate->fails())
        {
            notify()->error('Choose Payer Correctly');
            return back();
        }
        $invoice = new Invoice();
        $invoice->number = date('Y')."-".$this->generateInvoiceNumber();
        $invoice->job_id = $job->id;
        if($request->payer == 'client')
            $invoice->user_id= $job->user->id;
        else
            $invoice->user_id = 1;
        $invoice->save();
        if($request->payer == 'client')
            return redirect(route('admin.invoice.client' , ['invoiceId' => $invoice->id , 'jobId' => $request->job_id]));
        return redirect(route('admin.invoice.agent-select' , ['invoiceId' => $invoice->id , 'jobId' => $request->job_id]));

    }//end method




    function generateInvoiceNumber() {
        $number = mt_rand(100, 999); // better than rand()
        // call the same function if the barcode exists already
        if ($this->applicationRefExists($number)) {
            return $this->generateInvoiceNumber();
        }
        // otherwise, it's valid and can be used
        return $number;
    }

    function applicationRefExists($number) {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return Invoice::where('number' , $number)->exists();
    }//end method




    public function printInvoice($id)
    {
        $registerdInvoice = Invoice::with(['user' , 'subInvoices.application.title'])->findOrFail($id);
        $client = new Party([
            'name'          => 'ALSHOALA Recruitment Services W. L. L.',
            'phone'         => BusinessSetting::where('key', 'telephone')->first()->value,
            'custom_fields' => [
                // 'note'        => 'IDDQD',
                // 'business id' => '365#GG',
                'Address' =>  BusinessSetting::where('key', 'address')->first()->value,
            ],
        ]);

        $customer = new Party([
            'name'          => $registerdInvoice->user->name,
            'phone'         => $registerdInvoice->user->mobile,
            // 'code'          => '#22663214',
            'custom_fields' => [
                'E-mail' => $registerdInvoice->user->email,
            ],
        ]);
            $items = [];
                foreach($registerdInvoice->subInvoices as $subInvoice)
                {
                    array_push($items , (new InvoiceItem())
                    ->title($subInvoice->application->title->name)
                    ->description($subInvoice->description)
                    ->pricePerUnit($subInvoice->charge)
                    ->quantity($subInvoice->quantity));
                    // ->discount(10),
                }
        ;

        $notes = [
            'Company\'s Bank Details',
            'Account Name:  Alshoala Recruitment Services Co. W.L.L.',
            'Bank Name:  Ahli United Bank',
            'Account No.:  0012-692990-001',
            'IBAN No. :   BH39AUBB00012692990001',
            'Swift Code:   AUBBBHBM',
        ];
        $notes = implode("<br>", $notes);

        $invoice = InvoicesInvoice::make('TAX INVOICE')
            ->series($registerdInvoice->number)
            // ability to include translated invoice status
            // in case it was paid
            // ->status(__('invoices::invoice.paid'))
            ->serialNumberFormat('{SERIES}')
            ->seller($client)
            ->buyer($customer)
            ->date(now()->subWeeks(3))
            ->dateFormat('m/d/Y')
            // ->payUntilDays(14)
            ->currencySymbol($registerdInvoice->currency)
            ->currencyCode($registerdInvoice->currency)
            // ->currencyFormat('{SYMBOL}{VALUE}')
            // ->currencyThousandsSeparator('.')
            // ->currencyDecimalPoint(',')
            ->filename('ALSHOALA-INVOICE-' . $registerdInvoice->number)
            ->addItems($items)
            // ->notes($notes)
            ->logo(asset('assets/dist_3/assets/images/header-logo.png'))
            // You can additionally save generated invoice to configured disk
            ->save('public');

        $link = $invoice->url();
        // Then send email to party with link

        // And return invoice itself to browser or have a different view
        return $invoice->stream();
    }

}
