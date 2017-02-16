@extends('my_master')
@section('title', 'Register Farmer')

@section('content')

<h1 class="text-center">MY SCHEME FARMERS</h1>
<p class="lead text-center">Farmers that belong to this scheme</p><br>

<div class="col-md-8 col-md-offset-2">
    @include('include.message')
    @include('include.warning')
    @include('include.error')
</div>

<div class="col-md-8">

    <div class="table-responsive">
       <table class="table table-bordered" id="users-table">
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
@stop

@push('scripts')
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('schemefarmers.data') !!}',
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