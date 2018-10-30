@extends('layouts/video_interview.video_recording_app')

@section('content')

<!-- Page Content -->
<div class="content">
    <div class="row row-deck">
   
        <!-- Main Video Recording Function -->
        <div class="col-xl-6" data-toggle="appear">
            <div class="block block-rounded block-mode-loading-refresh invisible" data-toggle="appear">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Video Interview</h3>
                    <div class="block-options">
                       
                        <!--<input type="radio" name="dashboard-chart-options" id="dashboard-chart-options-week"> Week-->
                        <button id="btn-start-recording" class="btn btn-primary">
                            <i class="fa fa-fw fa-play mr-1"></i> Start Recording
                        </button>
                        
                        <button id="btn-pause-recording" class="btn btn-secondary" style="display: none;">
                            <i class="fa fa-fw fa-pause mr-1"></i>Pause
                        </button>

                    </div>
                </div>
                <div class="inline-content inline-content-full overflow-hidden">
                    <div style="text-align: center; margin:0 -15px;" id="recording-player"></div>
                    
                    <!--<select class="recording-media">
                        <option value="record-audio-plus-video">Microphone+Camera</option>
                        <option value="record-audio">Microphone</option>
                        <option value="record-screen">Full Screen</option>
                        <option value="record-audio-plus-screen">Microphone+Screen</option>
                    </select>-->
                    
                    <input type="hidden" class="form-control form-control-alt recording-media" value="record-audio-plus-video">
    
                    <!--<span style="font-size: 15px;">into</span>-->
    
                    <!--<select class="media-container-format">
                        <option>default</option>
                        <option>vp8</option>
                        <option>vp9</option>
                        <option>h264</option>
                        <option>mkv</option>
                        <option>opus</option>
                        <option>ogg</option>
                        <option>pcm</option>
                        <option>gif</option>
                        <option>whammy</option>
                    </select>-->
    
                    <input type="hidden" class="form-control form-control-alt media-container-format" placeholder="Search Users..">
    
                    <!--<input type="checkbox" id="chk-timeSlice" style="margin:0;width:auto;" title="Use intervals based recording">
                    <label for="chk-timeSlice" style="font-size: 15px;margin:0;width: auto;cursor: pointer;-webkit-user-select:none;user-select:none;" title="Use intervals based recording">Use timeSlice?</label>-->
    
    
                    <!--<button id="btn-start-recording">Start Recording</button>
                    <button id="btn-pause-recording" style="display: none; font-size: 15px;">Pause</button>-->
    
                    <!--<hr style="border-top: 0;border-bottom: 1px solid rgb(189, 189, 189);margin: 4px -12px;margin-top: 8px;">-->
                    
                    <!--<select class="media-resolutions">
                        <option value="default">Default resolutions</option>
                        <option value="1920x1080">1080p</option>
                        <option value="1280x720">720p</option>
                        <option value="640x480">480p</option>
                        <option value="3840x2160">4K Ultra HD (3840x2160)</option>
                    </select>-->
                    
                    <input type="hidden" class="form-control form-control-alt media-resolutions" value="default">
    
                    <!--<select class="media-framerates">
                        <option value="default">Default framerates</option>
                        <option value="5">5 fps</option>
                        <option value="15">15 fps</option>
                        <option value="24">24 fps</option>
                        <option value="30">30 fps</option>
                        <option value="60">60 fps</option>
                    </select>-->
                    
                    <input type="hidden" class="form-control form-control-alt media-framerates" value="default">  
                                              
                    <!--<select class="media-bitrates">
                        <option value="default">Default bitrates</option>
                        <option value="8000000000">1 GB bps</option>
                        <option value="800000000">100 MB bps</option>
                        <option value="8000000">1 MB bps</option>
                        <option value="800000">100 KB bps</option>
                        <option value="8000">1 KB bps</option>
                        <option value="800">100 Bytes bps</option>
                    </select>-->
                    
                    <input type="hidden" class="form-control form-control-alt media-bitrates" value="default">
                    
                    <div class="block-content block-content-full overflow-hidden" style="text-align: center; display: none;">
                        <!--<button id="save-to-disk">Save To Disk</button>-->
                        <button id="upload-to-php" class="btn btn-success">
                            Submit your video interview
                        </button>
                        <!--<button id="open-new-tab">Open New Tab</button>-->
                    </div>
                </div>  
            </div>
        </div>
        <!-- END Main Video Recording Function -->
     
     
        <!-- Question Function -->
        <div class="col-xl-6 invisible" data-toggle="appear">
            <div class="block block-rounded block-mode-loading-refresh invisible" data-toggle="appear">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Question To Answer</h3>
                    <div class="block-options" >
                        <button id ="questionbtn" class=" btn btn-primary " onclick="myFunction()">Next Question</button>
                    </div>
                </div>
                <div class="block-content block-content-full overflow-hidden">

                    <!--<div class ="header-box">
                        <div class="text-right" id ="clockdiv"></div>
                    </div>
                    
                    <hr>-->

                    <!--<h1 class="block-title">Answer The Following Question:-</h1>-->
                    <div style="text-align: center;">Time Remaining (Minutes)<br></div>
                    <div style="text-align: center;" id ="clockdiv"><font size="+2"><strong>0:30</strong></font></div>

                    <p>&nbsp;</p>

                    <div class="text-center">
                        <h3 class="font-w700  font-italic"  id="demo"></h3>
                    </div>

                </div>
            </div>
        </div>
        <!-- END Question Function -->

    </div>


    <!-- Dynamic Table Full -->
    <div class="block block-rounded block-mode-loading-refresh invisible" data-toggle="appear">
        <div class="block-header block-header-default">
            <h3 class="block-title">Past Recorded Video</h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">No.</th>
                        <th>Video Name</th>
                        <!--<th class="d-none d-sm-table-cell" style="width: 15%;">Recorded On</th>-->
                        <th style="width: 20%;">Recorded On</th>
                        <th class="text-center" style="width: 15%;">Result</th>
                    </tr>
                </thead>
                <tbody>

                @foreach($videos as $key => $video)

                    <tr>
                        <td class="text-center">{{ ++$key }}</td>
                        <td class="font-w600">
                            <a href="https://s3.ap-southeast-1.amazonaws.com/adnexio-video-webrtc/{{ $video->video_name }}">{{ $video->video_name }}</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            {{ $video->created_at }}
                        </td>
                        <td class="text-center">
                            <span class="badge badge-success"><font size="+1">80%</font></span>
                        </td>
                    </tr>
                  
                @endforeach 

                </tbody>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table Full -->                       
        
                         
