@extends('admin.layout.master')

@section('title', "Task Edit")

@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="{{route('admin.task')}}" class="btn btn-success">Tasks</a>
            </div>
        </div>
        <h2 style="text-align: center;">TASK EDIT</h2>
        <form method="POST" action="{{ route('admin.task.update', [$task->id])}}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title" value="{{$task->title}}">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control">{{$task->description}}</textarea>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" class="custom-select">
                    <option @if($task->status == 0) selected @endif value="0">Waiting</option>
                    <option @if($task->status == 1) selected @endif value="1">Completed</option>
                </select>
            </div>

            <div style="text-align: right;width: 100%;">
                <button type="submit" class="btn btn-success">Update</button>
            </div>

            @if(session()->has('errorMessage'))
                <div class="alert alert-danger" role="alert" style="margin-top:10px;">
                    {{session()->get('errorMessage')}}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger" role="alert" style="margin-top:10px;">
                    @foreach($errors->all() as $error)
                        {{ $error }}<br/>
                    @endforeach
                </div>
            @endif

        </form>
    </div>
@endsection
