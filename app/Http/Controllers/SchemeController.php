<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Redirect;
use Mail;
use Image;
use Hash;
use App\Activity;
use File;
use App\Scheme;
use App\User;
use App\Http\Requests;
use App\Http\Requests\SchemeRequest;
use App\Http\Controllers\Controller;
use Bican\Roles\Models\Role;

class SchemeController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user()->scheme_id;
        $scheme = Scheme::find($user);

        $title = "Farmers Connect: Scheme Page";
        return view('scheme.index',compact('title','scheme'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = Auth::user()->scheme_id;
        $scheme = Scheme::find($user);
        $activities = Activity::all();
        $title = "Farmers Connect: Scheme Page";
        return view('scheme.create',compact('title','activities','scheme'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SchemeRequest $request)
    {
        //
        //check if email
        $check_scheme = Scheme::where('email',$request->input('email'))->first();
        if ($check_scheme) {
            Session::flash('warning','Failed! Email already exist');
            return Redirect::back();
        }
        //upload logo
        $request['logo'] = $this->image($request);
        $request['image'] = $this->image2($request);
        //generate key
        $request['key'] = str_random(20);
        $password = str_random(6);
        $password_hash = Hash::make($password);
        //create scheme
        $scheme = Scheme::create($request->all());
        $scheme->activities()->attach($request['activity']);
        $scheme->save();

        if ( ! $scheme) {
            Session::flash('warning','Failed! Unable to create scheme');
            return Redirect::back();
        }
        $user = $this->insertUser($request, $password_hash);

        if ($user) {
           //add one to many relationship between scheme and user
           //$scheme->users()->save($user);

            $user->scheme_id = $scheme->id;
            $user->save();

           $this->sendMail($scheme, $password);
           Session::flash('message','Successful! You have created a Scheme');
           return Redirect::back();
        }
         Session::flash('warning','Failed! Unable to create scheme');
         return Redirect::back();
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
       $title = 'Farmers Connect: Scheme Details';
       $scheme = Scheme::where('key',$id)->first();
       //dd($farmer);
       return view('scheme.show',compact('title','scheme'));
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
         echo "edit method";
        die;
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
        echo "update method";
        die;
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
        $scheme = Scheme::where('id',$id)->first();
        if ($scheme) {
            File::delete(public_path().'/uploads/logo/'.$scheme->logo,public_path().'/uploads/scheme/'.$scheme->image);
            /*unlink(public_path().'/uploads/logo'.$scheme->logo);
            unlink(public_path().'/uploads/scheme'.$scheme->image);*/
            $scheme->delete($id);

            $user = User::where('email',$scheme->email)->first();
            $user->delete($user->id);

            Session::flash('message','Successful! You have deleted a Scheme');
            return Redirect::to('/viewscheme');
        }
        Session::flash('warning','Failed! Unable to delete Scheme');
        return Redirect::back();
    }

    //uploading image
    private function image($request)
    {
        $image = $request->file('file');
        $imgName = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/uploads/logo');
        $img = Image::make($image->getRealPath())->resize(100, 50)->save($destinationPath.'/'.$imgName);

        return $imgName;
    }

    //uploading image
    private function image2($request)
    {
        $image = $request->file('file1');
        $imgName = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/uploads/scheme');
        $img = Image::make($image->getRealPath())->resize(150, 200)->save($destinationPath.'/'.$imgName);

        return $imgName;
    }



    //inserting into user table
    private function insertUser($request, $password_hash)
    {
        //check if email exist
        $check_user = User::where('email',$request->input('email'))->first();
        if ($check_user) {
            return false;
        }
        
        //create email
        $user = User::create([
            'name' => $request->input('name_of_scheme'),
            'email'=> $request->input('email'),
            'password' => $password_hash,
            'status'=>'active'
            ]);
    //attaching role to user
        if ($user) {
            $role = Role::where('slug','scheme')->first();
            $user->attachRole($role->id);

            return $user;
        }
        return false;
    }

    //send email to worker
    private function sendMail($register, $password) {
        Mail::send('email.scheme', ['user' => $register, 'password'=>$password], function ($m) use ($register) {
            $m->from('oparannabueze@gmail.com', 'Farmers Connect Registration');
            $m->to($register->email, $register->facilitator_name)->subject('Farmers Connect Registration Successful!');
        });
    }
}