</div>
<!-- END Page Content -->



<!-- Hero -->
<!--<div class="bg-image" style="background-image: url('assets/media/various/bg_dashboard.jpg');">
    <div class="bg-white-90">
        <div class="content content-full">
            <div class="row">
                <div class="col-md-6 d-md-flex align-items-md-center">
                    <div class="py-4 py-md-0 text-center text-md-left invisible" data-toggle="appear">
                        <h1 class="font-size-h2 mb-2">Dashboard</h1>
                        <h2 class="font-size-lg font-w400 text-muted mb-0">Today is a great one!</h2>
                    </div>
                </div>
                <div class="col-md-6 d-md-flex align-items-md-center">
                    <div class="row w-100 text-center">
                        <div class="col-6 col-xl-4 offset-xl-4 invisible" data-toggle="appear" data-timeout="300">
                            <p class="font-size-h3 font-w600 text-body-color-dark mb-0">
                                67
                            </p>
                            <p class="font-size-sm font-w700 text-uppercase mb-0">
                                <i class="far fa-chart-bar text-muted mr-1"></i> Sales
                            </p>
                        </div>
                        <div class="col-6 col-xl-4 invisible" data-toggle="appear" data-timeout="600">
                            <p class="font-size-h3 font-w600 text-body-color-dark mb-0">
                                $980
                            </p>
                            <p class="font-size-sm font-w700 text-uppercase mb-0">
                                <i class="far fa-chart-bar text-muted mr-1"></i> Earnings
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->
<!-- END Hero -->

@endsection
