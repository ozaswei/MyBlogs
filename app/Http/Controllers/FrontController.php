<?php

namespace App\Http\Controllers;

use App\myblog;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contacts()
    {
        $greeting='Welcome to my Website';
        $datas=[
            'contactno'=>'+977-9818131687',
            'email'=>'1programmersguide2@gmail.com'
        ];
        return view('pages.contacts',$datas)->with('greet',$greeting);
    }

    public function create()
    {
        return view('pages.create');
    }

    public function edit($id)
        {
            $datas=myblog::find($id);
            return view('pages.edit')->with('datas',$datas);
        }
}
