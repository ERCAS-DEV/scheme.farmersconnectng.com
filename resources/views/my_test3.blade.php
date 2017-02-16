@extends('my_master')
@section('title', 'Group Farmers Page')

@section('content')

<h1 class="text-center">GROUP PAGE</h1>
<p class="lead text-center">Manage farmers, workers and dealers on the platform by grouping</p><br>
<div class="col-md-8 col-md-offset-2">
    @include('include.message')
    @include('include.warning')
    @include('include.error')
</div>

<div class="col-md-8">
    <div class="body table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>GROUP NAME</th>
                    <th>SCHEME</th>
                    <th>NO OF FARMERS</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i =1; ?>
                @if($scheme)
                @foreach($scheme->groups as $group )
                <tr>
                    <th scope="row">{{$i}}</th>
                    <td>
                        {{ucwords($group->group_name)}}
                    </td>
                    <td>
                        {{ucwords($scheme->name_of_scheme)}}
                    </td>
                    <td>
                        {{count($group->farmers)}}
                    </td>
                    <td>

                        <span class='pull-left'>
                            <!-- <a href='#' class='btn btn-default sm-btn' role='button'><span class="glyphicon glyphicon-edit"></span> </a> -->

                            <form action='/group/{{$group->key}}/edit' method='get'>

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" value="">
                                <button type="submit" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="left" title="Edit"><span class="glyphicon glyphicon-edit"></span></button>
                            </form>

                        </span>

                        <span class='pull-right'>
                            <form class="delete" action='/group/{{$group->key}}' method='POST'>
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="right" title="Delete">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </button>
                            </form>
                        </span>
                    </td>
                </tr>
                <?php $i++;?>
                @endforeach
                @else
                <span class='text-center'>**No Group**</span>
                @endif
            </tbody>
        </table>
    </div>
</div>

<div class="col-md-4">
    <div class="panel panel-default">
        <div class="panel-heading text-center">CREATE GROUP</div>
        <div class="panel-body">
            <form method="POST" action='/group'>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input class="form-control" type="text" name="group_name" placeholder="Group Name" required><br>

                <button type="submit" class="btn btn-primary btn-lg">Group</button>
            </form>
        </div>
    </div>
</div>

@stop