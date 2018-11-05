<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>{{ config('app.name') }}</title>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
	<link rel="shortcut icon" href="{{ asset('assets/media/favicons/ic_favicon.png') }}">
    
    @yield('css_before')
    
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{!! asset('assets/js/plugins/select2/css/select2.min.css') !!}">  

    <!-- Fonts and Styles -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
    <link rel="stylesheet" href="{!! asset('assets/css/dashmix.css') !!}">   

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
                            <img class="img-avatar img-avatar48" src="{{ asset('media/avatars/avatar10.jpg') }}" alt="">
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
                            <i class="nav-main-link-icon si si-home"></i>
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
                                    <span class="nav-main-link-name">Record Video</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link{{ request()->is('video/video_pastrecord') ? ' active' : '' }}" href="/video/video_pastrecord">
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
                            <a class="img-link mr-1" href="javascript:void(0)">
                                <img class="img-avatar img-avatar48" src="{{ asset('assets/media/avatars/'. $user->avatar.'.jpg') }}" alt="">
                            </a>
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
                        Crafted with <i class="fa fa-heart text-danger"></i> by <a class="font-w600" href="https://goo.gl/vNS3I" target="_blank">INVOKE Malaysia</a>
                    </div>
                    <div class="col-sm-6 order-sm-1 text-center text-sm-left">
                        <a class="font-w600" href="https://goo.gl/mDBqx1" target="_blank">Adnexio</a> &copy; <span data-toggle="year-copy">2018</span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END Footer -->
    </div>
    <!-- END Page Container -->


    <!-- Dashmix Core JS -->
    <script src="{!! asset('assets/js/dashmix.core.min.js') !!}"></script>
   
    <!-- Dashmix JS -->
    <!--<script src="{{ mix('js/dashmix.app.js') }}"></script>-->
    <script src="{!! asset('assets/js/dashmix.app.min.js') !!}"></script>

    <!-- Page JS Select2 -->
    <script src="{!! asset('assets/js/plugins/select2/js/select2.full.min.js') !!}"></script>
    <script src="{!! asset('assets/js/plugins/jquery-validation/jquery.validate.min.js') !!}"></script>
    <script src="{!! asset('assets/js/plugins/jquery-validation/additional-methods.js') !!}"></script>

    <!-- Page JS Helpers (jQuery Sparkline plugin) -->
    <script>jQuery(function(){ Dashmix.helpers('select2'); });</script>
    
    <!-- Page JS Form Validation -->
    <script src="{!! asset('assets/js/pages/be_forms_validation.min.js') !!}"></script>      

    @yield('js_after')
       
</body>
</html>
