<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
	<title>
		SAKIP BATOLA
	</title>
	<link rel="icon" href="{{ asset('assets/images/logo.png') }}" type="image/ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!-- Custom Theme files -->
	<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" media="all"/>
	<link href="{{ asset('assets/css/portfolio.css') }}" rel="stylesheet" type="text/css" media="all"/>
	<!--js-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!--icons-css-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"> -->
	<!--Google Fonts-->
	<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
	<link href='////fonts.googleapis.com/css2?family=Arvo:ital,wght@0,400;0,700;1,400;1,700&display=swap' rel='stylesheet' type='text/css'>
	<!--skycons-icons-->
	<script src="{{ asset('assets/js/skycons.js') }}"></script>
	<!--//skycons-icons-->
	<link href="{{ asset('assets/css/demo-page.css') }}" rel="stylesheet" media="all">
	<link href="{{ asset('assets/css/hover.css') }}" rel="stylesheet" media="all">
	<!-- DataTables -->
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
</head>
<body>
	<div class="page-container">
			<div class="mother-grid-inner">
				<!--header start here-->
					<div class="header-main" style="width: 100%; position: fixed">
						<div class="header-left">
							<div class="logo-name">
								<h1><a href="{{ route('home') }}" style="color: #000">
									<img id="logo" src="{{ asset('assets/images/logo.png') }}" width="50" alt="BATOLA"/>
									<b> SAKIP BATOLA</b></a></h1>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
					<!--heder end here-->
					<!-- script-for sticky-nav -->
					<script>
						$(document).ready(function() {
							$(".header-main").addClass("fixed");
						})
					</script>
					<!-- /script-for sticky-nav -->
					<!--inner block start here-->
					<div class="inner-block" style="min-height: 1000px">
					    <div class="waluh">
					        <a class="faqs"><i class="fa fa-question-circle" aria-hidden="true"></i> FAQ</a>
					        <a href="{{ route('login') }}" class="logons"><i class="fa fa-user-circle" aria-hidden="true">
					        </i> MASUK</a>
					    </div>
						@yield('content')
					</div>
					<!--inner block end here-->
					<!--copy rights start here-->
					<div class="copyrights">
					    <p class="copymain1">Sistem Akuntabilitas Kinerja Instansi Pemerintah</p>
					    <p class="copymain2">Kabupaten Barito Kuala</p>
						<p class="copymain">Copyright 2020 © DisKomInfo Batola</p>
					</div>
					<!--COPY rights end here-->
				</div>
			</div>

		<!--scrolling js-->
		<script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
		<script src="{{ asset('assets/js/scripts.js') }}"></script>
		<!--//scrolling js-->
		<script src="{{ asset('assets/js/bootstrap.js') }}"> </script>
		<!-- mother grid end here-->
	</body>
	</html>
