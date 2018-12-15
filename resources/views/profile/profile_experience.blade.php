@extends('layouts/main-app')

@section('content')


    <!-- Page Content -->
    <div class="content">


        <div class="block-header block-header-default">
            <h3 class="block-title"><i class="nav-main-link-icon fa fa-briefcase"></i> &nbsp;Experience</h3>
            <div class="block-options">
				<div id="add-experience-btn" class=" ">
					<div class="col-md-2 float-right @if (count($Company_Names) === 0)hide @endif ">
						<button type="button" id="add-experience" class="btn btn-primary add-experience float-right">
							<i class="fa fa-fw fa-plus mr-1"></i>
						</button>
					</div>
				</div>
            </div>
        </div>
        <div id="experience_prev"  >
            @foreach ($Company_Names as $Company_Name)
                <div id="{{$Company_Name->id}}" class="block block-rounded block-bordered">
                    <div  class=" block-content block-content-full">
                        <div class="row">
                            <div class="col-lg-9" id="lbl_preview_output_date_join_mobile_0">
                                <h4 class="custom-control-data-label">
                                    {{$Company_Name->start_month}}&nbsp{{$Company_Name->start_year}} & @if(strlen($Company_Name->jd_present) > 2) {{$Company_Name->jd_present}}  @endif
                                    @if(strlen($Company_Name->jd_present) < 2)  {{$Company_Name->end_month}}&nbsp{{$Company_Name->end_year}}@endif
                                </h4>
                            </div>




								<div class="col-md-2 float-right">
									<table>
										<tr>
											<td>
											   <a href="#" class="edit-experience pull" data-toggle="modal" data-target="#modal-block-large" data-id="{{$user->id}}" data-name="{{$user->name}}"
												   data-position="{{$Company_Name->position}}" data-company_name="{{$Company_Name->name}}"    data-jd_start_year-edit="{{$Company_Name->start_year}}"
												   data-jd_start_month-edit="{{$Company_Name->start_month}}"   data-specialization-edit="{{$Company_Name->specialization_id}}"
												   data-jobspecification-edit="{{$Company_Name->job_specifications_id}}" data-endyear-edit="{{$Company_Name->end_year}}" data-endmonth-edit="{{$Company_Name->end_month}}"
												   data-salary-edit="{{$Company_Name->salary}}"    data-id-edit="{{$Company_Name->id}}" data-job-desc-edit="{{$Company_Name->job_desc}}" data-present-edit="{{$Company_Name->jd_present}}">

													<button class="btn btn-sm btn-primary pull"><i class="nav-main-link-icon fa fa-edit"></i> Edit</button>
												</a>
											</td>
											<td>        
											    <form action="{{'/profile/profile_experience/delete'}}" method="Post" >
												  <input type="hidden"  id="val-experience-delete"  name="valexperiencedelete" value="{{$Company_Name->id}}">
											   <button class="btn btn-sm btn-primary pull submit-experience-delete">
											   <i class="nav-main-link-icon fa fa-trash-alt "></i> Delete
											   </button>

												</form>
											</td>
										</tr>
									</table>
								</div>



                           
                            <!--<div class="col-lg-1">
                               

                                <a href="#" class="edit-experience pull" data-toggle="modal" data-target="#modal-block-large" data-id="{{$user->id}}" data-name="{{$user->name}}"
                                   data-position="{{$Company_Name->position}}" data-company_name="{{$Company_Name->name}}"    data-jd_start_year-edit="{{$Company_Name->start_year}}"
                                   data-jd_start_month-edit="{{$Company_Name->start_month}}"   data-specialization-edit="{{$Company_Name->specialization_id}}"
                                   data-jobspecification-edit="{{$Company_Name->job_specifications_id}}" data-endyear-edit="{{$Company_Name->end_year}}" data-endmonth-edit="{{$Company_Name->end_month}}"
                                   data-salary-edit="{{$Company_Name->salary}}"    data-id-edit="{{$Company_Name->id}}" data-job-desc-edit="{{$Company_Name->job_desc}}" data-present-edit="{{$Company_Name->jd_present}}">

                                    <button class="btn btn-sm btn-primary pull"><i class="nav-main-link-icon fa fa-edit"></i> Edit</button>
                                </a>
                            </div>

                            <div class="col-lg-1">

                                <form action="{{'/profile/profile_experience/delete'}}" method="Post" >
                                  <input type="hidden"  id="val-experience-delete"  name="valexperiencedelete" value="{{$Company_Name->id}}">
                               <button class="btn btn-sm btn-primary pull submit-experience-delete">
                               <i class="nav-main-link-icon fa fa-trash-alt "></i> Delete
                               </button>

                                </form>

                            </div>-->
                        </div>

                       <div class="row">

                            <div class="col-md-4">
                                <label class="custom-control-data-label" id="lbl_experience_industry">Position</label>
                            </div>
                            <div class="col-md-4">
                                <label id="lbl_experience_industry_output">{{$Company_Name->position}}</label>
                            </div>
                        </div>
                       
                        <div class="row">

                            <div class="col-md-4">
                                <label class="custom-control-data-label" id="lbl_experience_industry">Company Name</label>
                            </div>
                            <div class="col-md-4">
                                <label id="lbl_experience_industry_output">{{$Company_Name->name}}</label>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-4">
                                <label class="custom-control-data-label" id="lbl_experience_industry">Industry</label>
                            </div>
                            <div class="col-md-4">
                                <label id="lbl_experience_industry_output"> {{$Company_Name->Job_Background}}  </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="custom-control-data-label" id="lbl_experience_role">Job Role</label>
                            </div>
                            <div class="col-md-4">
                                <label id="lbl_experience_role_output">@if($Company_Name->job_specification === null){{$Company_Name->pjs}} @endif

                                        @if($Company_Name->pjs === null){{$Company_Name->job_specification}}
                                    </label>
                                @endif
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
        


        <!-- jQuery Validation (.js-validation class is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _es6/pages/be_forms_validation.js) -->
        <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
        <!-- <div class="block-header block-header-default">

            </div> -->

        <form id ="foradd"  method="post"  action="/profile/profile_experience/store"  class="js-validation">
            <div class="block block-rounded">
                <div id="experiences" class="block-content block-content-full experience-section" @if (count($Company_Names) > 0)style="display:none" @endif >

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
                                    </div>
                                <div class="form-group-special">
                                    <div class="row">
                                    <div class="col-sm-5">
                                    <select class="half-second" id="val-jd-start-year" name="val-jd-start-year" >
                                        <option disabled selected>year</option>
                                        <option>1948</option>
                                        <option>1949</option>
                                        <option>1950</option>
                                        <option>1951</option>
                                        <option>1952</option>
                                        <option>1953</option>
                                        <option>1954</option>
                                        <option>1955</option>
                                        <option>1956</option>
                                        <option>1957</option>
                                        <option>1958</option>
                                        <option>1959</option>
                                        <option>1960</option>
                                        <option>1961</option>
                                        <option>1962</option>
                                        <option>1963</option>
                                        <option>1964</option>
                                        <option>1965</option>
                                        <option>1966</option>
                                        <option>1967</option>
                                        <option>1968</option>
                                        <option>1969</option>
                                        <option>1970</option>
                                        <option>1971</option>
                                        <option>1972</option>
                                        <option>1973</option>
                                        <option>1974</option>
                                        <option>1975</option>
                                        <option>1976</option>
                                        <option>1977</option>
                                        <option>1978</option>
                                        <option>1979</option>
                                        <option>1980</option>
                                        <option>1981</option>
                                        <option>1982</option>
                                        <option>1983</option>
                                        <option>1984</option>
                                        <option>1985</option>
                                        <option>1986</option>
                                        <option>1987</option>
                                        <option>1988</option>
                                        <option>1989</option>
                                        <option>1990</option>
                                        <option>1991</option>
                                        <option>1992</option>
                                        <option>1993</option>
                                        <option>1994</option>
                                        <option>1995</option>
                                        <option>1996</option>
                                        <option>1997</option>
                                        <option>1998</option>
                                        <option>1999</option>
                                        <option>2000</option>
                                        <option>2001</option>
                                        <option>2002</option>
                                        <option>2003</option>
                                        <option>2004</option>
                                        <option>2005</option>
                                        <option>2006</option>
                                        <option>2007</option>
                                        <option>2008</option>
                                        <option>2009</option>
                                        <option>2010</option>
                                        <option>2011</option>
                                        <option>2012</option>
                                        <option>2013</option>
                                        <option>2014</option>
                                        <option>2015</option>
                                        <option>2016</option>
                                        <option>2017</option>
                                        <option>2018</option>
                                    </select>
                                        </div>
                                        <div class="col-sm-5">
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
                                    </div>
                                    <div class="row">

                                        <div class="col-sm-1"><label>-</label> </div>
                                    </div>


                                    <div class="row">
                                     <div class="col-sm-5">
                                    <select class="half-second form-control" id="val-jd-end-year" name="val-jd-end-year" style="  width: 26%;margin-left: 4%;
