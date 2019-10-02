<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\dosend;

class pagescontroller extends Controller
{
    public function index()
    {
        $gemo='welcome to larvel';
        return view('pages.home',compact('gemo'));
    }
    public function about()
    {
        return view('pages.about');
    }
    public function contact()
    {
        return view('pages.contact');
    }

    public function send(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required||email',
            'subject'=>'required',
            'body'=>'required||min:10',
        ]);

        $name=$request->input('name');
        $email=$request->input('email');
        $subject=$request->input('subject');
        $body=$request->input('body');

        Mail::to('gkn1418831@gmail.com')->send(new dosend($name,$email,$subject,$body));
        return redirect('/contact')->with('success','your massage has sended');
    }
}
