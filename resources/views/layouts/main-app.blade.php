<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="_token" content="{{csrf_token()}}" />

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('assets/media/favicons/ic_favicon.png') }}">

@yield('css_before')

	<!-- Select2 CSS -->
    <link rel="stylesheet" href="{!! asset('assets/js/plugins/select2/css/select2.min.css') !!}">

    <!-- Fonts and Styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
    <link rel="stylesheet" href="{!! asset('assets/css/dashmix.css') !!}">

    <!-- Datatables CSS -->
    <link rel="stylesheet" href="{!! asset('assets/js/plugins/datatables/dataTables.bootstrap4.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') !!}">

    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="{!! asset('assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') !!}">
    
    <!-- Video Element CSS/JS -->
    <link href="https://cdn.webrtc-experiment.com/getHTMLMediaElement.css" rel="stylesheet">
    <script src="https://cdn.webrtc-experiment.com/getHTMLMediaElement.js"></script>

    <!-- Video RecordRTC JS -->
    <script src="https://cdn.webrtc-experiment.com/RecordRTC.js"></script>


    <!-- For Edge/FF/Chrome/Opera/etc. getUserMedia support -->
    <script src="https://webrtc.github.io/adapter/adapter-latest.js"></script>
    <script src="https://cdn.webrtc-experiment.com/DetectRTC.js"> </script>

    <!-- CV/Resume Upload CSS/JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

    <!--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->


    @yield('css_after')


</head>
<body>

<!-- Page Container -->
<div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-fixed page-header-dark main-content-narrow">
    <!-- Side Overlay-->
    <aside id="side-overlay">
        <!-- Side Header -->
        <div class="bg-image" style="background-image: url('{{ asset('media/various/bg_side_overlay_header.jpg') }}');">
            <div class="bg-primary-op">
                <div class="content-header">
                    <!-- User Avatar -->
                    <a class="img-link mr-1" href="javascript:void(0)">
                        <img class="img-avatar img-avatar48" src="{{ asset('assets/media/avatars/'. $user->profile_images.'.jpg') }}" alt="">


                    </a>
                    <!-- END User Avatar -->

                    <!-- User Info -->
                    <div class="ml-2">
                        <a class="text-white font-w600" href="javascript:void(0)">{{ Auth::user()->name }}</a>
                        <div class="text-white-75 font-size-sm font-italic">Full Stack Developer</div>
                    </div>
                    <!-- END User Info -->

                    <!-- Close Side Overlay -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="ml-auto text-white" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_close">
                        <i class="fa fa-times-circle"></i>
                    </a>
                    <!-- END Close Side Overlay -->
                </div>
            </div>
        </div>
        <!-- END Side Header -->

        <!-- Side Content -->
        <div class="content-side">
            <p>
                Content..
            </p>
        </div>
        <!-- END Side Content -->
    </aside>
    <!-- END Side Overlay -->

    <!-- Sidebar -->
    <nav id="sidebar" aria-label="Main Navigation">
        <!-- Side Header -->
        <div class="bg-header-dark">
            <div class="content-header bg-white-10">
                <!-- Logo -->
                <a class="link-fx font-w600 font-size-lg text-white" href="{{ url('/home') }}">
                    <span class="text-white">Adnexio</span>
                </a>
                <!-- END Logo -->

                <!-- Options -->
                <div>
                    <!-- Toggle Sidebar Style -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <!-- Class Toggle, functionality initialized in Helpers.coreToggleClass() -->
                    <a class="js-class-toggle text-white-75" data-target="#sidebar-style-toggler" data-class="fa-toggle-off fa-toggle-on" data-toggle="layout" data-action="sidebar_style_toggle" href="javascript:void(0)">
                        <i class="fa fa-toggle-off" id="sidebar-style-toggler"></i>
                    </a>
                    <!-- END Toggle Sidebar Style -->

                    <!-- Close Sidebar, Visible only on mobile screens -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="d-lg-none text-white ml-2" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                        <i class="fa fa-times-circle"></i>
                    </a>
                    <!-- END Close Sidebar -->
                </div>
                <!-- END Options -->
            </div>
        </div>
        <!-- END Side Header -->

        <!-- Side Navigation -->
        <div class="content-side content-side-full">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link{{ request()->is('home') ? ' active' : '' }}" href="/home">
                        <i class="nav-main-link-icon fa fa-tachometer-alt"></i>
                        <span class="nav-main-link-name">My Dashboard</span>
                        <span class="nav-main-link-badge badge badge-pill badge-primary">5</span>
                    </a>
                </li>
                <li class="nav-main-heading">Application</li>
                <li class="nav-main-item{{ request()->is('profile/*') ? ' open' : '' }}">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                        <i class="nav-main-link-icon fa fa-user"></i>
                        <span class="nav-main-link-name">My Profile</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('profile/profile_aboutme') ? ' active' : '' }}" href="/profile/profile_aboutme">
                                <i class="nav-main-link-icon fa fa-address-card"></i>
                                <span class="nav-main-link-name">About Me</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('profile/profile_experience') ? ' active' : '' }}" href="/profile/profile_experience">
                                <i class="nav-main-link-icon fa fa-briefcase"></i>
                                <span class="nav-main-link-name">Experience</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('profile/profile_cvupload') ? ' active' : '' }}" href="/profile/profile_cvupload">
                                <i class="nav-main-link-icon fa fa-paperclip"></i>
                                <span class="nav-main-link-name">Upload Resume/CV</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-main-item{{ request()->is('personality/*') ? ' open' : '' }}">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                        <i class="nav-main-link-icon fa fa-list-alt"></i>
                        <span class="nav-main-link-name">Personality Test</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('personality/personality_career') ? ' active' : '' }}" href="/personality/personality_career">
                                <i class="nav-main-link-icon fa fa-tasks"></i>
                                <span class="nav-main-link-name">Career Assessment</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-main-item{{ request()->is('video/*') ? ' open' : '' }}">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                        <i class="nav-main-link-icon fa fa-video"></i>
                        <span class="nav-main-link-name">Video Interview</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('video/video_recording') ? ' active' : '' }}" href="/video/video_recording">
                                <i class="nav-main-link-icon fa fa-play"></i>
                                <span class="nav-main-link-name">Record Video</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('video/video_pastrecord') ? ' active' : '' }}" href="/video/video_pastrecord">
                            	<i class="nav-main-link-icon fa fa-file"></i>
                                <span class="nav-main-link-name">Past Recorded Video</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-main-heading">Various</li>
                <li class="nav-main-item{{ request()->is('examples/*') ? ' open' : '' }}">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                        <i class="nav-main-link-icon si si-bulb"></i>
                        <span class="nav-main-link-name">Examples</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('examples/plugin') ? ' active' : '' }}" href="/examples/plugin">
                                <span class="nav-main-link-name">Plugin</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('examples/blank') ? ' active' : '' }}" href="/examples/blank">
                                <span class="nav-main-link-name">Blank</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-main-heading">More</li>
                <li class="nav-main-item open">
                    <a class="nav-main-link" href="/">
                        <i class="nav-main-link-icon si si-globe"></i>
                        <span class="nav-main-link-name">Landing</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- END Side Navigation -->
    </nav>
    <!-- END Sidebar -->

    <!-- Header -->
    <header id="page-header">
        <!-- Header Content -->
        <div class="content-header">
            <!-- Left Section -->
            <div>
                <!-- Toggle Sidebar -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                <button type="button" class="btn btn-dual mr-1" data-toggle="layout" data-action="sidebar_toggle">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
                <!-- END Toggle Sidebar -->

                <!-- Open Search Section -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-dual" data-toggle="layout" data-action="header_search_on">
                    <i class="fa fa-fw fa-search"></i> <span class="ml-1 d-none d-sm-inline-block">Search</span>
                </button>
                <!-- END Open Search Section -->
            </div>
            <!-- END Left Section -->

            <!-- Right Section -->
            <div>
                <!-- User Dropdown -->
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <img class="img-avatar img-avatar48" src="{{ asset('assets/media/avatars/'. $user->profile_images.'.jpg') }}" alt="">&nbsp;&nbsp;

                        <i class="fa fa-fw fa-user d-sm-none"></i>
                        <span class="d-none d-sm-inline-block">{{ Auth::user()->name }}</span>
                        <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="page-header-user-dropdown">
                        <div class="bg-primary-darker rounded-top font-w600 text-white text-center p-3">
                            User Options
                        </div>
                        <div class="p-2">
                            <a class="dropdown-item" href="javascript:void(0)">
                                <i class="far fa-fw fa-user mr-1"></i> Profile
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                <span><i class="far fa-fw fa-envelope mr-1"></i> Inbox</span>
                                <span class="badge badge-primary">3</span>
                            </a>
                            <a class="dropdown-item" href="javascript:void(0)">
                                <i class="far fa-fw fa-file-alt mr-1"></i> Invoices
                            </a>
                            <div role="separator" class="dropdown-divider"></div>

                            <!-- Toggle Side Overlay -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <a class="dropdown-item" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
                                <i class="far fa-fw fa-building mr-1"></i> Settings
                            </a>
                            <!-- END Side Overlay -->

                            <div role="separator" class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="far fa-fw fa-arrow-alt-circle-left mr-1"></i> Sign Out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END User Dropdown -->

                <!-- Notifications Dropdown -->
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn btn-dual" id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-bell"></i>
                        <span class="badge badge-secondary badge-pill">5</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-notifications-dropdown">
                        <div class="bg-primary-darker rounded-top font-w600 text-white text-center p-3">
                            Notifications
                        </div>
                        <ul class="nav-items my-2">
                            <li>
                                <a class="text-dark media py-2" href="javascript:void(0)">
                                    <div class="mx-3">
                                        <i class="fa fa-fw fa-check-circle text-success"></i>
                                    </div>
                                    <div class="media-body font-size-sm pr-2">
                                        <div class="font-w600">App was updated to v5.6!</div>
                                        <div class="text-muted font-italic">3 min ago</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="text-dark media py-2" href="javascript:void(0)">
                                    <div class="mx-3">
                                        <i class="fa fa-fw fa-user-plus text-info"></i>
                                    </div>
                                    <div class="media-body font-size-sm pr-2">
                                        <div class="font-w600">New Subscriber was added! You now have 2580!</div>
                                        <div class="text-muted font-italic">10 min ago</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="text-dark media py-2" href="javascript:void(0)">
                                    <div class="mx-3">
                                        <i class="fa fa-fw fa-times-circle text-danger"></i>
                                    </div>
                                    <div class="media-body font-size-sm pr-2">
                                        <div class="font-w600">Server backup failed to complete!</div>
                                        <div class="text-muted font-italic">30 min ago</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="text-dark media py-2" href="javascript:void(0)">
                                    <div class="mx-3">
                                        <i class="fa fa-fw fa-exclamation-circle text-warning"></i>
                                    </div>
                                    <div class="media-body font-size-sm pr-2">
                                        <div class="font-w600">You are running out of space. Please consider upgrading your plan.</div>
                                        <div class="text-muted font-italic">1 hour ago</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="text-dark media py-2" href="javascript:void(0)">
                                    <div class="mx-3">
                                        <i class="fa fa-fw fa-plus-circle text-primary"></i>
                                    </div>
                                    <div class="media-body font-size-sm pr-2">
                                        <div class="font-w600">New Sale! + $30</div>
                                        <div class="text-muted font-italic">2 hours ago</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="p-2 border-top">
                            <a class="btn btn-light btn-block text-center" href="javascript:void(0)">
                                <i class="fa fa-fw fa-eye mr-1"></i> View All
                            </a>
                        </div>
                    </div>
                </div>
                <!-- END Notifications Dropdown -->

                <!-- Toggle Side Overlay -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-dual" data-toggle="layout" data-action="side_overlay_toggle">
                    <i class="far fa-fw fa-list-alt"></i>
                </button>
                <!-- END Toggle Side Overlay -->
            </div>
            <!-- END Right Section -->
        </div>
        <!-- END Header Content -->

        <!-- Header Search -->
        <div id="page-header-search" class="overlay-header bg-primary">
            <div class="content-header">
                <form class="w-100" action="/dashboard" method="post">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <button type="button" class="btn btn-primary" data-toggle="layout" data-action="header_search_off">
                                <i class="fa fa-fw fa-times-circle"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control border-0" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                    </div>
                </form>
            </div>
        </div>
        <!-- END Header Search -->

        <!-- Header Loader -->
        <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
        <div id="page-header-loader" class="overlay-header bg-primary-darker">
            <div class="content-header">
                <div class="w-100 text-center">
                    <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
                </div>
            </div>
        </div>
        <!-- END Header Loader -->
    </header>
    <!-- END Header -->

    <!-- Main Container -->
    <main id="main-container">
        @yield('content')
    </main>
    <!-- END Main Container -->

    <!-- Footer -->
    <footer id="page-footer" class="bg-body-light">
        <div class="content py-0">
            <div class="row font-size-sm">
                <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-right">
                    Crafted with <i class="fa fa-heart text-danger"></i> by <a class="font-w600" href="https://invokemalaysia.org" target="_blank">INVOKE Malaysia</a>
                </div>
                <div class="col-sm-6 order-sm-1 text-center text-sm-left">
                    <a class="font-w600" href="https://adnexio.my" target="_blank">Adnexio</a> &copy; <span data-toggle="year-copy">2018</span>
                </div>
            </div>
        </div>
    </footer>
    <!-- END Footer -->
