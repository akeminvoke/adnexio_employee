@extends('layouts/main-app')

@section('content')

<!-- Page Content -->
<div class="content" >
    <!-- jQuery Validation (.js-validation class is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _es6/pages/be_forms_validation.js) -->
    <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->

        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title"><i class="nav-main-link-icon fa fa-address-card"></i> &nbsp;About Me</h3>
                <div class="block-options">
                    <a href="#" class="edit-modal btn btn-sm btn-light pull" data-toggle="modal" data-target="#modal-block-large" data-id="{{$user->id}}" data-name="{{$user->name}}" data-email="{{$user->email}}" data-ic_no="{{$user->ic_no}}" data-contact_no="{{$user->contact_no}}" data-address="{{$user->address}}" data-dob="{{$user->dob}}" data-gender="{{$user->gender}}" data-nationality="{{$user->nationality}}" >
              			<i class="fa fa-fw fa-edit"></i> Edit
            		</a>
                </div>
            </div>
            <div class="block-content block-content-full">
                <div class="">
                    <!-- Regular -->
                    <!--<h2 class="content-heading">About Me</h2>-->

                        <!--<div class="col-lg-4">
                            <p class="text-muted">
                                Username, email and password validation made easy for your login/register forms
                            </p>
                        </div>-->
                        <!--<div class="col-lg-2">
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
                        </div>-->
                        <!--<div class="col-lg-6 col-xl-5">
                        <input type="hidden" value="{{ $user->id }}">
                            <div class="form-group">
                                <label for="val-username" id="val-username">Name</label>
                                {{ $user->name }}
                            </div>
                            <div class="form-group">
                                <label for="val-email" id="val-email">Email Address</label>
                                {{ $user->email }}
                            </div>
                            <div class="form-group">
                                <label for="val-password" id="val-password">Password</label>
                                {{ $user->password }}
                            </div>
                            <div class="form-group">
                                <label for="val-confirm-password" id="val-confirm-password">Confirm Password</label> 
                                {{ $user->password }}
                            </div>
                        </div>-->
                        <div class="table-responsive">
                            <table class="table table-borderless table-striped table-vcenter">
                                <thead class="user{{$user->id}}">
                                @csrf
                                	<!--<tr class="user{{$user->id}}">
                                        <td class="text-muted">ID</th>
                                        <td style="width: 70%; font-weight: bold;">{{ $user->id }}</th>
                                    </tr>-->
                                    <input type="hidden" class="form-control" value="{{$user->id }}" readonly >
                                    <tr>
                                        <td class="text-muted">Name</th>
                                        <td style="width: 80%; font-weight: bold;">{{ $user->name }}</th>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Email Address</th>
                                        <th style="width: 80%; font-weight: bold;">{{ $user->email }}</th>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Identification No.</th>
                                        <th style="width: 80%; font-weight: bold;">{{ $user->ic_no }}</th>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Contact No.</th>
                                        <th style="width: 80%; font-weight: bold;">{{ $user->contact_no }}</th>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Address</th>
                                        <th style="width: 80%; font-weight: bold;">{{ $user->address }}</th>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Date of Birth</th>
                                        <th style="width: 80%; font-weight: bold;">{{ $user->dob }}</th>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Gender</th>
                                        <th style="width: 80%; font-weight: bold;">{{ $user->gender }}</th>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Nationality</th>
                                        <th style="width: 80%; font-weight: bold;">{{ $user->nationality }}</th>
                                    </tr>

                                </thead>
                                <!--<tbody>
                                    <tr>
                                        <td class="font-w600">
                                            <a href="be_pages_generic_profile.html">Amber Harvey</a>
                                        </td>
                                        <td>client1<em class="text-muted">@example.com</em></td>
                                       
                                    </tr>
                                </tbody>-->
                            </table>
                         </div>
                    
                    <!-- END Regular -->
  
                    <!-- Submit -->
                    <!--<div class="row items-push">
                        <div class="col-lg-2 offset-lg-2">
                        	<button type="button" class="btn btn-primary push" data-toggle="modal" data-target="#modal-block-large">Edit</button>
                        </div>
                    </div>-->
                    <!-- END Submit -->
                    
                    
                    <!-- Fade In Large Block Modal -->
                    <div class="modal fade" id="modal-block-large" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="block block-themed block-transparent mb-0">
                                    <div class="block-header bg-primary">
                                        <h3 class="block-title"><i class="nav-main-link-icon fa fa-address-card"></i> &nbsp;About Me</h3>
                                        <div class="block-options">
                                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <form id="js-validation" role="modal">
                                        <div class="block-content">                                     
                                            <div class="table-responsive">
                                                <table class="table table-borderless table-striped table-vcenter">
                                                    <thead>
                                                        <input type="hidden" class="form-control" id="id">
                                                        <tr>
                                                            <th>Name</th>
                                                            <th style="width: 70%;"><input type="text" class="form-control" id="name" name="val-username"></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Email Address</th>
                                                            <th style="width: 70%;"><input type="email" class="form-control" id="email" readonly></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Identification No.</th>
                                                            <th style="width: 70%;"><input type="text" class="form-control" id="ic_no"></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Contact No.</th>
                                                            <th style="width: 70%;"><input type="text" class="form-control" id="contact_no"></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Address</th>
                                                            <th style="width: 70%;"><input type="text" class="form-control" id="address"></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Date of Birth</th>
                                                            <th style="width: 70%;"><input type="text" class="form-control" id="dob"></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Gender</th>
                                                            <th style="width: 70%;"><input type="text" class="form-control" id="gender"></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Nationality</th>
                                                            <th style="width: 70%;"><input type="text" class="form-control" id="nationality"></th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                             </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                              <span class="glyphicon glyphicon"></span>Close
                                            </button>
                                        
                                            <button type="submit" class="btn actionBtn" data-dismiss="modal">
                                              <span id="footer_action_button" class="glyphicon"></span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Fade In Block Modal -->                    
                    
                    
                </div>
            </div>
        </div>

    <!-- jQuery Validation -->
</div>
<!-- END Page Content -->



@endsection
