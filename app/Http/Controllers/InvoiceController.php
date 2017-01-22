<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Scheme;
Use Auth;

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

}
