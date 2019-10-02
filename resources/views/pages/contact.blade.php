@extends('layout.master')
@section('content')
<h1>Contact us</h1>
<hr>
{{ Form::open(['action' => 'pagescontroller@send','method'=>'POST']) }}
    <div class="form-group">
            {{form::label('Name')}}
            {{form::text('name','',['class'=>'form-control','placeholder'=>'enter your name'])}}
    </div>
    <div class="form-group">
            {{form::label('Email')}}
            {{form::text('email','',['class'=>'form-control','placeholder'=>'enter your email'])}}
    </div>
    <div class="form-group">
            {{form::label('subject')}}
            {{form::text('subject','',['class'=>'form-control','placeholder'=>'enter your subject'])}}
    </div>
    <div class="form-group">
            {{form::label('BODY')}}
            {{form::textarea('body','',['class'=>'form-control','placeholder'=>'enter your massage'])}}
    </div>
    <div class="form-group">
      {{form::submit('save',['class'=>'btn btn-primary'])}}
    </div>
  
{{ Form::close() }}
@endsection