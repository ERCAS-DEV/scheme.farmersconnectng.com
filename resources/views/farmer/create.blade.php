@extends('admin_template')
@section('content')

<section class="content">
	<div class="container-fluid">

		<!-- Advanced Form Example With Validation -->
		
		<div class="row clearfix">

		    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
		    	@include('include.warning')
		    	@include('include.message')
		    	@include('include.error')
		    	<div class="card">
		    	    <div class="header">
		    	        <h2>CREATE FARMER</h2>
		    	        <ul class="header-dropdown m-r--5">
		    	            <li class="dropdown">
		    	                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
		    	                    <i class="material-icons">more_vert</i>
		    	                </a>
		    	                <ul class="dropdown-menu pull-right">
		    	                    <li><a href="javascript:void(0);">Action</a></li>
		    	                    <li><a href="javascript:void(0);">Another action</a></li>
		    	                    <li><a href="javascript:void(0);">Something else here</a></li>
		    	                </ul>
		    	            </li>
		    	        </ul>
		    	    </div>
		    	    <div class="body">
		    	    	<form action="/farmers"  method="post" enctype="multipart/form-data">
		    	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		    	            <h3>Personal Details</h3>
		    	            <fieldset>
		    	                <div class="form-group form-float">
		    	                    <div class="form-line">
		    	                    	<label class="form-label">Fullname*</label>
		    	                        <input type="text" class="form-control" name="fullname">
		    	                        
		    	                    </div>
		    	                </div>
<!-- 		    	                <div class="form-group form-float">
		    	                    <div class="form-line">
		    	                        <input type="email" class="form-control" name="email" >
		    	                        <label class="form-label">Email*</label>
		    	                    </div>
		    	                </div> -->
		    	                <div class="form-group form-float">
		    	                    <div class="form-line">
		    	                        <input type="text" class="form-control" name="phone" >
		    	                        <label class="form-label">Phone*</label>
		    	                    </div>
		    	                </div>

		    	                <div class="form-line">
		    	                <select name='gender' class="form-control show-tick" >
		    	                    <option value=''>Select Gender</option>
		    	                    <option value='m'>Male</option>
		    	                    <option value='f'>Female</option>
		    	                </select>
		    	                </div>
		    	                <br />
		    	                <div class="form-group form-float">
		    	                	<label class="form-label">Picture*</label>
		    	                    <div class="form-line">
		    	                        <input type="file" name="file" class="filestyle" data-buttonBefore="true">
		    	                    </div>

		    	                </div>
		    	            </fieldset>

		    	            <h3>Farm Details</h3>
		    	            <fieldset>
		    	            	<br />
		    	            	<div class="form-group form-float">
		    	            	   <select name='state' class="form-control show-tick" >
		    	            	       <option value=''>Select State*</option>
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
		    	            	   </select>
		    	            	</div>
		    	                <div class="form-group form-float">
		    	                    <div class="form-line">
		    	                        <input type="text" class="form-control" name="lga" >
		    	                        <label class="form-label">LGA*</label>
		    	                    </div>
		    	                </div>
		    	                <div class="form-group form-float">
		    	                    <div class="form-line">
		    	                        <input type="text" class="form-control" name="village" >
		    	                        <label class="form-label">Village*</label>
		    	                    </div>
		    	                </div>
		    	                <div class="form-group form-float">
		    	                    <div class="form-line">
		    	                        <input type="text" class="form-control" name="farm_size" >
		    	                        <label class="form-label">Farm Size*</label>
		    	                    </div>
		    	                </div>
		    	                <div class="form-group form-float">
		    	                	<label class="form-label">Crop*</label>
		    	                   <select name='crop' class="form-control show-tick">
		    	                       @if($crops->count() > 0)
		    	                       <option value=''>Select Crop</option>
		    	                       		@foreach($crops as $crop)
		    	                       		<option value='{{$crop->crop}}'>{{ucwords($crop->crop)}}</option>
		    	                       		@endforeach()
		    	                       @else
		    	                       <option value=''>No Crop</option>
		    	                       @endif
		    	                   </select>
		    	                </div>
		    	            </fieldset>

		    	            <h3>Account Information</h3>
		    	            <fieldset>
<!-- 		    	            	<div class="form-group form-float">
		    	            	    <div class="form-line">
		    	            	        <input type="text" class="form-control" name="no_of_pack" >
		    	            	        <label class="form-label">No of Pack*</label>
		    	            	    </div>
		    	            	</div>
		    	            	<div class="form-group form-float">
		    	            	   <select name='used_before' class="form-control show-tick" >
		    	            	       <option value=''>Select Used</option>
		    	            	       <option value='y'>YES</option>
		    	            	       <option value='n'>NO</option>
		    	            	   </select>
		    	            	</div> -->
		    	            	<div class="form-group form-float">
		    	            	   <select name='bank' class="form-control show-tick" >
		    	            	       <option value=''>Select Bank</option>
		    	            	       <option value='Access Bank'>Access Bank</option>
		    	            	       <option value='Diamond Bank'>Diamond Bank</option>
		    	            	       <option value='Guaranty Trust Bank'>Guaranty Trust Bank</option>
		    	            	       <option value='United Bank for Africa'>United Bank for Africa</option>
		    	            	       <option value='Zenith Bank'>Zenith Bank</option>
		    	            	       <option value='Aso Savings & Loans'>Aso Savings & Loans</option>
		    	            	       <option value='Enterprise Bank'>Enterprise Bank</option>
		    	            	       <option value='Ecobank'>Ecobank</option>
		    	            	   </select>
		    	            	</div>
		    	            	<div class="form-group form-float">
		    	            	    <div class="form-line">
		    	            	        <input type="text" class="form-control" name="account_no" >
		    	            	        <label class="form-label">Account No*</label>
		    	            	    </div>
		    	            	</div>
		    	            </fieldset>
		    	            <button type="submit" class="btn btn-warning m-t-15 waves-effect">CREATE</button>
		    	
		    	    </div>
		    	</div>
		    </div>




		    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 hidden-sm hidden-xs">
		    	<div class="card">
		    		<div class="header">
		    			<h2>
		    				Notice Board <small>Read the following instruction</small>
		    			</h2>
		    			<ul class="header-dropdown m-r--5">
		    				<li>
		    					<a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse">
		    						<i class="material-icons">loop</i>
		    					</a>
		    				</li>
		    				<li class="dropdown">
		    					<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
		    						<i class="material-icons">more_vert</i>
		    					</a>
		    					<ul class="dropdown-menu pull-right">
		    						<li><a href="javascript:void(0);">Action</a></li>
		    						<li><a href="javascript:void(0);">Another action</a></li>
		    						<li><a href="javascript:void(0);">Something else here</a></li>
		    					</ul>
		    				</li>
		    			</ul>
		    		</div>
		    		<div class="body">
		    			<p><em>Please adhere to the following instruction</em></p>
		    			<ul style="list-style-type:square">
		    			  <li><em>Phone number and fullname are unique identification for farmers</em></li>
		    			  <li><em>Add crop before adding farmer</em></li>
		    			</ul>
		    		</div>
		    	</div><!-- End of second row -->
		    </div>
		</div>
	</form>
		<!-- #END# Advanced Form Example With Validation -->
	</div>
		
</section>
@stop