</div>
<!-- END Page Container -->


<!-- My Profile AboutMe JS -->

<script type="text/javascript">
	$(document).on('click', '.edit-modal', function() {
	$('#footer_action_button').text("Update");
	$('#footer_action_button').addClass('glyphicon-check');
	$('#footer_action_button').removeClass('glyphicon-trash');
	$('.actionBtn').addClass('btn-primary');
	$('.actionBtn').removeClass('btn-danger');
	$('.actionBtn').addClass('edit');
	$('.modal-title').text('Post Edit');
	//$('#js-validation').show();
	$('#id').val($(this).data('id'));
	$('#name').val($(this).data('name'));
	$('#email').val($(this).data('email'));
	$('#ic_no').val($(this).data('ic_no'));
	$('#contact_no').val($(this).data('contact_no'));
	$('#address').val($(this).data('address'));
	$('#address1').val($(this).data('address1'));
	$('#postal_code').val($(this).data('postal_code'));
	$('#city').val($(this).data('city'));		
	$('#state').val($(this).data('state'));	
	$('#country').val($(this).data('country'));
	$('#dob').val($(this).data('dob'));
	$('#gender').val($(this).data('gender'));
	$('#modal-block-large').modal('show');
	});
	$('.col-lg-12').on('click', '.edit', function() {
	  $.ajax({
		type: 'POST',
		url: '/profile/profile_aboutme',
		data: {
	'_token': $('input[name=_token]').val(),
	'id': $("#id").val(),
	'name': $('#name').val(),
	'email': $('#email').val(),
	'ic_no': $('#ic_no').val(),
	'contact_no': $('#contact_no').val(),
	'address': $('#address').val(),
	'address1': $('#address1').val(),
	'postal_code': $('#postal_code').val(),
	'city': $('#city').val(),	
	'state': $('#state').val(),
	'country': $('#country').val(),	
	'dob': $('#dob').val(),
	'gender': $('#gender').val()
	},
	success: function(data) {
		//location.reload();
		}
	  });
	});
</script>

<!-- My Profile Experience JS -->


<script type="text/javascript">

    $(document).on('click', '.myCheckbox', function () {
        var target = $(this).data('duration');
        if ($(this).is(':checked')) $('#' + target).addClass('disabled');
        else $('#' + target).removeClass('disabled');
    });

    $(document).on('click', '.myCheckbox-edit', function () {
        var target = $(this).data('duration-edit');
        if ($(this).is(':checked')) $('#' + target).addClass('disabled');
        else $('#' + target).removeClass('disabled');
    });

    $(document).on('click', '.cancel-submit-experience', function () {
        $('#experiences').addClass('hide');
        $('#experiences').hide();
        $('#add-experience-btn').show();
        $('#add-experience').show();
        $('#experience_prev').show();



       // experiences
    });



    $(document).on('click', '.add-experience', function() {
        //  $('.foredit').removeClass('js-validation');
        $('#foradd').removeClass('hide');
        $('#add-experience').hide();
        // $('#foradd').addClass('js-validation');
        $('#val-position').replaceWith( " <input type='text' class='form-control' id='val-position' name='val-position' placeholder='Enter your position'>");
        $('#val-company-name').replaceWith( " <input type='text' class='form-control' id='val-company-name' name='val-company-name' placeholder='Enter your company name'>");


        $('#val-industry').replaceWith( "<select class='form-control' id='val-industry' name='val-industry'> " +
            "<option disabled selected>please provide your industry</option> " +
            "<option>Electricity/Gas/Water/Waste Services</option> " +
            "<option>Manufacturing</option> " +
            "<option>Construction</option> " +
            "<option>Accommodation and Food Services</option> " +
            "<option>Information Media and Telecommunications</option> " +
            "<option>Financial and Insurance Services</option> " +
            "<option>Education and Training</option> " +
            "</select>");


        $('#val-jd-start-year').replaceWith( "<select class='half-second' id='val-jd-start-year' name='val-jd-start-year' > " +
            "<option disabled selected>year</option>" +
            "<option>1948</option> " +
            "<option>1949</option> " +
            "<option>1950</option> " +
            "<option>1951</option> " +
            "<option>1952</option> " +
            "<option>1953</option> " +
            "<option>1954</option> " +
            "<option>1955</option> " +
            "<option>1956</option> " +
            "<option>1957</option> " +
            "<option>1958</option> " +
            "<option>1959</option> " +
            "<option>1960</option> " +
            "<option>1961</option> " +
            "<option>1962</option> " +
            "<option>1963</option> " +
            "<option>1964</option> " +
            "<option>1965</option> " +
            "<option>1966</option> " +
            "<option>1967</option> " +
            "<option>1968</option> " +
            "<option>1969</option> " +
            "<option>1970</option> " +
            "<option>1971</option> " +
            "<option>1972</option> " +
            "<option>1973</option> " +
            "<option>1974</option> " +
            "<option>1975</option> " +
            "<option>1976</option> " +
            "<option>1977</option> " +
            "<option>1978</option> " +
            "<option>1979</option> " +
            "<option>1980</option> " +
            "<option>1981</option> " +
            "<option>1982</option> " +
            "<option>1983</option> " +
            "<option>1984</option> " +
            "<option>1985</option> " +
            "<option>1986</option> " +
            "<option>1987</option> " +
            "<option>1988</option> " +
            "<option>1989</option> " +
            "<option>1990</option> " +
            "<option>1991</option> " +
            "<option>1992</option> " +
            "<option>1993</option> " +
            "<option>1994</option> " +
            "<option>1995</option> " +
            "<option>1996</option> " +
            "<option>1997</option> " +
            "<option>1998</option> " +
            "<option>1999</option> " +
            "<option>2000</option> " +
            "<option>2001</option> " +
            "<option>2002</option> " +
            "<option>2003</option> " +
            "<option>2004</option> " +
            "<option>2005</option> " +
            "<option>2006</option> " +
            "<option>2007</option> " +
            "<option>2008</option> " +
            "<option>2009</option> " +
            "<option>2010</option> " +
            "<option>2011</option> " +
            "<option>2012</option> " +
            "<option>2013</option> " +
            "<option>2014</option> " +
            "<option>2015</option> " +
            "<option>2016</option> " +
            "<option>2017</option> " +
            "<option>2018</option>" +
            "</select>");


        $('#val-jd-start-month').replaceWith( "<select class='half-second' id='val-jd-start-month'  name='val-jd-start-month' >" +
            "<option disabled selected>month</option>" +
            " <option>Jan</option>" +
            "  <option>Feb</option>" +
            "<option>Mar</option>" +
            "<option>Apr</option>" +
            "<option>May</option>" +
            " <option>Jun</option>" +
            "<option>Jul</option>" +
            "<option>Aug</option>" +
            "<option>Sep</option>" +
            "<option>Oct</option>" +
            "<option>Nov</option>" +
            "<option>Dec</option>" +
            "</select>");


        $('#val-jd-end-year').replaceWith( "<select class='half-third' id='val-jd-end-year' name='val-jd-end-year'> " +
            "<option disabled selected>year</option>" +
            "<option>1948</option> " +
            "<option>1949</option> " +
            "<option>1950</option> " +
            "<option>1951</option> " +
            "<option>1952</option> " +
            "<option>1953</option> " +
            "<option>1954</option> " +
            "<option>1955</option> " +
            "<option>1956</option> " +
            "<option>1957</option> " +
            "<option>1958</option> " +
            "<option>1959</option> " +
            "<option>1960</option> " +
            "<option>1961</option> " +
            "<option>1962</option> " +
            "<option>1963</option> " +
            "<option>1964</option> " +
            "<option>1965</option> " +
            "<option>1966</option> " +
            "<option>1967</option> " +
            "<option>1968</option> " +
            "<option>1969</option> " +
            "<option>1970</option> " +
            "<option>1971</option> " +
            "<option>1972</option> " +
            "<option>1973</option> " +
            "<option>1974</option> " +
            "<option>1975</option> " +
            "<option>1976</option> " +
            "<option>1977</option> " +
            "<option>1978</option> " +
            "<option>1979</option> " +
            "<option>1980</option> " +
            "<option>1981</option> " +
            "<option>1982</option> " +
            "<option>1983</option> " +
            "<option>1984</option> " +
            "<option>1985</option> " +
            "<option>1986</option> " +
            "<option>1987</option> " +
            "<option>1988</option> " +
            "<option>1989</option> " +
            "<option>1990</option> " +
            "<option>1991</option> " +
            "<option>1992</option> " +
            "<option>1993</option> " +
            "<option>1994</option> " +
            "<option>1995</option> " +
            "<option>1996</option> " +
            "<option>1997</option> " +
            "<option>1998</option> " +
            "<option>1999</option> " +
            "<option>2000</option> " +
            "<option>2001</option> " +
            "<option>2002</option> " +
            "<option>2003</option> " +
            "<option>2004</option> " +
            "<option>2005</option> " +
            "<option>2006</option> " +
            "<option>2007</option> " +
            "<option>2008</option> " +
            "<option>2009</option> " +
            "<option>2010</option> " +
            "<option>2011</option> " +
            "<option>2012</option> " +
            "<option>2013</option> " +
            "<option>2014</option> " +
            "<option>2015</option> " +
            "<option>2016</option> " +
            "<option>2017</option> " +
            "<option>2018</option>" +
            "</select>");


        $('#val-jd-end-month').replaceWith( "<select class='half-third' id='val-jd-end-month' name='val-jd-end-month' > " +
            "<option>month</option> " +
            "<option>Jan</option> " +
            "<option>Feb</option> " +
            "<option>Mar</option> " +
            "<option>Apr</option> " +
            "<option>May</option> " +
            "<option>Jun</option> " +
            "<option>Jul</option> " +
            "<option>Aug</option> " +
            "<option>Sep</option> " +
            "<option>Oct</option> " +
            "<option>Nov</option> " +
            "<option>Dec</option> " +
            "</select>");


//        $('#val-specialization').replaceWith( "<select class='form-control' id='val-specialization' name='val-specialization'> " +
//            "<option disabled selected>please choose your specialization</option> " +
//            "<option>human resource</option> " +
//            "<option>programmer</option> " +
//            "<option>example</option> " +
//            "</select>");

        $.ajax({
            type: 'POST',
            url: '{{ url("/profile/profile_experience/getjb") }}',
            data: {
                '_token': $('input[name=_token]').val(),
            },
            success: function(data) {
                $('#val-specialization').empty();
                $('#val-specialization').append("<option disabled selected value='0'>select your Job Background </option> ");

                $.each(data,function(i,item){
                    $('#val-specialization').append("<option value='"+data[i].Id+"'>"+data[i].Job_Background+"</option>");

                    }



                )
            }
        });



        $('#val-position-level').replaceWith( "<select class='form-control' id='val-position-level' name='val-position-level'> <option disabled selected>please choose your Position Level</option> " +
            "<option value='senior man'>Senior Manager</option> " +
            "<option value='manager'>Manager</option> " +
            "<option value='Junior Excutive'>Junior Executive</option> " +
            "</select>");

        $('#val-salary').replaceWith( " <select class='form-control' id='val-salary' name='val-salary'> " +
            "<option disabled selected>please choose your salary range</option> " +
            "<option>Below then 1,000</option> " +
            "<option>1,000 to  3,000</option> " +
            "<option>3,001 to 5,000 </option> " +
            "<option>5,001 to 7,000</option> " +
            "<option>7,001 to 10,000</option> " +
            "<option>10,000 to 15,000</option> " +
            "<option>16,001 to 20,000</option> " +
            "<option>20,001 to 25,000</option> " +
            "<option>25,001 to 30,000</option> " +
            "<option>30,001 to 35,000</option> " +
            "<option>35,001 to 40,000</option> " +
            "<option>45,001 to 50,000</option> " +
            "<option>above 50,000</option> " +
            "</select>");


        $('#experience_prev').hide();
        $('#experiences').removeClass("hide");

        $('#experiences').show();
    });


    $('#val-specialization').change(function() {

        $.ajax({
            type: 'POST',
            url: '{{ url("/profile/profile_experience/getjobspec") }}',
            data: {
                '_token': $('input[name=_token]').val(),
                'specialization': $('#val-specialization').val(),
            },
            success: function (data) {
                $('#val-job-specification').empty();

                $('#val-job-specification').append("<option disabled selected value='0'>select your Job Specification</option> ");


                $.each(data, function (i, item) {
                        $('#val-job-specification').append("<option value='" + data[i].Id + "'>" + data[i].Job_Specification + "</option>");

                    }


                )
                $('#val-job-specification').append("<option value='79'>Others</option> ");
            }
        });

    });

    $('#specialization-edit').change(function() {

        $.ajax({
            type: 'POST',
            url: '{{ url("/profile/profile_experience/getjobspec") }}',
            data: {
                '_token': $('input[name=_token]').val(),
                'specialization': $('#specialization-edit').val(),
            },
            success: function (data) {
                $('#job-specification-edit').empty();

                $('#job-specification-edit').append("<option disabled selected value='0'>select your Job Specification</option> ");


                $.each(data, function (i, item) {
                        $('#job-specification-edit').append("<option value='" + data[i].Id + "'>" + data[i].Job_Specification + "</option>");

                    }
                )
                $('#job-specification-edit').append("<option value='79'>Others</option> ");
            }
        });

    });



    $('#val-job-specification').change(function() {
         var other = $("#val-job-specification :selected").text();

        if ( other == "Others")
        {
            $('#keyword-job-specification').removeClass('hide');

            $('#keyword-job-specification').show();
        } else
        {
            $('#keyword-job-specification').addClass('hide');
            $('#keyword-job-specification').hide();
        }

    });
  $('#job-specification-edit').change(function() {
         var other = $("#job-specification-edit :selected").text();

        if ( other == "Others")
        {
            $('#keyword-job-specification-edit').removeClass('hide');

            $('#keyword-job-specification-edit').show();
        } else
        {
            $('#keyword-job-specification-edit').addClass('hide');
            $('#keyword-job-specification-edit').hide();
        }

    });


    $(document).on('click', '.minus-experience', function() {


        $('#experiences').hide();

    });



