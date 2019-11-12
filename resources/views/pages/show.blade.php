@extends('layouts.app')
    @section('content')
        <style>
            .jumbotron{
                opacity: 0.7;
                padding-top: 50px;
                overflow: auto;
                margin-top: 20px;
            }
            h1{
                text-align: center;
            }


        </style>


        <div class="jumbotron responsive">
            <h1><b>{{$blogs->title}}</b></h1><br/><br/>
        <h4>{{$blogs->summary}}</h4><hr/>
          <?php
            echo htmlspecialchars_decode($blogs->details);
            ?>
            <hr/>
            <h3>Posted by <a href="/profile/{{$blogs->user->id}}">{{$blogs->user->name}}</a></h3>
            <h6>Posted at {{$blogs->created_at}}</h6>

        </div>
        <div class="jumbotron">
            <h3>Comments</h3>
            <hr/>
            @if(count($datas)>0)
            @foreach($datas as $data)
                    <ul class="list-group" style="list-style-type: none">
                        <li><h5><b>By <a href="/profile/{{$data->user->id}}">{{$data->user->name}}</a></b></h5></li>
                        <li><td>Commented at {{$data->created_at}}</td></li>

                        <li class="list-group-item " style="overflow: auto"><h5>{{$data->comments}}</h5></li>

                    </ul><br/>


            @endforeach
            {{$datas->links()}}
            @else
                <h4>There are no comments currently</h4>
            @endif
            <hr/>
            @include('inc.errors')
            @include('inc.message')
            Do you want to post a comment?
            <form method="post" action="/blogs/comment/{{$blogs->id}}">
                @csrf
                <textarea rows="5" class="form-control" style="resize: none" name="comments" placeholder="Comments"></textarea><br/>

                <input type="submit" name="submit" value="Comment">

            </form>
                </div>
    @endsection
