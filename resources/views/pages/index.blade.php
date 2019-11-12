
@extends('layouts.app')
    @section('content')
        <style>
            .jumbotron{
                margin-top: 100px;
                opacity: 0.7;
                border-radius: 400px 100px 400px 100px;
                text-align: center;
                background-image: url("/image/smoker.gif");
                background-size: cover;
                color: white;
            }
            .imgbox{
                margin-top: 130px;
            }
        </style>

        <div class="jumbotron">
            <h1><b><u>MyBlogs</u></b></h1><br/>
            <h3>Create-Discuss-Comment your ideas</h3>
            <h4>Share your imagination , thought's and happiness with us. </h4>
               <h4><strong>As </strong><q style=" font-style: italic; font-family: Candara,cursive">Everything starts with a Thought</q></h4>
        </div>
        <div class="imgbox">
        <marquee><img src="{{url(asset('image/running.gif'))}}" width="100px"></marquee>
        </div>
    @endsection
