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
                    <a href="#" class="edit-modal btn btn-sm btn-light pull" data-toggle="modal" data-target="#modal-block-large" data-id="{{$user->id}}" data-name="{{$user->name}}" data-email="{{$user->email}}" data-ic_no="@foreach($profiles as $profile){{ $profile->ic_no }}@endforeach" data-contact_no="{{$user->contact_no}}" data-address="{{$user->address}}" data-address1="{{$user->address1}}" data-postal_code="{{$user->postal_code}}" data-city="{{$user->city}}" data-state="{{$user->state}}" data-country="{{$user->country}}"  data-dob="{{$user->dob}}" data-gender="{{$user->gender}}">
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
                                <thead>
                                @csrf
                                	<!--<tr class="user{{$user->id}}">
                                        <td class="text-muted">ID</th>
                                        <td style="width: 70%; font-weight: bold;">{{ $user->id }}</th>
                                    </tr>-->
                                    <tr>
                                        <td class="text-muted">Name</th>
                                        <td style="width: 70%; font-weight: bold;">{{ $user->name }}</th>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Email Address</th>
                                        <th style="width: 70%; font-weight: bold;">{{ $user->email }}</th>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Identification No.</th>
                                        <th style="width: 70%; font-weight: bold;">
                                        
											@foreach($profiles as $profile)
                                                                                                    
                                                 {{ $profile->ic_no }} 
                                                           
                                            @endforeach                                             
                                        
                                        
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Contact No.</th>
                                        <th style="width: 70%; font-weight: bold;">{{ $user->contact_no }}</th>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Address</th>
                                        <th style="width: 70%; font-weight: bold;">{{ $user->address }}, {{ $user->address1 }}, {{ $user->postal_code }}, {{ $user->city }}, {{ $user->state }}, {{ $user->country }}</th>
                                    </tr>
                                    <!--<tr>
                                        <th class="text-muted">State</th>
                                        <th style="width: 70%; font-weight: bold;">{{ $user->state }}</th>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Country</th>
                                        <th style="width: 70%; font-weight: bold;">{{ $user->country }}</th>
                                    </tr>-->                                    
                                    <tr>
                                        <th class="text-muted">Date of Birth</th>
                                        <th style="width: 70%; font-weight: bold;">{{ $user->dob }}</th>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Gender</th>
                                        <th style="width: 70%; font-weight: bold;">{{ $user->gender }}</th>
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
                    
                    <form class="js-validation" action="/profile/profile_aboutme" method="post">  
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
                                    

            						<div class="block-content block-content-full">
                                        <div class="">
											<input type="hidden" class="form-control" id="id">
                                            <div class="row items-push">
                                                <div class="col-lg-4">
                                                    <p class="text-muted">
                                                        Kindly update your personal information.
                                                    </p>
                                                </div>
                                                <div class="col-lg-8 col-xl-8">
                                                    <div class="form-group">
                                                        <label for="val-username">Full Name <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="name" name="val-name" placeholder="Ali Bin Abu">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="val-username">Email Address <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="email" placeholder="test@test.comu" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="val-suggestions">Identification No. <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="ic_no" placeholder="999999-99-9999" pattern="[0-9]{6}-[0-9]{2}-[0-9]{4}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="val-suggestions">Contact No. <span class="text-danger">*</span></label>
                                                        <!--<input type="text" class="form-control" id="contact_no" name="val-suggestions" placeholder="Your valid email..">-->
                                                        <input type="text" class="form-control" id="contact_no" placeholder="999-999 9999 or 999-9999 9999" pattern="[0-9]{3}-[0-9]{3} [0-9]{4}|[0-9]{3}-[0-9]{4} [0-9]{4}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="val-suggestions">Address <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="address"  placeholder="Address 1">
                                                    </div>
                                                     <div class="form-group">
                                                        <input type="text" class="form-control" id="address1" placeholder="Address 2">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="val-suggestions">Postal Code <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="postal_code" placeholder="Your valid email..">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="val-suggestions">City <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="city" placeholder="Your valid email..">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="val-suggestions">State <span class="text-danger">*</span></label>
                                                        <!--<input type="text" class="form-control" id="address" name="val-suggestions" placeholder="Your valid email..">-->
                                                        <select class="form-control" id="state" >
                                                        	<option value="" selected>Please Select</option>
                                                        @foreach($states as $key => $state)
                                                            <option value="{{ $state->name }}">{{ $state->name }}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="val-suggestions">Country <span class="text-danger">*</span></label>
                                                        <!--<input type="text" class="form-control" id="country" name="val-suggestions" placeholder="Your valid email..">--> 
                                                        <select class="form-control" id="country" >
                                                        	<option value="" selected>Please Select</option>
                                                        @foreach($countries as $key => $country)
                                                            <option value="{{ $country->nicename }}">{{ $country->nicename }}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="val-suggestions">Date of Birth <span class="text-danger">*</span></label>
                                                        <!--<input type="text" class="form-control" id="dob" name="val-suggestions" placeholder="Your valid email..">-->
                                                        <input type="text" class="js-datepicker form-control" id="dob" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="val-suggestions">Gender <span class="text-danger">*</span></label>
                                                        <!--<input type="text" class="form-control" id="gender" name="val-suggestions" placeholder="Your valid email..">-->
                                                        <select class="form-control" id="gender" >
                                                            <option value="" selected>Please select</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <!-- END Regular -->
                          

                          
                                            <!-- Submit -->
                                            <div class="row items-push">
                                                <div class="col-lg-7 offset-lg-4">
                                                    <button type="submit" class="btn actionBtn"><span id="footer_action_button" class="glyphicon"></span></button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                              <span class="glyphicon glyphicon"></span>Close
                                            </button>
                                                </div>
                                            </div>
                                            
                                            
                                            
                                        <!--<div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                              <span class="glyphicon glyphicon"></span>Close
                                            </button>
                                        
                                            <button type="submit" class="btn actionBtn" data-dismiss="modal">
                                              <span id="footer_action_button" class="glyphicon"></span>
                                            </button>
                                        </div>-->
                                            
                                            
                                            <!-- END Submit -->
                                        </div>
            						</div>
            
            
            
            
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                    <!-- END Fade In Block Modal -->                    
                    
                    
                </div>
            </div>
        </div>

    <!-- jQuery Validation -->
</div>
<!-- END Page Content -->



@endsection
