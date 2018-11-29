@extends('layouts/main-app')
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
                <div class="modal fade" id="modal-block-cv" tabindex="-1" role="dialog" aria-labelledby="modal-block-cv" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="block block-themed block-transparent mb-0">
                                <div class="block-header bg-primary">
                                    <h3 class="block-title"><i class="nav-main-link-icon fa fa-address-card"></i> &nbsp;Resume</h3>
                                    <div class="block-options">

                                    </div>
                                </div>


                                    <div class="block-content">

                                        <div class="block-content block-content-full overflow-hidden">



                                            <h3 class="jumbotron span-text-italic">kindly submit your latest resume in pdf/word format</h3>
                                            <form method="post" action="{{url('profile/profile_cvupload')}}" enctype="multipart/form-data"
                                                  class="dropzone" id="dropzone">
                                                @csrf
                                            </form>


                                        </div>

                                    </div>


                                <div class="modal-footer">

                                    <button type="button" class="btn actionBtn" data-dismiss="modal">
                                        <span id="footer_action_button" class="glyphicon"></span>
                                    </button>

                                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                                        <span class="glyphicon glyphicon"></span>close
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="">
                    <!-- Regular -->
                    <!--<h2 class="content-heading">About Me</h2>-->
                    <div class="row items-push">

                        @if (count($cv) === 0)
                        
						<div class="block-content block-content-full overflow-hidden">


							@if (session('status'))
								<div class="alert alert-success">
									{{ session('status') }}
								</div>
							@endif
                                <h3 class="jumbotron span-text-italic grey-text">Kindly submit your latest resume in PDF/DOCX format</h3>


                                <form method="post" action="{{url('profile/profile_cvupload')}}" enctype="multipart/form-data"
                                      class="dropzone" id="dropzone">
                                    @csrf
                                </form>
                                <div class="modal-footer">



                                    <button  id="submit-add-cv" class="btn btn-warning" data-dismiss="modal">
                                        <span class="glyphicon glyphicon"></span>submit
                                    </button>

                                </div>

                                </div>

                          @endif
                                <div class="form-group">

                                </div>


						</div>                       
                        
                        
                    </div>
                    <!-- END Regular -->
                @if (count($cv) > 0)
                <div class="block-header block-header-default">
                    <h3 class="block-title"><i class="nav-main-link-icon fa fa-address-card"></i> &nbsp;My Resume</h3>

                </div>
                <div    class="block-content block-content-full">
                    <div class="">

                        <div id="dua" class="table-responsive">
                            <table class="table table-borderless table-striped table-vcenter">
                                <thead class="user{{$user->id}}">
                                @csrf
                                <!--<tr class="user{{$user->id}}">
                                        <td class="text-muted">ID</th>
                                        <td style="width: 70%; font-weight: bold;">{{ $user->id }}</th>
                                    </tr>-->
                                <tr>
                                    <td class="text-muted">File Name<form><input type="hidden" class="form-control" id="ide" value={{$user->id }} readonly></form></th>
                                    <td  class="filename" style="width: 48%; font-weight: bold;">@foreach ($cv as $cvs) {{ $cvs->filename}} @endforeach</th>


                                    <td style="width: 20%; font-weight: bold;">


                                        <a href="{{url('cv_uploads/download/')}}">Download File</a>


                                    </th>
                                    <td style="width: 70%; font-weight: bold;">
                                            <a href="#" class="edit-modal btn btn-sm btn-light pull" data-toggle="modal" data-target="#modal-block-cv" data-id="{{$user->id}}" data-name="{{$user->name}}">
                                                <i class="fa fa-fw fa-edit"></i> Replace
                                            </a>
                                        </th>

                                </tr>



                                </thead>

                            </table>
                        </div>

                        <div class="modal fade" id="modal-block-cv" tabindex="-1" role="dialog" aria-labelledby="modal-block-cv" aria-hidden="true">
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
                                        <form class="form-horizontal" role="modal">
                                            <div class="block-content">

                                                <div class="table-responsive">
                                                    <table class="table table-borderless table-striped table-vcenter">
                                                        <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th style="width: 70%;"><input type="text" class="form-control" id="id" readonly></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th style="width: 70%;"><input type="text" class="form-control" id="name"></th>
                                                        </tr>

                                                        </thead>

                                                    </table>
                                                </div>

                                            </div>
                                        </form>
                                        <div class="modal-footer">

                                            <button type="button" class="btn actionBtn editcv" data-dismiss="modal">
                                                <span id="footer_action_button" class="glyphicon"></span>
                                            </button>

                                            <button id="btnupdate" type="button" class="btn btn-warning" data-dismiss="modal">
                                                <span class="glyphicon glyphicon"></span>close
                                            </button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Fade In Block Modal -->


                    </div>
                </div>
                </form>
                    @endif
                    
                </div>





            </div>


        </div>

    <!-- jQuery Validation -->
</div>
<!-- END Page Content -->



@endsection
