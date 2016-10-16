<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Dealer;
use Auth;
use App\Scheme;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

class SchemeDealerController extends Controller
{
    //
    public function __construct()
    {

        $this->middleware('auth');

    }
    //
    /**
     * Displays datatables front end view
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        $user = Auth::user()->scheme_id;
        $scheme = Scheme::find($user);
    	$title = "Farmers Connect: Dealers Page";
        return view('dealer.scheme_dealer',compact('title','scheme'));
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        $user = Auth::user()->scheme_id;
        $dealer = Scheme::find($user)->dealers;

        return Datatables::of($dealer)->addColumn('action', function ($id) {
            return '<a href="dealer/' . $id->id . '" class="btn btn-default"><span class="glyphicon glyphicon-edit"></span></a>
            <button class="btn-delete btn btn-default" data-remote="/dealer/' . $id->id . '"><span class="glyphicon glyphicon-remove"></span></button>'; 
        })->make(true);
    }
}