">
                                        <option disabled="" selected="" value="0">-year-</option>
                                        <option>1948</option>
                                        <option>1949</option>
                                        <option>1950</option>
                                        <option>1951</option>
                                        <option>1952</option>
                                        <option>1953</option>
                                        <option>1954</option>
                                        <option>1955</option>
                                        <option>1956</option>
                                        <option>1957</option>
                                        <option>1958</option>
                                        <option>1959</option>
                                        <option>1960</option>
                                        <option>1961</option>
                                        <option>1962</option>
                                        <option>1963</option>
                                        <option>1964</option>
                                        <option>1965</option>
                                        <option>1966</option>
                                        <option>1967</option>
                                        <option>1968</option>
                                        <option>1969</option>
                                        <option>1970</option>
                                        <option>1971</option>
                                        <option>1972</option>
                                        <option>1973</option>
                                        <option>1974</option>
                                        <option>1975</option>
                                        <option>1976</option>
                                        <option>1977</option>
                                        <option>1978</option>
                                        <option>1979</option>
                                        <option>1980</option>
                                        <option>1981</option>
                                        <option>1982</option>
                                        <option>1983</option>
                                        <option>1984</option>
                                        <option>1985</option>
                                        <option>1986</option>
                                        <option>1987</option>
                                        <option>1988</option>
                                        <option>1989</option>
                                        <option>1990</option>
                                        <option>1991</option>
                                        <option>1992</option>
                                        <option>1993</option>
                                        <option>1994</option>
                                        <option>1995</option>
                                        <option>1996</option>
                                        <option>1997</option>
                                        <option>1998</option>
                                        <option>1999</option>
                                        <option>2000</option>
                                        <option>2001</option>
                                        <option>2002</option>
                                        <option>2003</option>
                                        <option>2004</option>
                                        <option>2005</option>
                                        <option>2006</option>
                                        <option>2007</option>
                                        <option>2008</option>
                                        <option>2009</option>
                                        <option>2010</option>
                                        <option>2011</option>
                                        <option>2012</option>
                                        <option>2013</option>
                                        <option>2014</option>
                                        <option>2015</option>
                                        <option>2016</option>
                                        <option>2017</option>
                                        <option>2018</option>
                                    </select>
                                     </div>
                                        <div class="col-sm-5">
                                    <select class="half-second form-control" id="val-jd-end-month" name="val-jd-end-month" >
                                        <option disabled="" selected="" value="0" aria-describedby="val-specialization-error" aria-invalid="true" >-month-</option>
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
                                        <div class="col-sm-1">
                                            <input type="checkbox" id="val-present" value="Present" class="myCheckbox form-check-input" data-end-y="val-jd-end-year" data-end-m="val-jd-end-month"  style="
                                            margin-left: 1rem;
                                            "><label style="margin-left: 2rem;">Present</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="val-email">Job Background<span class="text-danger">*</span></label>
                                    <select class="form-control" id="val-specialization" name="val-specialization" aria-describedby="val-specialization-error" aria-invalid="true">
                                        <option disabled="" selected="" value="0">select your Job Background </option>
                                        <option value="1">Accounting/Finance</option>
                                        <option value="2">Admin/Human Resources</option>
                                        <option value="3">Arts/Media/Communications</option>
                                        <option value="4">Building/Construction</option>
                                        <option value="5">Computer/Information Technology</option>
                                        <option value="6">Education/Training</option>
                                        <option value="7">Engineering</option>
                                        <option value="8">Healthcare</option>
                                        <option value="9">Hotel/Restaurant</option>
                                        <option value="10">Manufacturing</option>
                                        <option value="11">Sales/Marketing</option>
                                        <option value="12">Sciences</option>
                                        <option value="13">Services</option>
                                        <option value="14">Others</option>
                                    </select>
                                </div>




                                <div class="form-group">
                                    <label for="val-email">Job Specification<span class="text-danger">*</span></label>
                                    <select class="form-control" id="val-job-specification" name="val-job-specification" aria-describedby="val-specialization-error" aria-invalid="true">
                                    </select>

                                </div>

                                <div id="keyword-job-specification" class="form-group hide">
                                    <label for="val-email">please state your job specification<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="val-keyin-job-spec" name="val-keyin-job-spec" placeholder="Enter your company name">

                                </div>



                                <div class="form-group">
                                    <label for="val-email">Monthly Salary (RM)<span class="text-danger">*</span></label>
                                    <select class="form-control" id="val-salary" name="val-salary"   >
                                        <option disabled selected>please choose your salary range</option>
                                        <option>Below then 1,000</option>
                                        <option>1,000 to  3,000</option>
                                        <option>3,001 to 5,000 </option>
                                        <option>5,001 to 7,000</option>
                                        <option>7,001 to 10,000</option>
                                        <option>10,000 to 15,000</option>
                                        <option>16,001 to 20,000</option>
                                        <option>20,001 to 25,000</option>
                                        <option>25,001 to 30,000</option>
                                        <option>30,001 to 35,000</option>
                                        <option>35,001 to 40,000</option>
                                        <option>45,001 to 50,000</option>
                                        <option>above 50,000</option>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="val-email">Job Description<span class="text-danger"></span></label>
                                    <textarea class="form-control" id="val-job-desc" name="val-job-desc" rows="4" placeholder="Describe your experience "></textarea>
                                </div>


                            </div>
                        </div>
                        <!-- END Regular -->



                        <!-- Submit -->
                        <div class="row items-push">
                            <div class="col-sm-2 offset-sm-1 submit-experience" style="
    padding-left: 37rem";>
                                <button type="submit" class="btn btn-primary submit-experience">Submit</button>
                            </div>

                            <div class="col-sm-1 offset-sm-1 cancel-submit-experience btn btn-primary @if (count($Company_Names) === 0)hide @endif">
                                Cancel
                            </div>
                        </div>
                        <!-- END Submit -->
                    </div>

                </div>
            </div>

        </form>

        </div>


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

                            <form id="foredit"  method="post" action="/profile/profile_experience/update">

                                <div id="experiences" class="block-content block-content-full experience-section">

                                    <div class="block-content block-content-full">
                                        <div class="">
                                            <!-- Regular -->
                                            <h2 class="content-heading">Experience</h2>
                                            <div class="row items-push">
                                                <div class="col-lg-2" ></div>
                                                <div class="col-lg-8 col-xl-8">
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
                                                            <option>1954</option>
                                                            <option>1955</option>
                                                            <option>1956</option>
                                                            <option>1957</option>
                                                            <option>1958</option>
                                                            <option>1959</option>
                                                            <option>1960</option>
                                                            <option>1961</option>
                                                            <option>1962</option>
                                                            <option>1963</option>
                                                            <option>1964</option>
                                                            <option>1965</option>
                                                            <option>1966</option>
                                                            <option>1967</option>
                                                            <option>1968</option>
                                                            <option>1969</option>
                                                            <option>1970</option>
                                                            <option>1971</option>
                                                            <option>1972</option>
                                                            <option>1973</option>
                                                            <option>1974</option>
                                                            <option>1975</option>
                                                            <option>1976</option>
                                                            <option>1977</option>
                                                            <option>1978</option>
                                                            <option>1979</option>
                                                            <option>1980</option>
                                                            <option>1981</option>
                                                            <option>1982</option>
                                                            <option>1983</option>
                                                            <option>1984</option>
                                                            <option>1985</option>
                                                            <option>1986</option>
                                                            <option>1987</option>
                                                            <option>1988</option>
                                                            <option>1989</option>
                                                            <option>1990</option>
                                                            <option>1991</option>
                                                            <option>1992</option>
                                                            <option>1993</option>
                                                            <option>1994</option>
                                                            <option>1995</option>
                                                            <option>1996</option>
                                                            <option>1997</option>
                                                            <option>1998</option>
                                                            <option>1999</option>
                                                            <option>2000</option>
                                                            <option>2001</option>
                                                            <option>2002</option>
                                                            <option>2003</option>
                                                            <option>2004</option>
                                                            <option>2005</option>
                                                            <option>2006</option>
                                                            <option>2007</option>
                                                            <option>2008</option>
                                                            <option>2009</option>
                                                            <option>2010</option>
                                                            <option>2011</option>
                                                            <option>2012</option>
                                                            <option>2013</option>
                                                            <option>2014</option>
                                                            <option>2015</option>
                                                            <option>2016</option>
                                                            <option>2017</option>
                                                            <option>2018</option>
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
                                                    <div id="" class="row form-group-special" style="padding-left: 9rem";>
                                                        <div  id="end-duration-edit" class="end-duration-edit">
                                                        <select class="half-third-custom" id="val-jd-end-year-edit" name="val-jd-end-year-edit">
                                                            <option disabled selected>year</option>
                                                            <option>1948</option>
                                                            <option>1949</option>
                                                            <option>1950</option>
                                                            <option>1951</option>
                                                            <option>1952</option>
                                                            <option>1953</option>
                                                            <option>1954</option>
                                                            <option>1955</option>
                                                            <option>1956</option>
                                                            <option>1957</option>
                                                            <option>1958</option>
                                                            <option>1959</option>
                                                            <option>1960</option>
                                                            <option>1961</option>
                                                            <option>1962</option>
                                                            <option>1963</option>
                                                            <option>1964</option>
                                                            <option>1965</option>
                                                            <option>1966</option>
                                                            <option>1967</option>
                                                            <option>1968</option>
                                                            <option>1969</option>
                                                            <option>1970</option>
                                                            <option>1971</option>
                                                            <option>1972</option>
                                                            <option>1973</option>
                                                            <option>1974</option>
                                                            <option>1975</option>
                                                            <option>1976</option>
                                                            <option>1977</option>
                                                            <option>1978</option>
                                                            <option>1979</option>
                                                            <option>1980</option>
                                                            <option>1981</option>
                                                            <option>1982</option>
                                                            <option>1983</option>
                                                            <option>1984</option>
                                                            <option>1985</option>
                                                            <option>1986</option>
                                                            <option>1987</option>
                                                            <option>1988</option>
                                                            <option>1989</option>
                                                            <option>1990</option>
                                                            <option>1991</option>
                                                            <option>1992</option>
                                                            <option>1993</option>
                                                            <option>1994</option>
                                                            <option>1995</option>
                                                            <option>1996</option>
                                                            <option>1997</option>
                                                            <option>1998</option>
                                                            <option>1999</option>
                                                            <option>2000</option>
                                                            <option>2001</option>
                                                            <option>2002</option>
                                                            <option>2003</option>
                                                            <option>2004</option>
                                                            <option>2005</option>
                                                            <option>2006</option>
                                                            <option>2007</option>
                                                            <option>2008</option>
                                                            <option>2009</option>
                                                            <option>2010</option>
                                                            <option>2011</option>
                                                            <option>2012</option>
                                                            <option>2013</option>
                                                            <option>2014</option>
                                                            <option>2015</option>
                                                            <option>2016</option>
                                                            <option>2017</option>
                                                            <option>2018</option>
                                                        </select>
                                                        <select class="half-third-custom" id="val-jd-end-month-edit" name="val-jd-end-month-edit" >
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

                                                        <input type="checkbox" id="present-edit" class="myCheckbox-edit form-check-input-edit-custom"  value="Present" data-duration-edit="end-duration-edit" /><p class="present"> Present</p>
                                                    </div>
                                                    {{--<div class="form-group">--}}
                                                        {{--<label for="val-email">Specialization<span class="text-danger">*</span></label>--}}
                                                        {{--<select class="form-control" id="specialization-edit" name="val-specialization-edit">--}}
                                                            {{--<option disabled selected>please choose your specialization</option>--}}
                                                            {{--<option>human resource</option>--}}
                                                            {{--<option>programmer</option>--}}
                                                            {{--<option>example</option>--}}

                                                        {{--</select>--}}
                                                    {{--</div>--}}

                                                    <div class="form-group">
                                                        <label for="val-email">Job Background<span class="text-danger">*</span></label>
                                                        <select class="form-control" id="specialization-edit" name="val-specialization-edit" aria-describedby="val-specialization-error" aria-invalid="true">
                                                            <option disabled="" selected="" value="0">select your Job Background </option>
                                                            <option value="1">Accounting/Finance</option>
                                                            <option value="2">Admin/Human Resources</option>
                                                            <option value="3">Arts/Media/Communications</option>
                                                            <option value="4">Building/Construction</option>
                                                            <option value="5">Computer/Information Technology</option>
                                                            <option value="6">Education/Training</option>
                                                            <option value="7">Engineering</option>
                                                            <option value="8">Healthcare</option>
                                                            <option value="9">Hotel/Restaurant</option>
                                                            <option value="10">Manufacturing</option>
                                                            <option value="11">Sales/Marketing</option>
                                                            <option value="12">Sciences</option>
                                                            <option value="13">Services</option>
                                                            <option value="14">Others</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="val-email">Job Specification<span class="text-danger">*</span></label>
                                                        <select class="form-control" id="job-specification-edit" name="val-job-specification" aria-describedby="val-specialization-error" aria-invalid="true">
                                                            {{--<option disabled="" selected="" value="0">select your Job Specification</option>--}}
                                                            {{--<option value="1">Audit &amp; Taxation </option>--}}
                                                            {{--<option value="2">Banking/Financial </option>--}}
                                                            {{--<option value="3">Corporate Finance/Investment </option>--}}
                                                            {{--<option value="4">General/Cost Accounting </option>--}}
                                                            {{--<option disabled="" selected="" value="0">select your Job Specification</option>--}}
                                                            {{--<option value="5">Clerical/Administrative </option>--}}
                                                            {{--<option value="6">Human Resources </option>--}}
                                                            {{--<option value="7">Secretarial </option>--}}
                                                            {{--<option value="8">Top Management </option>--}}
                                                            {{--<option disabled="" selected="" value="0">select your Job Specification</option>--}}
                                                            {{--<option value="9">Advertising </option>--}}
                                                            {{--<option value="10">Arts/Creative Design </option>--}}
                                                            {{--<option value="11">Entertainment </option>--}}
                                                            {{--<option value="12">Public Relations </option>--}}
                                                        </select>

                                                    </div>

                                                    <div id="keyword-job-specification-edit" class="form-group hide">
                                                        <label for="val-email">Please State Your Job Specification<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="keyin-job-spec-edit" name="keyin-job-spec-edit" placeholder="Please specify your job specification">

                                                    </div>



                                                    <div class="form-group">
                                                        <label for="val-email">Monthly Salary (Ringgit Malaysia)<span class="text-danger">*</span></label>
                                                        <select class="form-control" id="salary-edit" name="val-salary-edit"   >
                                                            <option disabled selected>please choose your salary range</option>
                                                            <option>Below then 1,000</option>
                                                            <option>1,000 to  3,000</option>
                                                            <option>3,001 to 5,000 </option>
                                                            <option>5,001 to 7,000</option>
                                                            <option>7,001 to 10,000</option>
                                                            <option>10,000 to 15,000</option>
                                                            <option>16,001 to 20,000</option>
                                                            <option>20,001 to 25,000</option>
                                                            <option>25,001 to 30,000</option>
                                                            <option>30,001 to 35,000</option>
                                                            <option>35,001 to 40,000</option>
                                                            <option>45,001 to 50,000</option>
                                                            <option>above 50,000</option>
                                                        </select>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="val-email">Job Description<span class="text-danger">*</span></label>
                                                        <textarea class="form-control" id="job-desc-edit" name="val-job-desc-edit" rows="4" placeholder="Describe your experience "></textarea>
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
