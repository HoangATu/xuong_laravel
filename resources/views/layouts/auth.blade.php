<!doctype html>
<html class="no-js" lang="">


<!-- Mirrored from affixtheme.com/html/xmee/demo/login-9.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Jul 2024 15:02:46 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Xmee | Login and Register Form Html Templates</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ asset ('assets/auths/css/bootstrap.min.css')}}">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="{{ asset ('assets/auths/css/fontawesome-all.min.css ')}}">
	<!-- Flaticon CSS -->
	<link rel="stylesheet" href="{{ asset ('assets/auths/font/flaticon.css')}}">
	<!-- Google Web Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="{{ asset ('assets/auths/style.css')}}">
</head>

<body>
	<!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <div id="preloader" class="preloader">
        <div class='inner'>
            <div class='line1'></div>
            <div class='line2'></div>
            <div class='line3'></div>
        </div>
    </div>
	<section class="fxt-template-animation fxt-template-layout9" data-bg-image="{{asset ('assets/auths/img/figure/bg9-l.jpg')}}">
		<div class="container">
			<div class="row align-items-center justify-content-center">
				<div class="col-lg-3">
					<div class="fxt-header">
						<a href="login-9.html" class="fxt-logo"><img src="{{asset ('assets/auths/img/logo-9.png')}}" alt="Logo"></a>
					</div>
				</div>
				<div class="col-lg-6">
					@yield('content')
				</div>
			</div>
		</div>
	</section>
	<!-- jquery-->
	<script src="{{ asset ('assets/auths/js/jquery.min.js')}}"></script>
	<!-- Bootstrap js -->
	<script src="{{ asset ('assets/auths/js/bootstrap.min.js')}}"></script>
	<!-- Imagesloaded js -->
	<script src="{{ asset ('assets/auths/js/imagesloaded.pkgd.min.js')}}"></script>
	<!-- Validator js -->
	<script src="{{ asset ('assets/auths/js/validator.min.js')}}"></script>
	<!-- Custom Js -->
	<script src="{{ asset ('assets/auths/js/main.js')}}"></script>

</body>


<!-- Mirrored from affixtheme.com/html/xmee/demo/login-9.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Jul 2024 15:02:47 GMT -->
</html>