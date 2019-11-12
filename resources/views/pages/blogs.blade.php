@extends('layouts.app')
@section('content')

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .flip-box {
            margin-top: 20px;
            background-color: transparent;
            width: 1050px;
            height: 60px;
            perspective: 1000px;

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
            border-radius: 100px 100px;
            padding-top: 10px;
        }

        .flip-box-front {
            background-color: honeydew;
            color: black;
            opacity: 0.6;
        }

        .flip-box-back {
            background-color: dodgerblue;
            color: white;
            transform: rotateX(180deg);
        }
        h1{
            margin-top: 5px;
        }

        .jumbotron{
            padding-top: 6px;
            margin-top: 20px;
            height: 550px;
            background: honeydew;
            opacity: 0.7;
        }
    </style>
    <div class="jumbotron">
@if(count($datas)>0)
    <h1>Posts</h1>
@foreach($datas as $data)
    <a href='/blogs/show/{{$data->id}}'>
<div class="flip-box">
    <div class="flip-box-inner">
        <div class="flip-box-front">
            <h4>{{$data->title}}</h4>
        </div>
        <div class="flip-box-back">
            {{$data->summary}}
        </div>
    </div>
</div></a>
    <hr>
@endforeach
<br/>
{{$datas->links()}}
    @else
    <h1>There aren't any Posts currently</h1>
    @endif
    </div>
@endsection
