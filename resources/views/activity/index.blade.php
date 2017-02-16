@extends('my_master')
@section('title', 'Activity Page')
@section('content')

<h1 class="text-center">ACTIVITY PAGE</h1><br>
<p class="lead text-center">Manage Scheme Activity on the platform</p><br>
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
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;?>
                @if($scheme->activities)
                @foreach($scheme->activities as $activity)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$activity->name}}</td>
                    <td>
                        <form class="delete" action='/activity/{{$activity->key}}' method='POST'>
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="Delete"> <span class="glyphicon glyphicon-remove"></span></button>
                        </form>
                    </td>
                </tr>
                <?php $i++;?>
                @endforeach
                @else
                <span class='text-center'>**No Activity**</span>
                @endif
            </tbody>
        </table>
    </div> 
</div>

<div class="col-md-4">
    <div class="panel panel-default">
        <div class="panel-heading text-center">CREATE ACTIVITY</div>
        <div class="panel-body">
            <p>Enter Activity Name: </p>
            <form method="POST" action='/activity'>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input class="form-control" type="text" name="name" placeholder="Full Name"><br>
                <button class="btn btn-primary btn-lg">CREATE</button>
            </form>
        </div>
    </div>
</div>
@stop