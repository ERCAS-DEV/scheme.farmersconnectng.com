<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Farmer;
use App\Scheme;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

class AssignController extends Controller
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
        $scheme_id = Auth::user()->scheme_id;

        if ( ! empty($scheme_id)) {
            $schemes = Scheme::where('id',$scheme_id)->get();
        }else{
            $schemes = Scheme::all();
        }
        $scheme = Scheme::find($scheme_id);
        $title = "Farmers Connect: Farmers Page";
        return view('farmer.assign',compact('title','schemes','scheme'));
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return Datatables::of(Farmer::where('assign',0))->addColumn('action', function ($id) {
            return '<input type="checkbox" name="box[]" value="'.$id->id.'" id="remember_me_'.$id->id.'">
                                        <label for="remember_me_'.$id->id.'"></label>'; 
        })->make(true);
    }
}
