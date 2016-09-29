<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Farmer;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

class ApprovedFarmerController extends Controller
{
    //
    //
    public function __construct()
    {

        //$this->middleware('auth');

    }

    /**
     * Displays datatables front end view
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        //$schemes = Scheme::all();
        $user = Auth::user()->scheme_id;
        $scheme = Scheme::find($user);
    	$title = "Farmers Connect: Farmers Page";
        return view('farmer.approved',compact('title','scheme'));
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
    	$farmers = Farmer::with('schemes')->where('assign',1)->get();

        return Datatables::of($farmers)->addColumn('action', function ($id) {
            return '<a href="farmers/' . $id->id . '" class="btn btn-default"><span class="glyphicon glyphicon-edit"></span></a>
            <button class="btn-delete btn btn-default" data-remote="/farmers/' . $id->id . '"><span class="glyphicon glyphicon-remove"></span></button>'; 
        })->make(true);
    }
}
