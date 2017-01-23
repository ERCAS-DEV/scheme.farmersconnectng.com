<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Scheme;
use Auth;
use App\Farmer;
use App\Group;
use App\Worker;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

class GroupFarmerController extends Controller
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
     
     $scheme = Scheme::find(Auth::user()->scheme_id);
    	   $title = "Farmers Connect: Farmers Page";
        return view('farmer.group_farmer',compact('title','scheme'));
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        $worker = Worker::where("email",Auth::user()->email)->with("groups")->first();
        $group = Group::with("farmers")->find($worker->groups[0]['id']);

        return Datatables::of($group->farmers)->addColumn('action', function ($id) {
            return '<a href="/farmers/' . $id->key . '" class="btn btn-default"><span class="glyphicon glyphicon-edit"></span></a>
            <button class="btn-delete btn btn-default" data-remote="/farmers/' . $id->id . '"><span class="glyphicon glyphicon-remove"></span></button>'; 
        })->make(true);
    }
}
