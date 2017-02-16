@extends('my_master')
@section('title', 'Register Farmer')
@section('content')

<h1 class="text-center">CREATE FARMER</h1><br>
<div class="col-md-8 col-md-offset-2">
	@include('include.message')
	@include('include.warning')
	@include('include.error')
</div>
<div class="col-md-8">
	
	<h3>PERSONAL DETAILS</h3>
	<form class="smart-form" action="/farmers"  method="post" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<label class="input"><i class="icon-append fa fa-user"></i>
			<input type="text" name="fullname" placeholder="Full Name">
			<b class="tooltip tooltip-bottom-right">Required</b>
		</label><br>

		<label class="input"><i class="icon-append fa fa-phone"></i>
			<input type="text" name="phone" placeholder="Phone Number">
			<b class="tooltip tooltip-bottom-right">Required</b>
		</label><br>

		<label class="select">
			<select name="gender">
				<option value="" selected="" disabled="">Gender</option>
				<option value="male">Male</option>
				<option value="female">Female</option>
			</select><i></i>
		</label><br>

		<div class="input input-file">
			<input type="file" name="file" class="filestyle" data-buttonBefore="true">
		</div><br>

		<h3>FARM DETAILS</h3><br>
		<label class="select">
			<select name="state">
				<option value="" selected="" disabled="">Select State</option>
				<option value='ABUJA'>ABUJA FCT</option>
				<option value='ABIA'>ABIA</option>
				<option value='ADAMAWA'>ADAMAWA</option>
				<option value='AKWA IBOM'>AKWA IBOM</option>
				<option value='ANAMBRA'>ANAMBRA</option>
				<option value='BAUCHI'>BAUCHI</option>
				<option value='BAYELSA'>BAYELSA</option>
				<option value='BENUE'>BENUE</option>
				<option value='BORNO'>BORNO</option>
				<option value='CROSS RIVER'>CROSS RIVER</option>
				<option value='DELTA'>DELTA</option>
				<option value='EBONYI'>EBONYI</option>
				<option value='EDO'>EDO</option>
				<option value='EKITI'>EKITI</option>
				<option value='ENUGU'>ENUGU</option>
				<option value='GOMBE'>GOMBE</option>
				<option value='IMO'>IMO</option>
				<option value='JIGAWA'>JIGAWA</option>
				<option value='KADUNA'>KADUNA</option>
				<option value='KANO'>KANO</option>
				<option value='KATSINA'>KATSINA</option>
				<option value='KEBBI'>KEBBI</option>
				<option value='KOGI'>KOGI</option>
				<option value='KWARA'>KWARA</option>
				<option value='LAGOS'>LAGOS</option>
				<option value='NASSARAWA'>NASSARAWA</option>
				<option value='NIGER'>NIGER</option>
				<option value='OGUN'>OGUN</option>
				<option value='ONDO'>ONDO</option>
				<option value='OSUN'>OSUN</option>
				<option value='OYO'>OYO</option>
				<option value='PLATEAU'>PLATEAU</option>
				<option value='RIVERS'>RIVERS</option>
				<option value='SOKOTO'>SOKOTO</option>
				<option value='TARABA'>TARABA</option>
				<option value='YOBE'>YOBE</option>
				<option value='ZAMFARA'>ZAMFARA</option>
			</select><i></i>
		</label><br>
		<label class="input"><i class="icon-append fa fa-building"></i>
			<input type="text" name="lga" placeholder="Local Government Area">
			<b class="tooltip tooltip-bottom-right">Required</b>
		</label><br>
		<label class="input"><i class="icon-append fa fa-building"></i>
			<input type="text" name="village" placeholder="Village">
			<b class="tooltip tooltip-bottom-right">Required</b>
		</label><br>
		<label class="input"><i class="icon-append fa fa-user"></i>
			<input type="text" name="farm_size" placeholder="Farm Size">
			<b class="tooltip tooltip-bottom-right">Required</b>
		</label><br>
		<label class="select">

			<select name='crop'>
				@if($crops->count() > 0)
				<option value=''>Select Crop</option>
				@foreach($crops as $crop)
				<option value='{{$crop->crop}}'>{{ucwords($crop->crop)}}</option>
				@endforeach
				@else
				<option value=''>No Crop</option>
				@endif
			</select><i></i>

		</label><br>

		<h3>ACCOUNT INFORMATION</h3><br>
		<label class="select">
			<select name="bank">
				<option value="" selected="" disabled="">Select Bank</option>
				<option value="Access Bank">Access Bank</option>
				<option value="Diamond Bank">Diamond Bank</option>
				<option value="Guaranty Trust Bank">Guaranty Trust Bank</option>
				<option value="United Bank for Africa">United Bank for Africa</option>
				<option value="Zenith Bank">Zenith Bank</option>
				<option value="Aso Savings & Loans">Aso Savings & Loans</option>
				<option value="Enterprise Bank">Enterprise Bank</option>
				<option value="Ecobank">Eco Bank</option>
			</select><i></i>
		</label><br>
		<label class="input"><i class="icon-append fa fa-user"></i>
			<input type="text" name="acct_no" placeholder="Account Number">
			<b class="tooltip tooltip-bottom-right">Required</b>
		</label><br>

		<button type="submit" class="btn btn-primary btn-lg">Create
		</button>

	</form>
</div>
<div class="col-md-4">
	<div class="panel panel-default">
		<div class="panel-heading text-center">Notice Board</div>
		<div class="panel-body">
			<p>Please adhere to the following instructions: </p>
			<ul>
				<li>Phone number and fullname are unique identification for farmers</li>
				<li>Add crop before adding farmer</li>
			</ul>
		</div>
	</div>
</div>

@stop