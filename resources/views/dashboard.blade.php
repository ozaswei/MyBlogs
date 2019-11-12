@extends('layouts.app')

@section('content')
    @include('inc.message')
    <style>
        .col-md-10{
            margin-top: 40px;
        }




        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .flip-box {
            background-color: transparent;
            width: 300px;
            perspective: 1000px;
            padding-bottom: 35px;
            margin-left: 440px;

        }

        .flip-box-inner {
            position: relative;
            width: 100%;
            height: 100%;
            text-align: center;
            transition: transform 0.8s;
            transform-style: preserve-3d;
        }

        .flip-box:hover .flip-box-inner {
            transform: rotateX(180deg);
        }

        .flip-box-front, .flip-box-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
        }

        .flip-box-front {
            color: black;
            opacity: 0.7;
        }

        .flip-box-back {
            color: white;
            transform: rotateX(180deg);
        }
    </style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h2><b>Your Dashboard</b></h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <div class="right">
                            <a href="{{route('create')}}" class="btn btn-primary">Create</a>
                        </div>


                        @if(count($posts)>0)
                            <br/><h4>Your posts::</h4>
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th></th>
                        </tr>
                        <tr>
                            @foreach($posts as $post)
                                <td>{{$post->title}}</td>
                                <td>
                                    <div class="flip-box">
                                        <div class="flip-box-inner">
                                            <div class="flip-box-front">
                                            <h4>Modify</h4>
                                            </div>
                                            <div class="flip-box-back">
                                                <a href="/blogs/show/{{$post->id}}" class="btn btn-primary">Show</a>
                                                <a href="/blogs/edit/{{$post->id}}" class="btn btn-success">Edit</a>
                                                <a href="/blogs/delete/{{$post->id}}" class="btn btn-danger">Delete</a></td>
                                            </div>
                                        </div>
                                    </div>

                        </tr>
                        @endforeach
                    </table>
                            @else
                        <hr/><h4>You currently have no Posts</h4>
                            @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
