@extends('layout.master')
@section('content')
<h1>{{$gemo->title}}</h1>
@if (!Auth::guest() && Auth::user()->id ==$gemo->user_id)
    

<div class="clearfix">
    <div class="float-left">
    <a href="/web/{{$gemo->id}}/edit" class="btn btn-primary"><i class="fas fa-user-edit"></i>Edit post</a>
    </div>
    <div class="float-right">
            {{ Form::open(['action' =>['postcontroller@destroy',$gemo->id] ,'method'=>'POST']) }}
            {{form::hidden('_method',' DELETE')}}
            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>Delete</button>
        {{ Form::close() }}
    </div>
</div>
@endif
<hr>
<h3>{{$gemo->body}}</h3>
    
@endsection