</script>

<script type="text/javascript">

    // function Edit POST

    $(document).on('click', '.edit-experience', function() {



        $('#footer_action_button').text("Update");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-primary');
        $('.actionBtn').removeClass('btn-danger');
        $('.add').removeClass('js-validation');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Post Edit');
        //$('#foradd').removeClass('js-validation');
        //$('#js-validation').show();
        $('#position-edit').val($(this).data('position'));
        $('#company_name-edit').val($(this).data('company_name'));
        $('#jd_start_year-edit').val($(this).data('jd_start_year-edit'));
        $('#jd_start_month-edit').val($(this).data('jd_start_month-edit'));
        $('#specialization-edit').val($(this).data('specialization-edit'));
        $('#job-desc-edit').val($(this).data('job-desc-edit'));
        $('#val-jd-end-year-edit').val($(this).data('endyear-edit'));
        $('#val-jd-end-month-edit').val($(this).data('endmonth-edit'));




        //$('#job-specification').val($(this).data('jobspecification-edit'));

        var  counter =$(this).data('specialization-edit');


            $.ajax({
                type: 'POST',
                url: '{{ url("/profile/profile_experience/getjobspec") }}',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'specialization': counter
                },
                success: function (data) {
                    $('#job-specification-edit').empty();

                    $('#job-specification-edit').append("<option disabled selected value='0'>select your Job Specification</option> ");

                    $.each(data, function (i, item) {
                            $('#job-specification-edit').append("<option value='" + data[i].Id + "'>" + data[i].Job_Specification + "</option>");
                        })
                }
            });

      //  $('#specialization-edit').val($(this).data('specialization-edit'));
       // $('#job-specification-edit').val($(this).data('jobspecification-edit'));
        $('#id-edit').val($(this).data('id-edit'));
        $('#salary-edit').val($(this).data('salary-edit'));
        //$('#job-specification-edit').val($(this).data('jobspecification-edit'));

        $('#modal-block-large').modal('show');
        myFun ()
    });
    function myFun () {
        $('#job-specification-edit').val($(this).data('jobspecification-edit'));
    }

    

</script>



<script type="text/javascript">

    $('.submit-experience').on('click', '.submit-experience', function(e) {
       var insert=[];
          $("#val-present").each(function() {
              if($(this).is(":checked")){
                  insert.push($(this).val());
              }

          });
          insert=insert.toString();
//        e.preventDefault();
//        e.stopImmediatePropagation();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'post',
            url:  '/profile/profile_experience/store',
            data: {
                '_token': $('input[name=_token]').val(),
                //'id': $("#id-edit").val(),
                'position': $("#val-position").val(),
                'company_name': $('#val-company-name').val(),
                'jd_start_year': $('#val-jd-start-year').val(),
                'jd_start_month': $('#val-jd-start-month').val(),
                'specialization': $('#val-specialization').val(),
                //'position_level': $('#val-position-level').val(),
                'salary': $('#val-salary').val(),
                'jd_end_year': $('#val-jd-end-year').val(),
                'jd_end_month': $('#val-jd-end-month').val(),
                'job_desc': $('#val-job-desc').val(),
                'job_spec': $('#val-job-specification').val(),
                'other_job_spec': $('#val-keyin-job-spec').val(),
                'val_present': insert,

            },
            dataType: 'json',
            success: function(data) {

                  location.reload();

            }

        });
    });



</script>

<script type="text/javascript">
    $('.submit-experience-edit').on('click', '.submit-experience-edit', function() {

        var insertedit=[];
        $("#present-edit").each(function() {
            if($(this).is(":checked")){
                insertedit.push($(this).val());
            }

        });
        insertedit=insertedit.toString();
        $.ajax({
            // headers: {
            //     'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            // },
            type: 'post',
            //dataType: 'json',
            url: '/profile/profile_experience/update',
            data: {
                '_token': $('input[name=_token]').val(),
                'id':$("#id-edit").val(),
                'position': $("#position-edit").val(),
                 'company_name_edit': $('#company_name-edit').val(),
                'jd_start_year': $('#jd_start_year-edit').val(),
                'jd_start_month': $('#jd_start_month-edit').val(),
                'specialization_id': $('#specialization-edit').val(),
                'specification_id': $('#job-specification-edit').val(),
                'salary': $('#salary-edit').val(),
                'jd_end_year': $('#val-jd-end-year-edit').val(),
                'jd_end_month': $('#val-jd-end-month-edit').val(),
                'job_desc_edit': $('#job-desc-edit').val(),
              //  'company_name_edit': $('#company_name-edit').val(),
                'keyin_job_spec_edit': $('#keyin-job-spec-edit').val(),
                'val_present': insertedit,

            },
            success: function(data) {
                location.reload();
            }
        });
    });

</script>


