@extends('layouts.app')
@section('content')
<style>
    .box{
        border: 5px solid transparent;
    }
    .image-box{
        position: absolute;
        width:260px;
        margin-left: 420px;
        border-radius: 50%;
        border: 5px solid #c51f1a;
    }
    .jumbotron{
        width: 1000px;
        height: 350px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 200px;

    }
    h2{
        text-align: center;
    }
    h6{
        text-align: center;
    }
    .box-2{
        position: absolute;
        border: 5px solid transparent;
    }
    .box-3{
        position: absolute;
        border: 5px solid transparent;
        margin-left: 370px;
    }
    .box-4{
        position: absolute;
        border: 5px solid transparent;
        margin-left: 750px;
    }
    .box-5{
        position: absolute;
        border: 5px solid transparent;
        margin-top: 55px;
        width: 930px;
        height: 150px;
        overflow: auto;
    }


</style>
<div class="box">
<img  class="image-box" src="/storage/user_image/{{$datas['user_image']}}">
</div>
    <div class="jumbotron">
        <h2>{{$datas['name']}}</h2>
            <h6>{{$datas['email']}}</h6>
            <div class="box-2">
                <h3>Birthday : {{$datas['dob']}}</h3>
            </div>
            <div class="box-3">
                <h3>Country : {{$datas['country']}}</h3>
            </div>
            <div class="box-4">
                <h3>Gender : {{$datas['gender']}}</h3>
            </div>
            <div class="box-5">
                <h4>{{$datas['description']}}</h4>
            </div>
    </div>

@endsection
