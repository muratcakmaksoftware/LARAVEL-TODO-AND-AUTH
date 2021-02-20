@extends('admin.layout.master')

@section('title', "ADMİN HOME")

@section('content')
    <div class="container">
        <h2 style="text-align: center;">ADMİN HOME</h2>

        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <a href="{{route('admin.task')}}">
                        <div class="card-body">
                            <div class="card-title">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h5 style="font-weight: bold;">TOTAL TASKS</h5>
                                    </div>
                                    <div class="col-md-3 text-right">
                                        <i class="fa fa-line-chart fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                            <h4 class="card-text" style="text-align: center;">{{$all_task_count}}</h4>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-3">

                <div class="card">
                    <a href="{{route('admin.task')}}">
                        <div class="card-body">
                            <div class="card-title">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h5 style="font-weight: bold;">TASKS</h5>
                                    </div>
                                    <div class="col-md-3 text-right">
                                        <i class="fa fa-list-ul fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                            <h4 class="card-text" style="text-align: center;">{{$task_count}}</h4>
                        </div>
                    </a>
                </div>

            </div>

        </div>

    </div>
@endsection

@section('css')
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">

    <style>
        .card a{
            color:black;
            text-decoration: none;
        }

        .card a:hover{
            color:orange;
        }

        .card .card-body:hover{
            background-color:#343a40;
        }
    </style>
@endsection


