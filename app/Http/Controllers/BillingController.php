<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Dealer;
use App\Billing;
use Session;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BillingController extends Controller
{
    public function __construct()
    {

       /* $this->middleware('auth', ['except' => [
             'index','store'
         ]]);*/

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('billing.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {//


        $dealer = Dealer::where('id',$request->input('id'))->where('status','active')->first();
        if ($dealer) {

            $check_billing = Dealer::where('id',$request->input('id'))->where('assign',1)->where('status','active')->first();
            if ($check_billing) {
                Session::flash('mistake','Error! You have submitted price brfore');
                return Redirect::back();
            }
            $billing = Billing::create($request->all());
            $dealer->billings()->save($billing);
            $dealer->assign = 1;
            $dealer->save();
            
            Session::flash('message','Price details received, will get intouch with you.');
            return Redirect::back();
        }
        Session::flash('mistake','Error! 400 erorr occured');
        return view('billing.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
