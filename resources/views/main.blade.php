@extends('layouts.main-app')

@section('content')

<!-- Hero -->
<!--<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Form Wizard</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Forms</li>
                    <li class="breadcrumb-item active" aria-current="page">Wizard</li>
                </ol>
            </nav>
        </div>
    </div>
</div>-->
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
    <!-- Form Wizards (.js-wizard-* classes are initialized in js/pages/be_forms_wizard.min.js which was auto compiled from _es6/pages/be_forms_wizard.js) -->
    <!-- For more examples you can check out https://github.com/VinceG/twitter-bootstrap-wizard -->
    
    <!-- Validation Wizards -->
    <!--<h2 class="content-heading">Validation Wizards</h2>-->
    <div class="row">
        <div class="col-md-12">
            <!-- Validation Wizard -->
            <div class="js-wizard-validation block block block-rounded block-bordered">
            
                <!-- Wizard Progress Bar -->
                <div class="progress rounded-0" data-wizard="progress" style="height: 8px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <!-- END Wizard Progress Bar -->
                              
                <!-- Step Tabs -->
                <ul class="nav nav-tabs nav-tabs-alt nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#wizard-validation-step1" data-toggle="tab">1. Personal &nbsp;<span data-toggle="popover" data-animation="true" data-placement="top" title="Top Popover" data-content="This is example content. You can put a description or more info here."><i class="fa fa-info-circle"></i></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#wizard-validation-step2" data-toggle="tab">2. Details &nbsp;<span data-toggle="popover" data-animation="true" data-placement="top" title="Top Popover" data-content="This is example content. You can put a description or more info here."><i class="fa fa-info-circle"></i></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#wizard-validation-step3" data-toggle="tab">3. Extra &nbsp;<span data-toggle="popover" data-animation="true" data-placement="top" title="Top Popover" data-content="This is example content. You can put a description or more info here."><i class="fa fa-info-circle"></i></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#wizard-validation-step4" data-toggle="tab">4. More Extra &nbsp;<span data-toggle="popover" data-animation="true" data-placement="top" title="Top Popover" data-content="This is example content. You can put a description or more info here."><i class="fa fa-info-circle"></i></span></a>
                    </li>
                </ul>
                <!-- END Step Tabs -->

                <!-- Form -->
                <form class="js-wizard-validation-form" action="/main/first_login" method="post">
                    <!-- Steps Content -->
                    <div class="block-content block-content-full tab-content" style="min-height: 290px;">
                        <!-- Step 1 -->
                        <div class="tab-pane active" id="wizard-validation-step1" role="tabpanel">
                           <div class="row items-push">
                              <div class="col-lg-6">
                                  <div class="form-group">
                                      <label>Full Name <span class="text-danger">*</span></label>
                                      <input type="text" class="form-control" id="name" name="val-name" value="{{$user->name}}" placeholder="Ali Bin Abu">
                                  </div>
                                  <div class="form-group">
                                      <label>Email Address <span class="text-danger">*</span></label>
                                      <input type="text" class="form-control" id="email" value="{{$user->email}}" placeholder="test@test.comu" disabled>
                                  </div>
                                  @foreach($profiles as $profile)
                                  <div class="form-group">
                                      <label>Identification No. <span class="text-danger">*</span></label>
                                      <input type="text" class="form-control" id="ic_no" name="val-ic_no" value="{{$profile->ic_no}}" placeholder="999999-99-9999" maxlength="14">
                                  </div>
                                  <div class="form-group">
                                      <label>Contact No. <span class="text-danger">*</span></label>
                                      <input type="text" class="form-control" id="contact_no" name="val-contact_no" value="{{$profile->contact_no}}" placeholder="999-999 9999 or 999-9999 9999" maxlength="12">
                                      <!--<input type="text" class="form-control" id="contact_no" placeholder="999-999 9999 or 999-9999 9999" pattern="[0-9]{3}-[0-9]{3} [0-9]{4}|[0-9]{3}-[0-9]{4} [0-9]{4}" maxlength="12" required>-->
                                  </div>
                                  
                                  <div class="form-group">
                                      <label>Date of Birth <span class="text-danger">*</span></label>
                                      <!--<input type="text" class="form-control" id="dob" name="val-suggestions" placeholder="Your valid email..">-->
                                      <input type="text" class="js-datepicker form-control" id="dob" name="val-dob" value="{{$profile->dob}}" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy">
                                  </div>
                                  <div class="form-group">
                                      <label>Gender <span class="text-danger">*</span></label>
                                      <!--<input type="text" class="form-control" id="gender" name="val-suggestions" placeholder="Your valid email..">-->
                                      <select class="form-control" id="gender" name="val-gender">
                                          <option value="option_select" disabled selected>Please Select</option>
                                          <option value="Male" {{ $profile->gender === 'Male' ? 'selected' : '' }}>Male</option>
										  <option value="Female" {{ $profile->gender === 'Female' ? 'selected' : '' }}>Female</option>
                                          <!--<option value="{{ $profile->gender }}" {{$profile->gender == $profile->gender  ? 'selected' : ''}}>{{ $profile->gender}}</option>-->
                                      </select>
                                  </div>               
                               </div>
                                                
                                                
                              <div class="col-lg-6 col-xl-6">
                                  
                                  <div class="form-group">
                                      <label>Address 1<span class="text-danger">*</span></label>
                                      <input type="text" class="form-control" id="address" name="val-address" value="{{$profile->address}}" placeholder="Address 1">
                                  </div>
                                   <div class="form-group">
                                      <label>Address 2<span class="text-danger">*</span></label>
                                      <input type="text" class="form-control" id="address1" name="val-address1" value="{{$profile->address1}}" placeholder="Address 2">
                                  </div>
                                  <div class="form-group">
                                      <label>Postal Code <span class="text-danger">*</span></label>
                                      <input type="text" class="form-control" id="postal_code" name="val-postal_code" value="{{$profile->postal_code}}" placeholder="Your valid email.." maxlength="5" >
                                  </div>
                                  <div class="form-group">
                                      <label>City <span class="text-danger">*</span></label>
                                      <input type="text" class="form-control" id="city" name="val-city" value="{{$profile->city}}" placeholder="Your valid email..">
                                  </div>
                                  <div class="form-group">
                                      <label>State <span class="text-danger">*</span></label>
                                      <!--<input type="text" class="form-control" id="address" name="val-suggestions" placeholder="Your valid email..">-->
                                      <select class="form-control" id="state" name="val-state">
                                          <option value="option_select" disabled selected>Please Select</option>
                                          @foreach($states as $state)
                                              <option value="{{ $state->name }}" {{$profile->state == $state->name  ? 'selected' : ''}}>{{ $state->name}}</option>
                                          @endforeach
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label>Country <span class="text-danger">*</span></label>
                                      <!--<input type="text" class="form-control" id="country" name="val-suggestions" placeholder="Your valid email..">--> 
                                      <select class="form-control" id="country" name="val-country" >
                                          <option value="option_select" disabled selected>Please Select</option>
                                          @foreach($countries as $country)
                                              <option value="{{ $country->name }}" {{$profile->country == $country->name  ? 'selected' : ''}}>{{ $country->name}}</option>
                                          @endforeach
                                      </select>
                                  </div>
                                  @endforeach
                              </div>
                           </div>
                        </div>
                        <!-- END Step 1 -->

                        <!-- Step 2 -->
                        <div class="tab-pane" id="wizard-validation-step2" role="tabpanel">
                            <div class="form-group">
                                <label for="wizard-validation-bio">Bio</label>
                                <textarea class="form-control" id="wizard-validation-bio" name="wizard-validation-bio" rows="7"></textarea>
                            </div>
                        </div>
                        <!-- END Step 2 -->

                        <!-- Step 3 -->
                        <div class="tab-pane" id="wizard-validation-step3" role="tabpanel">
                            <div class="form-group">
                                <label for="wizard-validation-location">Location</label>
                                <input class="form-control" type="text" id="wizard-validation-location" name="wizard-validation-location">
                            </div>
                            <div class="form-group">
                                <label for="wizard-validation-skills">Skills</label>
                                <select class="form-control" id="wizard-validation-skills" name="wizard-validation-skills">
                                    <option value="">Please select your best skill</option>
                                    <option value="1">Photoshop</option>
                                    <option value="2">HTML</option>
                                    <option value="3">CSS</option>
                                    <option value="4">JavaScript</option>
                                </select>
                            </div>
                            
                        </div>
                        <!-- END Step 3 -->
                        
                        <!-- Step 4 -->
                        <div class="tab-pane" id="wizard-validation-step4" role="tabpanel">
                            <div class="form-group">
                                <label for="wizard-validation-location">Location</label>
                                <input class="form-control" type="text" id="wizard-validation-location" name="wizard-validation-location">
                            </div>
                            <div class="form-group">
                                <label for="wizard-validation-skills">Skills</label>
                                <select class="form-control" id="wizard-validation-skills" name="wizard-validation-skills">
                                    <option value="">Please select your best skill</option>
                                    <option value="1">Photoshop</option>
                                    <option value="2">HTML</option>
                                    <option value="3">CSS</option>
                                    <option value="4">JavaScript</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox custom-control-primary">
                                    <input type="checkbox" class="custom-control-input" id="wizard-validation-terms" name="wizard-validation-terms">
                                    <label class="custom-control-label" for="wizard-validation-terms">Agree with the terms</label>
                                </div>
                            </div>
                        </div>
                        <!-- END Step 4 -->
                    </div>
                    <!-- END Steps Content -->

                    <!-- Steps Navigation -->
                    <div class="block-content block-content-sm block-content-full bg-body-light rounded-bottom">
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="btn btn-secondary" data-wizard="prev">
                                    <i class="fa fa-angle-left mr-1"></i> Previous
                                </button>
                            </div>
                            <div class="col-6 text-right">
                                <button type="button" class="btn btn-secondary" data-wizard="next">
                                    Next <i class="fa fa-angle-right ml-1"></i>
                                </button>
                                <button type="submit" class="btn btn-primary d-none" data-wizard="finish">
                                    <i class="fa fa-check mr-1"></i> Submit
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- END Steps Navigation -->
                </form>
                <!-- END Form -->
            </div>
            <!-- END Validation Wizard Classic -->
        </div>
    </div>
    <!-- END Validation Wizards -->
</div>
<!-- END Page Content -->

</main>
<!-- END Main Container -->





@endsection
