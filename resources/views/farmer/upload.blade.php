@extends('my_master')
@section('title', 'Upload Farmer CSV Page')
@section('content')

<h1 class="text-center">FARMERS' CSV UPLOAD</h1><br>
<div class="col-md-8 col-md-offset-2">
    @include('include.message')
    @include('include.warning')
    @include('include.error')
</div>
<div class="col-md-8">
    <div class="panel panel-default">
        <div class="panel-heading text-center">Upload Photo</div>
        <div class="panel-body">
            <form class="smart-form" action="csv" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="input input-file">
                    <input type="file" name="file" class="filestyle" data-buttonBefore="true">
                </div><br>
                <button class="btn btn-primary btn-lg">Upload</button>
            </form>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="panel panel-default">
        <div class="panel-heading text-center">Notice Board</div>
        <div class="panel-body">
            <p>Please adhere to the following instructions: </p>
            <ul>
                <li>Make sure all column are filled and not null</li>
                <li>CSV column heads are in the same format with database check for sample</li>
            </ul>
        </div>
    </div>
</div>
@stop