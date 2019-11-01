<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login | School MIS</title>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

	<link rel="stylesheet" type="text/css" href="{{asset('login-files/vendor/bootstrap/css/bootstrap.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('login-files/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('login-files/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('login-files/vendor/animate/animate.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('login-files/vendor/css-hamburgers/hamburgers.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('login-files/vendor/animsition/css/animsition.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('login-files/vendor/select2/select2.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('login-files/vendor/daterangepicker/daterangepicker.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('login-files/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('login-files/css/main.css')}}">

</head>
<body>

    @yield('content')



    <div id="dropDownSelect1"></div>
	

	<script src="{{asset('login-files/vendor/jquery/jquery-3.2.1.min.js')}}"></script>

	<script src="{{asset('login-files/vendor/animsition/js/animsition.min.js')}}"></script>

	<script src="{{asset('login-files/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('login-files/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

	<script src="{{asset('login-files/vendor/select2/select2.min.js')}}"></script>

	<script src="{{asset('login-files/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('login-files/vendor/daterangepicker/daterangepicker.js')}}"></script>

	<script src="{{asset('login-files/vendor/countdowntime/countdowntime.js')}}"></script>

	<script src="{{asset('login-files/js/main.js')}}"></script>
</body>
</html>