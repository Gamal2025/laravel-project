@extends('layout.master')
@section('content')
<h1> Edit {{$gemo->title}}</h1>
<hr>
{{ Form::open(['action' =>['postcontroller@update',$gemo->id] ,'method'=>'POST']) }}
{{form::hidden('_method','PUT')}}
    <div class="form-group">
            {{form::label('TITLE')}}
            {{form::text('title',$gemo->title,['class'=>'form-control','placeholder'=>'enter your title'])}}
    </div>
    <div class="form-group">
            {{form::label('BODY')}}
            {{form::text('body',$gemo->body,['class'=>'form-control','placeholder'=>'enter your body'])}}
    </div>
    <div class="form-group">
      {{form::submit('save',['class'=>'btn btn-primary'])}}
    </div>
  
{{ Form::close() }}

    
@endsection