<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="This is a boilerplate for a Bootstrap 4.1.1 project">
        <meta name="keywords" content="HTML, CSS, JS, Sass, JavaScript, framework, bootstrap, front-end, frontend, web development">
        <meta name="author" content="Henrik H. Boelsmand">

        <title>{{ config('app.name') }}</title>


        <!-- Icons -->
		<link rel="shortcut icon" href="{{ asset('assets/media/favicons/ic_favicon.png') }}">

        @yield('css_before')
        <!-- Fonts and Styles -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  		<link rel="stylesheet" href="{{ asset('assets/css/main.min.css') }}">

        <!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" href="{{ mix('/css/themes/xwork.css') }}"> -->
        @yield('css_after')

    </head>
    <body>


      <img class="d-none d-md-block" src="{{ asset('assets/media/photos/bg_floating_water_hero.svg') }}" id="main-hero-bg">    
      <img class="d-md-none" src="{{ asset('assets/media/photos/bg_floating_water_mobile.svg') }}" id="mobile-hero-bg">        
      <nav class="navbar navbar-light navbar-expand-md justify-content-center" data-toggle="affix">
        <div class="container">
          <a href="/" class="golkash-navbar navbar-brand d-flex w-50 mr-auto">
                  <img class="nav-logo" src="{{ asset('assets/media/photos/ic_adnexio_logo.svg') }}">
              </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar3">
        <span class="navbar-toggler-icon"></span>
    </button>
          <div class="navbar-collapse collapse w-100" id="collapsingNavbar3">
            <ul class="nav navbar-nav ml-auto w-100 text-center justify-content-end">
              <li class="nav-item ml-3">
                <a class="nav-link" href="#">Features</a>
              </li>
              <li class="nav-item ml-3">
                <a class="nav-link" href="#">Evaluate my Interview</a>
              </li>

              
              <li class="nav-item ml-3">
                <!--<form action="#">
                    <input type="submit" class="btn btn-primary btn-md btn-adnexio mt-1" value="&nbsp;&nbsp;Sign In&nbsp;&nbsp;" />
                </form>-->
                <!--<form action="{{ url('login') }}">
                    <input type="submit" class="btn btn-primary btn-md btn-adnexio mt-1" value="&nbsp;&nbsp;Employee&nbsp;&nbsp;" />
                </form>-->
                	<a href="{{ route('login') }}"><button class="btn btn-primary btn-md btn-adnexio mt-1">Employee</button></a>
              </li>
              <li class="nav-item ml-2">   
                <!--<form action="#">
                    <input type="submit" class="btn btn-primary btn-md btn-adnexio mt-1" value="&nbsp;&nbsp;Sign Up&nbsp;&nbsp;" />
                </form>-->    
                <form action="{{ url('/employer/login') }}">
                    <input type="submit" class="btn btn-primary btn-md btn-adnexio mt-1" value="Employer" />
                </form>          
                <!--<button class="btn btn-primary btn-md btn-adnexio mt-1" type="submit">&nbsp;&nbsp;Sign Up&nbsp;&nbsp;</button>-->
              </li>
                

              
            </ul>
          </div>
        </div>
      </nav>

        
        <div id="page-container">
            <!-- Main Container -->
            <main id="main-container">
                @yield('content')
            </main>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->




  <footer class="top-footer-container pt-4 pb-4">
    <div class="container">
      <div class="row">
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
          <h3 class="watch-this-space text-center text-md-left">Watch This Space! Launching Soon.</h3>
          <h5 class="description text-center text-md-left">Connecting outstanding people with the world’s most innovative companies. Machine learning driven.</h5>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
          <div class="d-flex justify-content-center">
            <div class="p-2 bd-highlight">
              <button class="btn btn-primary btn-lg btn-adnexio mt-3" type="submit">&nbsp;&nbsp;Evaluate My Interview&nbsp;&nbsp;</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <footer class="adnexio-footer-container">
  <div class="container pt-4">
    <div class="row">
      <div class="col-md-4 d-flex flex-column">
        <div class="p-2 mb-4 text-center text-md-left">
          <img src="{{ asset('assets/media/photos/ic_adnexio_logo.svg') }}" stye="width: 300px;">
        </div>
      </div>
      <div class="col-md-2">
        <h6 class="footer-title text-center text-md-left">Products</h6>
        <ul class="list-unstyled quick-links text-center text-md-left">
          <li><a href="#">API Reference</a></li>
          <li><a href="#">API Docs</a></li>
          <li><a href="#">Developers</a></li>
        </ul>
      </div>
      <div class="col-md-2">
        <h6 class="footer-title text-center text-md-left">Use Cases</h6>
        <ul class="list-unstyled quick-links text-center text-md-left">
          <li><a href="#">Corporate</a></li>
          <li><a href="#">Job Seeker</a></li>
        </ul>
      </div>
      <div class="col-md-2">
        <h6 class="footer-title text-center text-md-left">Company</h6>
        <ul class="list-unstyled quick-links text-center text-md-left">
          <li><a href="#">About Us</a></li>
        </ul>
      </div>
      <div class="col-md-2">
        <h6 class="footer-title text-center text-md-left">Contact</h6>
        <ul class="list-unstyled quick-links text-center text-md-left">
          <li><a href="#">Facebook</a></li>
          <li><a href="#">Twitter</a></li>
          <li><a href="#">LinkedIn</a></li>
        </ul>
      </div>
    </div>

  </div>
</footer>
<footer class="bottom-footer-container p-1">
  <div class="container">
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <h6 class="footer-anchor">Copyright © 2018 Adnexio LLC. All Rights Reserved.</h6>
      </div>
    </div>
  </div>
</footer>

        <!-- Dashmix Core JS -->
        <script src="{!! asset('assets/js/main.min.js') !!}"></script>



        @yield('js_after')
    </body>
</html>
