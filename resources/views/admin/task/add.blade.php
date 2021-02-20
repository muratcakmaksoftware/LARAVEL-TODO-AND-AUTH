@extends('admin.layout.master')

@section('title', "Task Add")

@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="{{route('admin.task')}}" class="btn btn-success">Tasks</a>
            </div>
        </div>
        <h2 style="text-align: center;">TASK ADD</h2>
        <form method="POST" action="{{ route('admin.task.create')}}">
            @csrf
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="6"></textarea>
            </div>
            <div style="text-align: right;width: 100%;">
                <button type="submit" class="btn btn-success">Add</button>
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
