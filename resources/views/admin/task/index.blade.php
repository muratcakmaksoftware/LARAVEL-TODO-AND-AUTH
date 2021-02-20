@extends('admin.layout.master')

@section('title', "Tasks")

@section('content')
<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{route('admin.task.add')}}" class="btn btn-success">Task Add</a>
        </div>
    </div>
    <h2 style="text-align: center;">TASKS</h2>

    <div class="row" style="margin-bottom: 30px;">
        <div class="col-md-12">
            <a class="btn btn-primary" data-toggle="collapse" href="#filter" style="width: 100%;padding: 5px;">
                <span style="font-size:17px;font-weight: bold;">FILTER</span>
            </a>

            <div class="collapse" id="filter" style="background-color: white;padding: 10px 5px 5px 5px;">
                <form method="GET" action="{{ route('admin.task')}}">
                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">User</label>
                                <div class="col-sm-10">
                                    @if(auth()->user()->role == 1)
                                        <select name="user_id" class="custom-select">
                                            <option value="-1">All</option>
                                            @foreach($users as $user)
                                                <option @if($user->id == request('user_id', auth()->user()->id)) selected @endif value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <input type="title" class="form-control" disabled value="{{auth()->user()->name}}">
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-9">
                                    <input type="title" class="form-control" name="title" value="{{request('title')}}">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <input type="description" class="form-control" name="description" value="{{request('description')}}">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <select name="status" class="custom-select">
                                        <option value="-1" @if(request('status') == -1) selected @endif>All</option>
                                        <option value="0" @if(request('status') == 0) selected @endif>Waiting</option>
                                        <option value="1" @if(request('status') == 1) selected @endif>Completed</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-1">
                            <div style="text-align: right;width: 100%;">
                                <button type="submit" class="btn btn-success">Filter</button>
                            </div>
                        </div>

                    </div>



                </form>
            </div>
        </div>
    </div>

    <table class="table table-bordered" style="text-align: center;word-break: break-word;">
        <thead>
            <tr>
                <th width="5%">#</th>
                <th width="15%">User</th>
                <th width="20%">Title</th>
                <th width="30%">Task</th>
                <th width="10%">Status</th>
                <th width="10%">Edit</th>
                <th width="10%">Delete</th>
            </tr>
        </thead>

        <tbody>
            @foreach($tasks as $key => $task)
                <tr id="task_id_{{$task->id}}">
                    <td>{{$key+1}}</td>
                    <td>{{$task->user->name}}</td>
                    <td>{{$task->title}}</td>
                    <td>{{$task->description}}</td>
                    <td><img src="{{$task->image_url}}" height="30"/></td>
                    <td><a href="{{route('admin.task.edit', [$task->id])}}" class="btn btn-success"><i class="fa fa-pencil-square-o"></i></a></td>
                    <td>
                        <a onclick="$.taskDelete({{$task->id}})" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $tasks->onEachSide(3)->withQueryString()->links() }}



</div>
@endsection

@section('css')
    <style>
        nav {
            float: right;
        }
    </style>
@endsection

@section('js_init')
    <script>
        $( document ).ready(function() {

            $.taskDelete = function (id) {
                if(confirm("Are you sure you want to delete this task?")){
                    $.ajax({
                        url: "{{route('admin.task.delete')}}",
                        type: "DELETE",
                        dataType: "JSON",
                        data: {id : id},
                    }).done(function(response) {
                        if(response.status == 1){
                            toastr.success(response.message);
                            $("#task_id_"+ id).remove();
                        }else{
                            toastr.error(response.message);
                        }
                    }).fail(function(jqXHR, textStatus) {
                        toastr.error( "Request failed: " + textStatus );
                    });
                }
            };

        });

    </script>

@endsection
