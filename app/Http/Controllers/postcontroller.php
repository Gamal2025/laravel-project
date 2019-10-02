<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\post;
class postcontroller extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
      $this->middleware('auth',
     ['except'=>['index','show']] );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gemo=post::orderBy('created_at','ASC')->paginate(1);
        return view('posts.index',compact('gemo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'title'=>'required',
            'body'=>'required'
        ]);
        date_default_timezone_set('Africa/Cairo');
       $user = Auth::user();
       $gemo=new post();
       $gemo->title=$request->input('title');
       $gemo->body=$request->input('body');
       $time=Date('YmdHms');
       $gemo->query=str_replace(' ','-',strtolower($gemo->title)).'-'.$time;
       $gemo->user_id=$user->id;
       $gemo->save();
       return redirect('/web')->with('success','post saved successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  public function show($query)
   //public function show($id)
    {
       $gemo=post::where('query',$query)->first();
       //$gemo=post::find($id);
       return view('posts.show',compact('gemo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $gemo=post::find($id);
        $userid=Auth::id();
        if($gemo->user_id !==$userid)
        {
            return redirect('/web')->with('error','this is not your post!!!');
        }
        return view('posts.edit',compact('gemo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $query)
    {
        $request->validate([
            'title'=>'required',
            'body'=>'required'
        ]);
        date_default_timezone_set('Africa/Cairo');
      
       $gemo=post::find($query);
       $gemo->title=$request->input('title');
       $gemo->body=$request->input('body');
       $time=date('YmdHms');
       $gemo->query=str_replace(' ','-',strtolower($gemo->title)).'-'.$time;
       $userid=Auth::id();
       if($gemo->user_id !== $userid)
       {
        return redirect('/web')->with('error','this is not your post!!!');
       }
       $gemo->save();
       return redirect('/web')->with('success','post updated successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gemo=post::find($id);
        $userid=Auth::id();
        if($gemo->user_id !== $userid)
        {
            return redirect('/web')->with('error','this is not your post');
        }
        $gemo->delete();
        return redirect('/web')->with('success','post delated successful');

        
    }
}
