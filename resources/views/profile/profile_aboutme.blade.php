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
                   @foreach($profiles as $profile)
                    <a href="#" class="edit-modal" data-toggle="modal" data-target="#modal-block-large" data-id="{{$user->id}}" data-name="{{$user->name}}" data-email="{{$user->email}}" data-ic_no="{{ $profile->ic_no }}" data-contact_no="{{ $profile->contact_no }}" data-address="{{ $profile->address }}" data-address1="{{ $profile->address1 }}" data-postal_code="{{ $profile->postal_code }}" data-city="{{ $profile->city }}" data-state="{{ $profile->state }}" data-country="{{ $profile->country }}" data-dob="{{ $profile->dob }}" data-gender="{{ $profile->gender }}">
              			<button class="btn btn-sm btn-primary pull"><i class="fa fa-fw fa-edit"></i> Edit</button>
            		</a>
               		@endforeach
                </div>
            </div>
            <div class="block-content block-content-full">
            
                <div class="">
                                 
                    <!--<div class="table-responsive">

                        <table class="table table-bordered table-striped table-vcenter" >
                            <thead>
                            @csrf
                                <tr>
                                    <th class="text-muted">Name</th>
                                    <th style="width: 80%; font-weight: bold;">{{ $user->name }}</th>
                                </tr>
                                <tr>
                                    <th class="text-muted">Email Address</th>
                                    <th style="width: 80%; font-weight: bold;">{{ $user->email }}</th>
                                </tr>
                                <tr>
                                    <th class="text-muted">Identification No.</th>
                                    <th style="width: 80%; font-weight: bold;">{{ $profile->ic_no }}
                                    </th>
                                </tr>
                                <tr>
                                    <th class="text-muted">Contact No.</th>
                                    <th style="width: 80%; font-weight: bold;">{{ $profile->contact_no }}</th>
                                </tr>
                                <tr>
                                    <th class="text-muted">Address 1</th>
                                    <th style="width: 80%; font-weight: bold;">{{ $profile->address }}</th>
                                </tr>
                                <tr>
                                    <th class="text-muted">Address 2</th>
                                    <th style="width: 80%; font-weight: bold;">{{ $profile->address1 }}</th>
                                </tr>
                                <tr>
                                    <th class="text-muted">Postal Code</th>
                                    <th style="width: 80%; font-weight: bold;">{{ $profile->postal_code }}</th>
                                </tr>
                                <tr>
                                    <th class="text-muted">City</th>
                                    <th style="width: 80%; font-weight: bold;">{{ $profile->city }}</th>
                                </tr>
                                <tr>
                                    <th class="text-muted">State</th>
                                    <th style="width: 80%; font-weight: bold;">{{ $profile->state }}</th>
                                </tr>
                                <tr>
                                    <th class="text-muted">Country</th>
                                    <th style="width: 80%; font-weight: bold;">{{ $profile->country }}</th>
                                </tr>                                    
                                <tr>
                                    <th class="text-muted">Date of Birth</th>
                                    <th style="width: 80%; font-weight: bold;">{{ $profile->dob }}</th>
                                </tr>
                                <tr>
                                    <th class="text-muted">Gender</th>
                                    <th style="width: 80%; font-weight: bold;">{{ $profile->gender }}</th>
                                </tr>

                            </thead>
                        </table>

                     </div>-->
                    
                  
                     <div class="row items-push">
                        <div class="col-lg-6">

                            <div class="form-group row">
                                <label class="col-sm-4" for="example-hf-email">Full Name</label>
                                <div class="col-sm-8" style="font-weight: bold;">{{ $user->name }}</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4" for="example-hf-password">Email Address</label>
                                <div class="col-sm-8" style="font-weight: bold;">{{ $user->email }}</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4" for="example-hf-password">Identification No.</label>
                                <div class="col-sm-8" style="font-weight: bold;">{{ $profile->ic_no }}</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4" for="example-hf-password">Contact No.</label>
                                <div class="col-sm-8" style="font-weight: bold;">{{ $profile->contact_no }}</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4" for="example-hf-password">Date of Birth</label>
                                <div class="col-sm-8" style="font-weight: bold;">{{ $profile->dob }}</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4" for="example-hf-password">Gender</label>
                                <div class="col-sm-8" style="font-weight: bold;">{{ $profile->gender }}</div>
                            </div>

                        </div>
                        
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-sm-4">Address</label>
                                <div class="col-sm-8" style="font-weight: bold;">{{ $profile->address }}</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4" for="example-hf-password"></label>
                                <div class="col-sm-8" style="font-weight: bold;">{{ $profile->address1 }}</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4" for="example-hf-password">Postal Code</label>
                                <div class="col-sm-8" style="font-weight: bold;">{{ $profile->postal_code }}</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4" for="example-hf-password">City</label>
                                <div class="col-sm-8" style="font-weight: bold;">{{ $profile->city }}</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4" for="example-hf-password">State</label>
                                <div class="col-sm-8" style="font-weight: bold;">{{ $profile->state }}</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4" for="example-hf-password">Country</label>
                                <div class="col-sm-8" style="font-weight: bold;">{{ $profile->country }}</div>
                            </div>
                        </div>
                        
                    </div>                                         
                  
                  
                  
                    <!-- Fade In Large Block Modal -->
                    
                    <form id="foreditaboutme" action="/profile/profile_aboutme" method="post">  
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
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Full Name <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="name" name="val-name" placeholder="Ali Bin Abu">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email Address <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="email" placeholder="test@test.comu" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Identification No. <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="ic_no" name="val-ic_no"  placeholder="999999-99-9999" maxlength="14">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Contact No. <span class="text-danger">*</span></label>
      													<input type="text" class="form-control" id="contact_no" name="val-contact_no" placeholder="999-999 9999 or 999-9999 9999" maxlength="12">
                                                        <!--<input type="text" class="form-control" id="contact_no" placeholder="999-999 9999 or 999-9999 9999" pattern="[0-9]{3}-[0-9]{3} [0-9]{4}|[0-9]{3}-[0-9]{4} [0-9]{4}" maxlength="12" required>-->
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label>Date of Birth <span class="text-danger">*</span></label>
                                                        <!--<input type="text" class="form-control" id="dob" name="val-suggestions" placeholder="Your valid email..">-->
                                                        <input type="text" class="js-datepicker form-control" id="dob" name="val-dob" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Gender <span class="text-danger">*</span></label>
                                                        <!--<input type="text" class="form-control" id="gender" name="val-suggestions" placeholder="Your valid email..">-->
                                                        <select class="form-control" id="gender" name="val-gender">
                                                            <option value="" selected>Please select</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                    
                                                </div>
                                                
                                                
                                                <div class="col-lg-6 col-xl-6">
                                                    
                                                    <div class="form-group">
                                                        <label>Address 1<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="address" name="val-address" placeholder="Address 1">
                                                    </div>
                                                     <div class="form-group">
                                                     	<label>Address 2<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="address1" name="val-address1"  placeholder="Address 2">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Postal Code <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="postal_code" name="val-postal_code" placeholder="Your valid email.." maxlength="5" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label>City <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="city" name="val-city" placeholder="Your valid email..">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>State <span class="text-danger">*</span></label>
                                                        <!--<input type="text" class="form-control" id="address" name="val-suggestions" placeholder="Your valid email..">-->
                                                        <select class="form-control" id="state" name="val-state" >
                                                        	<option value="" selected>Please Select</option>
                                                        @foreach($states as $key => $state)
                                                            <option value="{{ $state->name }}">{{ $state->name }}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Country <span class="text-danger">*</span></label>
                                                        <!--<input type="text" class="form-control" id="country" name="val-suggestions" placeholder="Your valid email..">--> 
                                                        <select class="form-control" id="country" name="val-country" >
                                                        	<option value="" selected>Please Select</option>
                                                        @foreach($countries as $key => $country)
                                                            <option value="{{ $country->name }}">{{ $country->name }}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <!-- END Regular -->
                          

                          
                                            <!-- Submit -->
                                            <div class="row items-push">
                                                <div class="col-lg-12 offset-lg-12" align="right">
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
