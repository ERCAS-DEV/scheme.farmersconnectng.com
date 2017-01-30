@extends('admin_template')
@section('content')

<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>{{$title}}</h2>
		</div>



		<!-- Exportable Table -->
		<div class="row clearfix">
			<form action='farmers_grouping' method='POST'>
		    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
		    	@include('include.warning')
		    	@include('include.message')
		    	@include('include.error')
		        <div class="card">
		            <div class="header">
		                <h2>
		                    GROUPING FARMERS <small>farmers that have not been assigned to group</small>
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
		                        	<th>Full Name</th>
		                        	<th>State</th>
		                        	<th>Village</th>
		                        	<th>Crop</th>
		                        	
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
		    				Select Group <small>You can mass group farmer</small>
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
		    			<div class="form-group">
		    				<select name='group' class="form-control show-tick">
		    					<option value=''>Select Group</option>
		    					@if($scheme->groups)
		    						@foreach($scheme->groups as $group)
		    				    		<option value='{{$group->id}}'>{{ucwords($group->group_name)}} &nbsp; | &nbsp; ({{count($group->farmers)}}) </option>
		    				    	@endforeach
		    				    @else
		    				    <option value=''>No Group</option>
		    				    @endif
		    				</select>
		    			</div>
		    			    <button type="submit" class="btn btn-warning pull-right waves-effect">ASSIGN SCHEME</button>
		    			    <br />
		    				
		    		</div>
		    	</div><!-- End of second row -->
		    </div>
		    <!-- #END# Bordered Table -->
		    </form>
		</div>
		<!-- #END# Exportable Table -->
	</div>
</section>
@stop

@push('scripts')
<script>
$(function() {
   var table = $('#users-table1').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('farmers_grouping.data') !!}',
        columns: [
        	{data: 'action', name: 'action', orderable: false, searchable: false},
            { data: 'fullname', name: 'fullname' },
            { data: 'state', name: 'state' },
            { data: 'village', name: 'village' },
            { data: 'crop', name: 'crop' },

            
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
