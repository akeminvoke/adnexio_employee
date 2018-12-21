@extends('layouts.welcome-app')

@section('content')

<div class="bg-section-1">
	<div class="container">
        <div class="row align-items-center no-gutters section-1-padding">
            <div class="col">
                <div class="row justify-content-center no-gutters">
                    <div class="col-6">
                    	<div class="register-form">
                            <div class="container">
                            	<h4 class="text-white"> Create Account</h4>
                                <h5 class="text-white">fill in below to create an account</h5>
                                <br />
                                <form class="js-validation-signup" action="{{ route('register') }}" method="post">

                                  <div class="form-row">
                                    <!--<div class="col form-group">
										<label for="exampleInputEmail1">Username</label>
                                      <input type="text" id="name" name="name" class="form-style form-control form-control-sm" >
                                    </div>-->

                                    <div class="col form-group">
										<label for="exampleInputEmail1">Full Name</label>
                                      <input type="text" class="form-style form-control form-control-sm" >
                                    </div>
                                  </div>


									@if ($errors->has('email'))

                                				<strong>The email address has been taken. Try another.</strong>

									@endif
                                  <div class="form-row">
                                    <div class="col form-group">
										<label for="exampleInputEmail1">Email Address</label>
										<input type="text" name="email" class="form-style form-control form-control-sm  {{ $errors->has('email') ? ' is-invalid' : '' }}" >
                                    </div>
                                  </div>

                                  <div class="form-row">
                                    <div class="col form-group">
										<label for="exampleInputPassword1">Password</label>
                                      <input type="password" id="password" name="password" class="form-style form-control form-control-sm form-style" >
                                    </div>
									<div class="col form-group">
										<label for="exampleInputPassword1"> Comfirm Password</label>
										<input type="password" id="password-confirm" name="password_confirmation" class="form-style form-control form-control-sm" >
									</div>
										<input type="hidden" id="role_id" name="role_id" value="1">
									</div>
									<div class="form-row">
										<div class="col form-group">
											<br>
                                  			<button type="submit" class="btn btn-md btn-adnexio-white mt-1 bg-light"><strong>CREATE ACCOUNT</strong></button>
										</div>
									</div>
                                </form>
                            </div>
                         </div>
                    </div>
                     <div class="col-6 align-self-center">
                        <center>
                            <h1 class="text-white">Don't Look for a Job</h1>
							<h1 class="text-white"><strong>Adnexio</strong> bring it you</h1><br>
                            <h2 class="text-white">Register Now</h2>
                        </center>
                    </div>
                  </div>
            </div>
        </div>
     </div>
</div>
<div class="nex p-3 bg-dark">
	<div class="row justify-content-center no-gutters">
		<div class="col-11">
			<div class="row justify-content-center no-gutters">
				<div class="col">
					<center>
						<h2 class="text-white">hello my name is NEX &nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-md btn-adnexio-white mt-1 bg-light">MEET NEX</button></h2>
					</center>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="section2" class="row align-items-center no-gutters ">
    <div class="col">
    	<div class="container section-2-padding">
      		<div class="row justify-content-center no-gutters">
			    <div class="col-10">
			    	<div class="row">
			    		<div class="col">
					    	<center>
						    	<p><strong>Adnexio</strong> is Latin for connecting.</p>
						    	<p>We use a mechine learning and artificial intelligrnce<br>
						    	to bring you the best career that matches your skill<br>
						    	education, salary and individually</p>
						    </center>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-10">
							<hr>
						</div>
					</div>
					<div class="row justify-content-center">
			    		<div class="col-md-4">
						    	<h3>Jobseekers  &nbsp;<i class="fas fa-search"></i></h3>
						    	<p>Joint thousands of professionals on adnexio.</p>
						    	<p>Fill in your education and work experience details.</p>
						    	<p>Complete the personality and essay tests.</p>
						    	<p>Take the 5 minutes online interview.</p>
						    	<p>Every day, we analyse thausands of vacancies to find the perfect career match for you.</p>
						</div>
						<div class="col--md-1">
							<div>

							</div>
						</div>
						<div class="col-md-7">
						    	<h3>Employers</h3>
						    	<p>Get access to instant job-fit assessment of thousands of professionals on adnexio.</p>
						    	<p>advertise vacancies in you organization for FREE.</p>
						    	<p>Our artificial intelligence systems runs analytics on prospective candidates' education, job experience, IQ, personality and video interviews to rate suitability.</p>
						    	<p>We refers only the candidates who match your requirement.</p>
						    	<p>Employers can now cut up to 80% of the recruitment process because we have done it for you and browse shortlisted applicants and choose the top match for a final interview.</p>
						</div>
					</div>
			    </div>
			</div>
		</div>
    </div>
</div>
<div class="bg-section-3">
	<div class="row align-items-center no-gutters ">
	    <div class="col">
	    	<div class="container section-3-padding">
	      		<div class="row justify-content-center no-gutters">
				    <div class="col-10">
						<div class="row justify-content-center">
				    		<div class="col-md-5">
				    			<center>
				    				<p><img class="circle-img" src="{{ asset('media/photos/franck-v-516603-unsplash.jpg') }}" height="250" width="250"><p>
							    	<h4>Job Analytics.</h4>
							    	<p>We use data analytics to develop adnexio's machine learning.</p>
							    	<p>Adnexio works (almost) like a real-life career coach. It goes through your resume, educational background, grades in school, your hobbies, personality, salary expectation to access you.</p>
							    	<p>It compares your essay and personality test with thousands of other applicants to rank you.</p>
							    	<p>Adnexio analytically rates your interview video to assess your confidence level, leadership traits and personality.</p>
							    	<p>With four layers of analytical assessments, using machine learning and artificial intelligence to compare thousands of applicants, adnexio can match top applicants with the best available vacancies.</p>
							    </center>
							</div>
							<div class="col--md-1">
							</div>
							<div class="col-md-5">
								<center>
									<p><img class="circle-img" src="{{ asset('media/photos/glenn-carstens-peters-203007-unsplash.jpg') }}" height="250" width="250"><p>
							    	<h3>Career Coach</h3>
							    	<p>When you join adnexio, we will continuously work to help you improve your assessment score, to increase your chance of being matched to the best vacancy available.</p>
							    	<p>We do this iteratively, mush like machine learning algorithms iteratively going through thousands of vacancies and applicants each day. You can regularly see how you fare compared to other applicants and why you were not picked for availablevacancies.</p>
							    	<p>More importantly, adnexio makes sugestions of courses and steps you need to take to improve your assessment score, so that you can be matched with the next best vacancy available.</p>
							    	<p>This iterative self-improvement process will guide you to grow in whatever career you choose.</p>

							    </center>
							</div>
						</div>
				    </div>
				</div>
			</div>
	    </div>
	</div>
</div>


@endsection
