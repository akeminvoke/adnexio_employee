@extends('layouts/main-app')

@section('content')


    <!-- Page Content -->
    <div class="content">


        <div class="block-header block-header-default">
            <h3 class="block-title"></h3>
            <div class="block-options">

            </div>
        </div>
        <div id="experience_prev" >
            @foreach ($Company_Names as $Company_Name)
                <div id="{{$Company_Name->id}}" class="block block-rounded block-bordered">
                    <div  class=" block-content block-content-full">
                        <div class="row">
                            <div class="col-lg-9" id="lbl_preview_output_date_join_mobile_0">
                                <h4 class="custom-control-data-label">
                                    {{$Company_Name->start_month}}&nbsp{{$Company_Name->start_year}} &  {{$Company_Name->end_month}}&nbsp{{$Company_Name->end_year}}
                                </h4>
                            </div>


                            <div class="col-lg-1">
                                <!-- Modal link -->
                                <a href="#" class="btn btn-primary edit-experience btn btn-sm btn-light pull" data-toggle="modal" data-target="#modal-block-large" data-id="{{$user->id}}" data-name="{{$user->name}}"
                                   data-position="{{$Company_Name->position}}" data-company_name="{{$Company_Name->name}}"    data-jd_start_year-edit="{{$Company_Name->start_year}}"
                                   data-jd_start_month-edit="{{$Company_Name->start_month}}"   data-specialization-edit="{{$Company_Name->specialization}}"  data-position_level-edit="{{$Company_Name->position_level}}"
                                   data-salary-edit="{{$Company_Name->salary}}"    data-id-edit="{{$Company_Name->id}}"  >

                                    <i class="fa fa-edit fa-2x"></i>Edit
                                </a>
                            </div>

                            <div class="col-lg-1">
                                <button   type="button" id="add-experience" class="btn btn-primary add-experience">
                                    <i class="fa fa-fw fa-plus mr-1"></i>
                                </button>
                            </div>
                            <div class="col-lg-1">

                                <i class="fa fa-trash-alt fa-2x"></i>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="custom-control-data-label" id="lbl_experience_industry">Industry</label>
                            </div>
                            <div class="col-md-4">
                                <label id="lbl_experience_industry_output">Advertising / Marketing / Promotion / PR</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="custom-control-data-label" id="lbl_experience_role">Role</label>
                            </div>
                            <div class="col-md-4">
                                <label id="lbl_experience_role_output">{{$Company_Name->specialization}}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="custom-control-data-label" id="lbl_experience_position_level">Position Level</label>
                            </div>
                            <div class="col-md-4">
                                <label  id="lbl_experience_position_level_output">{{$Company_Name->position_level}}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="custom-control-data-label" id="lbl_experience_salary">Monthly Salary</label>
                            </div>
                            <div class="col-md-4">
                                <label id="lbl_preview_output_monthly_salary_0">{{$Company_Name->salary}} </label>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div id="add-experience-btn" clas="row">
            <div class="col-md-2 float-right">
                <button   type="button" id="add-experience" class="btn btn-primary add-experience float-right">
                    <i class="fa fa-fw fa-plus mr-1"></i>
                </button>
            </div>
        </div>


        <!-- jQuery Validation (.js-validation class is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _es6/pages/be_forms_validation.js) -->
        <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
        <!-- <div class="block-header block-header-default">
            </div> -->
        <form id ="foradd" method="post" class="js-validationn">
            <div class="block block-rounded">
                <div id="experiences" class="block-content block-content-full experience-section @if (count($experiences) > 0)hide @endif">
                    <div class="">
                        <!-- Regular -->
                        <h2 class="content-heading">Experience</h2>
                        <div class="row items-push">
                            <div class="col-lg-4">
                                <p class="text-muted">
                                    Username, email and password validation made easy for your login/register forms
                                </p>
                            </div>
                            <div class="col-lg-8 col-xl-5">

                                <br />



                                <div class="form-group">
                                    <label for="val-username">Position <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="val-position" name="val-position" placeholder="Enter your position">

                                </div>

                                <div class="form-group">
                                    <label for="val-email">Company Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="val-company-name" name="val-company-name" placeholder="Enter your company name">

                                </div>

                                <div class="form-group">
                                    <label for="val-password">Joined Duration <span class="text-danger">*</span></label>
                                    <select class="half-second" id="val-jd-start-year" name="val-jd-start-year" >
                                        <option disabled selected>year</option>
                                        <option>1948</option>
                                        <option>1949</option>
                                        <option>1950</option>
                                        <option>1951</option>
                                        <option>1952</option>
                                        <option>1953</option>
                                    </select>
                                    <select class="half-second" id="val-jd-start-month"  name="val-jd-start-month" >
                                        <option disabled selected>month</option>
                                        <option>Jan</option>
                                        <option>Feb</option>
                                        <option>Mar</option>
                                        <option>Apr</option>
                                        <option>May</option>
                                        <option>Jun</option>
                                        <option>Jul</option>
                                        <option>Aug</option>
                                        <option>Sep</option>
                                        <option>Oct</option>
                                        <option>Nov</option>
                                        <option>Dec</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <labell class ="label-join" for="val-confirm-password">to <span class="text-danger">*</span></labell>

                                </div>
                                <div class="form-group-special">
                                    <select class="half-third" id="val-jd-end-year" name="val-jd-end-year">
                                        <option>1948</option>
                                        <option>1949</option>
                                        <option>1950</option>
                                        <option>1951</option>
                                        <option>1952</option>
                                        <option>1953</option>
                                    </select>
                                    <select class="half-third" id="val-jd-end-month" name="val-jd-end-month" >
                                        <option>month</option>
                                        <option>Jan</option>
                                        <option>Feb</option>
                                        <option>Mar</option>
                                        <option>Apr</option>
                                        <option>May</option>
                                        <option>Jun</option>
                                        <option>Jul</option>
                                        <option>Aug</option>
                                        <option>Sep</option>
                                        <option>Oct</option>
                                        <option>Nov</option>
                                        <option>Dec</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="val-email">Specialization<span class="text-danger">*</span></label>
                                    <select class="form-control" id="val-specialization" name="val-specialization">
                                        <option disabled selected>please choose your specialization</option>
                                        <option>human resource</option>
                                        <option>programmer</option>
                                        <option>example</option>

                                    </select>


                                </div>

                                <div class="form-group">
                                    <label for="val-email">Position Level<span class="text-danger">*</span></label>
                                    <select class="form-control" id="val-position-level" name="val-position-level">
                                        <option disabled selected>please choose your Position Level</option>
                                        <option value="Senior Manager">Senior Manager</option>
                                        <option value="Manager">Manager</option>
                                        <option value="Senior Excutive">Senior Executive</option>
                                        <option value="Junior Excutive">Junior Executive</option>
                                    </select>

                                </div>


                                <div class="form-group">
                                    <label for="val-email">Salary (in Ringgit Malaysia currency)<span class="text-danger">*</span></label>
                                    <select class="form-control" id="val-salary" name="val-salary"   >
                                        <option disabled selected>please choose your salary range</option>
                                        <option>Below then 1,000</option>
                                        <option>1,000 to RM 3,000</option>
                                        <option>3,001 to 5,000 </option>
                                        <option>5,001 to 7,000</option>
                                        <option>7,001 to 10,000</option>
                                        <option>10,000 to 15,000</option>
                                        <option>16,001 to 20,000</option>
                                        <option>20,001 to 25,000</option>
                                        <option>25,001 to 30,000</option>
                                        <option>30,001 to 35,000</option>
                                    </select>

                                </div>


                            </div>
                        </div>
                        <!-- END Regular -->



                        <!-- Submit -->s
                        <div class="row items-push">
                            <div class="col-lg-7 offset-lg-4 submit-experience">
                                <button type="submit" class="btn btn-primary submit-experience">Submit</button>
                            </div>
                        </div>
                        <!-- END Submit -->
                    </div>

                </div>
            </div>
        </form>




        <!-- END Page Content -->
        <!-- Modal Content -->
        <div class="modal fade" id="modal-block-large" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary">
                            <h3 class="block-title"><i class="nav-main-link-icon fa fa-address-card"></i> &nbsp;Experience</h3>

                        </div>
                        <div class="block block-rounded block-bordered">

                            <form id="foredit"  method="post">

                                <div id="experiences" class="block-content block-content-full experience-section">

                                    <div class="block-content block-content-full">
                                        <div class="">
                                            <!-- Regular -->
                                            <h2 class="content-heading">Experience</h2>
                                            <div class="row items-push">
                                                <div class="col-lg-2">

                                                </div>
                                                <div class="col-lg-10 col-xl-8">
                                                    <br />
                                                    <input type="hidden" class="form-control" id="id-edit" name="id-edit" >
                                                    <div class="form-group">
                                                        <label for="val-username">Position <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="position-edit" name="val-position-edit" placeholder="Enter your position">

                                                    </div>

                                                    <div class="form-group">
                                                        <label for="val-email">Company Name<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="company_name-edit" name="val-company-name-edit" placeholder="Enter your company name">

                                                    </div>

                                                    <div class="form-group">
                                                        <label for="val-password">Joined Duration <span class="text-danger">*</span></label>
                                                        <select class="half-second" id="jd_start_year-edit" name="val-jd-start-year-edit" >
                                                            <option disabled selected>year</option>
                                                            <option>1948</option>
                                                            <option>1949</option>
                                                            <option>1950</option>
                                                            <option>1951</option>
                                                            <option>1952</option>
                                                            <option>1953</option>
                                                        </select>
                                                        <select class="half-second" id="jd_start_month-edit"  name="val-jd-start-month-edit" >
                                                            <option disabled selected>month</option>
                                                            <option>Jan</option>
                                                            <option>Feb</option>
                                                            <option>Mar</option>
                                                            <option>Apr</option>
                                                            <option>May</option>
                                                            <option>Jun</option>
                                                            <option>Jul</option>
                                                            <option>Aug</option>
                                                            <option>Sep</option>
                                                            <option>Oct</option>
                                                            <option>Nov</option>
                                                            <option>Dec</option>
                                                        </select>
                                                    </div>


                                                    <div class="form-group">
                                                        <labell class ="label-join" for="val-confirm-password">to <span class="text-danger">*</span></labell>

                                                    </div>
                                                    <div class="form-group-special">
                                                        <select class="half-third" id="val-jd-end-year-edit" name="val-jd-end-year-edit">
                                                            <option disabled selected>year</option>
                                                            <option>1948</option>
                                                            <option>1949</option>
                                                            <option>1950</option>
                                                            <option>1951</option>
                                                            <option>1952</option>
                                                            <option>1953</option>
                                                        </select>
                                                        <select class="half-third" id="val-jd-end-month-edit" name="val-jd-end-month-edit" >
                                                            <option>month</option>
                                                            <option>Jan</option>
                                                            <option>Feb</option>
                                                            <option>Mar</option>
                                                            <option>Apr</option>
                                                            <option>May</option>
                                                            <option>Jun</option>
                                                            <option>Jul</option>
                                                            <option>Aug</option>
                                                            <option>Sep</option>
                                                            <option>Oct</option>
                                                            <option>Nov</option>
                                                            <option>Dec</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="val-email">Specialization<span class="text-danger">*</span></label>
                                                        <select class="form-control" id="specialization-edit" name="val-specialization-edit">
                                                            <option disabled selected>please choose your specialization</option>
                                                            <option>human resource</option>
                                                            <option>programmer</option>
                                                            <option>example</option>

                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="val-email">Position Level<span class="text-danger">*</span></label>
                                                        <select class="form-control" id="position_level-edit" name="val-position-level-edit">
                                                            <option disabled selected>please choose your Position Level</option>
                                                            <option value="Senior Manager">Senior Manager</option>
                                                            <option value="Manager">Manager</option>
                                                            <option value="Senior Excutive">Junior Executive</option>
                                                            <option value="Junior Excutive">Junior Executive</option>
                                                        </select>
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="val-email">Salary (in Ringgit Malaysia currency)<span class="text-danger">*</span></label>
                                                        <select class="form-control" id="salary-edit" name="val-salary-edit"   >
                                                            <option disabled selected>please choose your salary range</option>
                                                            <option>Below then 1,000</option>
                                                            <option>1,000 to RM 3,000</option>
                                                            <option>3,001 to 5,000 </option>
                                                            <option>5,001 to 7,000</option>
                                                            <option>7,001 to 10,000</option>
                                                            <option>10,000 to 15,000</option>
                                                            <option>16,001 to 20,000</option>
                                                            <option>20,001 to 25,000</option>
                                                            <option>25,001 to 30,000</option>
                                                            <option>30,001 to 35,000</option>
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END Regular -->



                                        <!-- Submit -->
                                        <div class="row items-push">
                                            <div class="col-lg-7 offset-lg-4 submit-experience-edit">
                                                <button type="submit" class="btn btn-primary submit-experience-edit">Submit</button>
                                            </div>
                                        </div>
                                        <!-- END Submit -->
                                    </div>
                                </div>
                            </form>


                            <!-- jQuery Validation -->
                        </div>
                        <div class="modal-footer">



                            <button type="button" class="btn btn-warning" data-dismiss="modal">
                                <span class="glyphicon glyphicon"></span>close
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