{{--<script>--}}
    {{--$('.submit-experience-delete').on('click', '.submit-experience-delete', function() {--}}

        {{--$.ajax({--}}
            {{--// headers: {--}}
            {{--//     'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')--}}
            {{--// },--}}
            {{--type: 'post',--}}
            {{--//dataType: 'json',--}}
            {{--url: '/profile/profile_experience/delete',--}}
            {{--data: {--}}
                {{--'_token': $('input[name=_token]').val(),--}}
                {{--'id': $('#val-experience-delete').val()--}}


            {{--},--}}

            {{--success: function(data) {--}}

                {{--location.reload();--}}
            {{--}--}}

        {{--});--}}

    {{--});--}}

{{--</script>--}}





<!-- Dashmix Core JS -->
<script src="{!! asset('assets/js/dashmix.core.min.js') !!}"></script>

<!-- Dashmix JS -->
<!--<script src="{{ mix('js/dashmix.app.js') }}"></script>-->
<script src="{!! asset('assets/js/dashmix.app.min.js') !!}"></script>

<!-- Laravel Scaffolding JS -->
<script src="{{ mix('js/laravel.app.js') }}"></script>

<!-- Page JS Plugins -->
<script src="{!! asset('assets/js/plugins/jquery-sparkline/jquery.sparkline.min.js') !!}"></script>
<script src="{!! asset('assets/js/plugins/chart.js/Chart.bundle.min.js') !!}"></script>

<!-- Page JS Datatables -->
<script src="{!! asset('assets/js/plugins/datatables/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.js') !!}"></script>
<script src="{!! asset('assets/js/plugins/datatables/buttons/dataTables.buttons.min.js') !!}"></script>
<script src="{!! asset('assets/js/plugins/datatables/buttons/buttons.print.min.js') !!}"></script>
<script src="{!! asset('assets/js/plugins/datatables/buttons/buttons.html5.min.js') !!}"></script>
<script src="{!! asset('assets/js/plugins/datatables/buttons/buttons.flash.min.js') !!}"></script>
<script src="{!! asset('assets/js/plugins/datatables/buttons/buttons.colVis.min.js') !!}"></script>

<!-- Page JS Datepicker -->
<script src="{!! asset('assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') !!}"></script>

<!-- Page JS Select2 -->
<script src="{!! asset('assets/js/plugins/select2/js/select2.full.min.js') !!}"></script>
<script src="{!! asset('assets/js/plugins/jquery-bootstrap-wizard/bs4/jquery.bootstrap.wizard.min.js') !!}"></script>
<script src="{!! asset('assets/js/plugins/jquery-validation/jquery.validate.min.js') !!}"></script>
<script src="{!! asset('assets/js/plugins/jquery-validation/additional-methods.js') !!}"></script>

<!-- Page JS Home Dashboard -->
<script src="{!! asset('assets/js/pages/be_pages_dashboard.min.js') !!}"></script>

<!-- Page JS Datatables -->
<script src="{!! asset('assets/js/pages/be_tables_datatables.min.js') !!}"></script>

<!-- Page JS Form Validation -->
<script src="{!! asset('assets/js/pages/be_forms_validation.min.js') !!}"></script>

<!-- Page JS Code -->
<script src="{!! asset('assets/js/pages/be_forms_wizard.min.js') !!}"></script>

<!-- Page JS Helpers (jQuery Sparkline plugin) -->
<script>jQuery(function(){ Dashmix.helpers(['sparkline', 'select2', 'datepicker']); });</script>



<!--<script>
    (function() {
        var params = {},
            r = /([^&=]+)=?([^&]*)/g;

        function d(s) {
            return decodeURIComponent(s.replace(/\+/g, ' '));
        }

        var match, search = window.location.search;
        while (match = r.exec(search.substring(1))) {
            params[d(match[1])] = d(match[2]);

            if(d(match[2]) === 'true' || d(match[2]) === 'false') {
                params[d(match[1])] = d(match[2]) === 'true' ? true : false;
            }
        }

        window.params = params;
    })();

    function addStreamStopListener(stream, callback) {
        var streamEndedEvent = 'ended';

        if ('oninactive' in stream) {
            streamEndedEvent = 'inactive';
        }

        stream.addEventListener(streamEndedEvent, function() {
            callback();
            callback = function() {};
        }, false);

        stream.getAudioTracks().forEach(function(track) {
            track.addEventListener(streamEndedEvent, function() {
                callback();
                callback = function() {};
            }, false);
        });

        stream.getVideoTracks().forEach(function(track) {
            track.addEventListener(streamEndedEvent, function() {
                callback();
                callback = function() {};
            }, false);
        });
    }
</script>

<script>

    var B  = 0;
    var time_in_minutes = 0.5;


    var capitals001 = [   @foreach ($questions as $question)
        {!!json_encode($question->question)!!},
        @endforeach
    ];

    var capitals002=[];

    var i = 5;

    while ( 1 <  i  ) {
        var x = Math.floor((Math.random() * capitals001.length ));


        //  document.getElementById("demo").innerHTML = capitals001[x];
        var name = capitals001.splice(x, 1);

        capitals002.push(name);


        i -- ;
    }



    var video = document.createElement('video');
    video.controls = false;
    var mediaElement = getHTMLMediaElement(video, {
        title: 'Are you ready? Click Start!',
        //buttons: ['full-screen'/*, 'take-snapshot'*/],
        buttons: [],
        showOnMouseEnter: false,
        width: 490,
        //width: 100 + '%',
        //width = $('.xyz').width(),
        //parentWidth = $('.xyz').offsetParent().width(),
        //percent = Math.round(100 * width / parentWidth),

        onTakeSnapshot: function() {
            var canvas = document.createElement('canvas');
            canvas.width = mediaElement.clientWidth;
            canvas.height = mediaElement.clientHeight;

            var context = canvas.getContext('2d');
            context.drawImage(recordingPlayer, 0, 0, canvas.width, canvas.height);

            window.open(canvas.toDataURL('image/png'));
        }
    });
    document.getElementById('recording-player').appendChild(mediaElement);

    var div = document.createElement('section');
    mediaElement.media.parentNode.appendChild(div);
    div.appendChild(mediaElement.media);

    var recordingPlayer = mediaElement.media;
    var recordingMedia = document.querySelector('.recording-media');
    var mediaContainerFormat = document.querySelector('.media-container-format');
    //var mimeType = 'video/webm';
    //var fileExtension = 'webm';
    var mimeType = 'video/webm\;codecs=h264';
    var fileExtension = 'mp4';
    var type = 'video';
    var recorderType;
    var defaultWidth;
    var defaultHeight;

    var btnStartRecording = document.querySelector('#btn-start-recording');
    var btnQues = document.querySelector('#questionbtn');

    window.onbeforeunload = function() {
        btnStartRecording.disabled = false;
        recordingMedia.disabled = false;
        mediaContainerFormat.disabled = false;
    };

    //   function time_remaining(endtime){
    //     var t = Date.parse(endtime) - Date.parse(new Date());
    //   var seconds = Math.floor( (t/1000) % 60 );
    // var minutes = Math.floor( (t/1000/60) % 60 );
    //var hours = Math.floor( (t/(1000*60*60)) % 24 );
    //var days = Math.floor( t/(1000*60*60*24) );

    //  return {'total':t, 'days':days, 'hours':hours, 'minutes':minutes, 'seconds':('0' + seconds).slice(-2)};

    //}

    //function run_clock(id,endtime){
    //  var clock = document.getElementById(id);
    // function update_clock(){
    //   t = time_remaining(endtime);

    // clock.innerHTML = '<font size=+2><strong>'+t.minutes+':'+t.seconds+'</strong></font>';
    //if(t.total<=0){
    //  clearInterval(timeinterval);
    //clock.innerHTML = '<font size=+2><strong>0:00</strong></font>';
    //document.getElementById("demo").innerHTML = "the time given for answering this interview question has expired. " +
    //  "Thank you for having a time with us.";

    // stopStream()



    //                    }
    //              }
    //            update_clock(); // run function once at first to avoid delay
    //           timeinterval = setInterval(update_clock,1000);
    //    }

    function myFunction() {

        var length2 = capitals002.length;
        var y = Math.floor((Math.random() * capitals002.length ));

        if (t.total > 0) {
            if (length2 > 0) {

                document.getElementById("demo").innerHTML = capitals002[y];
                capitals002.splice(y, 1);

            }
            else {
                document.getElementById("demo").innerHTML = "good luck u have already answer all questions";
                // clearTimeout( timeinterval);
            }


        }
    }

    btnStartRecording.onclick = function(event) {
        var button = btnStartRecording;

        var length2 = capitals002.length;

        var current_time = Date.parse(new Date());
        var deadline = new Date(current_time + time_in_minutes*60*1000);

        if (B < 1 && length2 > 0 ) {

            var y = Math.floor((Math.random() * capitals002.length ));


            document.getElementById("demo").innerHTML = capitals002[y];
            capitals002.splice(y, 1);
            // countDown(50, "status");
            run_clock('clockdiv',deadline);
            B ++;


        }
        function time_remaining(endtime){
            var t = Date.parse(endtime) - Date.parse(new Date());
            var seconds = Math.floor( (t/1000) % 60 );
            var minutes = Math.floor( (t/1000/60) % 60 );
            var hours = Math.floor( (t/(1000*60*60)) % 24 );
            var days = Math.floor( t/(1000*60*60*24) );

            return {'total':t, 'days':days, 'hours':hours, 'minutes':minutes, 'seconds':('0' + seconds).slice(-2)};

        }

        function run_clock(id,endtime){
            var clock = document.getElementById(id);
            function update_clock(){
                t = time_remaining(endtime);

                clock.innerHTML = '<font size=+2><strong>'+t.minutes+':'+t.seconds+'</strong></font>';
                if(t.total<=0){
                    clearInterval(timeinterval);
                    clock.innerHTML = '<font size=+2><strong>0:00</strong></font>';
                    document.getElementById("demo").innerHTML = "the time given for answering this interview question has expired. " +
                        "Thank you for having a time with us.";
                    button.stream.stop();
                    button.stream = null;
                    btnQues.disabled = true;
                    button.disabled = true;

                    // stopStream();
                    if(button.stream instanceof Array) {
                        button.stream.forEach(function(stream) {
                            stream.stop();
                        });
                        //button.stream = null;
                    }

                    videoBitsPerSecond = null;
                    var html = 'Your video interview has been done.<br>Kindly submit your video.';
                    //html += '<br>Size: ' + bytesToSize(button.recordRTC.getBlob().size);
                    recordingPlayer.parentNode.parentNode.querySelector('h2').innerHTML = html;
                    if(button.recordRTC) {
                        if(button.recordRTC.length) {
                            button.recordRTC[0].stopRecording(function(url) {
                                if(!button.recordRTC[1]) {
                                    button.recordingEndedCallback(url);
                                    stopStream();

                                    saveToDiskOrOpenNewTab(button.recordRTC[0]);
                                    return;
                                }

                                button.recordRTC[1].stopRecording(function(url) {
                                    button.recordingEndedCallback(url);
                                    stopStream();
                                });
                            });
                        }
                        else {
                            button.recordRTC.stopRecording(function(url) {
                                if(button.blobs && button.blobs.length) {
                                    var blob = new File(button.blobs, getFileName(fileExtension), {
                                        type: mimeType
                                    });

                                    button.recordRTC.getBlob = function() {
                                        return blob;
                                    };

                                    url = URL.createObjectURL(blob);
                                }

                                button.recordingEndedCallback(url);
                                saveToDiskOrOpenNewTab(button.recordRTC);
                                stopStream();
                            });
                        }
                    }

                }
            }
            update_clock(); // run function once at first to avoid delay
            timeinterval = setInterval(update_clock,1000);
        }


        if(button.innerHTML === '<i class="fa fa-fw fa-stop mr-1"></i> Stop Recording') {
            //btnPauseRecording.style.display = 'none';
            button.disabled = true;
            button.disableStateWaiting = true;
            setTimeout(function() {
                //button.disabled = false;
                button.disabled = true;
                button.disableStateWaiting = false;
            }, 2000);

            button.innerHTML = 'Start Recording';

            function stopStream() {
                if(button.stream && button.stream.stop) {
                    button.stream.stop();
                    button.stream = null;
                    document.getElementById("demo").innerHTML = "the time given for answering this interview question has expired. " +
                        "Thank you for having a time with us.";
                    clearInterval(timeinterval);
                    btnQues.disabled = true;

                }

                if(button.stream instanceof Array) {
                    button.stream.forEach(function(stream) {
                        stream.stop();
                    });
                    button.stream = null;
                }

                videoBitsPerSecond = null;
                var html = 'Your video interview has been done.<br>Kindly submit your video.';
                //html += '<br>Size: ' + bytesToSize(button.recordRTC.getBlob().size);
                recordingPlayer.parentNode.parentNode.querySelector('h2').innerHTML = html;
            }

            if(button.recordRTC) {
                if(button.recordRTC.length) {
                    button.recordRTC[0].stopRecording(function(url) {
                        if(!button.recordRTC[1]) {
                            button.recordingEndedCallback(url);
                            stopStream();

                            saveToDiskOrOpenNewTab(button.recordRTC[0]);
                            return;
                        }

                        button.recordRTC[1].stopRecording(function(url) {
                            button.recordingEndedCallback(url);
                            stopStream();
                        });
                    });
                }
                else {
                    button.recordRTC.stopRecording(function(url) {
                        if(button.blobs && button.blobs.length) {
                            var blob = new File(button.blobs, getFileName(fileExtension), {
                                type: mimeType
                            });

                            button.recordRTC.getBlob = function() {
                                return blob;
                            };

                            url = URL.createObjectURL(blob);
                        }

                        button.recordingEndedCallback(url);
                        saveToDiskOrOpenNewTab(button.recordRTC);
                        stopStream();
                    });
                }
            }

            return;
        }



        if(!event) return;

        button.disabled = true;

        var commonConfig = {
            onMediaCaptured: function(stream) {
                button.stream = stream;
                if(button.mediaCapturedCallback) {
                    button.mediaCapturedCallback();
                }

                button.innerHTML = '<i class="fa fa-fw fa-stop mr-1"></i> Stop Recording';
                button.disabled = false;
            },
            onMediaStopped: function() {
                button.innerHTML = 'Recording Done';

                if(!button.disableStateWaiting && t.total > 0) {
                    button.disabled = false;
                }
            },
            onMediaCapturingFailed: function(error) {
                console.error('onMediaCapturingFailed:', error);

                if(error.toString().indexOf('no audio or video tracks available') !== -1) {
                    alert('RecordRTC failed to start because there are no audio or video tracks available.');
                }

                if(DetectRTC.browser.name === 'Safari') return;

                if(error.name === 'PermissionDeniedError' && DetectRTC.browser.name === 'Firefox') {
                    alert('Firefox requires version >= 52. Firefox also requires HTTPs.');
                }

                commonConfig.onMediaStopped();
            }
        };

        if(mediaContainerFormat.value === 'h264') {
            mimeType = 'video/webm\;codecs=h264';
            fileExtension = 'mp4';

            // video/mp4;codecs=avc1
            if(isMimeTypeSupported('video/mpeg')) {
                mimeType = 'video/mpeg';
            }
        }

        if(mediaContainerFormat.value === 'mkv' && isMimeTypeSupported('video/x-matroska;codecs=avc1')) {
            mimeType = 'video/x-matroska;codecs=avc1';
            fileExtension = 'mkv';
        }

        if(mediaContainerFormat.value === 'vp8' && isMimeTypeSupported('video/webm\;codecs=vp8')) {
            mimeType = 'video/webm\;codecs=vp8';
            fileExtension = 'webm';
            recorderType = null;
            type = 'video';
        }

        if(mediaContainerFormat.value === 'vp9' && isMimeTypeSupported('video/webm\;codecs=vp9')) {
            mimeType = 'video/webm\;codecs=vp9';
            fileExtension = 'webm';
            recorderType = null;
            type = 'video';
        }

        if(mediaContainerFormat.value === 'pcm') {
            mimeType = 'audio/wav';
            fileExtension = 'wav';
            recorderType = StereoAudioRecorder;
            type = 'audio';
        }

        if(mediaContainerFormat.value === 'opus' || mediaContainerFormat.value === 'ogg') {
            if(isMimeTypeSupported('audio/webm')) {
                mimeType = 'audio/webm';
                fileExtension = 'webm'; // webm
            }

            if(isMimeTypeSupported('audio/ogg')) {
                mimeType = 'audio/ogg; codecs=opus';
                fileExtension = 'ogg'; // ogg
            }

            recorderType = null;
            type = 'audio';
        }

        if(mediaContainerFormat.value === 'whammy') {
            mimeType = 'video/webm';
            fileExtension = 'webm';
            recorderType = WhammyRecorder;
            type = 'video';
        }

        if(mediaContainerFormat.value === 'gif') {
            mimeType = 'image/gif';
            fileExtension = 'gif';
            recorderType = GifRecorder;
            type = 'gif';
        }

        if(mediaContainerFormat.value === 'default') {
            mimeType = 'video/webm';
            fileExtension = 'webm';
            recorderType = null;
            type = 'video';
        }


        if(recordingMedia.value === 'record-audio') {
            captureAudio(commonConfig);

            button.mediaCapturedCallback = function() {
                var options = {
                    type: type,
                    mimeType: mimeType,
                    leftChannel: params.leftChannel || false,
                    disableLogs: params.disableLogs || false
                };

                if(params.sampleRate) {
                    options.sampleRate = parseInt(params.sampleRate);
                }

                if(params.bufferSize) {
                    options.bufferSize = parseInt(params.bufferSize);
                }

                if(recorderType) {
                    options.recorderType = recorderType;
                }

                if(videoBitsPerSecond) {
                    options.videoBitsPerSecond = videoBitsPerSecond;
                }

                if(DetectRTC.browser.name === 'Edge') {
                    options.numberOfAudioChannels = 1;
                }

                options.ignoreMutedMedia = false;
                button.recordRTC = RecordRTC(button.stream, options);

                button.recordingEndedCallback = function(url) {
                    setVideoURL(url);
                };

                button.recordRTC.startRecording();
                //btnPauseRecording.style.display = '';
            };
        }

        if(recordingMedia.value === 'record-audio-plus-video') {
            captureAudioPlusVideo(commonConfig);

            button.mediaCapturedCallback = function() {
                if(typeof MediaRecorder === 'undefined') { // opera or chrome etc.
                    button.recordRTC = [];

                    if(!params.bufferSize) {
                        // it fixes audio issues whilst recording 720p
                        params.bufferSize = 16384;
                    }

                    var options = {
                        type: 'audio', // hard-code to set "audio"
                        leftChannel: params.leftChannel || false,
                        disableLogs: params.disableLogs || false,
                        video: recordingPlayer
                    };

                    if(params.sampleRate) {
                        options.sampleRate = parseInt(params.sampleRate);
                    }

                    if(params.bufferSize) {
                        options.bufferSize = parseInt(params.bufferSize);
                    }

                    if(params.frameInterval) {
                        options.frameInterval = parseInt(params.frameInterval);
                    }

                    if(recorderType) {
                        options.recorderType = recorderType;
                    }

                    if(videoBitsPerSecond) {
                        options.videoBitsPerSecond = videoBitsPerSecond;
                    }

                    options.ignoreMutedMedia = false;
                    var audioRecorder = RecordRTC(button.stream, options);

                    options.type = type;
                    var videoRecorder = RecordRTC(button.stream, options);

                    // to sync audio/video playbacks in browser!
                    videoRecorder.initRecorder(function() {
                        audioRecorder.initRecorder(function() {
                            audioRecorder.startRecording();
                            videoRecorder.startRecording();
                            //btnPauseRecording.style.display = '';
                        });
                    });

                    button.recordRTC.push(audioRecorder, videoRecorder);

                    button.recordingEndedCallback = function() {
                        var audio = new Audio();
                        audio.src = audioRecorder.toURL();
                        audio.controls = true;
                        audio.autoplay = true;

                        recordingPlayer.parentNode.appendChild(document.createElement('hr'));
                        recordingPlayer.parentNode.appendChild(audio);

                        if(audio.paused) audio.play();
                    };
                    return;
                }

                var options = {
                    type: type,
                    mimeType: mimeType,
                    disableLogs: params.disableLogs || false,
                    getNativeBlob: false, // enable it for longer recordings
                    video: recordingPlayer
                };

                if(recorderType) {
                    options.recorderType = recorderType;

                    if(recorderType == WhammyRecorder || recorderType == GifRecorder) {
                        options.canvas = options.video = {
                            width: defaultWidth || 320,
                            height: defaultHeight || 240
                        };
                    }
                }

                if(videoBitsPerSecond) {
                    options.videoBitsPerSecond = videoBitsPerSecond;
                }



                options.ignoreMutedMedia = false;
                button.recordRTC = RecordRTC(button.stream, options);

                button.recordingEndedCallback = function(url) {
                    setVideoURL(url);
                };

                button.recordRTC.startRecording();
                //btnPauseRecording.style.display = '';
                recordingPlayer.parentNode.parentNode.querySelector('h2').innerHTML = '<img src="https://cdn.webrtc-experiment.com/images/progress.gif">';
            };
        }

        if(recordingMedia.value === 'record-screen') {
            captureScreen(commonConfig);

            button.mediaCapturedCallback = function() {
                var options = {
                    type: type,
                    mimeType: mimeType,
                    disableLogs: params.disableLogs || false,
                    getNativeBlob: false, // enable it for longer recordings
                    video: recordingPlayer
                };

                if(recorderType) {
                    options.recorderType = recorderType;

                    if(recorderType == WhammyRecorder || recorderType == GifRecorder) {
                        options.canvas = options.video = {
                            width: defaultWidth || 320,
                            height: defaultHeight || 240
                        };
                    }
                }

                if(videoBitsPerSecond) {
                    options.videoBitsPerSecond = videoBitsPerSecond;
                }

                options.ignoreMutedMedia = false;
                button.recordRTC = RecordRTC(button.stream, options);

                button.recordingEndedCallback = function(url) {
                    setVideoURL(url);
                };

                button.recordRTC.startRecording();
                //btnPauseRecording.style.display = '';
            };
        }

        // note: audio+tab is supported in Chrome 50+
        // todo: add audio+tab recording
        if(recordingMedia.value === 'record-audio-plus-screen') {
            captureAudioPlusScreen(commonConfig);

            button.mediaCapturedCallback = function() {
                var options = {
                    type: type,
                    mimeType: mimeType,
                    disableLogs: params.disableLogs || false,
                    getNativeBlob: false, // enable it for longer recordings
                    video: recordingPlayer
                };

                if(recorderType) {
                    options.recorderType = recorderType;

                    if(recorderType == WhammyRecorder || recorderType == GifRecorder) {
                        options.canvas = options.video = {
                            width: defaultWidth || 320,
                            height: defaultHeight || 240
                        };
                    }
                }

                if(videoBitsPerSecond) {
                    options.videoBitsPerSecond = videoBitsPerSecond;
                }

                options.ignoreMutedMedia = false;
                button.recordRTC = RecordRTC(button.stream, options);

                button.recordingEndedCallback = function(url) {
                    setVideoURL(url);
                };

                button.recordRTC.startRecording();
                //btnPauseRecording.style.display = '';
            };
        }
    };

    function captureVideo(config) {
        captureUserMedia({video: true}, function(videoStream) {
            config.onMediaCaptured(videoStream);

            addStreamStopListener(videoStream, function() {
                config.onMediaStopped();
            });
        }, function(error) {
            config.onMediaCapturingFailed(error);
        });
    }

    function captureAudio(config) {
        captureUserMedia({audio: true}, function(audioStream) {
            config.onMediaCaptured(audioStream);

            addStreamStopListener(audioStream, function() {
                config.onMediaStopped();
            });
        }, function(error) {
            config.onMediaCapturingFailed(error);
        });
    }

    function captureAudioPlusVideo(config) {
        captureUserMedia({video: true, audio: true}, function(audioVideoStream) {
            config.onMediaCaptured(audioVideoStream);

            if(audioVideoStream instanceof Array) {
                audioVideoStream.forEach(function(stream) {
                    addStreamStopListener(stream, function() {
                        config.onMediaStopped();
                    });
                });
                return;
            }

            addStreamStopListener(audioVideoStream, function() {
                config.onMediaStopped();
            });
        }, function(error) {
            config.onMediaCapturingFailed(error);
        });
    }

    var MY_DOMAIN = 'webrtc-experiment.com';

    function isMyOwnDomain() {
        // replace "webrtc-experiment.com" with your own domain name
        return document.domain.indexOf(MY_DOMAIN) !== -1;
    }

    function isLocalHost() {
        // "chrome.exe" --enable-usermedia-screen-capturing
        // or firefox => about:config => "media.getusermedia.screensharing.allowed_domains" => add "localhost"
        return document.domain === 'localhost' || document.domain === '127.0.0.1';
    }

    function captureScreen(config) {
        // Firefox screen capturing addon is open-sourced here: https://github.com/muaz-khan/Firefox-Extensions
        // Google Chrome screen capturing extension is open-sourced here: https://github.com/muaz-khan/Chrome-Extensions/tree/master/desktopCapture

        window.getScreenId = function(chromeMediaSource, chromeMediaSourceId) {
            var screenConstraints = {
                audio: false,
                video: {
                    mandatory: {
                        chromeMediaSourceId: chromeMediaSourceId,
                        chromeMediaSource: isLocalHost() ? 'screen' : chromeMediaSource
                    }
                }
            };

            if(DetectRTC.browser.name === 'Firefox') {
                screenConstraints = {
                    video: {
                        mediaSource: 'window'
                    }
                }
            }

            captureUserMedia(screenConstraints, function(screenStream) {
                config.onMediaCaptured(screenStream);

                addStreamStopListener(screenStream, function() {
                    // config.onMediaStopped();

                    btnStartRecording.onclick();

                });
            }, function(error) {
                config.onMediaCapturingFailed(error);

                if(isMyOwnDomain() === false && DetectRTC.browser.name === 'Chrome') {
                    // otherwise deploy chrome extension yourselves
                    // https://github.com/muaz-khan/Chrome-Extensions/tree/master/desktopCapture
                    alert('Please enable this command line flag: "--enable-usermedia-screen-capturing"');
                }

                if(isMyOwnDomain() === false && DetectRTC.browser.name === 'Firefox') {
                    // otherwise deploy firefox addon yourself
                    // https://github.com/muaz-khan/Firefox-Extensions
                    alert('Please enable screen capturing for your domain. Open "about:config" and search for "media.getusermedia.screensharing.allowed_domains"');
                }
            });
        };


        if(DetectRTC.browser.name === 'Firefox' || isLocalHost()) {
            window.getScreenId();
        }

        window.postMessage('get-sourceId', '*');
    }

    function captureAudioPlusScreen(config) {
        // Firefox screen capturing addon is open-sourced here: https://github.com/muaz-khan/Firefox-Extensions
        // Google Chrome screen capturing extension is open-sourced here: https://github.com/muaz-khan/Chrome-Extensions/tree/master/desktopCapture

        window.getScreenId = function(chromeMediaSource, chromeMediaSourceId) {
            var screenConstraints = {
                audio: false,
                video: {
                    mandatory: {
                        chromeMediaSourceId: chromeMediaSourceId,
                        chromeMediaSource: isLocalHost() ? 'screen' : chromeMediaSource
                    }
                }
            };

            if(DetectRTC.browser.name === 'Firefox') {
                screenConstraints = {
                    video: {
                        mediaSource: 'window'
                    },
                    audio: false
                }
            }

            captureUserMedia(screenConstraints, function(screenStream) {
                captureUserMedia({audio: true}, function(audioStream) {
                    var newStream = new MediaStream();

                    // merge audio and video tracks in a single stream
                    audioStream.getAudioTracks().forEach(function(track) {
                        newStream.addTrack(track);
                    });

                    screenStream.getVideoTracks().forEach(function(track) {
                        newStream.addTrack(track);
                    });

                    config.onMediaCaptured(newStream);

                    addStreamStopListener(newStream, function() {
                        config.onMediaStopped();
                    });
                }, function(error) {
                    config.onMediaCapturingFailed(error);
                });
            }, function(error) {
                config.onMediaCapturingFailed(error);

                if(isMyOwnDomain() === false && DetectRTC.browser.name === 'Chrome') {
                    // otherwise deploy chrome extension yourselves
                    // https://github.com/muaz-khan/Chrome-Extensions/tree/master/desktopCapture
                    alert('Please enable this command line flag: "--enable-usermedia-screen-capturing"');
                }

                if(isMyOwnDomain() === false && DetectRTC.browser.name === 'Firefox') {
                    // otherwise deploy firefox addon yourself
                    // https://github.com/muaz-khan/Firefox-Extensions
                    alert('Please enable screen capturing for your domain. Open "about:config" and search for "media.getusermedia.screensharing.allowed_domains"');
                }
            });
        };

        if(DetectRTC.browser.name === 'Firefox' || isLocalHost()) {
            window.getScreenId();
        }

        window.postMessage('get-sourceId', '*');
    }

    var videoBitsPerSecond;

    function setVideoBitrates() {
        var select = document.querySelector('.media-bitrates');
        var value = select.value;

        if(value == 'default') {
            videoBitsPerSecond = null;
            return;
        }

        videoBitsPerSecond = parseInt(value);
    }

    function getFrameRates(mediaConstraints) {
        if(!mediaConstraints.video) {
            return mediaConstraints;
        }

        var select = document.querySelector('.media-framerates');
        var value = select.value;

        if(value == 'default') {
            return mediaConstraints;
        }

        value = parseInt(value);

        if(DetectRTC.browser.name === 'Firefox') {
            mediaConstraints.video.frameRate = value;
            return mediaConstraints;
        }

        if(!mediaConstraints.video.mandatory) {
            mediaConstraints.video.mandatory = {};
            mediaConstraints.video.optional = [];
        }

        var isScreen = recordingMedia.value.toString().toLowerCase().indexOf('screen') != -1;
        if(isScreen) {
            mediaConstraints.video.mandatory.maxFrameRate = value;
        }
        else {
            mediaConstraints.video.mandatory.minFrameRate = value;
        }

        return mediaConstraints;
    }

    function setGetFromLocalStorage(selectors) {
        selectors.forEach(function(selector) {
            var storageItem = selector.replace(/\.|#/g, '');
            if(localStorage.getItem(storageItem)) {
                document.querySelector(selector).value = localStorage.getItem(storageItem);
            }

            addEventListenerToUploadLocalStorageItem(selector, ['change', 'blur'], function() {
                localStorage.setItem(storageItem, document.querySelector(selector).value);
            });
        });
    }

    function addEventListenerToUploadLocalStorageItem(selector, arr, callback) {
        arr.forEach(function(event) {
            document.querySelector(selector).addEventListener(event, callback, false);
        });
    }

    setGetFromLocalStorage(['.media-resolutions', '.media-framerates', '.media-bitrates', '.recording-media', '.media-container-format']);

    function getVideoResolutions(mediaConstraints) {
        if(!mediaConstraints.video) {
            return mediaConstraints;
        }

        var select = document.querySelector('.media-resolutions');
        var value = select.value;

        if(value == 'default') {
            return mediaConstraints;
        }

        value = value.split('x');

        if(value.length != 2) {
            return mediaConstraints;
        }

        defaultWidth = parseInt(value[0]);
        defaultHeight = parseInt(value[1]);

        if(DetectRTC.browser.name === 'Firefox') {
            mediaConstraints.video.width = defaultWidth;
            mediaConstraints.video.height = defaultHeight;
            return mediaConstraints;
        }

        if(!mediaConstraints.video.mandatory) {
            mediaConstraints.video.mandatory = {};
            mediaConstraints.video.optional = [];
        }

        var isScreen = recordingMedia.value.toString().toLowerCase().indexOf('screen') != -1;

        if(isScreen) {
            mediaConstraints.video.mandatory.maxWidth = defaultWidth;
            mediaConstraints.video.mandatory.maxHeight = defaultHeight;
        }
        else {
            mediaConstraints.video.mandatory.minWidth = defaultWidth;
            mediaConstraints.video.mandatory.minHeight = defaultHeight;
        }

        return mediaConstraints;
    }

    function captureUserMedia(mediaConstraints, successCallback, errorCallback) {
        if(mediaConstraints.video == true) {
            mediaConstraints.video = {};
        }

        setVideoBitrates();

        mediaConstraints = getVideoResolutions(mediaConstraints);
        mediaConstraints = getFrameRates(mediaConstraints);

        var isBlackBerry = !!(/BB10|BlackBerry/i.test(navigator.userAgent || ''));
        if(isBlackBerry && !!(navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia)) {
            navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia;
            navigator.getUserMedia(mediaConstraints, successCallback, errorCallback);
            return;
        }

        navigator.mediaDevices.getUserMedia(mediaConstraints).then(function(stream) {
            successCallback(stream);

            setVideoURL(stream, true);
        }).catch(function(error) {
            if(error && (error.name === 'ConstraintNotSatisfiedError' || error.name === 'OverconstrainedError')) {
                alert('Your camera or browser does NOT supports selected resolutions or frame-rates. \n\nPlease select "default" resolutions.');
            }
            else if(error && error.message) {
                alert(error.message);
            }
            else {
                alert('Unable to make getUserMedia request. Please check browser console logs.');
            }

            errorCallback(error);
        });
    }

    function setMediaContainerFormat(arrayOfOptionsSupported) {
        var options = Array.prototype.slice.call(
            mediaContainerFormat.querySelectorAll('option')
        );

        var localStorageItem;
        if(localStorage.getItem('media-container-format')) {
            localStorageItem = localStorage.getItem('media-container-format');
        }

        var selectedItem;
        options.forEach(function(option) {
            option.disabled = true;

            if(arrayOfOptionsSupported.indexOf(option.value) !== -1) {
                option.disabled = false;

                if(localStorageItem && arrayOfOptionsSupported.indexOf(localStorageItem) != -1) {
                    if(option.value != localStorageItem) return;
                    option.selected = true;
                    selectedItem = option;
                    return;
                }

                if(!selectedItem) {
                    option.selected = true;
                    selectedItem = option;
                }
            }
        });
    }

    function isMimeTypeSupported(mimeType) {
        if(DetectRTC.browser.name === 'Edge' || DetectRTC.browser.name === 'Safari' || typeof MediaRecorder === 'undefined') {
            return false;
        }

        if(typeof MediaRecorder.isTypeSupported !== 'function') {
            return true;
        }

        return MediaRecorder.isTypeSupported(mimeType);
    }

    recordingMedia.onchange = function() {
        if(recordingMedia.value === 'record-audio') {
            var recordingOptions = [];

            if(isMimeTypeSupported('audio/webm')) {
                recordingOptions.push('opus');
            }

            if(isMimeTypeSupported('audio/ogg')) {
                recordingOptions.push('ogg');
            }

            recordingOptions.push('pcm');

            setMediaContainerFormat(recordingOptions);
            return;
        }

        var isChrome = !!window.chrome && !(!!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0);

        var recordingOptions = ['vp8']; // MediaStreamRecorder with vp8

        if(isMimeTypeSupported('video/webm\;codecs=vp9')) {
            recordingOptions.push('vp9'); // MediaStreamRecorder with vp9
        }

        if(isMimeTypeSupported('video/webm\;codecs=h264')) {
            recordingOptions.push('h264'); // MediaStreamRecorder with h264
        }

        if(isMimeTypeSupported('video/x-matroska;codecs=avc1')) {
            recordingOptions.push('mkv'); // MediaStreamRecorder with mkv/matroska
        }

        recordingOptions.push('gif'); // GifRecorder

        if(isChrome) {
            recordingOptions.push('whammy'); // WhammyRecorder
        }

        recordingOptions.push('default'); // Default mimeType for MediaStreamRecorder

        setMediaContainerFormat(recordingOptions);
    };
    recordingMedia.onchange();

    if(DetectRTC.browser.name === 'Edge' || DetectRTC.browser.name === 'Safari') {
        // webp isn't supported in Microsoft Edge
        // neither MediaRecorder API
        // so lets disable both video/screen recording options

        console.warn('Neither MediaRecorder API nor webp is supported in ' + DetectRTC.browser.name + '. You cam merely record audio.');

        recordingMedia.innerHTML = '<option value="record-audio">Audio</option>';
        setMediaContainerFormat(['pcm']);
    }

    function stringify(obj) {
        var result = '';
        Object.keys(obj).forEach(function(key) {
            if(typeof obj[key] === 'function') {
                return;
            }

            if(result.length) {
                result += ',';
            }

            result += key + ': ' + obj[key];
        });

        return result;
    }

    function mediaRecorderToStringify(mediaRecorder) {
        var result = '';
        result += 'mimeType: ' + mediaRecorder.mimeType;
        result += ', state: ' + mediaRecorder.state;
        result += ', audioBitsPerSecond: ' + mediaRecorder.audioBitsPerSecond;
        result += ', videoBitsPerSecond: ' + mediaRecorder.videoBitsPerSecond;
        if(mediaRecorder.stream) {
            result += ', streamid: ' + mediaRecorder.stream.id;
            result += ', stream-active: ' + mediaRecorder.stream.active;
        }
        return result;
    }

    function getFailureReport() {
        var info = 'RecordRTC seems failed. \n\n' + stringify(DetectRTC.browser) + '\n\n' + DetectRTC.osName + ' ' + DetectRTC.osVersion + '\n';

        if (typeof recorderType !== 'undefined' && recorderType) {
            info += '\nrecorderType: ' + recorderType.name;
        }

        if (typeof mimeType !== 'undefined') {
            info += '\nmimeType: ' + mimeType;
        }

        Array.prototype.slice.call(document.querySelectorAll('select')).forEach(function(select) {
            info += '\n' + (select.id || select.className) + ': ' + select.value;
        });

        if (btnStartRecording.recordRTC) {
            info += '\n\ninternal-recorder: ' + btnStartRecording.recordRTC.getInternalRecorder().name;

            if(btnStartRecording.recordRTC.getInternalRecorder().getAllStates) {
                info += '\n\nrecorder-states: ' + btnStartRecording.recordRTC.getInternalRecorder().getAllStates();
            }
        }

        if(btnStartRecording.stream) {
            info += '\n\naudio-tracks: ' + btnStartRecording.stream.getAudioTracks().length;
            info += '\nvideo-tracks: ' + btnStartRecording.stream.getVideoTracks().length;
            info += '\nstream-active? ' + !!btnStartRecording.stream.active;

            btnStartRecording.stream.getAudioTracks().concat(btnStartRecording.stream.getVideoTracks()).forEach(function(track) {
                info += '\n' + track.kind + '-track-' + (track.label || track.id) + ': (enabled: ' + !!track.enabled + ', readyState: ' + track.readyState + ', muted: ' + !!track.muted + ')';

                if(track.getConstraints && Object.keys(track.getConstraints()).length) {
                    info += '\n' + track.kind + '-track-getConstraints: ' + stringify(track.getConstraints());
                }

                if(track.getSettings && Object.keys(track.getSettings()).length) {
                    info += '\n' + track.kind + '-track-getSettings: ' + stringify(track.getSettings());
                }
            });
        }



        else if(btnStartRecording.recordRTC && btnStartRecording.recordRTC.getBlob()) {
            info += '\n\nblobSize: ' + bytesToSize(btnStartRecording.recordRTC.getBlob().size);
        }

        if(btnStartRecording.recordRTC && btnStartRecording.recordRTC.getInternalRecorder() && btnStartRecording.recordRTC.getInternalRecorder().getInternalRecorder && btnStartRecording.recordRTC.getInternalRecorder().getInternalRecorder()) {
            info += '\n\ngetInternalRecorder: ' + mediaRecorderToStringify(btnStartRecording.recordRTC.getInternalRecorder().getInternalRecorder());
        }

        return info;
    }

    function saveToDiskOrOpenNewTab(recordRTC) {
        if(!recordRTC.getBlob().size) {
            var info = getFailureReport();
            console.log('blob', recordRTC.getBlob());
            console.log('recordrtc instance', recordRTC);
            console.log('report', info);

            if(mediaContainerFormat.value !== 'default') {
                alert('RecordRTC seems failed recording using ' + mediaContainerFormat.value + '. Please choose "default" option from the drop down and record again.');
            }
            else {
                alert('RecordRTC seems failed. Unexpected issue. You can read the email in your console log. \n\nPlease report using disqus chat below.');
            }

            if(mediaContainerFormat.value !== 'vp9' && DetectRTC.browser.name === 'Chrome') {
                alert('Please record using VP9 encoder. (select from the dropdown)');
            }
        }

        var fileName = getFileName(fileExtension);



        // upload to PHP server
        document.querySelector('#upload-to-php').parentNode.style.display = 'block';
        document.querySelector('#upload-to-php').onclick = function() {
            if(!recordRTC) return alert('No recording found.');
            this.disabled = true;

            var button = this;
            uploadToPHPServer(fileName, recordRTC, function(progress, fileURL) {
                if(progress === 'ended') {
                    ///button.disabled = false;
                    ///button.innerHTML = 'Click to download from server';
                    button.disabled = true;
                    button.innerHTML = 'Video uploaded';
                    button.onclick = function() {
                        SaveFileURLToDisk(fileURL, fileName);
                    };

                    setVideoURL(fileURL);

                    var html = 'Your video interview has been<br>submitted for analysis.';
                    //html += '<a href="'+fileURL+'" download="'+fileName+'" style="color: yellow; display: block; margin-top: 15px;">'+fileName+'</a>';
                    recordingPlayer.parentNode.parentNode.querySelector('h2').innerHTML = html;
                    return;
                }
                button.innerHTML = progress;
                recordingPlayer.parentNode.parentNode.querySelector('h2').innerHTML = progress;
            });
        };


    }


    var listOfFilesUploaded = [];
    function uploadToPHPServer(fileName, recordRTC, callback) {
        var blob = recordRTC instanceof Blob ? recordRTC : recordRTC.getBlob();

        blob = new File([blob], getFileName(fileExtension), {
            type: mimeType
        });

        // create FormData
        var formData = new FormData();
        formData.append('video-filename', fileName);
        formData.append('video-blob', blob);

        callback('Uploading recorded-file to server.');

        makeXMLHttpRequest('{{ url("/save") }}', formData, function(progress) {
            if (progress !== 'upload-ended') {
                callback(progress);
                return;
            }
            var initialURL = location.href.replace(location.href.split('/').pop(), '') + 'uploads/videos/';
            //var initialURL = 'http://localhost:8000/uploads/';

            callback('ended', initialURL + fileName);
            // to make sure we can delete as soon as visitor leaves
            listOfFilesUploaded.push(initialURL + fileName);
        });
    }

    function makeXMLHttpRequest(url, data, callback) {
        var request = new XMLHttpRequest();
        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) {
                callback('upload-ended');
            }
        };

        request.upload.onloadstart = function() {
            callback('Upload started...');
        };

        request.upload.onprogress = function(event) {
            callback('Upload Progress ' + Math.round(event.loaded / event.total * 100) + "%");
        };

        request.upload.onload = function() {
            callback('progress-about-to-end');
        };

        request.upload.onload = function() {
            callback('Uploading...');
        };

        request.upload.onerror = function(error) {
            callback('Failed to upload to server');
        };

        request.upload.onabort = function(error) {
            callback('Upload aborted.');
        };

        request.open('POST', url);
        request.send(data);
    }


    window.onbeforeunload = function() {
        document.querySelector('button').disabled = false;
        recordingMedia.disabled = false;
        mediaContainerFormat.disabled = false;
        if(!listOfFilesUploaded.length) return;
        listOfFilesUploaded.forEach(function(fileURL) {
            var request = new XMLHttpRequest();
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    if(this.responseText === ' problem deleting files.') {
                        alert('Failed to delete ' + fileURL + ' from the server.');
                        return;
                    }
                    listOfFilesUploaded = [];
                    //alert('You can leave now. Your files are removed from the server.');
                }
            };
            request.open('POST', '{{ url("/delete") }}');
            var formData = new FormData();
            formData.append('delete-file', fileURL.split('/').pop());
            request.send(formData);
        });
        return 'Please wait few seconds before your recordings are deleted from the server.';
    };

    function getRandomString() {

        return Math.floor((new Date()).getTime() / 1000);
        //return (Math.random() * new Date().getTime()).toString(36).replace(/\./g, '');

    }


    //function getUserID() {
    //var user = '{{ auth()->id() }}';
    //}



    function getFileName(fileExtension) {
        var d = new Date();
        var year = d.getUTCFullYear();
        var month = d.getUTCMonth();
        var date = d.getUTCDate();
        var user = '{{ auth()->id() }}';
        return 'VIDEO-ID' + user + '-' + year + (month+1) + date + '-' + getRandomString() + '.' + fileExtension;
        //return 'RecordRTC-' + year + month + date + '-' + getRandomString() + '.' + fileExtension;
    }

    function SaveFileURLToDisk(fileUrl, fileName) {
        var hyperlink = document.createElement('a');
        hyperlink.href = fileUrl;
        hyperlink.target = '_blank';
        hyperlink.download = fileName || fileUrl;

        (document.body || document.documentElement).appendChild(hyperlink);
        hyperlink.onclick = function() {
            (document.body || document.documentElement).removeChild(hyperlink);

            // required for Firefox
            window.URL.revokeObjectURL(hyperlink.href);
        };

        var mouseEvent = new MouseEvent('click', {
            view: window,
            bubbles: true,
            cancelable: true
        });

        hyperlink.dispatchEvent(mouseEvent);
    }

    function getURL(arg) {
        var url = arg;

        if(arg instanceof Blob || arg instanceof File) {
            url = URL.createObjectURL(arg);
        }

        if(arg instanceof RecordRTC || arg.getBlob) {
            url = URL.createObjectURL(arg.getBlob());
        }

        if(arg instanceof MediaStream || arg.getTracks || arg.getVideoTracks || arg.getAudioTracks) {
            // url = URL.createObjectURL(arg);
        }

        return url;
    }

    function setVideoURL(arg, forceNonImage) {
        var url = getURL(arg);

        var parentNode = recordingPlayer.parentNode;
        parentNode.removeChild(recordingPlayer);
        parentNode.innerHTML = '';

        var elem = 'video';
        if(type == 'gif' && !forceNonImage) {
            elem = 'img';
        }
        if(type == 'audio') {
            elem = 'audio';
        }

        recordingPlayer = document.createElement(elem);

        if(arg instanceof MediaStream) {
            recordingPlayer.muted = true;
        }

        recordingPlayer.addEventListener('loadedmetadata', function() {
            if(navigator.userAgent.toLowerCase().indexOf('android') == -1) return;

            // android
            setTimeout(function() {
                if(typeof recordingPlayer.play === 'function') {
                    recordingPlayer.play();
                }
            }, 2000);
        }, false);

        recordingPlayer.poster = '';

        if(arg instanceof MediaStream) {
            recordingPlayer.srcObject = arg;
        }
        else {
            recordingPlayer.src = url;
        }

        if(typeof recordingPlayer.play === 'function') {
            recordingPlayer.play();
        }

        recordingPlayer.addEventListener('ended', function() {
            url = getURL(arg);

            if(arg instanceof MediaStream) {
                recordingPlayer.srcObject = arg;
            }
            else {
                recordingPlayer.src = url;
            }
        });

        parentNode.appendChild(recordingPlayer);
    }
</script>

<script>
    /* upload_youtube_video.js Copyright 2017 Google Inc. All Rights Reserved. */

    function uploadToYouTube(fileName, recordRTC, callback) {
        var blob = recordRTC instanceof Blob ? recordRTC : recordRTC.getBlob();

        blob = new File([blob], getFileName(fileExtension), {
            type: mimeType
        });

        if(!uploadVideo) {
            alert('YouTube API are not available.');
            return;
        }

        uploadVideo.callback = callback;
        uploadVideo.uploadFile(fileName, blob);
    }

    var uploadVideo;

    var signinCallback = function (result){
        if(result.access_token) {
            uploadVideo = new UploadVideo();
            uploadVideo.ready(result.access_token);

            document.querySelector('#signinButton').style.display = 'none';
        }
        else {
            // console.error('YouTube error', result);
            // document.querySelector('#upload-to-youtube').style.display = 'none';
        }
    };

    var STATUS_POLLING_INTERVAL_MILLIS = 60 * 1000; // One minute.

    var UploadVideo = function() {
        this.tags = ['recordrtc'];
        this.categoryId = 28; // via: http://stackoverflow.com/a/35877512/552182
        this.videoId = '';
        this.uploadStartTime = 0;
    };


    UploadVideo.prototype.ready = function(accessToken) {
        this.accessToken = accessToken;
        this.gapi = gapi;
        this.authenticated = true;
        false && this.gapi.client.request({
            path: '/youtube/v3/channels',
            params: {
                part: 'snippet',
                mine: true
            },
            callback: function(response) {
                if (!response.error) {
                    // response.items[0].snippet.title -- channel title
                    // response.items[0].snippet.thumbnails.default.url -- channel thumbnail
                }
            }.bind(this)
        });
    };

    UploadVideo.prototype.uploadFile = function(fileName, file) {
        var metadata = {
            snippet: {
                title: fileName,
                description: fileName,
                tags: this.tags,
                categoryId: this.categoryId
            },
            status: {
                privacyStatus: 'public'
            }
        };
        var uploader = new MediaUploader({
            baseUrl: 'https://www.googleapis.com/upload/youtube/v3/videos',
            file: file,
            token: this.accessToken,
            metadata: metadata,
            params: {
                part: Object.keys(metadata).join(',')
            },
            onError: function(data) {
                var message = data;
                try {
                    var errorResponse = JSON.parse(data);
                    message = errorResponse.error.message;
                } finally {
                    alert(message);
                }
            }.bind(this),
            onProgress: function(data) {
                var bytesUploaded = data.loaded;
                var totalBytes = parseInt(data.total);
                var percentageComplete = parseInt((bytesUploaded * 100) / totalBytes);

                uploadVideo.callback(percentageComplete);
            }.bind(this),
            onComplete: function(data) {
                var uploadResponse = JSON.parse(data);
                this.videoId = uploadResponse.id;
                this.videoURL = 'https://www.youtube.com/watch?v=' + this.videoId;
                uploadVideo.callback('uploaded', this.videoURL);

                setTimeout(this.pollForVideoStatus, 2000);
            }.bind(this)
        });
        this.uploadStartTime = Date.now();
        uploader.upload();
    };

    UploadVideo.prototype.pollForVideoStatus = function() {
        this.gapi.client.request({
            path: '/youtube/v3/videos',
            params: {
                part: 'status,player',
                id: this.videoId
            },
            callback: function(response) {
                if (response.error) {
                    uploadVideo.pollForVideoStatus();
                } else {
                    var uploadStatus = response.items[0].status.uploadStatus;
                    switch (uploadStatus) {
                        case 'uploaded':
                            uploadVideo.callback('uploaded', uploadVideo.videoURL);
                            uploadVideo.pollForVideoStatus();
                            break;
                        case 'processed':
                            uploadVideo.callback('processed', uploadVideo.videoURL);
                            break;
                        default:
                            uploadVideo.callback('failed', uploadVideo.videoURL);
                            break;
                    }
                }
            }.bind(this)
        });
    };

</script>

<script>
    /* cors_upload.js Copyright 2015 Google Inc. All Rights Reserved. */

    var DRIVE_UPLOAD_URL = 'https://www.googleapis.com/upload/drive/v2/files/';

    var RetryHandler = function() {
        this.interval = 1000; // Start at one second
        this.maxInterval = 60 * 1000; // Don't wait longer than a minute
    };

    RetryHandler.prototype.retry = function(fn) {
        setTimeout(fn, this.interval);
        this.interval = this.nextInterval_();
    };

    RetryHandler.prototype.reset = function() {
        this.interval = 1000;
    };

    RetryHandler.prototype.nextInterval_ = function() {
        var interval = this.interval * 2 + this.getRandomInt_(0, 1000);
        return Math.min(interval, this.maxInterval);
    };

    RetryHandler.prototype.getRandomInt_ = function(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };

    var MediaUploader = function(options) {
        var noop = function() {};
        this.file = options.file;
        this.contentType = options.contentType || this.file.type || 'application/octet-stream';
        this.metadata = options.metadata || {
                'title': this.file.name,
                'mimeType': this.contentType
            };
        this.token = options.token;
        this.onComplete = options.onComplete || noop;
        this.onProgress = options.onProgress || noop;
        this.onError = options.onError || noop;
        this.offset = options.offset || 0;
        this.chunkSize = options.chunkSize || 0;
        this.retryHandler = new RetryHandler();

        this.url = options.url;
        if (!this.url) {
            var params = options.params || {};
            params.uploadType = 'resumable';
            this.url = this.buildUrl_(options.fileId, params, options.baseUrl);
        }
        this.httpMethod = options.fileId ? 'PUT' : 'POST';
    };

    MediaUploader.prototype.upload = function() {
        var self = this;
        var xhr = new XMLHttpRequest();

        xhr.open(this.httpMethod, this.url, true);
        xhr.setRequestHeader('Authorization', 'Bearer ' + this.token);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-Upload-Content-Length', this.file.size);
        xhr.setRequestHeader('X-Upload-Content-Type', this.contentType);

        xhr.onload = function(e) {
            if (e.target.status < 400) {
                var location = e.target.getResponseHeader('Location');
                this.url = location;
                this.sendFile_();
            } else {
                this.onUploadError_(e);
            }
        }.bind(this);
        xhr.onerror = this.onUploadError_.bind(this);
        xhr.send(JSON.stringify(this.metadata));
    };

    MediaUploader.prototype.sendFile_ = function() {
        var content = this.file;
        var end = this.file.size;

        if (this.offset || this.chunkSize) {
            // Only bother to slice the file if we're either resuming or uploading in chunks
            if (this.chunkSize) {
                end = Math.min(this.offset + this.chunkSize, this.file.size);
            }
            content = content.slice(this.offset, end);
        }

        var xhr = new XMLHttpRequest();
        xhr.open('PUT', this.url, true);
        xhr.setRequestHeader('Content-Type', this.contentType);
        xhr.setRequestHeader('Content-Range', 'bytes ' + this.offset + '-' + (end - 1) + '/' + this.file.size);
        xhr.setRequestHeader('X-Upload-Content-Type', this.file.type);
        if (xhr.upload) {
            xhr.upload.addEventListener('progress', this.onProgress);
        }
        xhr.onload = this.onContentUploadSuccess_.bind(this);
        xhr.onerror = this.onContentUploadError_.bind(this);
        xhr.send(content);
    };

    MediaUploader.prototype.resume_ = function() {
        var xhr = new XMLHttpRequest();
        xhr.open('PUT', this.url, true);
        xhr.setRequestHeader('Content-Range', 'bytes */' + this.file.size);
        xhr.setRequestHeader('X-Upload-Content-Type', this.file.type);
        if (xhr.upload) {
            xhr.upload.addEventListener('progress', this.onProgress);
        }
        xhr.onload = this.onContentUploadSuccess_.bind(this);
        xhr.onerror = this.onContentUploadError_.bind(this);
        xhr.send();
    };

    MediaUploader.prototype.extractRange_ = function(xhr) {
        var range = xhr.getResponseHeader('Range');
        if (range) {
            this.offset = parseInt(range.match(/\d+/g).pop(), 10) + 1;
        }
    };

    MediaUploader.prototype.onContentUploadSuccess_ = function(e) {
        if (e.target.status == 200 || e.target.status == 201) {
            this.onComplete(e.target.response);
        } else if (e.target.status == 308) {
            this.extractRange_(e.target);
            this.retryHandler.reset();
            this.sendFile_();
        }
    };

    MediaUploader.prototype.onContentUploadError_ = function(e) {
        if (e.target.status && e.target.status < 500) {
            this.onError(e.target.response);
        } else {
            this.retryHandler.retry(this.resume_.bind(this));
        }
    };

    MediaUploader.prototype.onUploadError_ = function(e) {
        this.onError(e.target.response); // TODO - Retries for initial upload
    };

    MediaUploader.prototype.buildQuery_ = function(params) {
        params = params || {};
        return Object.keys(params).map(function(key) {
            return encodeURIComponent(key) + '=' + encodeURIComponent(params[key]);
        }).join('&');
    };

    MediaUploader.prototype.buildUrl_ = function(id, params, baseUrl) {
        var url = baseUrl || DRIVE_UPLOAD_URL;
        if (id) {
            url += id;
        }
        var query = this.buildQuery_(params);
        if (query) {
            url += '?' + query;
        }
        return url;
    };
</script>-->

<script type="text/javascript">
    Dropzone.options.dropzone =

        {

            maxFiles: 1,
            accept: function(file, done) {
                console.log("uploaded");
                done();
            },
            init: function() {
                this.on("maxfilesexceeded", function(file){
                    alert("No more files please!");
                });
            },


            maxFilesize: 12000000,
            renameFile: function(file) {
                //var dt = new Date();
                // var time = dt.getTime();

                return file.name;
            },
            acceptedFiles: ".pdf,.docx",
            addRemoveLinks: true,
            timeout: 50000,
            removedfile: function(file)
            {
                name = file.upload.filename;
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    type: 'POST',
                    url: '{{ url("profile/profile_cvupload/dlt ") }}',
                    data: {filename: name},
                    success: function (data){
                        console.log("File has been successfully removed!!");
                    },
                    error: function(e) {
                        console.log(e);
                    }});
                var fileRef;
                return (fileRef = file.previewElement) != null ?
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },

            // success: function(file, response)
            //{

            //  $('.filename').replaceWith( "<td  class='filename' style='width: 48%; font-weight: bold;'>"+response.success+"</th>"
            //);


            // console.log(response);
            // },
            // error: function(file, response)
            //{
            //  return false;
            //}
        };

    $('.modal-footer').on('click', '.actionBtn', function() {


        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'POST',
            url: '{{ url("profile/profile_cvupload/pullback") }}',
            data: {filename: name},
            dataType: 'json',
            success: function (data){
                $('.filename').replaceWith( "<td  class='filename' style='width: 48%; font-weight: bold;'>"+data.retrieval[0].filename+"</th>");

            }
        });

    });



    $("#submit-add-cv").click(function(){
        location.reload();
    });




    /* $('.modal-footer').on('click', '.editcv', function() {
     $.ajax({
     type: 'POST',
     url: '/profile/profile_aboutme',
     data: {
     '_token': $('input[name=_token]').val(),
     'id': $("#id").val(),
     'name': $('#name').val()
     },
     success: function(data) {
     $('.user' + data.id).replaceWith(" "+

     "<thead class='user{{$user->id}}'>"+
     "<tr>"+
     "<td class='text-muted'>Name</td>"+
     "<td style='width: 70%; font-weight: bold;'>" + data.name + "</td>"+
     "</tr>"+
     "</thead>");


     $('.pull').replaceWith(
     " "+"<a href='#' class='edit-modal btn btn-sm btn-light pull' data-toggle='modal' data-target='#modal-block-large' data-id='"+data.id+"' data-name='"+data.name+"'><i class='fa fa-fw fa-edit'></i>Edit </a>"
     );



     }
     });
     });
     */

</script>


<!-- commits.js is useless for you! -->
<script>
    window.useThisGithubPath = 'muaz-khan/RecordRTC';
</script>
<script src="https://cdn.webrtc-experiment.com/commits.js" async></script>
<script src="https://apis.google.com/js/client:plusone.js"></script>
@yield('js_after')

</body>
</html>
