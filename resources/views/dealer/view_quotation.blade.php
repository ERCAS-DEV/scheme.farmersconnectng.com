@extends('admin_template')
@section('content')

<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>{{$title}}</h2>
		</div>



	
			<!-- Exportable Table -->
			<div class="row clearfix">

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					@include('include.message')
					@include('include.warning')
					@include('include.error')
					<div class="card">
						<div class="header">
							<h2>
								VIEW QUOTATION
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

							<table class="table table-bordered table-striped table-hover" id="users-table1">
								<thead>
									<tr>
										<th>Activity</th>
										<th>Quantity</th>
										<th>Description</th>
										<th>Payment Range</th>
										<th>No of Feedbacks</th>
										<th>Action</th>

									</tr>
								</thead>
							</table>


						</div>
					</div>
				</div>




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
			ajax: '{!! URL('postdata') !!}',
			columns: [
			{ data: 'activity', name: 'activity' },
			{ data: 'quantity', name: 'quantity' },
			{ data: 'description', name: 'description' },
			{ data: 'payment_range', name: 'payment_range' },
			{ data: 'no', name: 'no' },
			{ data: 'action', name: 'action' },


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
