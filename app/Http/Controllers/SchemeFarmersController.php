<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Scheme;
use Auth;
use App\Farmer;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

class SchemeFarmersController extends Controller
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
   	   $title = "Farmers Connect: Farmers Page";
       return view('farmer.scheme_farmer',compact('title','scheme'));
   }

   /**
    * Process datatables ajax request.
    *
    * @return \Illuminate\Http\JsonResponse
    */
   public function anyData()
   {
       $user = Auth::user()->scheme_id;
       $farmers = Scheme::find($user)->farmers;

       return Datatables::of($farmers)->addColumn('action', function ($id) {
           return '<a href="farmers/' . $id->id . '" class="btn btn-default"><span class="glyphicon glyphicon-edit"></span></a>
           <button class="btn-delete btn btn-default" data-remote="/farmers/' . $id->id . '"><span class="glyphicon glyphicon-remove"></span></button>'; 
       })->make(true);
   }
}
