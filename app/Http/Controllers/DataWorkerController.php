<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Worker;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

class DataWorkerController extends Controller
{
    //
    public function __construct()
    {

        //$this->middleware('auth');

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
    	$title = "Farmers Connect: Workers Page";
        return view('worker.index',compact('title','scheme'));
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return Datatables::of(Worker::query())->addColumn('action', function ($id) {
            return '<a href="worker/' . $id->key . '" class="btn btn-default"><span class="glyphicon glyphicon-edit"></span></a>
            <button class="btn-delete btn btn-default" data-remote="/worker/' . $id->key . '"><span class="glyphicon glyphicon-remove"></span></button>'; 
        })->make(true);
    }
}
