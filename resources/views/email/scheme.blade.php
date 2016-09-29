@extends('layout')
@section('content')
<section>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h2 class="text-center">Registration Successful</h2>
        <p>Dear {{$user->facilitator_name}}</p>
        <p>Please note that your company scheme have been created on Farmers Connect.</p>
        <p>Email: {{$user->email}}</p>
        <p>Password: {{$password}}</p>
        <p>Phone: {{$user->phone}}</p>
        <p>Please<a href="http://demo1.farmersconnectng.com/admin"><strong>CLICK HERE</strong></a> to login</p>
        <p><i>N/B:&nbsp;You are advice to change your password..</i></p>
    </div>
</div>
</section>
@stop