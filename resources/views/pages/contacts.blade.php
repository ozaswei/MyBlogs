
@extends('layouts.app')
    @section('content')
        <style>
            .jumbotron{
                opacity: 0.7;
                margin-top: 100px;
            }
            .table{
                padding-left: 20px;
            }
        </style>


        <div class="jumbotron">
            <table class="table" border="0">
                <tr>
                    <td rowspan="5"><img src="{{url(asset('image/me.jpg'))}}" style="width: 200px;
                border-radius: 50px;"> </td>
                </tr>
                <tr>
                    <td><h2><b>{{$greet}} </b>!!</h2></td>
                </tr>
                <tr>
                    <td><h3>Contact no. :: {{$contactno}}</h3></td>
                </tr>
                <tr>
                    <td><h3>Email :: {{$email}}</h3></td>
                </tr>
            </table>
        </div>
        <marquee><img src="{{url('/image/running2.gif')}}" width="120px"></marquee>
    @endsection
