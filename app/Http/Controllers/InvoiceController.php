<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function emplyoeeInvoices()
    {
        $invoices = Invoice::where('user_id' , Auth::id())->orderByDesc('created_at')->simplePaginate();
        return view('user.employee.invoices' , compact('invoices'));
    }//end method
    public function emplyoerInvoices()
    {
        $invoices = Invoice::where('user_id' , Auth::id())->orderByDesc('created_at')->simplePaginate();
        return view('user.employer.invoices' , compact('invoices'));
    }//end method

}//end class.
