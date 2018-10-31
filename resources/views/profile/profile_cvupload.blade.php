@extends('layouts/profile-app')

@section('content')

<!-- Page Content -->
<div class="content">
    <!-- jQuery Validation (.js-validation class is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _es6/pages/be_forms_validation.js) -->
    <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->

        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title"><i class="nav-main-link-icon fa fa-paperclip"></i> &nbsp;Upload Resume/CV</h3>
            </div>
            <div class="block-content block-content-full">
                <div class="">
                    <!-- Regular -->
                    <!--<h2 class="content-heading">About Me</h2>-->
                    <div class="row items-push">
                        
						<div class="block-content block-content-full overflow-hidden">


							@if (session('status'))
								<div class="alert alert-success">
									{{ session('status') }}
								</div>
							@endif

							<form action="{{ url('home') }}" method="post" enctype="multipart/form-data">
								<div class="form-group">
								@csrf


									<label for="exampleInputFile">File input</label>
									<input type="file" name="profile_image" id="exampleInputFile">

								</div>

								<button type="submit" class="btn btn-default">Submit</button>
							</form> 

						</div>                       
                        
                        
                    </div>
                    <!-- END Regular -->
  
                  
                    
                    
                </div>
            </div>
        </div>
    </form>
    <!-- jQuery Validation -->
</div>
<!-- END Page Content -->



@endsection
