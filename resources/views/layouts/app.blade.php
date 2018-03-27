<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
		

		@if(session()->has('status')) 
			<div class="alert alert-{{session('type')}}">

    		{{session('status')}}
		
		</div>
		@endif


    @yield('content')


<!-- Scripts -->

<script src="{{ asset('js/app.js') }}"></script>
<script src="//code.jquery.com/jquery.js"></script>
@include('flashy::message')
</body>
</html>
