<?php

namespace App\Http\Livewire\Admin\Views\Invoice;

use App\Models\Application;
use App\Models\Currency;
use App\Models\DemandTerms;
use App\Models\Invoice;
use App\Models\Job;
use App\Models\SubInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class IssueClientInvoice extends Component
{

    public $job , $invoice , $currentRoute;
    public $applications = null;

    //Form data
    public $selectedApplicationId , $charge , $quantity , $discription , $currency;
    public $subInvoices = []; // when client add new recored it will be added to this array;
    public function mount($invoiceId , $jobId)
    {
        $this->invoice = Invoice::findOrFail($invoiceId);
        $this->job = Job::with(['applications' , 'terms'])->findOrFail($jobId);
        $this->applications = $this->job->applications()->whereDoesntHave('subInvoice')->with(['title' , 'subStatus' ])->get();
        $this->currentRoute = Route::currentRouteName();
    }


    /*
        Auto Set Charage when application is selected
    */
    public function setCharge()
    {
        $application = Application::with('title')->findOrFail($this->selectedApplicationId);
        $term = DemandTerms::whereJobId($this->job->id)->where('title' , $application->title->name)->first();
        if($term != null)
            $this->charge = $term->serivce_charge;
    }


    /**
     * Add new subInvoice and merge it to the sub invoices array
     */
    public function addSubInvoice()
    {
        $this->validate($this->rules() , $this->messages());
        $subInvoice = $this->getSubInvoice();
        array_push($this->subInvoices , $subInvoice);
        $this->cleareFormInputs();
    }


    public function rules()
    {
        return [
            'charge' => 'required',
            'quantity' => 'required',
            'discription' => 'required',
            'selectedApplicationId' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'selectedApplicationId.required' => 'Title Field is required',
        ];
    }

    /**
     * create current sub invocie with current input valeues
     */
    public function getSubInvoice()
    {
        return  [
            'application_id' => $this->selectedApplicationId,
            'charge' => $this->charge,
            'quantity' => $this->quantity,
            'description' => $this->discription,
            'invoice_id' => $this->invoice->id,
        ];
    }

    public function cleareFormInputs()
    {
        $this->selectedApplicationId = null;
        $this->charge = null;
        $this->quantity = null;
        $this->discription = null;
    }


    public function deleteSubInvoice($key)
    {
        unset($this->subInvoices[$key]);
    }

    public function issueInvoice()
    {
        foreach($this->subInvoices as $invoice)
        {
            SubInvoice::create(
                [
                    'application_id' => $invoice['application_id'],
                    'charge' => $invoice['charge'],
                    'quantity' => $invoice['quantity'],
                    'description' => $invoice['description'],
                    'invoice_id' => $this->invoice->id,
                ]
            );
        }
        $this->invoice->currency = $this->applications->first()->job->terms()->first()->currency;
        $this->invoice->save();
        notify()->success('Invoice Issued Successsfully');
        return redirect(route('admin.dashboard'));
    }

    public function render()
    {
        $currencies = Currency::all();
        return view('livewire.admin.views.invoice.issue-client-invoice' , ['currencies' => $currencies])->extends('layouts.admin.master')->section('content');
    }
}
