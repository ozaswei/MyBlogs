<?php

namespace App\Http\Controllers;

use App\comment;
use App\myblog;
use App\User;
use Illuminate\Http\Request;
use PHPMailer;

class BackendController extends Controller
{
    public function store(Request $request)
    {
        //validating the datas
        $this->validate($request,[
           'title'=>['required','max:100'],
           'details'=>'required'
        ]);

        //storing datas
        if(myblog::create([
            'title'=>$request->title,
            'summary'=>$request->summary,
            'details'=>$request->details,
            'user_id'=>auth()->user()->id
        ]))
        {
            return redirect()->back()->with('success','Your blog has been successfully posted');
        }
        else
        {
            return redirect()->back()->with('failed', 'There was some errors');
        }
    }

    public function bloglists()
    {
        $data=myblog::orderby('created_at','desc')->paginate(4);
        return view('pages.blogs')->with('datas',$data);
    }

    public function show($id)
    {
        $blog=myblog::find($id);
        $datas=comment::orderby('created_at','desc')->where('post_id','=',$id)->paginate(5);
        return view('pages.show')->with(['blogs'=>$blog,'datas'=>$datas]);
    }

    public function edited(Request $request,$id)
    {
        $this->validate($request,[
           'title'=>'required',
           'details'=>'required'
        ]);

        $datas=myblog::find($id);
        if($datas->update($request->all()))
        {
            return redirect()->back()->with('success','Your post has been updated');
        }
        else
        {
            return redirect()->back()->with('failed','There was some problems');
        }

    }

    public function delete($id)
    {
        $datas=myblog::find($id);
        if($datas->delete())
        {
            return redirect()->back()->with('success','The post has been successfully deleted');
        }
    }

    public function comment(Request $request,$id)
    {
        $this->validate($request,[
            'comments'=>'required'
        ]);
        $userid=auth()->user()->id;
        if(comment::create([
            'comments'=>$request->comments,
            'user_id'=>$userid,
            'post_id'=>$id
        ]))
        {
            return redirect()->back()->with('success','Your comment has been posted');
        }
        else
        {
            return redirect()->back()->with('failed','There has been some problems');
        }
    }

    public function profileshow()
    {
        $user_id=auth()->user()->id;
        $user=User::find($user_id);
        $datas=[
            'name'=>$user->name,
            'email'=>$user->email,
            'gender'=>$user->gender,
            'dob'=>$user->dob,
            'country'=>$user->country,
            'description'=>$user->description,
            'user_image'=>$user->user_image
        ];
        return view('pages.profilewitheditbutton')->with('datas',$datas);
    }

    public function showprofile($id)
    {
        $user=User::find($id);
        $datas=[
            'name'=>$user->name,
            'email'=>$user->email,
            'gender'=>$user->gender,
            'dob'=>$user->dob,
            'country'=>$user->country,
            'description'=>$user->description,
            'user_image'=>$user->user_image
        ];
        return view('pages.profile')->with('datas',$datas);
    }

    public function mail()
    {
        require_once('C:\xampp\htdocs\MyBlogs\PHPMailer\PHPMailerAutoload.php');
        $mail = new PHPMailer();
        $mail->isSMTP(); //enable smtp
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl'; // because to use gmail we have to connect using ssl
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = '465'; // we can use port 465 or 587
        $mail->isHTML();// we can send HTML emails using this PHPMailer class
        $mail->Username = '1programmersguide2@gmail.com';
        $mail->Password = 'tljlcmgsxdntygpu';

        //setting some email headers
        $mail->setFrom("duckduckgo.com");
        $mail->Subject = "Hello there";
        $mail->Body = "This means the email has been successfully send";
        $mail->AddAddress('1shannonravens2@gmail.com');
       if( $mail->send())
       {
           echo "Your email has been sent";
       }
    }
}
