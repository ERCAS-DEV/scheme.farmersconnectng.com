@extends('my_master')
@section('title', 'Register Farmer')
@section('content')

<div class="col-md-8 col-md-offset-2">
	<h1 class="text-center">CREATE FARMER</h1><br>
	<h3>PERSONAL DETAILS</h3>
	<form class="smart-form">

		<label class="input"><i class="icon-append fa fa-user"></i>
			<input type="text" name="full_name" placeholder="Full Name">
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
			<span class="button">
				<input id="file2" type="file" name="file2" onchange="this.parentNode.nextSibling.value = this.value">Browse
			</span>
			<input type="text" placeholder="Add Photo" readonly="">
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
			<select name="crop">
				<option value="" selected="" disabled="">Select Crop</option>
				<option value="cassava">Cassava</option>
				<option value="yam">Yam</option>
				<option value="potato">Potato</option>
				<option value="pawpaw">Paw Paw</option>
				<option value="melon">Melon</option>
			</select><i></i>
		</label><br>

		<h3>ACCOUNT INFORMATION</h3><br>
		<label class="select">
			<select name="bank">
				<option value="" selected="" disabled="">Select Bank</option>
				<option value="1">Access Bank</option>
				<option value="2">Guarantee Trust Bank</option>
				<option value="3">Diamond Bank</option>
				<option value="4">United Bank for Africa</option>
				<option value="5">Zenith Bank</option>
				<option value="6">Enterprise Bank</option>
				<option value="7">Eco Bank</option>
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

@stop