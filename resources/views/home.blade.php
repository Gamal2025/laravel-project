@extends('layout.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard 
                <div class="float-right"> <a href="/web/create" ><i class="fas fa-pen"></i>Add New Post</a></div>
                </div>
                

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Your Posts</h3>
                    <table class="table table-dark">
                        <thead class="thead-dark">
                            <tr>
                                <th>Title</th>
                                <th>created</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        @foreach ($gemo as $posts)                                                   
                        <tbody>
                            <tr>
                                <td>{{$posts->title}}</td>
                                <td>{{$posts->created_at}}</td>
                                <td><a href="/web/{{$posts->id}}/edit" class="btn btn-primary">
                                <i class="fas fa-user-edit"></i>Edit post</a>
                                       </td>
                                <td>{{ Form::open(['action' =>['postcontroller@destroy',$posts->id] ,'method'=>'POST']) }}
            {{form::hidden('_method',' DELETE')}}
            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>Delete</button>
        {{ Form::close() }}</td>
                            </tr>
                        </tbody>
                         @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
