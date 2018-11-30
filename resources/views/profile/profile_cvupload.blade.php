@extends('layouts/main-app')
@section('content')
<!-- Page Content -->
<div class="content">
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
                                <h3 class="block-title"><i class="nav-main-link-icon fa fa-address-card"></i> &nbsp;Upload Resume/CV</h3>
                                <div class="block-options">

                                </div>
                            </div>


                                <div class="block-content">

                                    <div class="block-content block-content-full overflow-hidden">



                                        <h3 class="jumbotron span-text-italic">Kindly submit your latest resume in PDF/DOCX format</h3>
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
                                    <span class="glyphicon glyphicon"></span>Close
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="">
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
                        
                        <div class="form-group">
    
                        </div>
                            
                        <div align="right">
                                <button  id="submit-add-cv" class="btn btn-primary" data-dismiss="modal">
                                    <span class="glyphicon glyphicon"></span>Upload
                                </button>
                        </div>



                     </div>

                      @endif



                </div>                       
                           
            </div>

    
            @if (count($cv) > 0)
            <!--<div class="block-header block-header-default">
                <h3 class="block-title"><i class="nav-main-link-icon fa fa-address-card"></i> &nbsp;My Resume</h3>

            </div>-->

            <div class="">

                <div id="dua" class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter">
                        <thead class="user{{$user->id}}">
                        @csrf
                        <tr>

                            <td style="width: 48%;">File Name</td>
                            <td style="width: 20%;">Action</td>
                            <!--<td style="width: 70%;">Replace</td>-->
                        </tr>
                        <tr>

                            	<form><input type="hidden" class="form-control" id="ide" value={{$user->id }} readonly></form>

                            <td class="filename" style="width: 48%; font-weight: bold;">@foreach ($cv as $cvs) {{ $cvs->filename}} @endforeach</td>
                            <td style="width: 20%; font-weight: bold;">
                                <a href="{{url('cv_uploads/download/')}}"><button class="btn btn-sm btn-primary pull"><i class="fa fa-file-download"></i> &nbsp;Download</button></a>
                                <a href="#" class="edit-modal" data-toggle="modal" data-target="#modal-block-cv" data-id="{{$user->id}}" data-name="{{$user->name}}">
                                    <button class="btn btn-sm btn-default pull"><i class="fa fa-fw fa-edit"></i> Replace</button>
                                </a>
                            </td>
                            <!--<td style="width: 70%; font-weight: bold;">
                                <a href="#" class="edit-modal btn btn-sm btn-light pull" data-toggle="modal" data-target="#modal-block-cv" data-id="{{$user->id}}" data-name="{{$user->name}}">
                                    <i class="fa fa-fw fa-edit"></i> Replace
                                </a>
                            </td>-->
                        </tr>
                        </thead>
                    </table>
                </div>

            </div>

            
                @endif
                
        </div>
    </div>
</div>
<!-- END Page Content -->



@endsection
