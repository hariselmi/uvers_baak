<!DOCTYPE html>
<html lang="zxx">
	<head>
		<title>{{Get_field::get_data('1', 'identities', 'nama')}}</title>
		<meta charset="utf-8" />
		<meta name="author" content="Softnio">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="icon" href="{{asset('assets/image/favicon.png')}}" type="image/png" sizes="16x16">
		<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendor.bundle.css')}}">
		<link id="style-css" rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
	</head>
	<body class="site-body style-v1">
		<!-- Header -->
		<header class="site-header header-s2 is-sticky">
			<!-- Topbar -->
			<div class="topbar">
				<div class="container">
					<div class="row">
						<div class="top-aside top-left clearfix hidden-xs">
							<p><strong>{{Get_field::get_data('1', 'identities', 'nama')}}</strong></p>
						</div>
						<div class="top-aside top-right clearfix">
							<ul class="social clearfix">
								<li><a href="https://www.facebook.com/{{Get_field::get_data('1', 'identities', 'facebook')}}" class="fa fa-facebook"></a></li>
								<li><a href="https://api.whatsapp.com/send?phone={{Get_field::get_data('1', 'identities', 'whatsapp')}}" class="fa fa-whatsapp"></a></li>
								<li><a href="https://www.instagram.com/{{Get_field::get_data('1', 'identities', 'instagram')}}" class="fa fa-instagram"></a></li>
								<li><a href="mailto:{{Get_field::get_data('1', 'identities', 'email')}}" class="fa fa-envelope"></a></li>
							</ul>
							<ul class="top-contact clearfix" style="margin-right: 25px;">
								<li class="t-phone t-phone1">
									<em class="fa fa-phone" aria-hidden="true"></em>
									<span><a href="tel:+62778473399">{{Get_field::get_data('1', 'identities', 'phone')}}</a></span>
								</li>
							</ul>
							
						</div>
					</div>
				</div>
			</div>
			<!-- #end Topbar -->
			<!-- Navbar -->
			<div class="navbar navbar-primary">
				<div class="container">
					<!-- Logo -->
					<a class="navbar-brand" href="./">
						<img class="logo logo-dark" alt="" src="{{asset('assets/image/logo.png')}}" srcset="{{asset('assets/image/logo.png')}} 2x">
						<img class="logo logo-light" alt="" src="{{asset('assets/image/logo.png')}}" srcset="{{asset('assets/image/logo.png')}} 2x">
					</a>
					<!-- #end Logo -->
					<!-- NavBar Trigger -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainnav"
						aria-expanded="false">
						<span class="sr-only">Menu</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						</button>
					</div>
					<!-- #end Trigger -->
					<!-- MainNav -->
					<nav class="navbar-collapse collapse" id="mainnav">
						<ul class="nav navbar-nav">
							<li class="{{ Request::is('/') ? 'active' : '' }} "><a href="/">Halaman <br> <b>Utama</b></a></li>
							<li><a href="/informasi_kemahasiswaan"><b>Informasi</b> <br> Kemahasiswaan</a></li>
							<li><a href="/kegiatan_kemahasiswaan"><b>Kegiatan</b> <br> Kemahasiswaan</a></li>
							<li><a href="/informasi_beasiswa"><b>Informasi</b> <br> Beasiswa</a></li>
							<li>
								<a href="\login"><b>SILMA</b></a>
							</li>


						</ul>
					</nav>
					<!-- #end MainNav -->
				</div>
			</div>
			<!-- #end Navbar -->
			<!-- Banner/Slider -->
			<div id="slider" class="banner banner-slider carousel slide carousel-fade">
				<!-- Wrapper for Slides -->
				<div class="carousel-inner">
					<!-- // -->


					@foreach(SliderHelp::get_slider() as $index=>$value) 

					<?php
					$active_slider = ($index == 0) ? 'active' : '';
					?>

					<div class="item <?=$active_slider?>">
						<div class="fill" style="background-image:url({{asset('images/slider/')}}/{!!$value->thumbnail!!}">
						</div>
					</div>

					@endforeach



				</div>


				<!-- Arrow Controls -->
				<a class="left carousel-control" href="#slider" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#slider" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
			<!-- #end Banner/Slider -->
		</header>
		<!-- End Header -->