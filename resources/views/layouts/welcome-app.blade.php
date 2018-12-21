<!doctype html>
<html id="id1" style="min-height:100%" lang="{{ config('app.locale') }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="description" content="This is a boilerplate for a Bootstrap 4.1.1 project">
	<meta name="keywords" content="HTML, CSS, JS, Sass, JavaScript, framework, bootstrap, front-end, frontend, web development">
	<meta name="author" content="Henrik H. Boelsmand">
	<title>{{ config('app.name') }}</title>
	<!-- Icons -->
	<link rel="shortcut icon" href="{{ asset('assets/media/favicons/ic_favicon.png') }}">@yield('css_before')
	{{--<script src="{!! asset('assets/js/plugins/jquery-validation/jquery.validate.min.js') !!}"></script>--}}

	<!-- Fonts and Styles -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('assets/css/main.min.css?t=12345') }}">
	<!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->
	<!-- <link rel="stylesheet" href="{{ mix('/css/themes/xwork.css') }}"> -->@yield('css_after')
	<style media="screen" type="text/css">
		/*<![CDATA[*/@import '{{ asset('fonts/roboto-thin.css') }}';/*]]>*/
	</style>
	<style media="screen" type="text/css">
		/*<![CDATA[*/@import '{{ asset('fonts/roboto-regular.css') }}';/*]]>*/
	</style>
    <style>

	</style>
</head>
<script>
  function htmlfunction() {
  document.getElementById('id1').style.cssText = 'height:inherit !important';
}
</script>

<body id="id1" style="min-height:100%">
	<div id="carouselExampleIndicators" class="carousel slide h-100 w-100">
		<div class="carousel-inner h-100">
			<div class="carousel-item 	@if ($errors->count('email') < 1  )  active @endif h-100">
				<table class="bg-slider">
					<tr>
						<td>
                        <div class="text-center w-100 text-white"><a data-target="#carouselExampleIndicators" data-slide-to="1"><i class="display-4 far fa-play-circle"></i></a></div>
							<div class="css-typing">
								<p class="text-white">Welcome to adnexio</p>
								<p class="text-white">Press PLAY above</p>
							</div>
						</td>
					</tr>
				</table>
			</div>
			<div class="carousel-item h-100">
				<table class="bg-slider">
					<tr>
						<td class="h-100">
							<div id="first-slide">
								<div id="equaliser">
									<div class="bar first"></div>
									<div class="bar second"></div>
									<div class="bar third"></div>
									<div class="bar fourth"></div>
								</div>
								<div class="css-typing-2 content-margin">
									<p>Hello, my name is NEX</p>
								</div>
							</div>
							<div id="second-slide">
								<div id="equaliser">
									<div class="bar first"></div>
									<div class="bar second"></div>
									<div class="bar third"></div>
									<div class="bar fourth"></div>
								</div>
								<div class="css-typing-3 content-margin">
									<p>and welcome to adnexio</p>
								</div>
							</div>
							<div id="third-slide">
								<div id="equaliser">
									<div class="bar first1"></div>
									<div class="bar second1"></div>
									<div class="bar third1"></div>
									<div class="bar fourth1"></div>
								</div>
								<div class="css-typing-4 content-margin">
									<p>The place where you</p>
									<p>don't look for job, adnexio</p>
									<p>brings it to you</p>
								</div>
							</div>
							<div class="skip-content">
								<button onclick="htmlfunction()" type="button" class="btn btn-outline-dark btn-sm skip-but" data-target="#carouselExampleIndicators" data-slide-to="2">Skip</button>
							</div>
						</td>
					</tr>
				</table>
			</div>
			<div class="carousel-item active">
				<div class="bg-header">
					<nav class="navbar navbar-light navbar-expand-md justify-content-center" data-toggle="affix">
						<div class="container">
							<a href="/" class="golkash-navbar navbar-brand d-flex w-50 mr-auto">
								<img class="nav-logo" src="{{ asset('media/photos/Adnexio__logo header.png') }}" height="40" width="auto">
							</a>
							<button  class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar3" > <span class="navbar-toggler-icon"></span>
							</button>
							<div class="navbar-collapse collapse w-100" id="collapsingNavbar3">
								<ul class="nav navbar-nav ml-auto w-100 text-center justify-content-end">
                                    <li class="nav-item ml-3">
										<a href="#">
											<button class="btn btn-primary btn-md btn-adnexio mt-1">EMPLOYER</button>
										</a>
									</li>
									<li class="nav-item ml-3">
										<a href="#">
											<button class="btn btn-primary btn-md btn-adnexio mt-1 ">JOBSEEKER</button>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</nav>
				</div>
				<div id="page-container">
					<!-- Main Container -->
					<main id="main-container">@yield('content')</main>
					<!-- END Main Container -->
				</div>
				<!-- END Page Container -->
				<footer class="adnexio-footer-container">
					<div class="container pt-4">
						<div class="row justify-content-between">
							<div class="col-md-4 d-flex flex-column">
								<div class="p-2 mb-4 text-center text-md-left">
									<img src="{{ asset('media/photos/Adnexio__logo footer.png') }}" height="60" width="auto">
									<p class="text-white">Copyright © 2018. All Right Reserved</p>
								</div>
							</div>
							<div class="col-md-2">
								<h6 class="footer-title text-center text-md-left">Contact</h6>
								<ul class="list-unstyled quick-links text-center text-md-left">
									<li><a href="#">Facebook</a>
									</li>
									<li><a href="#">Twitter</a>
									</li>
									<li><a href="#">LinkedIn</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</footer>
			</div>
		</div>
	</div>
	<!-- Dashmix Core JS -->
	<script src="{!! asset('assets/js/main.min.js?t=12345') !!}"></script>@yield('js_after')</body>
<script src="{!! asset('assets/js/plugins/jquery-validation/jquery.validate.min.js') !!}"></script>

<!-- Page JS Code -->
<script src="{!! asset('assets/js/pages/op_auth_signup.min.js') !!}"></script>

</body>

</html>