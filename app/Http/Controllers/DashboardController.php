<?php

namespace App\Http\Controllers;
use App\myblog;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id=auth()->user()->id;
        $user=User::find($user_id);
        return view('dashboard')->with('posts',$user->myblog);
    }

    public function profile_edit()
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
        return view('pages.editprofile')->with('datas',$datas);
    }

    public function profile_saved(Request $request)
    {
        $user_id=auth()->user()->id;
        $user=User::find($user_id);

        if($request->hasFile('user_image'))
        {
            //Get filename with extension
            $fileNameWithExt=$request->file('user_image')->GetClientOriginalName();

            //Get just filename
            $filename=pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //Get just the ext
            $extension=$request->file('user_image')->getClientOriginalExtension();

            //fielname to store
            $fileNameToStore=$filename.'_'.time().'.'.$extension;

            /*if($user->user_image != 'noimage.jpg')
            {
                Storage::delete('public/storage/user_images/' . $user->user_image);
            }*/


            $user->user_image = $fileNameToStore;

            //Upload image
            $path=$request->file('user_image')->storeAs('public/user_image',$fileNameToStore);
        }
        else
        {
            $fileNameToStore='noimage.jpg';
        }

        $user->name=$request->name;
        $user->email=$request->email;
        $user->gender=$request->gender;
        $user->dob=$request->dob;
        $user-> country=$request->country;
        $user-> description=$request->description;
        $user->user_image=$fileNameToStore;
        if($user->save())
        {
            $datas=[
                'name'=>$user->name,
                'email'=>$user->email,
                'gender'=>$user->gender,
                'dob'=>$user->dob,
                'country'=>$user->country,
                'description'=>$user->description,
                'user_image'=>$user->user_image
            ];
            return redirect()->to(route('profileshow'))->with(['success'=>'Your profile has been updated','datas'=>$datas]);
        }
        else
        {
            return redirect()->back()->with('failed','There seems to be some problems');
        }

    }

}
