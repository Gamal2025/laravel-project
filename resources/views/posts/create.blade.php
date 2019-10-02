@extends('layout.master')
@section('content')

<h1>Add New Post</h1>

{{ Form::open(['action' => 'postcontroller@store','method'=>'POST']) }}
    <div class="form-group">
            {{form::label('TITLE')}}
            {{form::text('title','',['class'=>'form-control','placeholder'=>'enter your title'])}}
    </div>
    <div class="form-group">
            {{form::label('BODY')}}
            {{form::text('body','',['class'=>'form-control','placeholder'=>'enter your body'])}}
    </div>
    <div class="form-group">
      {{form::submit('save',['class'=>'btn btn-primary'])}}
    </div>
  
{{ Form::close() }}
    
@endsection