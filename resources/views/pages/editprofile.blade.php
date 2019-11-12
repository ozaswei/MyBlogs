@extends('layouts.app')
@section('content')

    <style>

        .box3{
            width: 950px;
            margin-top: 10px;
            overflow: auto;
        }

        .jumbotron-head{
            font-family: "Apple Color Emoji", cursive;
            font-weight: bold;
            font-size: 30px;
            padding-bottom: 10px;
        }
        input[type=submit]
        {
            margin-top: 10px;
            border-radius: 20px 20px;
            width: 200px;
        }

        input[type=reset]{
            margin-top: 10px;
            margin-left: 10px;
            width: 200px;
            border-radius: 20px 20px;
        }

    </style>
    @include('inc.message')
    <div class="jumbotron responsive" style="height: 575px ;padding-top: 10px;">
        <div class="jumbotron-head">
            Profile
        </div>
        <form method="post" action="{{route('profilesaved')}}" enctype="multipart/form-data">
            @csrf
            <table>
                <tr>
                    <td style="width: 500px">
                        <input type="text" name="name" class="form-control" placeholder="Type your name" value="{{$datas['name']}}">
                    </td>
                    <td rowspan="5" style=" width: 600px ; padding-left: 200px">
                        <img name="user_image" src="/storage/user_image/{{$datas['user_image']}}" style="border-radius: 50%; max-width: 200px">

                        <input type="file" name="user_image"  style="padding-top: 10px">
                    </td>
                </tr>
                <tr>
                    <td><input type="email" name="email" placeholder="Type your email here" value="{{$datas['email']}}" class="form-control"></td>
                </tr>
                <tr>
                   <td><input type="date" name="dob" value="{{Carbon\Carbon::parse($datas['dob'])->format('m/d/Y')}}" class="form-control"></td>
                </tr>
                <tr>
                    @php
                        $check1='';
                        $check2='';
                        $check3='';
                    @endphp
                    <td>Gender:
                        @switch($datas['gender'])
                            @case('Male')
                            @php
                                $check1='checked="checked"';
                            @endphp
                            @break
                            @case('Female')
                            @php
                                $check2='checked="checked"';
                            @endphp
                            @break
                            @case('Others')
                            @php
                                $check3='checked="checked"';
                            @endphp
                            @break
                            @default
                            @php
                                $check1='checked="checked"';
                            @endphp
                        @endswitch
                        Male <input type="radio" name="gender" {{$check1}} value="Male">
                        Female <input type="radio" name="gender" {{$check2}} value="Female">
                        Others <input type="radio" name="gender" {{$check3}} value="Others">
                    </td>
                </tr>
                <tr>
                    <td><input type="text" value="{{$datas['country']}}" name="country" placeholder="Type the country your are currently living in" class="form-control"></td>
                </tr>
            </table>

            <div class="box3">
            <textarea rows="5"  cols="500"  name="description" class="form-control" placeholder="Tell us something about yourself :D" style="resize: none ; overflow:auto ">{{$datas['description']}}
            </textarea>
            </div>
            <input type="submit" name="submit" value="Save" class="btn btn-success">
            <input type="reset" class="btn btn-danger">
        </form>
    </div>
@endsection
