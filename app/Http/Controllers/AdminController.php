<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Hash;
use Redirect;
use App\Scheme;
use App\User;
use Session;
use App\Http\Requests;

class AdminController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth', ['except' => [
             'index','store'
         ]]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::check()) {
            return Redirect::to('admin/dashboard');
        }else{
        /*    $user = Auth::user()->scheme_id;
            $scheme = Scheme::find($user);*/
            $title = "Farmers Connect: Admin Page";
            return view('admin.index', compact('title','scheme'));
        }
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
    {
        //
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            if (Auth::user()->status ==='pending' ) {
                Session::flash('warning', 'Account not activated');           
                return Redirect::to('admin/logout');
            }
            if (Auth::user()->level() > 3) {
                Session::flash('warning', 'Account not activated');           
                return Redirect::to('admin/logout');
            }

            //checking user is worker or dealer
            if (Auth::user()->level() == 1) {

                return redirect()->intended('admin/client_dashboard');
            }else{

                return redirect()->intended('admin/dashboard');
            }

        } else {
            Session::flash('warning', 'Invalid login credentials');           
            return Redirect::back();
        }
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
