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
		    	        <h2>CREATE SCHEME</h2>
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
		    	    	<form action="/scheme"  method="post" enctype="multipart/form-data">
		    	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		    	            <h3>Scheme Details</h3>
		    	            <br />
		    	            <fieldset>
		    	                <div class="form-group form-float">
		    	                    <div class="form-line">
		    	                    	<label class="form-label">Name of Scheme*</label>
		    	                        <input type="text" class="form-control" name="name_of_scheme">
		    	                        
		    	                    </div>
		    	                </div>
		    	                <div class="form-group form-float">
		    	                    <div class="form-line">
		    	                    	<label class="form-label">Facilitator of Scheme*</label>
		    	                        <input type="text" class="form-control" name="facilitator_of_scheme" >
		    	                        
		    	                    </div>
		    	                </div>
		    	                <div class="form-group">
		    	                  <textarea class="form-control" name="discription_of_scheme" id="exampleTextarea" rows="3" placeholder="Discription of Scheme"></textarea>
		    	                </div>
		    	                <br />
		    	                <div class="form-group form-float">
		    	                	<label class="form-label">Logo of Scheme*</label>
		    	                    <div class="form-line">
		    	                        <input type="file" name="file" class="filestyle" data-buttonBefore="true">
		    	                    </div>
		    	                </div>
		    	                <div class="form-group form-float">
		    	                	<label class="form-label">Select Activity*</label>
		    	                   <select name='activity[]' class="form-control show-tick" multiple >
		    	                       @if(count($activities) > 0)
		    	                       	@foreach($activities as $activity)
		    	                       <option value='{{$activity->id}}'>{{$activity->name}}</option>
		    	                       @endforeach
		    	                       @else
		    	                       <option value=' '>NO Activity</option>
		    	                       @endif
		    	                   </select>
		    	                </div>

		    	            </fieldset>

		    	            <h3>Facilitator Details</h3>
		    	            <fieldset>
		    	            	<br />

		    	                <div class="form-group form-float">
		    	                    <div class="form-line">
		    	                        <input type="text" class="form-control" name="facilitator_name">
		    	                        <label class="form-label">Facilitator Name</label>
		    	                    </div>
		    	                </div>
		    	                <div class="form-group">
		    	                  <textarea class="form-control" name="address" id="exampleTextarea" rows="3" placeholder="Enter Address"></textarea>
		    	                </div>
		    	                <div class="form-group form-float">
		    	                    <div class="form-line">
		    	                        <input type="text" class="form-control" name="bvn">
		    	                        <label class="form-label">BVN*</label>
		    	                    </div>
		    	                </div>
		    	                <div class="form-group form-float">
		    	                    <div class="form-line">
		    	                        <input type="text" class="form-control" name="tin" >
		    	                        <label class="form-label">Tin</label>
		    	                    </div>
		    	                </div>
		    	                <div class="form-group form-float">
		    	                	<label class="form-label">Picture*</label>
		    	                    <div class="form-line">
		    	                        <input type="file" name="file1" class="filestyle" data-buttonBefore="true">
		    	                    </div>
		    	                </div>
		    	                <div class="form-group form-float">
		    	                    <div class="form-line">
		    	                        <input type="text" class="form-control" name="nature_of_bussiness" >
		    	                        <label class="form-label">Nature of Bussiness</label>
		    	                    </div>
		    	                </div>
		    	            </fieldset>

		    	            <h3>More Details</h3>
		    	            <fieldset>
		    	            	<div class="form-group form-float">
		    	            	    <div class="form-line">
		    	            	        <input type="text" class="form-control" name="email" >
		    	            	        <label class="form-label">Email*</label>
		    	            	    </div>
		    	            	</div>

		    	            	<div class="form-group form-float">
		    	            	    <div class="form-line">
		    	            	        <input type="text" class="form-control" name="phone" >
		    	            	        <label class="form-label">Phone*</label>
		    	            	    </div>
		    	            	</div>
		    	            	<div class="form-group">
		    	            	  <textarea class="form-control" name="objective_of_scheme" id="exampleTextarea" rows="3" placeholder="Objective of Scheme"></textarea>
		    	            	</div>		    	            	
		    	            	<div class="form-group">
		    	            	  <textarea class="form-control" name="partners_of_scheme" id="exampleTextarea" rows="3" placeholder="Partners of Scheme"></textarea>
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
		    			<p><em>Please adhere to the following instruction to aviod error</em></p>
		    			<ul style="list-style-type:square">
		    			  <li><em>Add activities before creating scheme</em></li>
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

