@extends('my_master')
@section('title', 'Farmers Page')
@section('content')

<h1 class="text-center">ASSIGNING FARMERS</h1><br>
<p class="lead text-center">Add farmer to this scheme from list of Admin available farmers</p><br>
<div class="col-md-8 col-md-offset-2">
    @include('include.message')
    @include('include.warning')
    @include('include.error')
</div>

<form action='assign' method='POST'>
    <div class="col-md-8">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <table class="table table-bordered" id="users-table1">
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

    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading text-center">SELECT GROUP</div>
            <div class="panel-body">
                <p>You can mass assign Farmers to scheme</p>
                <div class="body">
                    <div class="form-group">
                        <label class="select">
                            <select name="group">
                                <option value=''>Select Group</option>
                                @if($scheme->groups)
                                @foreach($scheme->groups as $group)
                                <option value='{{$group->id}}'>{{ucwords($group->group_name)}} &nbsp; | &nbsp; ({{count($group->farmers)}}) </option>
                                @endforeach
                                @else
                                <option value=''>No Group</option>
                                @endif
                            </select><i></i>
                        </label><br>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg">ASSIGN SCHEME</button>
                    <br />
                </div>
            </div>
        </div>
    </div>
</form>
@stop

@push('scripts')
<script>
$(function() {
 var table = $('#users-table1').DataTable({
    processing: true,
    serverSide: true,
    ajax: '{!! route('assign.data') !!}',
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