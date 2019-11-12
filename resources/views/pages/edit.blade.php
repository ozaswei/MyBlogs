@extends('layouts.app')
@section('content')
    <style>
        .jumbotron
        {
            background-color: white;
            opacity: 0.7;
            position: center;
            margin-top: 30px;
            padding-top: 20px;
            padding-bottom: 20px;
        }
        textarea
        {
            resize: none;
            color:blueviolet;
        }
        h2{
            text-align: center;
        }
        input[type='submit']
        {
            padding-left: 50px;
            padding-right: 50px;
            text-align: center;
        }
        input[type='reset']
        {
            padding-left: 50px;
            padding-right: 50px;
            text-align: center;
        }
    </style>
    <div class="jumbotron">
        <h2>Edit Blog</h2><br/>
        <form method="post" action='/blogs/edited/{{$datas->id}}'>
            @csrf
            <input type="text" name="title" class="form-control" placeholder="Type your Blogs title here" value="{{$datas->title}}"><br/>
            <input type="text" name="summary" class="form-control" placeholder="Type your Blogs summary here" value="{{$datas->summary}}"><br/>
            <textarea class="form-control" name="details" id="ckeditor1" placeholder="Type your Blogs details here" rows="10">{{$datas->details}}</textarea><br/>
            <center>
                <input type="submit" name="submit" value="Edit" class="btn btn-success">
                <input type="reset"  class="btn btn-danger">
            </center>
        </form>
    </div>
@endsection
@section('my-js')
    <script>
        CKEDITOR.replace('ckeditor1');
    </script>
@endsection
