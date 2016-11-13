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
		    	        <h2>EDIT FARMER</h2>
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
		    	    	<form action="/farmers/{{$farmer->id}}"  method="post" enctype="multipart/form-data">
		    	    		<input type="hidden" name="_method" value="PUT">
		    	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		    	            <h3>Personal Details</h3>
		    	            <fieldset>
		    	                <div class="form-group form-float">
		    	                    <div class="form-line">
		    	                    	<label >Fullname*</label>
		    	                        <input type="text" class="form-control" name="fullname" value="{{$farmer->fullname}}">
		    	                        
		    	                    </div>
		    	                </div>
<!-- 		    	                <div class="form-group form-float">
		    	                    <div class="form-line">
		    	                        <input type="email" class="form-control" name="email" >
		    	                        <label class="form-label">Email*</label>
		    	                    </div>
		    	                </div> -->
		    	                <div class="form-group form-float">
		    	                    <div >
		    	                        <label class="form-label">Phone*</label>
		    	                        <input type="text" class="form-control" name="phone" value="{{$farmer->phone}}">
		    	                    </div>
		    	                </div>

		    	                <div >
		    	                <select name='gender' class="form-control show-tick" >
		    	                    <option value=''>Select Gender</option>
		    	                    <option value='m' <?php if($farmer->gender == 'm') echo "selected";?>>Male</option>
		    	                    <option value='f' <?php if($farmer->gender == 'f') echo "selected"; ?>>Female</option>
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
		    	            	       <option value='ABUJA' <?php if($farmer->state == 'ABUJA') echo "selected";?>>ABUJA FCT</option>
		    	            	       <option value='ABIA' <?php if($farmer->state == 'ABIA') echo "selected";?>>ABIA</option>
		    	            	       <option value='ADAMAWA' <?php if($farmer->state == 'ADAMAWA') echo "selected";?>>ADAMAWA</option>
		    	            	       <option value='AKWA IBOM' <?php if($farmer->state == 'AKWA IBOM') echo "selected";?>>AKWA IBOM</option>
		    	            	       <option value='ANAMBRA'  <?php if($farmer->state == 'ANAMBRA') echo "selected";?>>ANAMBRA</option>
		    	            	       <option value='BAUCHI' <?php if($farmer->state == 'BAUCHI') echo "selected";?>>BAUCHI</option>
		    	            	       <option value='BAYELSA' <?php if($farmer->state == 'BAYELSA') echo "selected";?>>BAYELSA</option>
		    	            	       <option value='BENUE' <?php if($farmer->state == 'BENUE') echo "selected";?>>BENUE</option>
		    	            	       <option value='BORNO' <?php if($farmer->state == 'BORNO') echo "selected";?>>BORNO</option>
		    	            	       <option value='CROSS RIVER' <?php if($farmer->state == 'CROSS RIVER') echo "selected";?>>CROSS RIVER</option>
		    	            	       <option value='DELTA' <?php if($farmer->state == 'DELTA') echo "selected";?>>DELTA</option>
		    	            	       <option value='EBONYI' <?php if($farmer->state == 'EBONYI') echo "selected";?>>EBONYI</option>
		    	            	       <option value='EDO' <?php if($farmer->state == 'EDO') echo "selected";?>>EDO</option>
		    	            	       <option value='EKITI' <?php if($farmer->state == 'EKITI') echo "selected";?>>EKITI</option>
		    	            	       <option value='ENUGU' <?php if($farmer->state == 'ENUGU') echo "selected";?>>ENUGU</option>
		    	            	       <option value='GOMBE' <?php if($farmer->state == 'GOMBE') echo "selected";?>>GOMBE</option>
		    	            	       <option value='IMO' <?php if($farmer->state == 'IMO') echo "selected";?>>IMO</option>
		    	            	       <option value='JIGAWA' <?php if($farmer->state == 'IMO') echo "selected";?>>JIGAWA</option>
		    	            	       <option value='KADUNA' <?php if($farmer->state == 'KADUNA') echo "selected";?>>KADUNA</option>
		    	            	       <option value='KANO' <?php if($farmer->state == 'KANO') echo "selected";?>>KANO</option>
		    	            	       <option value='KATSINA' <?php if($farmer->state == 'KATSINA') echo "selected";?>>KATSINA</option>
		    	            	       <option value='KEBBI' <?php if($farmer->state == 'KEBBI') echo "selected";?>>KEBBI</option>
		    	            	       <option value='KOGI' <?php if($farmer->state == 'KOGI') echo "selected";?>>KOGI</option>
		    	            	       <option value='KWARA' <?php if($farmer->state == 'KWARA') echo "selected";?>>KWARA</option>
		    	            	       <option value='LAGOS' <?php if($farmer->state == 'LAGOS') echo "selected";?>>LAGOS</option>
		    	            	       <option value='NASSARAWA' <?php if($farmer->state == 'NASSARAWA') echo "selected";?>>NASSARAWA</option>
		    	            	       <option value='NIGER' <?php if($farmer->state == 'NIGER') echo "selected";?>>NIGER</option>
		    	            	       <option value='OGUN' <?php if($farmer->state == 'OGUN') echo "selected";?>>OGUN</option>
		    	            	       <option value='ONDO' <?php if($farmer->state == 'ONDO') echo "selected";?>>ONDO</option>
		    	            	       <option value='OSUN' <?php if($farmer->state == 'OSUN') echo "selected";?>>OSUN</option>
		    	            	       <option value='OYO' <?php if($farmer->state == 'OYO') echo "selected";?>>OYO</option>
		    	            	       <option value='PLATEAU' <?php if($farmer->state == 'PLATEAU') echo "selected";?>>PLATEAU</option>
		    	            	       <option value='RIVERS' <?php if($farmer->state == 'RIVERS') echo "selected";?>>RIVERS</option>
		    	            	       <option value='SOKOTO' <?php if($farmer->state == 'SOKOTO') echo "selected";?>>SOKOTO</option>
		    	            	       <option value='TARABA' <?php if($farmer->state == 'TARABA') echo "selected";?>>TARABA</option>
		    	            	       <option value='YOBE' <?php if($farmer->state == 'YOBE') echo "selected";?>>YOBE</option>
		    	            	       <option value='ZAMFARA' <?php if($farmer->state == 'ZAMFARA') echo "selected";?>>ZAMFARA</option>
		    	            	   </select>
		    	            	</div>
		    	                <div class="form-group form-float">
		    	                    <div class="form-line">
		    	                        <label>LGA*</label>
		    	                        <input type="text" class="form-control" name="lga" value="{{$farmer->lga}}" >
		    	                    </div>
		    	                </div>
		    	                <div class="form-group form-float">
		    	                    <div class="form-line">
		    	                        <label>Village*</label>
		    	                        <input type="text" class="form-control" name="village" value="{{$farmer->village}}" >
		    	                    </div>
		    	                </div>
		    	                <div class="form-group form-float">
		    	                    <div class="form-line">
		    	                        <label>Farm Size*</label>
		    	                        <input type="text" class="form-control" name="farm_size" value="{{$farmer->farm_size}}" >
		    	                    </div>
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
		    	            	       <option value='Access Bank' <?php if($farmer->bank == 'Access Bank') echo "selected";?>>Access Bank</option>
		    	            	       <option value='Diamond Bank' <?php if($farmer->bank == 'Diamond Bank') echo "selected";?>>Diamond Bank</option>
		    	            	       <option value='Guaranty Trust Bank' <?php if($farmer->bank == 'Guaranty Trust Bank') echo "selected";?>>Guaranty Trust Bank</option>
		    	            	       <option value='United Bank for Africa' <?php if($farmer->bank == 'United Bank for Africa') echo "selected";?>>United Bank for Africa</option>
		    	            	       <option value='Zenith Bank' <?php if($farmer->bank == 'Zenith Bank') echo "selected";?>>Zenith Bank</option>
		    	            	       <option value='Aso Savings & Loans' <?php if($farmer->bank == 'Aso Savings & Loans') echo "selected";?>>Aso Savings & Loans</option>
		    	            	       <option value='Enterprise Bank' <?php if($farmer->bank == 'Enterprise Bank') echo "selected";?>>Enterprise Bank</option>
		    	            	       <option value='Ecobank' <?php if($farmer->bank == 'Ecobank') echo "selected";?>>Ecobank</option>
		    	            	   </select>
		    	            	</div>
		    	            	<div class="form-group form-float">
		    	            	    <div class="form-line">
		    	            	        <label >Account No*</label>
		    	            	        <input type="text" class="form-control" name="account_no" value="{{$farmer->account_no}}" >
		    	            	    </div>
		    	            	</div>
		    	            </fieldset>
		    	            <button type="submit" class="btn btn-warning m-t-15 waves-effect">UPDATE</button>
		    	
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

