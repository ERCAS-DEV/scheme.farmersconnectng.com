@extends('admin_template')
@section('content')

<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>{{$title}}</h2>
		</div>



		<!-- Exportable Table -->
		<div class="row clearfix">

			<form action='quotation' method='POST'>
		    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
		    	@include('include.message')
		    	@include('include.warning')
		    	@include('include.error')
		        <div class="card">
		            <div class="header">
		                <h2>
		                    SEND QUOTATION
		                </h2>
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
		            		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		                <table class="table table-bordered table-striped table-hover" id="users-table1">
		                    <thead>
		                        <tr>
		                        	<th><input type="checkbox" id="remember_me_3">
                                        <label for="remember_me_3"></label>
		                        	</th>
		                        	<th>Company Name</th>
		                        	<th>Company Email</th>
		                        	<th>Company Phone</th>
		                        	<th>Address</th>
		                        	
		                        </tr>
		                    </thead>
		                </table>
		       

		            </div>
		        </div>
		    </div>




		    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		    	<div class="card">
		    		<div class="header">
		    			<h2>
		    				Send Quoatation <small>You can mass mail dealers</small>
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
		    				<input type="hidden" name="scheme" value="{{$scheme->id}}">
		    				

		    			    <div class="form-group">
		    			    	<label>Select Activity:-</label>
		    			    	<select name='activity' class="form-control show-tick">
		    			    		@if($scheme->activities->count() > 0)
		    			    		<option >Select Activity</option>
		    			    			@foreach($scheme->activities as $activity)
		    			    			<option value='{{$activity->name}}'>{{$activity->name}}</option>
		    			    			@endforeach
		    			    		@else
		    			    	    <option >NO Activity</option>
		    			    	    @endif
		    			    	</select>
		    			    </div>

		    			    <div class="form-group">
		    			        <label class="control-label">Quantity:-</label>
		    			        <input maxlength="100" type="text" name="quantity" class="form-control" placeholder="Enter Quantity of activities required" />
		    			    </div>
		    			    <div class="form-group">
		    			      <label for="exampleTextarea">Description:-</label>
		    			      <textarea class="form-control" name="description" id="exampleTextarea" rows="3" placeholder="List 5 with references"></textarea>
		    			    </div>
		    			    <div class="form-group">
		    			        <label class="control-label">Payment Duration:-</label>
		    			        <input maxlength="100" required type="text" name="payment_range" class="form-control" placeholder="Select date range" />
		    			    </div>
		    			    <button type="submit" class="btn btn-warning pull-right waves-effect">Send Quotation</button>
		    			    <br />
		    				
		    		</div>
		    	</div><!-- End of second row -->
		    </div>
		    <!-- #END# Bordered Table -->
		</div>
		<!-- #END# Exportable Table -->
		</form>
	</div>
</section>
@stop

@push('scripts')
<script>
$(function() {
   var table = $('#users-table1').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('quotation.data') !!}',
        columns: [
        	{data: 'action', name: 'action', orderable: false, searchable: false},
            { data: 'name_of_company', name: 'name_of_company' },
            { data: 'company_email', name: 'company_email' },
            { data: 'company_phone', name: 'company_phone' },
            { data: 'address', name: 'address' },

            
        ]
    });

   // Handle click on "Select all" control
   $('#remember_me_3').on('click', function(){
      // Get all rows with search applied
      var rows = table.rows({ 'search': 'applied' }).nodes();
      // Check/uncheck checkboxes for all rows in the table
      $('input[type="checkbox"]', rows).prop('checked', this.checked);
   });
});
</script>
@endpush
