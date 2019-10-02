@if ($errors->any())
<div class="alert alert-danger" role="alert">
    @foreach ($errors->all() as $error)
   <li>{{$error}}</li>
        
    @endforeach
</div>
    
@endif

@if (session('success'))
<div class="alert alert-success" role="alert">
    <strong>{{session('success')}}</strong>
</div>
    
@endif

@if (session('error'))
<div class="alert alert-danger" role="alert">
    <strong>{{session('error')}}</strong>
</div>
    
@endif