@extends('layouts/profile.profile-aboutme-app')

@section('content')

<!-- Page Content -->
<div class="content">
    <!-- jQuery Validation (.js-validation class is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _es6/pages/be_forms_validation.js) -->
    <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
    <form class="js-validation" action="/profile/profile_aboutme" method="post">
        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title"><i class="nav-main-link-icon fa fa-address-card"></i> &nbsp;About Me</h3>
                <div class="block-options">
                    <button type="button" class="btn btn-sm btn-light" data-toggle="modal" data-target="#modal-block-fadein">
                        <i class="fa fa-fw fa-edit"></i> Edit
                    </button>
                </div>
            </div>
            <div class="block-content block-content-full">
                <div class="">
                    <!-- Regular -->
                    <!--<h2 class="content-heading">About Me</h2>-->
                    <div class="row items-push">
                        <!--<div class="col-lg-4">
                            <p class="text-muted">
                                Username, email and password validation made easy for your login/register forms
                            </p>
                        </div>-->
                        <div class="col-lg-2">
                            <div class="form-group text-muted">
                                <label for="val-username">Name</label>
                            </div>
                            <div class="form-group text-muted">
                                <label for="val-username">Email</label>
                            </div>
                            <div class="form-group text-muted">
                                <label for="val-username">Password</label>
                            </div>
                            <div class="form-group text-muted">
                                <label for="val-username">Username</label>
                            </div>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="form-group">
                                <label for="val-username">{{ Auth::user()->name }}</label>
                                
                            </div>
                            <div class="form-group">
                                <label for="val-email">{{ Auth::user()->email }}</label>
                                
                            </div>
                            <div class="form-group">
                                <label for="val-password">{{ Auth::user()->password }}</label>
                                
                            </div>
                            <div class="form-group">
                                <label for="val-confirm-password">{{ Auth::user()->password }}</label>
                                
                            </div>
                        </div>
                    </div>
                    <!-- END Regular -->
  
                    <!-- Submit -->
                    <div class="row items-push">
                        <div class="col-lg-2 offset-lg-2">
                        	<button type="button" class="btn btn-primary push" data-toggle="modal" data-target="#modal-block-fadein">Edit</button>
                            <!--<button type="submit" class="btn btn-primary">Edit</button>-->
                        </div>
                    </div>
                    <!-- END Submit -->
                    
                    
                    <!-- Fade In Block Modal -->
                    <div class="modal fade" id="modal-block-fadein" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="block block-themed block-transparent mb-0">
                                    <div class="block-header bg-primary">
                                        <h3 class="block-title">Modal Title</h3>
                                        <div class="block-options">
                                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="block-content">
                                        <p>Potenti elit lectus augue eget iaculis vitae etiam, ullamcorper etiam bibendum ad feugiat magna accumsan dolor, nibh molestie cras hac ac ad massa, fusce ante convallis ante urna molestie vulputate bibendum tempus ante justo arcu erat accumsan adipiscing risus, libero condimentum venenatis sit nisl nisi ultricies sed, fames aliquet consectetur consequat nostra molestie neque nullam scelerisque neque commodo turpis quisque etiam egestas vulputate massa, curabitur tellus massa venenatis congue dolor enim integer luctus, nisi suscipit gravida fames quis vulputate nisi viverra luctus id leo dictum lorem, inceptos nibh orci.</p>
                                    </div>
                                    <div class="block-content block-content-full text-right bg-light">
                                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Done</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Fade In Block Modal -->                    
                    
                    
                </div>
            </div>
        </div>
    </form>
    <!-- jQuery Validation -->
</div>
<!-- END Page Content -->



@endsection
