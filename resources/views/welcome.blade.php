
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Find easily a doctor and book online an appointment">
	<meta name="author" content="Ansonika">
	<title>FINDOCTOR - Find easily a doctor and book online an appointment</title>

	<!-- Favicons-->
	<link rel="shortcut icon" href="{{ asset('front/img/favicon.icon') }}" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="{{ asset('front/img/apple-touch-icon-57x57-precomposed.png') }}">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ asset('front/img/apple-touch-icon-72x72-precomposed.png') }}">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ asset('front/img/apple-touch-icon-114x114-precomposed.png') }}">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ asset('front/img/apple-touch-icon-144x144-precomposed.png') }}">
    
    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
    
	<!-- BASE CSS -->
	<link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('front/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('front/css/menu.css') }}" rel="stylesheet">
	<link href="{{ asset('front/css/vendors.css') }}" rel="stylesheet">
	<link href="{{ asset('front/css/icon_fonts/css/all_icons_min.css') }}" rel="stylesheet">
    
	<!-- YOUR CUSTOM CSS -->
	<link href="{{ asset('front/css/custom.css') }}" rel="stylesheet">
	
	<!-- Modernizr -->
	<script src="{{ asset('front/js/modernizr.js') }}"></script>

</head>

<body>

	<div class="layer"></div>
	<!-- Mobile menu overlay mask -->

	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div>
	<!-- End Preload -->

    <header class="header_sticky">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-6">
					<div id="logo_home">
						<h1><a href="{{ url('/') }}" title="Findoctor">Animal Care</a></h1>
					</div>
				</div>
				<nav class="col-lg-9 col-6">
					<a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="#0"><span>Menu mobile</span></a>
					<ul id="top_access">
						<li><a href="{{ route('login') }}"><i class="pe-7s-user"></i></a></li>
						<li><a href="{{ route('register') }}"><i class="pe-7s-add-user"></i></a></li>
					</ul>
					<!-- /main-menu -->
				</nav>
			</div>
		</div>
		<!-- /container -->
	</header>
	<!-- /header -->	
	
	<main>
		<div class="header-video">
			<div id="hero_video">
				<div class="content">
					<h3>Animal Care</h3>
					<p>
						Ridiculus sociosqu cursus neque cursus curae ante scelerisque vehicula.
					</p>
					{{--  <form method="post" action="list.html">
						<div id="custom-search-input">
							<div class="input-group">
								<input type="text" class=" search-query" placeholder="Ex. Name, Specialization ....">
								<input type="submit" class="btn_search" value="Search">
							</div>
							<ul>
								<li>
									<input type="radio" id="all" name="radio_search" value="all" checked>
									<label for="all">All</label>
								</li>
								<li>
									<input type="radio" id="doctor" name="radio_search" value="doctor">
									<label for="doctor">Doctor</label>
								</li>
								<li>
									<input type="radio" id="clinic" name="radio_search" value="clinic">
									<label for="clinic">Clinic</label>
								</li>
							</ul>
						</div>
					</form>  --}}
				</div>
			</div>
			<img src="{{ asset('front/img/video_fix.png') }}" alt="" class="header-video--media" data-video-src="{{ asset('front/video/intro') }}" data-teaser-source="{{ asset('front/video/intro') }}" data-provider="" data-video-width="1920" data-video-height="750">
		</div>
		<!-- /Header video -->
		
		<div class="container margin_120_95">
			<div class="main_title">
				<h2>Find by specialization</h2>
				<p>Nec graeci sadipscing disputationi ne, mea ea nonumes percipitur. Nonumy ponderum oporteat cu mel, pro movet cetero at.</p>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<a href="#0" class="box_cat_home">
						<i class="icon-info-4"></i>
						<img src="{{ asset('front/img/1.png') }}" width="60" height="60" alt="">
						<h3>DOG</h3>
						<ul class="clearfix">
							<li><strong></strong></li>
							<li><strong></strong></li>
						</ul>
					</a>
				</div>
				<div class="col-lg-3 col-md-6">
					<a href="#0" class="box_cat_home">
						<i class="icon-info-4"></i>
						<img src="{{ asset('front/img/2.png') }}" width="60" height="60" alt="">
						<h3>CAT</h3>
						<ul class="clearfix">
							<li><strong></strong></li>
							<li><strong></strong></li>
						</ul>
					</a>
				</div>
				<div class="col-lg-3 col-md-6">
					<a href="#0" class="box_cat_home">
						<i class="icon-info-4"></i>
						<img src="{{ asset('front/img/3.png') }}" width="60" height="60" alt="">
						<h3>Health</h3>
						<ul class="clearfix">
							<li><strong></strong></li>
							<li><strong></strong></li>
						</ul>
					</a>
				</div>
				<div class="col-lg-3 col-md-6">
					<a href="#0" class="box_cat_home">
						<i class="icon-info-4"></i>
						<img src="{{ asset('front/img/4.png') }}" width="60" height="60" alt="">
						<h3>Veteriner</h3>
						<ul class="clearfix">
							<li><strong></strong></li>
							<li><strong></strong></li>
						</ul>
					</a>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->

		<div class="bg_color_1">
			<div class="container margin_120_95">
				<div class="main_title">
					<h2>Doctors</h2>
					<p></p>
				</div>
				<div id="reccomended" class="owl-carousel owl-theme">
					<div class="item">
						<a href="detail-page.html">
							<div class="views"><i class="icon-eye-7"></i>140</div>
							<div class="title">
								<h4>Dr. Julia Holmes<em>Pediatrician - Cardiologist</em></h4>
							</div><img src="{{ asset('front/img/4.png') }}" alt="">
						</a>
					</div>
					<div class="item">
						<a href="detail-page.html">
							<div class="views"><i class="icon-eye-7"></i>120</div>
							<div class="title">
								<h4>Dr. Julia Holmes<em>Pediatrician</em></h4>
							</div><img src="{{ asset('front/img/2.png') }}" alt="">
						</a>
					</div>
					<div class="item">
						<a href="detail-page.html">
							<div class="views"><i class="icon-eye-7"></i>115</div>
							<div class="title">
								<h4>Dr. Julia Holmes<em>Pediatrician</em></h4>
							</div><img src="http://via.placeholder.com/350x500.jpg" alt="">
						</a>
					</div>
					<div class="item">
						<a href="detail-page.html">
							<div class="views"><i class="icon-eye-7"></i>98</div>
							<div class="title">
								<h4>Dr. Julia Holmes<em>Pediatrician</em></h4>
							</div><img src="http://via.placeholder.com/350x500.jpg" alt="">
						</a>
					</div>
					<div class="item">
						<a href="detail-page.html">
							<div class="views"><i class="icon-eye-7"></i>98</div>
							<div class="title">
								<h4>Dr. Julia Holmes<em>Pediatrician</em></h4>
							</div><img src="http://via.placeholder.com/350x500.jpg" alt="">
						</a>
					</div>
				</div>
				<!-- /carousel -->
			</div>
			<!-- /container -->
		</div>
		<!-- /white_bg -->		
		
		<div class="container margin_120_95">
			<div class="main_title">
				<h2>Discover the <strong>online</strong> appointment!</h2>
				<p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri. In eum omnes molestie. Sed ad debet scaevola, ne mel.</p>
			</div>
			<div class="row add_bottom_30">
				<div class="col-lg-4">
					<div class="box_feat" id="icon_1">
						<span></span>
						<h3>Find a Doctor</h3>
						<p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri. In eum omnes molestie.</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="box_feat" id="icon_2">
						<span></span>
						<h3>View profile</h3>
						<p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri. In eum omnes molestie.</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="box_feat" id="icon_3">
						<h3>Book a visit</h3>
						<p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri. In eum omnes molestie.</p>
					</div>
				</div>
			</div>
			<!-- /row -->
			<p class="text-center"><a href="{{route ('login')}}" class="btn_1 medium">Chat Now</a></p>
		</div>
		<!-- /container -->


	</main>
	<!-- /main content -->
	
	<footer>
		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-3 col-md-12">
					<p>
						<a href="index.html" title="Chat Now">
							<img src="img/logo.png" data-retina="true" alt="" width="163" height="36" class="img-fluid">
						</a>
					</p>
				</div>
				<div class="col-lg-3 col-md-4">
					<h5>About</h5>
					<ul class="links">
						<li><a href="#0">About us</a></li>
						<li><a href="blog.html">Blog</a></li>
						<li><a href="#0">FAQ</a></li>
						<li><a href="login.html">Login</a></li>
						<li><a href="register.html">Register</a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-4">
					<h5>Useful links</h5>
					<ul class="links">
						<li><a href="#0">Doctors</a></li>
						<li><a href="#0">Clinics</a></li>
						<li><a href="#0">Specialization</a></li>
						<li><a href="#0">Join as a Doctor</a></li>
						<li><a href="#0">Download App</a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-4">
					<h5>Contact with Us</h5>
					<ul class="contacts">
						<li><a href="tel://61280932400"><i class="icon_mobile"></i> + 61 23 8093 3400</a></li>
						<li><a href="mailto:info@findoctor.com"><i class="icon_mail_alt"></i> help@findoctor.com</a></li>
					</ul>
					<div class="follow_us">
						<h5>Follow us</h5>
						<ul>
							<li><a href="#0"><i class="social_facebook"></i></a></li>
							<li><a href="#0"><i class="social_twitter"></i></a></li>
							<li><a href="#0"><i class="social_linkedin"></i></a></li>
							<li><a href="#0"><i class="social_instagram"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<!--/row-->
			<hr>
			<div class="row">
				<div class="col-md-8">
					<ul id="additional_links">
						<li><a href="#0">Terms and conditions</a></li>
						<li><a href="#0">Privacy</a></li>
					</ul>
				</div>
				<div class="col-md-4">
					<div id="copy">© 2017 Findoctor</div>
				</div>
			</div>
		</div>
	</footer>
	<!--/footer-->

	<div id="toTop"></div>
	<!-- Back to top button -->

	<!-- COMMON SCRIPTS -->
	<script src="{{ asset('front/js/jquery-2.2.4.min.js') }}"></script>
	<script src="{{ asset('front/js/common_scripts.min.js') }}"></script>
	<script src="{{ asset('front/js/functions.js') }}"></script>
	
	<!-- SPECIFIC SCRIPTS -->
	<script src="{{ asset('front/js/video_header.js') }}"></script>
	<script>
		'use strict';
		HeaderVideo.init({
			container: $('.header-video'),
			header: $('.header-video--media'),
			videoTrigger: $("#video-trigger"),
			autoPlayVideo: true
		});
	</script>

</body>

</html>


@section('css')
@endsection

@section('js')
@endsection

{{--  
  @if (Route::has('login'))
    <div class="top-right links">
      @auth
        <a href="{{ url('/home') }}">Home</a>
      @else
        <a href="{{ route('login') }}">Login</a>
        @if (Route::has('register'))
          <a href="{{ route('register') }}">Register</a>
        @endif
      @endauth
    </div>
  @endif
  --}}
