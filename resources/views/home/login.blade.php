<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
	<title>Login</title>
	<link rel="icon" href="{{ asset('assets/images/logo.png') }}" type="image/ico">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all">
	<!-- Custom Theme files -->
	<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" media="all"/>
	<!--js-->
	<script src="{{ asset('assets/js/jquery-2.1.1.min.js') }}"></script>
	<!--icons-css-->
	<link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet">
	<!--Google Fonts-->
	<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
	<!--static chart-->
</head>
<body>
	
			<div class="login-page">
				<h1 align="center">Sistem Akuntabilitas Kinerja Instansi <p> Pemerintah Kabupaten Barito Kuala </h1><br>
				<center><img src="{{ asset('assets/images/logo.png') }}" alt="BATOLA" width="100"></center><br>
				<div class="login-main">
					<div class="login-block">
						@if (session()->has('error'))
						<div class="alert alert-danger" role="alert">
						{{ session('error') }}
						</div>
					@endif
						<form method="post" action="{{ route('home.loginAct') }}">
                            @csrf
							<input type="text" name="username" placeholder="Nama Pengguna" required="" style="background: #fafafa">
							<input type="password" name="password" class="lock" placeholder="Kata Sandi" required="" style="background: #fafafa">
							<input type="submit" name="Sign In" value="Masuk" style="background: #7f88f3">
						</form>
						<br><br>
						<p align="right">Lupa Kata Sandi?<a href="#" style="color: #000"><b> Klik Disni</b></a></p>
					</div>
				</div>
			</div>


	<!--inner block end here-->
	<!--copy rights start here-->

	<!--COPY rights end here-->

	<!--scrolling js-->
	<script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
	<script src="{{ asset('assets/js/scripts.js') }}"></script>
	<!--//scrolling js-->
	<script src="{{ asset('assets/js/bootstrap.js') }}"> </script>
	<!-- mother grid end here-->
</body>
</html>
