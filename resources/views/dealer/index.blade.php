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
		        <div class="card">
		            <div class="header">
		                <h2>
		                    LISTING DEALERS
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
		                        	<th>Company Name</th>
		                        	<th>Company Email</th>
		                        	<th>Company Phone</th>
		                        	<th>State</th>
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
        ajax: '{!! route('viewdealer.data') !!}',
        columns: [
            { data: 'name_of_company', name: 'name_of_company' },
            { data: 'company_email', name: 'company_email' },
            { data: 'company_phone', name: 'company_phone' },
            { data: 'address', name: 'address' },
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});
</script>
@endpush
