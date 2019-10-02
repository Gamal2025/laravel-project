@extends('layout.master')
@section('content')

@if ($gemo->count()>0)
@foreach ($gemo as $posts)
<div class="card-group">
    <div class="card">
        <div class="card-header">
            <a href=" /web/{{$posts->query}} "><h1>{{$posts->title}}</h1></a>
         
        </div>
        <div class="card-body">
             <h3>{{$posts->body}}</h3>
        </div>
    </div>
</div>

<div class="badge badge-pill badge-primary" style="font-size: 15px"><i class="fas fa-calendar-day"></i> {{$posts->created_at}} </div>

<div class="badge badge-pill badge-primary" style="font-size: 15px"><i class="far fa-user"></i> {{$posts->user->name}} </div>
    
@endforeach
@else
   <div class="alert alert-primary" role="alert">
       <strong>Ops</strong>this is no posts
   </div> 
@endif
<br>
{{$gemo->links()}}
@endsection