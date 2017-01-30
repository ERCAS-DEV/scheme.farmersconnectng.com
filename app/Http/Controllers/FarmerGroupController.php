<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Farmer;
use App\Scheme;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

class farmerGroupController extends Controller
{
    //
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
        //get scheme with all the group and farmers under group
        $scheme = Scheme::where('id',Auth::user()->scheme_id)->with('groups.farmers')->first();
       
        $title = "Farmers Connect: Farmers Page";
        return view('farmer.group',compact('title','scheme'));
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        $scheme = Scheme::where('id',Auth::user()->scheme_id)->with('farmers')->first();
        return Datatables::of($scheme->farmers)->addColumn('action', function ($id) {
            return '<input type="checkbox" name="box[]" value="'.$id->id.'" id="remember_me_'.$id->id.'">
                                        <label for="remember_me_'.$id->id.'"></label>'; 
        })->make(true);
    }
}
