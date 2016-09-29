@extends('layout')
@section('content')
<section>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h2 class="text-center">Registration Successful</h2>
        <p>Dear {{$user->last_name}} {{$user->first_name}}</p>
        <p>You have successfully registered as Farmers Connect Worker, Please find below your details.</p>
        <p>Email: {{$user->email}}</p>
        <p>Password: {{$password}}</p>
        <p>Phone: {{$user->phone}}</p>
        <p>Please<a href="{{ URL::route('email', array('token' => $token,'id'=>$user->id, 'email'=>$user->email)) }}"><strong>CLICK HERE</strong></a> to activate your account</p>
        <p><i>N/B:&nbsp;You are advice to change your password..</i></p>
    </div>
</div>
</section>
@stop