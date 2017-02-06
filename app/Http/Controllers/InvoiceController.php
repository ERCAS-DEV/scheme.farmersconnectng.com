<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Scheme;
use App\Worker;
use App\Invoice;
use App\Dealer;
Use Auth;

use Yajra\Datatables\Datatables;

class InvoiceController extends Controller
{
    //getting all invoice attached to scheme
    public function index()
    {
    	$scheme = Scheme::find(Auth::user()->scheme_id);
    	$title = "Invoice page";
    	return view("invoice.index",compact("scheme","title"));
    }

   //getting all the receipt confirmed by worker
    public function receipt()
    {
    	$scheme = Scheme::find(Auth::user()->scheme_id);
    	$title = "Activity Report page";
    	return view("invoice.receipt",compact("scheme","title"));
    }

    //displaying the group invoice
    public function group_receipt()
    {
        $scheme = Scheme::find(Auth::user()->scheme_id);
        $title = "Invoice Report page";
        return view("invoice.group_invoice",compact("scheme","title"));
    }

    //displaying dealer report
    public function dealer_receipt()
    {
        $scheme = Scheme::find(Auth::user()->scheme_id);
        $title = "Invoice Report page";
        return view("invoice.dealer_invoice",compact("scheme","title"));
    }

    //getting the group invoice
    public function postdata4()
    {
        $worker = Worker::where("email",Auth::user()->email)->first();
        return Datatables::of(Invoice::where("worker_key",$worker->key)->get())->make(true);
    }

    //getting the dealer invoice
    public function postdata5()
    {
        $dealer = Dealer::where("company_email",Auth::user()->email)->first();
        return Datatables::of(Invoice::where("dealer_key",$dealer->key)->get())->make(true);
    }

}
