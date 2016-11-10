<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use Hash;
use Redirect;
use File;
use Image;
use Session;
use App\User;
use App\Dealer;
use App\Http\Requests;
use App\Http\Requests\DealerRequest;
use Bican\Roles\Models\Role;
use App\Http\Controllers\Controller;

class DealerController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth', ['except' => [
             'create','store','emailConfirm'
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
        $user = Auth::user()->scheme_id;
        $scheme = Scheme::find($user);
        $title = "Farmers Connect: Dealer Page";
        return view('dealer.index',compact('title','scheme'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dealer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DealerRequest $request)
    {
        //
/*        echo "<pre>";
        print_r($request->all());
        die;*/

        //check if email
        $check_dealer = Dealer::where('company_email',$request->input('company_email'))->first();
        if ($check_dealer) {
            Session::flash('warning','Failed! Email already exist.');
            return Redirect::back();
        }
        //generate key
        $request['key'] = str_random(20);
        //generate password
        $password = str_random(6);
        $password_hash = Hash::make($password);
        $token = str_random(64);
        $request['token'] = $token;
        //insert into workers table

        $request['logo'] = $this->image($request);
        $request['image'] = $this->image2($request);

        $dealer = Dealer::create($request->all());

        if ( ! $dealer) {
          Session::flash('warning','Failed! Unable to create user');
          return Redirect::back();
        }
        //insert into user table
        $user = $this->insertUser($request, $password_hash);
        
        if ($user) {
            //send email
            $this->sendMail($dealer, $password, $token);
            Session::flash('message','Successful! Please check your email to activate your account.');
            return Redirect::back();
        }
        Session::flash('warning','Failed! Unable to register on the platform.');
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
        $user = Auth::user()->scheme_id;
        $scheme = Scheme::find($user);
        $title = 'Farmers Connect: Dealer Details';
        $dealer = Dealer::where('key',$id)->first();
        //dd($farmer);
        if ($dealer) {
              return view('dealer.show',compact('title','dealer','scheme'));
        }
        Session::flash('warning','Error! 404 Error.');
        return Redirect::back();
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
        $dealer = Dealer::where('id',$id)->first();
        if ($dealer) {
            File::delete(public_path().'/uploads/logo/'.$dealer->logo,public_path().'/uploads/dealer/'.$dealer->image);
            /*unlink(public_path().'/uploads/logo'.$dealer->logo);
            unlink(public_path().'/uploads/dealer'.$dealer->image);*/
            $dealer->delete($id);

            $user = User::where('email',$dealer->company_email)->first();
            $user->delete($user->id);

            Session::flash('message','Successful! You have deleted a Dealer');
            return Redirect::to('/viewdealer');
        }
        Session::flash('warning','Failed! Unable to delete Dealer');
        return Redirect::back();
    }

    //inserting into user table
    private function insertUser($request, $password_hash)
    {
        //check if email exist
        $check_user = User::where('email',$request->input('company_email'))->first();
        if ($check_user) {
            return false;
        }
        
        //create email
        $user = User::create([
            'name' => $request->input('name_of_company'),
            'email'=> $request->input('company_email'),
            'password' => $password_hash,
            'user'=> 4
            ]);
    //attaching role to user
        if ($user) {
            $role = Role::where('slug','dealer')->first();
            $user->attachRole($role->id);

            return true;
        }
        return false;
    }

    //send email to worker
    private function sendMail($register, $password, $token) {
        Mail::send('email.dealer', ['user' => $register, 'password'=>$password, 'token'=>$token], function ($m) use ($register) {
            $m->from('oparannabueze@gmail.com', 'Farmers Connect Registration');
            $m->to($register->company_email, $register->name_of_company)->subject('Farmers Connect Registration Successful!');
        });
    }

    //email confirmation
    //Dealer email confirmation
    public function emailConfirm($token, $id, $email)
    {

        //check if user exist
        $dealer = Dealer::where('token', $token)->first();
        //update user status

        if ($dealer->token == $token && $dealer->status == 'pending') {
            $dealer->status = 'active';
            $dealer->save();

            $user = User::where('email',$email)->first();
            $user->status = 'active';
            $user->save();

            Session::flash('message','Successful! Please login ');
            return Redirect::to('/admin');
        }
        Session::flash('warning','Failed! Token Mismatch ');
        return Redirect::to('/admin');
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
        $destinationPath = public_path('/uploads/dealer');
        $img = Image::make($image->getRealPath())->resize(150, 200)->save($destinationPath.'/'.$imgName);

        return $imgName;
    }

    //suspending and activating worker
    public function action(Request $request)
    {
        $dealer = Dealer::find($request->input('id'));
        switch($request->input('status')){
            case 'active':
                $dealer->status = 'suspend';
                $dealer->save();
                break;
            default:
                $dealer->status = 'active';
                $dealer->save();


        }
    }
}
