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
		    @include('include.warning')
		    @include('include.message')
		    @include('include.error')
		        <div class="card">
		            <div class="header">
		                <h2>
		                    MY GROUP FARMERS <small>Farmers that belong to this group</small>
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
		                <table class="table table-bordered table-striped table-hover" id="users-table">
		                    <thead>
		                        <tr>
		                        	<th>Full Name</th>
		                        	<th>State</th>
		                        	<th>Phone</th>
		                        	<th>Crop</th>
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
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('groupfarmers.data') !!}',
        columns: [
            { data: 'fullname', name: 'fullname' },
            { data: 'state', name: 'state' },
            { data: 'phone', name: 'phone' },
            {data: 'crop', name: 'crop'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});
</script>
@endpush
