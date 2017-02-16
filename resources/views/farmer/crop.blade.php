@extends('my_master')
@section('title', 'Register Farmer')

@section('content')

<h1 class="text-center">CROPS / LIVESTOCK</h1>
<p class="lead text-center">Manage crop type on the platform</p><br>
<div class="col-md-8 col-md-offset-2">
	@include('include.message')
	@include('include.warning')
	@include('include.error')
</div>

<div class="col-md-8">
	
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Crop / Livestock Name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1;?>
				@if($crops)
				@foreach($crops as $crop)
				<tr>
					<td>{{$i}}</td>
					<td>{{ucwords($crop->crop)}}</td>
					<td>
						<button class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="left" title="Edit"> <span class="glyphicon glyphicon-edit"></span></button>
						<form class="delete" action='/crops/{{$crop->id}}' method='POST'>
							<input type="hidden" name="_method" value="DELETE">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<button type="submit" class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="Delete"> <span class="glyphicon glyphicon-remove"></span></button>
						</form>
					</div>
				</td>
			</tr>
			<?php $i++;?>
			@endforeach
			@else
			<span class='text-center'>**No Role**</span>
			@endif
		</tbody>
	</table>
</div>
</div>
<div class="col-md-4">
	<div class="panel panel-default">
		<div class="panel-heading text-center">Add Crops / Livestock</div>
		<div class="panel-body">
			<form method="POST" action='/crops'>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input class="form-control" type="text" name="crop" placeholder="Add Crops" required><br>
				<button type="submit" class="btn btn-primary btn-lg">ADD CROP</button>
			</form>
		</div>
	</div>
</div>

@stop