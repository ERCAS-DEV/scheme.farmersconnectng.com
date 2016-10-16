<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Scheme;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

class DataSchemeController extends Controller
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
  	$title = "Farmers Connect: Schemes Page";
      return view('scheme.index',compact('title','scheme'));
  }

  /**
   * Process datatables ajax request.
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function anyData()
  {
      return Datatables::of(Scheme::query())->addColumn('action', function ($id) {
          return '<a href="scheme/' . $id->key . '" class="btn btn-default"><span class="glyphicon glyphicon-edit"></span></a>
          <button class="btn-delete btn btn-default" data-remote="/scheme/' . $id->key . '"><span class="glyphicon glyphicon-remove"></span></button>'; 
      })->make(true);
  }
}
