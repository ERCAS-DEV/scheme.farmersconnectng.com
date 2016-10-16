<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Scheme;
use Auth;
use App\Dealer;
use App\Activity;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

class AssignDealerController extends Controller
{
    //
    public function __construct()
    {

        $this->middleware('auth');

    }

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
    	$title = "Farmers Connect: Dealers Page";
        $activities = Activity::all();
        return view('dealer.assign',compact('title','schemes','activities','scheme'));
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return Datatables::of(Dealer::where('status','active')->where('assign',0)->get())->addColumn('action', function ($id) {
            return '<input type="checkbox" name="box[]" value="'.$id->id.'" id="remember_me_'.$id->id.'">
                                        <label for="remember_me_'.$id->id.'"></label>'; 
        })->make(true);
    }
}
