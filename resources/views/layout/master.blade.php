<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script defer src="https://use.fontawesome.com/releases/v5.6.1/js/all.js"></script>
<link rel="stylesheet" href="{{asset('css/app.css')}}">
   <title>{{config('app.name','Gemo')}}</title>
</head>
<body>
    @include('elements.nav')
    <div class="container">
        @include('elements.flash')
            @yield('content')
    </div>
   
    



<script src="{{asset('js/app.js')}}"></script>
</body>
</html>