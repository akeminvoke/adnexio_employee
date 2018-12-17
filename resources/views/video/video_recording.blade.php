@extends('layouts/main-app')

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
                    <div style="text-align: center; margin:0 -15px; display: none;" id="recording-player"></div> 
                    
                 <div style="text-align: center; margin:0 -15px;" >  
                 <p id="positions"><b>Click</b></p>

				 <video autoplay id="videoElement" width="662" height="524"></video>
                    
                 </div>  
                    

				

				<!--<input type='button' value='submit' name='button1' class='capture' /> -->
				

				
	
					<p id="positions"></p>

	
                    
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


<script src="{!! asset('assets/js/build/utils.js') !!}"></script>
<script src="{!! asset('assets/js/build/clmtrackr.js') !!}"></script>


<script>
    (function() {
        var params = {},
            r = /([^&=]+)=?([^&]*)/g;

        function d(s) {
            return decodeURIComponent(s.replace(/\+/g, ' '));
        }

        var match, search = window.location.search;
        while (match = r.exec(search.substring(1))) {
            params[d(match[1])] = d(match[2]);

            if(d(match[2]) === 'true' || d(match[2]) === 'false') {
                params[d(match[1])] = d(match[2]) === 'true' ? true : false;
            }
        }

        window.params = params;
    })();

    function addStreamStopListener(stream, callback) {
        var streamEndedEvent = 'ended';

        if ('oninactive' in stream) {
            streamEndedEvent = 'inactive';
        }

        stream.addEventListener(streamEndedEvent, function() {
            callback();
            callback = function() {};
        }, false);

        stream.getAudioTracks().forEach(function(track) {
            track.addEventListener(streamEndedEvent, function() {
                callback();
                callback = function() {};
            }, false);
        });

        stream.getVideoTracks().forEach(function(track) {
            track.addEventListener(streamEndedEvent, function() {
                callback();
                callback = function() {};
            }, false);
        });
    }
</script>

<script>

    var B  = 0;
    var time_in_minutes = 5.0;
	var total_time_in_seconds = time_in_minutes * 60;


    //var capitals001 = [ "hello", "question1", "question1","question1"/*  @foreach ($questions as $question)
    //    {!!json_encode($question->question)!!},
    //    @endforeach*/
    //];
	
	var capitals001 = [   @foreach ($questions as $question)
        {!!json_encode($question->question)!!},
        @endforeach
    ];
	

    var capitals002=[];

    var i = 5;

    while ( 1 <  i  ) {
        var x = Math.floor((Math.random() * capitals001.length ));


        //  document.getElementById("demo").innerHTML = capitals001[x];
        var name = capitals001.splice(x, 1);

        capitals002.push(name);


        i -- ;
    }

	var video1 = document.querySelector('#videoElement');
	var ctracker = new clm.tracker();
	
	if (navigator.mediaDevices.getUserMedia) {       
		navigator.mediaDevices.getUserMedia({video: true})
	  .then(function(stream) {
		video1.srcObject = stream;
	  })
	  .catch(function(err0r) {
		console.log("Something went wrong!");
	  });
	}

	
    var video = document.createElement('video');
	
	//video.setAttribute("width", "400");
	//video.setAttribute("height", "300");
    video.controls = false;
    var mediaElement = getHTMLMediaElement(video, {
        title: 'Are you ready? Click Start!',
        //buttons: ['full-screen'/*, 'take-snapshot'*/],
        buttons: [],
        showOnMouseEnter: false,
        width: 100,//490,
        //width: 100 + '%',
        //width = $('.xyz').width(),
        //parentWidth = $('.xyz').offsetParent().width(),

        //percent = Math.round(100 * width / parentWidth),

        onTakeSnapshot: function() {
            var canvas = document.createElement('canvas');
            canvas.width = mediaElement.clientWidth;
            canvas.height = mediaElement.clientHeight;

            var context = canvas.getContext('2d');
            context.drawImage(recordingPlayer, 0, 0, canvas.width, canvas.height);

            window.open(canvas.toDataURL('image/png'));
        }
    });
    document.getElementById('recording-player').appendChild(mediaElement);

    var div = document.createElement('section');
    mediaElement.media.parentNode.appendChild(div);
    div.appendChild(mediaElement.media);

    var recordingPlayer = mediaElement.media;
    var recordingMedia = document.querySelector('.recording-media');
    var mediaContainerFormat = document.querySelector('.media-container-format');
    //var mimeType = 'video/webm';
    //var fileExtension = 'webm';
    var mimeType = 'video/webm\;codecs=h264';
    var fileExtension = 'mp4';
    var type = 'video';
    var recorderType;
    var defaultWidth;
    var defaultHeight;

    var btnStartRecording = document.querySelector('#btn-start-recording');
    var btnQues = document.querySelector('#questionbtn');

    window.onbeforeunload = function() {
        btnStartRecording.disabled = false;
        recordingMedia.disabled = false;
        mediaContainerFormat.disabled = false;
    };

    //   function time_remaining(endtime){
    //     var t = Date.parse(endtime) - Date.parse(new Date());
    //   var seconds = Math.floor( (t/1000) % 60 );
    // var minutes = Math.floor( (t/1000/60) % 60 );
    //var hours = Math.floor( (t/(1000*60*60)) % 24 );
    //var days = Math.floor( t/(1000*60*60*24) );

    //  return {'total':t, 'days':days, 'hours':hours, 'minutes':minutes, 'seconds':('0' + seconds).slice(-2)};

    //}

    //function run_clock(id,endtime){
    //  var clock = document.getElementById(id);
    // function update_clock(){
    //   t = time_remaining(endtime);

    // clock.innerHTML = '<font size=+2><strong>'+t.minutes+':'+t.seconds+'</strong></font>';
    //if(t.total<=0){
    //  clearInterval(timeinterval);
    //clock.innerHTML = '<font size=+2><strong>0:00</strong></font>';
    //document.getElementById("demo").innerHTML = "the time given for answering this interview question has expired. " +
    //  "Thank you for having a time with us.";

    // stopStream()



    //                    }
    //              }
    //            update_clock(); // run function once at first to avoid delay
    //           timeinterval = setInterval(update_clock,1000);
    //    }

    function myFunction() {

        var length2 = capitals002.length;
        var y = Math.floor((Math.random() * capitals002.length ));

        if (t.total > 0) {
            if (length2 > 0) {

                document.getElementById("demo").innerHTML = capitals002[y];
                capitals002.splice(y, 1);

            }
            else {
                document.getElementById("demo").innerHTML = "good luck u have already answer all questions";
                // clearTimeout( timeinterval);
            }


        }
    }
	
	var dataString = '';
	let minEAR = 1.0;
	var maxEAR = 0.0;
	var blink = 0;
	
	var states = {search:0, peakDetected:1};
	
	var earState = states.search;

	
	function distance(a, b) {
		return Math.sqrt(((a[0] - b[0]) * (a[0] - b[0])) + ((a[1] - b[1]) * (a[1] - b[1])));
	}
	
	function facelength(left, right, top, down)  {
		var width = distance(left, right);
		var height = distance(top, down);
		
		return Math.sqrt((width * width) + (height * height));
	}

	function eye_aspect_ratio(left, right, top, down) {
	
		//var width = Math.sqrt(((left[0] - right[0]) * (left[0] - right[0])) + ((left[1] - right[1]) * (left[1] - right[1])));
		//var height = Math.sqrt(((top[0] - down[0]) * (top[0] - down[0])) +((top[1] - down[1]) * (top[1] - down[1])) );
		
		var width = distance(left, right);
		var height = distance(top, down);

		// compute the eye aspect ratio
		var ear = height / width;

		
		return ear;
	}				
	/*
	var ctracker = new clm.tracker();
	ctracker.init();
	ctracker.start(video);
	*/
	
	function positionLoop() {
		requestAnimFrame(positionLoop);
		var positions = ctracker.getCurrentPosition();
		// do something with the positions ...
		// print the positions
		var positionString = "";
		
		//console.log(positions);
		
		if (positions) {
			//console.log(positions);
			// eye blink
			
			leftEAR = eye_aspect_ratio(positions[23], positions[25], positions[21], positions[24]);
			rightEAR = eye_aspect_ratio(positions[30], positions[28], positions[17], positions[29]);
			
			var ear = (leftEAR + rightEAR) / 2.0;
			
			var fLength = facelength(positions[0], positions[14], positions[33], positions[7]);
			
			var center = positions[37]
			

//needs to be hide code later for hiding blink result at application
			
			if (ear < minEAR)
			{
				minEAR = ear;
			}
			
			if (ear > maxEAR)
			{
				maxEAR = ear;
			}
			
									
			switch (earState){
			
				case states.search:
					if (maxEAR - minEAR > 0.07)
					{
						earState = states.peakDetected;
						
						//minEAR = maxEAR;
						minEAR = 1.0;
						maxEAR = 0.0;
						
					}
				break;
				
				case states.peakDetected:
					if (maxEAR - minEAR > 0.07)
					{
						earState = states.search;
						
						//maxEAR = minEAR;				
						minEAR = 1.0;
						maxEAR = 0.0;
						
						blink = blink + 1;
						
						
					}						
				break;
				
				
			}
			

			
//-------------------------------------------------


			
			positionString += "<h2>EYE BLINK  : " + blink +"</h2>";
			
			//positionString += "<h2>EYE BLINK  : " + blink +"<br> EYE BLINK  : " + blink +"</h2>";
			

			document.getElementById('positions').innerHTML = positionString;						
			
			/*
			dataString = dataString + ear.toFixed(2) + 
			"," + earState + 
			"," + minEAR.toFixed(2) + 
			"," + maxEAR.toFixed(2) + 
			"," + blink +  ";";
			*/
			
			dataString = dataString + ear.toFixed(4) + 
			"," + fLength.toFixed(2) +
			"," + center[0].toFixed(2)  +						
			"," + center[1].toFixed(2)  +  ";";

	
		
		}
		

	}	

	var recorder;
	var started = false;
	
	function captureCamera(callback) {
    navigator.mediaDevices.getUserMedia({ audio: true, video: true }).then(function(camera) {
        callback(camera);
    }).catch(function(error) {
        alert('Unable to capture your camera. Please check console logs.');
        console.error(error);
    });
	}


    btnStartRecording.onclick = function(event) {
        var button = btnStartRecording;

		if (started == false)
		{
			console.log("start");
	
			captureCamera(function(camera) {
				setSrcObject(camera, video);
				video.play();
				recorder = RecordRTC(camera, {
					type: 'video'
				});
				recorder.startRecording();
				// release camera on stopRecording
				recorder.camera = camera;
			 
				
				

			});
			
			ctracker.init();
			ctracker.start(video1);
			
			positionLoop();
			
			started = true;
		}



        var length2 = capitals002.length;

        var current_time = Date.parse(new Date());
        var deadline = new Date(current_time + time_in_minutes*60*1000);

        if (B < 1 && length2 > 0 ) {

            var y = Math.floor((Math.random() * capitals002.length ));


            document.getElementById("demo").innerHTML = capitals002[y];
            capitals002.splice(y, 1);
            // countDown(50, "status");
            run_clock('clockdiv',deadline);
            B ++;


        }
        function time_remaining(endtime){
            t = Date.parse(endtime) - Date.parse(new Date());
            seconds = Math.floor( (t/1000) % 60 );
            var minutes = Math.floor( (t/1000/60) % 60 );
            var hours = Math.floor( (t/(1000*60*60)) % 24 );
            var days = Math.floor( t/(1000*60*60*24) );

            return {'total':t, 'days':days, 'hours':hours, 'minutes':minutes, 'seconds':('0' + seconds).slice(-2)};

        }

        function run_clock(id,endtime){
            var clock = document.getElementById(id);
            function update_clock(){
                t = time_remaining(endtime);


//$totalmasadiambil = time_in_minutes - t.mi


				t_minutes = t.minutes * 60 ;
				time_remaining_la_babi = t_minutes + seconds;
				time_used = total_time_in_seconds - time_remaining_la_babi;
				//time_used = time_remaining_la_babi - t;
				 

                clock.innerHTML = '<font size=+2><strong>'+t.minutes+':'+t.seconds+'</strong></font>';
                if(t.total<=0){
                    clearInterval(timeinterval);
                    clock.innerHTML = '<font size=+2><strong>0:00</strong></font>';
                    document.getElementById("demo").innerHTML = "the time given for answering this interview question has expired. " +
                        "Thank you for having a time with us.";
                    button.stream.stop();
                    button.stream = null;
                    btnQues.disabled = true;
                    button.disabled = true;

                    // stopStream();
                    if(button.stream instanceof Array) {
                        button.stream.forEach(function(stream) {
                            stream.stop();
                        });
                        //button.stream = null;
                    }

                    videoBitsPerSecond = null;
                    var html = 'Your video interview has been done.<br>Kindly submit your video.';
                    //html += '<br>Size: ' + bytesToSize(button.recordRTC.getBlob().size);
                    recordingPlayer.parentNode.parentNode.querySelector('h2').innerHTML = html;
					

					
                    if(button.recordRTC) {
                        if(button.recordRTC.length) {
                            button.recordRTC[0].stopRecording(function(url) {
                                if(!button.recordRTC[1]) {
                                    button.recordingEndedCallback(url);
                                    stopStream();

                                    saveToDiskOrOpenNewTab(button.recordRTC[0]);
                                    return;
                                }

                                button.recordRTC[1].stopRecording(function(url) {
                                    button.recordingEndedCallback(url);
                                    stopStream();
                                });
                            });
                        }
                        else {
                            button.recordRTC.stopRecording(function(url) {
                                if(button.blobs && button.blobs.length) {
                                    var blob = new File(button.blobs, getFileName(fileExtension), {
                                        type: mimeType
                                    });

                                    button.recordRTC.getBlob = function() {
                                        return blob;
                                    };

                                    url = URL.createObjectURL(blob);
                                }

                                button.recordingEndedCallback(url);
                                saveToDiskOrOpenNewTab(button.recordRTC);
                                stopStream();
                            });
                        }
                    }

                }
            }
            update_clock(); // run function once at first to avoid delay
            timeinterval = setInterval(update_clock,1000);
        }


		function stopStream() {
                if(button.stream && button.stream.stop) {
                    button.stream.stop();
                    button.stream = null;
                    document.getElementById("demo").innerHTML = "the time given for answering this interview question has expired. " +
                        "Thank you for having a time with us.";
                    clearInterval(timeinterval);
                    btnQues.disabled = true;

                }

                if(button.stream instanceof Array) {
                    button.stream.forEach(function(stream) {
                        stream.stop();
                    });
                    button.stream = null;
                }

                videoBitsPerSecond = null;
                var html = 'Your video interview has been done.<br>Kindly submit your video.';
                //html += '<br>Size: ' + bytesToSize(button.recordRTC.getBlob().size);
                recordingPlayer.parentNode.parentNode.querySelector('h2').innerHTML = html;
				
				video1.srcObject.stop();
				//recorder.camera.stop();
				//recorder.destroy();
				//recorder = null;
            }



        if(button.innerHTML === '<i class="fa fa-fw fa-stop mr-1"></i> Stop Recording') {
            //btnPauseRecording.style.display = 'none';
            button.disabled = true;
            button.disableStateWaiting = true;
            setTimeout(function() {
                //button.disabled = false;
                button.disabled = true;
                button.disableStateWaiting = false;
            }, 2000);

            button.innerHTML = 'Start Recording';

            

            if(button.recordRTC) {
                if(button.recordRTC.length) {
                    button.recordRTC[0].stopRecording(function(url) {
                        if(!button.recordRTC[1]) {
                            button.recordingEndedCallback(url);
                            stopStream();

                            saveToDiskOrOpenNewTab(button.recordRTC[0]);
                            return;
                        }

                        button.recordRTC[1].stopRecording(function(url) {
                            button.recordingEndedCallback(url);
                            stopStream();
                        });
                    });
                }
                else {
                    button.recordRTC.stopRecording(function(url) {
                        if(button.blobs && button.blobs.length) {
                            var blob = new File(button.blobs, getFileName(fileExtension), {
                                type: mimeType
                            });

                            button.recordRTC.getBlob = function() {
                                return blob;
                            };

                            url = URL.createObjectURL(blob);
                        }

                        button.recordingEndedCallback(url);
                        saveToDiskOrOpenNewTab(button.recordRTC);
                        stopStream();
	
						
						console.log("stop!");
                    });
                }
            }

            return;
        }



        if(!event) return;

        button.disabled = true;

        var commonConfig = {
            onMediaCaptured: function(stream) {
                button.stream = stream;
                if(button.mediaCapturedCallback) {
                    button.mediaCapturedCallback();
                }

                button.innerHTML = '<i class="fa fa-fw fa-stop mr-1"></i> Stop Recording';
                button.disabled = false;
            },
            onMediaStopped: function() {
                button.innerHTML = 'Recording Done';

                if(!button.disableStateWaiting && t.total > 0) {
                    button.disabled = false;
                }
            },
            onMediaCapturingFailed: function(error) {
                console.error('onMediaCapturingFailed:', error);

                if(error.toString().indexOf('no audio or video tracks available') !== -1) {
                    alert('RecordRTC failed to start because there are no audio or video tracks available.');
                }

                if(DetectRTC.browser.name === 'Safari') return;

                if(error.name === 'PermissionDeniedError' && DetectRTC.browser.name === 'Firefox') {
                    alert('Firefox requires version >= 52. Firefox also requires HTTPs.');
                }

                commonConfig.onMediaStopped();
            }
        };

        if(mediaContainerFormat.value === 'h264') {
            mimeType = 'video/webm\;codecs=h264';
            fileExtension = 'mp4';

            // video/mp4;codecs=avc1
            if(isMimeTypeSupported('video/mpeg')) {
                mimeType = 'video/mpeg';
            }
        }

        if(mediaContainerFormat.value === 'mkv' && isMimeTypeSupported('video/x-matroska;codecs=avc1')) {
            mimeType = 'video/x-matroska;codecs=avc1';
            fileExtension = 'mkv';
        }

        if(mediaContainerFormat.value === 'vp8' && isMimeTypeSupported('video/webm\;codecs=vp8')) {
            mimeType = 'video/webm\;codecs=vp8';
            fileExtension = 'webm';
            recorderType = null;
            type = 'video';
        }

        if(mediaContainerFormat.value === 'vp9' && isMimeTypeSupported('video/webm\;codecs=vp9')) {
            mimeType = 'video/webm\;codecs=vp9';
            fileExtension = 'webm';
            recorderType = null;
            type = 'video';
        }

        if(mediaContainerFormat.value === 'pcm') {
            mimeType = 'audio/wav';
            fileExtension = 'wav';
            recorderType = StereoAudioRecorder;
            type = 'audio';
        }

        if(mediaContainerFormat.value === 'opus' || mediaContainerFormat.value === 'ogg') {
            if(isMimeTypeSupported('audio/webm')) {
                mimeType = 'audio/webm';
                fileExtension = 'webm'; // webm
            }

            if(isMimeTypeSupported('audio/ogg')) {
                mimeType = 'audio/ogg; codecs=opus';
                fileExtension = 'ogg'; // ogg
            }

            recorderType = null;
            type = 'audio';
        }

        if(mediaContainerFormat.value === 'whammy') {
            mimeType = 'video/webm';
            fileExtension = 'webm';
            recorderType = WhammyRecorder;
            type = 'video';
        }

        if(mediaContainerFormat.value === 'gif') {
            mimeType = 'image/gif';
            fileExtension = 'gif';
            recorderType = GifRecorder;
            type = 'gif';
        }

        if(mediaContainerFormat.value === 'default') {
            mimeType = 'video/webm';
            fileExtension = 'webm';
            recorderType = null;
            type = 'video';
        }


        if(recordingMedia.value === 'record-audio') {
            captureAudio(commonConfig);

            button.mediaCapturedCallback = function() {
                var options = {
                    type: type,
                    mimeType: mimeType,
                    leftChannel: params.leftChannel || false,
                    disableLogs: params.disableLogs || false
                };

                if(params.sampleRate) {
                    options.sampleRate = parseInt(params.sampleRate);
                }

                if(params.bufferSize) {
                    options.bufferSize = parseInt(params.bufferSize);
                }

                if(recorderType) {
                    options.recorderType = recorderType;
                }

                if(videoBitsPerSecond) {
                    options.videoBitsPerSecond = videoBitsPerSecond;
                }

                if(DetectRTC.browser.name === 'Edge') {
                    options.numberOfAudioChannels = 1;
                }

                options.ignoreMutedMedia = false;
                button.recordRTC = RecordRTC(button.stream, options);

                button.recordingEndedCallback = function(url) {
                    setVideoURL(url);
                };

                button.recordRTC.startRecording();
                //btnPauseRecording.style.display = '';
            };
        }

        if(recordingMedia.value === 'record-audio-plus-video') {
            captureAudioPlusVideo(commonConfig);

            button.mediaCapturedCallback = function() {
                if(typeof MediaRecorder === 'undefined') { // opera or chrome etc.
                    button.recordRTC = [];

                    if(!params.bufferSize) {
                        // it fixes audio issues whilst recording 720p
                        params.bufferSize = 16384;
                    }

                    var options = {
                        type: 'audio', // hard-code to set "audio"
                        leftChannel: params.leftChannel || false,
                        disableLogs: params.disableLogs || false,
                        video: recordingPlayer
                    };

                    if(params.sampleRate) {
                        options.sampleRate = parseInt(params.sampleRate);
                    }

                    if(params.bufferSize) {
                        options.bufferSize = parseInt(params.bufferSize);
                    }

                    if(params.frameInterval) {
                        options.frameInterval = parseInt(params.frameInterval);
                    }

                    if(recorderType) {
                        options.recorderType = recorderType;
                    }

                    if(videoBitsPerSecond) {
                        options.videoBitsPerSecond = videoBitsPerSecond;
                    }

                    options.ignoreMutedMedia = false;
                    var audioRecorder = RecordRTC(button.stream, options);

                    options.type = type;
                    var videoRecorder = RecordRTC(button.stream, options);

                    // to sync audio/video playbacks in browser!
                    videoRecorder.initRecorder(function() {
                        audioRecorder.initRecorder(function() {
                            audioRecorder.startRecording();
                            videoRecorder.startRecording();
                            //btnPauseRecording.style.display = '';
                        });
                    });

                    button.recordRTC.push(audioRecorder, videoRecorder);

                    button.recordingEndedCallback = function() {
                        var audio = new Audio();
                        audio.src = audioRecorder.toURL();
                        audio.controls = true;
                        audio.autoplay = true;

                        recordingPlayer.parentNode.appendChild(document.createElement('hr'));
                        recordingPlayer.parentNode.appendChild(audio);

                        if(audio.paused) audio.play();
                    };
                    return;
                }

                var options = {
                    type: type,
                    mimeType: mimeType,
                    disableLogs: params.disableLogs || false,
                    getNativeBlob: false, // enable it for longer recordings
                    video: recordingPlayer
                };

                if(recorderType) {
                    options.recorderType = recorderType;

                    if(recorderType == WhammyRecorder || recorderType == GifRecorder) {
                        options.canvas = options.video = {
                            width: defaultWidth || 320,
                            height: defaultHeight || 240
                        };
                    }
                }

                if(videoBitsPerSecond) {
                    options.videoBitsPerSecond = videoBitsPerSecond;
                }



                options.ignoreMutedMedia = false;
                button.recordRTC = RecordRTC(button.stream, options);

                button.recordingEndedCallback = function(url) {
                    setVideoURL(url);
                };

                button.recordRTC.startRecording();
                //btnPauseRecording.style.display = '';
                recordingPlayer.parentNode.parentNode.querySelector('h2').innerHTML = '<img src="https://cdn.webrtc-experiment.com/images/progress.gif">';
            };
        }

        if(recordingMedia.value === 'record-screen') {
            captureScreen(commonConfig);

            button.mediaCapturedCallback = function() {
                var options = {
                    type: type,
                    mimeType: mimeType,
                    disableLogs: params.disableLogs || false,
                    getNativeBlob: false, // enable it for longer recordings
                    video: recordingPlayer
                };

                if(recorderType) {
                    options.recorderType = recorderType;

                    if(recorderType == WhammyRecorder || recorderType == GifRecorder) {
                        options.canvas = options.video = {
                            width: defaultWidth || 320,
                            height: defaultHeight || 240
                        };
                    }
                }

                if(videoBitsPerSecond) {
                    options.videoBitsPerSecond = videoBitsPerSecond;
                }

                options.ignoreMutedMedia = false;
                button.recordRTC = RecordRTC(button.stream, options);

                button.recordingEndedCallback = function(url) {
                    setVideoURL(url);
                };

                button.recordRTC.startRecording();
                //btnPauseRecording.style.display = '';
            };
        }

        // note: audio+tab is supported in Chrome 50+
        // todo: add audio+tab recording
        if(recordingMedia.value === 'record-audio-plus-screen') {
            captureAudioPlusScreen(commonConfig);

            button.mediaCapturedCallback = function() {
                var options = {
                    type: type,
                    mimeType: mimeType,
                    disableLogs: params.disableLogs || false,
                    getNativeBlob: false, // enable it for longer recordings
                    video: recordingPlayer
                };

                if(recorderType) {
                    options.recorderType = recorderType;

                    if(recorderType == WhammyRecorder || recorderType == GifRecorder) {
                        options.canvas = options.video = {
                            width: defaultWidth || 320,
                            height: defaultHeight || 240
                        };
                    }
                }

                if(videoBitsPerSecond) {
                    options.videoBitsPerSecond = videoBitsPerSecond;
                }

                options.ignoreMutedMedia = false;
                button.recordRTC = RecordRTC(button.stream, options);

                button.recordingEndedCallback = function(url) {
                    setVideoURL(url);
                };

                button.recordRTC.startRecording();
                //btnPauseRecording.style.display = '';
            };
        }
    };

    function captureVideo(config) {
        captureUserMedia({video: true}, function(videoStream) {
            config.onMediaCaptured(videoStream);

            addStreamStopListener(videoStream, function() {
                config.onMediaStopped();
            });
        }, function(error) {
            config.onMediaCapturingFailed(error);
        });
    }

    function captureAudio(config) {
        captureUserMedia({audio: true}, function(audioStream) {
            config.onMediaCaptured(audioStream);

            addStreamStopListener(audioStream, function() {
                config.onMediaStopped();
            });
        }, function(error) {
            config.onMediaCapturingFailed(error);
        });
    }

    function captureAudioPlusVideo(config) {
        captureUserMedia({video: true, audio: true}, function(audioVideoStream) {
            config.onMediaCaptured(audioVideoStream);

            if(audioVideoStream instanceof Array) {
                audioVideoStream.forEach(function(stream) {
                    addStreamStopListener(stream, function() {
                        config.onMediaStopped();
                    });
                });
                return;
            }

            addStreamStopListener(audioVideoStream, function() {
                config.onMediaStopped();
            });
        }, function(error) {
            config.onMediaCapturingFailed(error);
        });
    }

    var MY_DOMAIN = 'webrtc-experiment.com';

    function isMyOwnDomain() {
        // replace "webrtc-experiment.com" with your own domain name
        return document.domain.indexOf(MY_DOMAIN) !== -1;
    }

    function isLocalHost() {
        // "chrome.exe" --enable-usermedia-screen-capturing
        // or firefox => about:config => "media.getusermedia.screensharing.allowed_domains" => add "localhost"
        return document.domain === 'localhost' || document.domain === '127.0.0.1';
    }

    function captureScreen(config) {
        // Firefox screen capturing addon is open-sourced here: https://github.com/muaz-khan/Firefox-Extensions
        // Google Chrome screen capturing extension is open-sourced here: https://github.com/muaz-khan/Chrome-Extensions/tree/master/desktopCapture

        window.getScreenId = function(chromeMediaSource, chromeMediaSourceId) {
            var screenConstraints = {
                audio: false,
                video: {
                    mandatory: {
                        chromeMediaSourceId: chromeMediaSourceId,
                        chromeMediaSource: isLocalHost() ? 'screen' : chromeMediaSource
                    }
                }
            };

            if(DetectRTC.browser.name === 'Firefox') {
                screenConstraints = {
                    video: {
                        mediaSource: 'window'
                    }
                }
            }

            captureUserMedia(screenConstraints, function(screenStream) {
                config.onMediaCaptured(screenStream);

                addStreamStopListener(screenStream, function() {
                    // config.onMediaStopped();

                    btnStartRecording.onclick();

                });
            }, function(error) {
                config.onMediaCapturingFailed(error);

                if(isMyOwnDomain() === false && DetectRTC.browser.name === 'Chrome') {
                    // otherwise deploy chrome extension yourselves
                    // https://github.com/muaz-khan/Chrome-Extensions/tree/master/desktopCapture
                    alert('Please enable this command line flag: "--enable-usermedia-screen-capturing"');
                }

                if(isMyOwnDomain() === false && DetectRTC.browser.name === 'Firefox') {
                    // otherwise deploy firefox addon yourself
                    // https://github.com/muaz-khan/Firefox-Extensions
                    alert('Please enable screen capturing for your domain. Open "about:config" and search for "media.getusermedia.screensharing.allowed_domains"');
                }
            });
        };


        if(DetectRTC.browser.name === 'Firefox' || isLocalHost()) {
            window.getScreenId();
        }

        window.postMessage('get-sourceId', '*');
    }

    function captureAudioPlusScreen(config) {
        // Firefox screen capturing addon is open-sourced here: https://github.com/muaz-khan/Firefox-Extensions
        // Google Chrome screen capturing extension is open-sourced here: https://github.com/muaz-khan/Chrome-Extensions/tree/master/desktopCapture

        window.getScreenId = function(chromeMediaSource, chromeMediaSourceId) {
            var screenConstraints = {
                audio: false,
                video: {
                    mandatory: {
                        chromeMediaSourceId: chromeMediaSourceId,
                        chromeMediaSource: isLocalHost() ? 'screen' : chromeMediaSource
                    }
                }
            };

            if(DetectRTC.browser.name === 'Firefox') {
                screenConstraints = {
                    video: {
                        mediaSource: 'window'
                    },
                    audio: false
                }
            }

            captureUserMedia(screenConstraints, function(screenStream) {
                captureUserMedia({audio: true}, function(audioStream) {
                    var newStream = new MediaStream();

                    // merge audio and video tracks in a single stream
                    audioStream.getAudioTracks().forEach(function(track) {
                        newStream.addTrack(track);
                    });

                    screenStream.getVideoTracks().forEach(function(track) {
                        newStream.addTrack(track);
                    });

                    config.onMediaCaptured(newStream);

                    addStreamStopListener(newStream, function() {
                        config.onMediaStopped();
                    });
                }, function(error) {
                    config.onMediaCapturingFailed(error);
                });
            }, function(error) {
                config.onMediaCapturingFailed(error);

                if(isMyOwnDomain() === false && DetectRTC.browser.name === 'Chrome') {
                    // otherwise deploy chrome extension yourselves
                    // https://github.com/muaz-khan/Chrome-Extensions/tree/master/desktopCapture
                    alert('Please enable this command line flag: "--enable-usermedia-screen-capturing"');
                }

                if(isMyOwnDomain() === false && DetectRTC.browser.name === 'Firefox') {
                    // otherwise deploy firefox addon yourself
                    // https://github.com/muaz-khan/Firefox-Extensions
                    alert('Please enable screen capturing for your domain. Open "about:config" and search for "media.getusermedia.screensharing.allowed_domains"');
                }
            });
        };

        if(DetectRTC.browser.name === 'Firefox' || isLocalHost()) {
            window.getScreenId();
        }

        window.postMessage('get-sourceId', '*');
    }

    var videoBitsPerSecond;

    function setVideoBitrates() {
        var select = document.querySelector('.media-bitrates');
        var value = select.value;

        if(value == 'default') {
            videoBitsPerSecond = null;
            return;
        }

        videoBitsPerSecond = parseInt(value);
    }

    function getFrameRates(mediaConstraints) {
        if(!mediaConstraints.video) {
            return mediaConstraints;
        }

        var select = document.querySelector('.media-framerates');
        var value = select.value;

        if(value == 'default') {
            return mediaConstraints;
        }

        value = parseInt(value);

        if(DetectRTC.browser.name === 'Firefox') {
            mediaConstraints.video.frameRate = value;
            return mediaConstraints;
        }

        if(!mediaConstraints.video.mandatory) {
            mediaConstraints.video.mandatory = {};
            mediaConstraints.video.optional = [];
        }

        var isScreen = recordingMedia.value.toString().toLowerCase().indexOf('screen') != -1;
        if(isScreen) {
            mediaConstraints.video.mandatory.maxFrameRate = value;
        }
        else {
            mediaConstraints.video.mandatory.minFrameRate = value;
        }

        return mediaConstraints;
    }

    function setGetFromLocalStorage(selectors) {
        selectors.forEach(function(selector) {
            var storageItem = selector.replace(/\.|#/g, '');
            if(localStorage.getItem(storageItem)) {
                document.querySelector(selector).value = localStorage.getItem(storageItem);
            }

            addEventListenerToUploadLocalStorageItem(selector, ['change', 'blur'], function() {
                localStorage.setItem(storageItem, document.querySelector(selector).value);
            });
        });
    }

    function addEventListenerToUploadLocalStorageItem(selector, arr, callback) {
        arr.forEach(function(event) {
            document.querySelector(selector).addEventListener(event, callback, false);
        });
    }

    setGetFromLocalStorage(['.media-resolutions', '.media-framerates', '.media-bitrates', '.recording-media', '.media-container-format']);

    function getVideoResolutions(mediaConstraints) {
        if(!mediaConstraints.video) {
            return mediaConstraints;
        }

        var select = document.querySelector('.media-resolutions');
        var value = select.value;

        if(value == 'default') {
            return mediaConstraints;
        }

        value = value.split('x');

        if(value.length != 2) {
            return mediaConstraints;
        }

        defaultWidth = parseInt(value[0]);
        defaultHeight = parseInt(value[1]);

        if(DetectRTC.browser.name === 'Firefox') {
            mediaConstraints.video.width = defaultWidth;
            mediaConstraints.video.height = defaultHeight;
            return mediaConstraints;
        }

        if(!mediaConstraints.video.mandatory) {
            mediaConstraints.video.mandatory = {};
            mediaConstraints.video.optional = [];
        }

        var isScreen = recordingMedia.value.toString().toLowerCase().indexOf('screen') != -1;

        if(isScreen) {
            mediaConstraints.video.mandatory.maxWidth = defaultWidth;
            mediaConstraints.video.mandatory.maxHeight = defaultHeight;
        }
        else {
            mediaConstraints.video.mandatory.minWidth = defaultWidth;
            mediaConstraints.video.mandatory.minHeight = defaultHeight;
        }

        return mediaConstraints;
    }

    function captureUserMedia(mediaConstraints, successCallback, errorCallback) {
        if(mediaConstraints.video == true) {
            mediaConstraints.video = {};
        }

        setVideoBitrates();

        mediaConstraints = getVideoResolutions(mediaConstraints);
        mediaConstraints = getFrameRates(mediaConstraints);

        var isBlackBerry = !!(/BB10|BlackBerry/i.test(navigator.userAgent || ''));
        if(isBlackBerry && !!(navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia)) {
            navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia;
            navigator.getUserMedia(mediaConstraints, successCallback, errorCallback);
            return;
        }

        navigator.mediaDevices.getUserMedia(mediaConstraints).then(function(stream) {
            successCallback(stream);

            setVideoURL(stream, true);
        }).catch(function(error) {
            if(error && (error.name === 'ConstraintNotSatisfiedError' || error.name === 'OverconstrainedError')) {
                alert('Your camera or browser does NOT supports selected resolutions or frame-rates. \n\nPlease select "default" resolutions.');
            }
            else if(error && error.message) {
                alert(error.message);
            }
            else {
                alert('Unable to make getUserMedia request. Please check browser console logs.');
            }

            errorCallback(error);
        });
    }

    function setMediaContainerFormat(arrayOfOptionsSupported) {
        var options = Array.prototype.slice.call(
            mediaContainerFormat.querySelectorAll('option')
        );

        var localStorageItem;
        if(localStorage.getItem('media-container-format')) {
            localStorageItem = localStorage.getItem('media-container-format');
        }

        var selectedItem;
        options.forEach(function(option) {
            option.disabled = true;

            if(arrayOfOptionsSupported.indexOf(option.value) !== -1) {
                option.disabled = false;

                if(localStorageItem && arrayOfOptionsSupported.indexOf(localStorageItem) != -1) {
                    if(option.value != localStorageItem) return;
                    option.selected = true;
                    selectedItem = option;
                    return;
                }

                if(!selectedItem) {
                    option.selected = true;
                    selectedItem = option;
                }
            }
        });
    }

    function isMimeTypeSupported(mimeType) {
        if(DetectRTC.browser.name === 'Edge' || DetectRTC.browser.name === 'Safari' || typeof MediaRecorder === 'undefined') {
            return false;
        }

        if(typeof MediaRecorder.isTypeSupported !== 'function') {
            return true;
        }

        return MediaRecorder.isTypeSupported(mimeType);
    }

    recordingMedia.onchange = function() {
        if(recordingMedia.value === 'record-audio') {
            var recordingOptions = [];

            if(isMimeTypeSupported('audio/webm')) {
                recordingOptions.push('opus');
            }

            if(isMimeTypeSupported('audio/ogg')) {
                recordingOptions.push('ogg');
            }

            recordingOptions.push('pcm');

            setMediaContainerFormat(recordingOptions);
            return;
        }

        var isChrome = !!window.chrome && !(!!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0);

        var recordingOptions = ['vp8']; // MediaStreamRecorder with vp8

        if(isMimeTypeSupported('video/webm\;codecs=vp9')) {
            recordingOptions.push('vp9'); // MediaStreamRecorder with vp9
        }

        if(isMimeTypeSupported('video/webm\;codecs=h264')) {
            recordingOptions.push('h264'); // MediaStreamRecorder with h264
        }

        if(isMimeTypeSupported('video/x-matroska;codecs=avc1')) {
            recordingOptions.push('mkv'); // MediaStreamRecorder with mkv/matroska
        }

        recordingOptions.push('gif'); // GifRecorder

        if(isChrome) {
            recordingOptions.push('whammy'); // WhammyRecorder
        }

        recordingOptions.push('default'); // Default mimeType for MediaStreamRecorder

        setMediaContainerFormat(recordingOptions);
    };
    recordingMedia.onchange();

    if(DetectRTC.browser.name === 'Edge' || DetectRTC.browser.name === 'Safari') {
        // webp isn't supported in Microsoft Edge
        // neither MediaRecorder API
        // so lets disable both video/screen recording options

        console.warn('Neither MediaRecorder API nor webp is supported in ' + DetectRTC.browser.name + '. You cam merely record audio.');

        recordingMedia.innerHTML = '<option value="record-audio">Audio</option>';
        setMediaContainerFormat(['pcm']);
    }

    function stringify(obj) {
        var result = '';
        Object.keys(obj).forEach(function(key) {
            if(typeof obj[key] === 'function') {
                return;
            }

            if(result.length) {
                result += ',';
            }

            result += key + ': ' + obj[key];
        });

        return result;
    }

    function mediaRecorderToStringify(mediaRecorder) {
        var result = '';
        result += 'mimeType: ' + mediaRecorder.mimeType;
        result += ', state: ' + mediaRecorder.state;
        result += ', audioBitsPerSecond: ' + mediaRecorder.audioBitsPerSecond;
        result += ', videoBitsPerSecond: ' + mediaRecorder.videoBitsPerSecond;
        if(mediaRecorder.stream) {
            result += ', streamid: ' + mediaRecorder.stream.id;
            result += ', stream-active: ' + mediaRecorder.stream.active;
        }
        return result;
    }

    function getFailureReport() {
        var info = 'RecordRTC seems failed. \n\n' + stringify(DetectRTC.browser) + '\n\n' + DetectRTC.osName + ' ' + DetectRTC.osVersion + '\n';

        if (typeof recorderType !== 'undefined' && recorderType) {
            info += '\nrecorderType: ' + recorderType.name;
        }

        if (typeof mimeType !== 'undefined') {
            info += '\nmimeType: ' + mimeType;
        }

        Array.prototype.slice.call(document.querySelectorAll('select')).forEach(function(select) {
            info += '\n' + (select.id || select.className) + ': ' + select.value;
        });

        if (btnStartRecording.recordRTC) {
            info += '\n\ninternal-recorder: ' + btnStartRecording.recordRTC.getInternalRecorder().name;

            if(btnStartRecording.recordRTC.getInternalRecorder().getAllStates) {
                info += '\n\nrecorder-states: ' + btnStartRecording.recordRTC.getInternalRecorder().getAllStates();
            }
        }

        if(btnStartRecording.stream) {
            info += '\n\naudio-tracks: ' + btnStartRecording.stream.getAudioTracks().length;
            info += '\nvideo-tracks: ' + btnStartRecording.stream.getVideoTracks().length;
            info += '\nstream-active? ' + !!btnStartRecording.stream.active;

            btnStartRecording.stream.getAudioTracks().concat(btnStartRecording.stream.getVideoTracks()).forEach(function(track) {
                info += '\n' + track.kind + '-track-' + (track.label || track.id) + ': (enabled: ' + !!track.enabled + ', readyState: ' + track.readyState + ', muted: ' + !!track.muted + ')';

                if(track.getConstraints && Object.keys(track.getConstraints()).length) {
                    info += '\n' + track.kind + '-track-getConstraints: ' + stringify(track.getConstraints());
                }

                if(track.getSettings && Object.keys(track.getSettings()).length) {
                    info += '\n' + track.kind + '-track-getSettings: ' + stringify(track.getSettings());
                }
            });
        }



        else if(btnStartRecording.recordRTC && btnStartRecording.recordRTC.getBlob()) {
            info += '\n\nblobSize: ' + bytesToSize(btnStartRecording.recordRTC.getBlob().size);
        }

        if(btnStartRecording.recordRTC && btnStartRecording.recordRTC.getInternalRecorder() && btnStartRecording.recordRTC.getInternalRecorder().getInternalRecorder && btnStartRecording.recordRTC.getInternalRecorder().getInternalRecorder()) {
            info += '\n\ngetInternalRecorder: ' + mediaRecorderToStringify(btnStartRecording.recordRTC.getInternalRecorder().getInternalRecorder());
        }

        return info;
    }

    function saveToDiskOrOpenNewTab(recordRTC) {
        if(!recordRTC.getBlob().size) {
            var info = getFailureReport();
            console.log('blob', recordRTC.getBlob());
            console.log('recordrtc instance', recordRTC);
            console.log('report', info);

            if(mediaContainerFormat.value !== 'default') {
                alert('RecordRTC seems failed recording using ' + mediaContainerFormat.value + '. Please choose "default" option from the drop down and record again.');
            }
            else {
                alert('RecordRTC seems failed. Unexpected issue. You can read the email in your console log. \n\nPlease report using disqus chat below.');
            }

            if(mediaContainerFormat.value !== 'vp9' && DetectRTC.browser.name === 'Chrome') {
                alert('Please record using VP9 encoder. (select from the dropdown)');
            }
        }

        var fileName = getFileName(fileExtension);



        // upload to PHP server
        document.querySelector('#upload-to-php').parentNode.style.display = 'block';
        document.querySelector('#upload-to-php').onclick = function() {
            if(!recordRTC) return alert('No recording found.');
            this.disabled = true;

            var button = this;
            uploadToPHPServer(fileName, recordRTC, function(progress, fileURL) {
                if(progress === 'ended') {
                    ///button.disabled = false;
                    ///button.innerHTML = 'Click to download from server';
                    button.disabled = true;
                    button.innerHTML = 'Video uploaded';
                    button.onclick = function() {
                        SaveFileURLToDisk(fileURL, fileName);
                    };

                    setVideoURL(fileURL);

                    var html = 'Your video interview has been<br>submitted for analysis.';
                    //html += '<a href="'+fileURL+'" download="'+fileName+'" style="color: yellow; display: block; margin-top: 15px;">'+fileName+'</a>';
                    recordingPlayer.parentNode.parentNode.querySelector('h2').innerHTML = html;
                    return;
                }
                button.innerHTML = progress;
                recordingPlayer.parentNode.parentNode.querySelector('h2').innerHTML = progress;
            });
        };


    }


    var listOfFilesUploaded = [];
    function uploadToPHPServer(fileName, recordRTC, callback) {
        var blob = recordRTC instanceof Blob ? recordRTC : recordRTC.getBlob();

        blob = new File([blob], getFileName(fileExtension), {
            type: mimeType
        });

        // create FormData
        var formData = new FormData();
        formData.append('video-filename', fileName);
        formData.append('video-blob', blob);
		formData.append('data-string', dataString);
		formData.append('data-t-minutes', time_used);
		//formData.append('data-t-seconds', t.seconds);
		
		

        callback('Uploading recorded-file to server.');

        makeXMLHttpRequest('{{ url("/save") }}', formData, function(progress) {
            if (progress !== 'upload-ended') {
                callback(progress);
                return;
            }
            var initialURL = location.href.replace(location.href.split('/').pop(), '') + 'uploads/videos/';
            //var initialURL = 'http://localhost:8000/uploads/';

            callback('ended', initialURL + fileName);
            // to make sure we can delete as soon as visitor leaves
            listOfFilesUploaded.push(initialURL + fileName);
        });
    }

    function makeXMLHttpRequest(url, data, callback) {
        var request = new XMLHttpRequest();
        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) {
                callback('upload-ended');
            }
        };

        request.upload.onloadstart = function() {
            callback('Upload started...');
        };

        request.upload.onprogress = function(event) {
            callback('Upload Progress ' + Math.round(event.loaded / event.total * 100) + "%");
        };

        request.upload.onload = function() {
            callback('progress-about-to-end');
        };

        request.upload.onload = function() {
            callback('Uploading...');
        };

        request.upload.onerror = function(error) {
            callback('Failed to upload to server');
        };

        request.upload.onabort = function(error) {
            callback('Upload aborted.');
        };

        request.open('POST', url);
        request.send(data);
    }


    window.onbeforeunload = function() {
        document.querySelector('button').disabled = false;
        recordingMedia.disabled = false;
        mediaContainerFormat.disabled = false;
        if(!listOfFilesUploaded.length) return;
        listOfFilesUploaded.forEach(function(fileURL) {
            var request = new XMLHttpRequest();
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    if(this.responseText === ' problem deleting files.') {
                        alert('Failed to delete ' + fileURL + ' from the server.');
                        return;
                    }
                    listOfFilesUploaded = [];
                    //alert('You can leave now. Your files are removed from the server.');
                }
            };
            request.open('POST', '{{ url("/delete") }}');
            var formData = new FormData();
            formData.append('delete-file', fileURL.split('/').pop());
            request.send(formData);
        });
        return 'Please wait few seconds before your recordings are deleted from the server.';
    };

    function getRandomString() {

        return Math.floor((new Date()).getTime() / 1000);
        //return (Math.random() * new Date().getTime()).toString(36).replace(/\./g, '');

    }


    //function getUserID() {
    //var user = '{{ auth()->id() }}';
    //}



    function getFileName(fileExtension) {
        var d = new Date();
        var year = d.getUTCFullYear();
        var month = d.getUTCMonth();
        var date = d.getUTCDate();
        var user = '{{ auth()->id() }}';
        return 'VIDEO-ID' + user + '-' + year + (month+1) + date + '-' + getRandomString() + '.' + fileExtension;
        //return 'RecordRTC-' + year + month + date + '-' + getRandomString() + '.' + fileExtension;
    }

    function SaveFileURLToDisk(fileUrl, fileName) {
        var hyperlink = document.createElement('a');
        hyperlink.href = fileUrl;
        hyperlink.target = '_blank';
        hyperlink.download = fileName || fileUrl;

        (document.body || document.documentElement).appendChild(hyperlink);
        hyperlink.onclick = function() {
            (document.body || document.documentElement).removeChild(hyperlink);

            // required for Firefox
            window.URL.revokeObjectURL(hyperlink.href);
        };

        var mouseEvent = new MouseEvent('click', {
            view: window,
            bubbles: true,
            cancelable: true
        });

        hyperlink.dispatchEvent(mouseEvent);
    }

    function getURL(arg) {
        var url = arg;

        if(arg instanceof Blob || arg instanceof File) {
            url = URL.createObjectURL(arg);
        }

        if(arg instanceof RecordRTC || arg.getBlob) {
            url = URL.createObjectURL(arg.getBlob());
        }

        if(arg instanceof MediaStream || arg.getTracks || arg.getVideoTracks || arg.getAudioTracks) {
            // url = URL.createObjectURL(arg);
        }

        return url;
    }

    function setVideoURL(arg, forceNonImage) {
        var url = getURL(arg);

        var parentNode = recordingPlayer.parentNode;
        parentNode.removeChild(recordingPlayer);
        parentNode.innerHTML = '';

        var elem = 'video';
        if(type == 'gif' && !forceNonImage) {
            elem = 'img';
        }
        if(type == 'audio') {
            elem = 'audio';
        }

        recordingPlayer = document.createElement(elem);

        if(arg instanceof MediaStream) {
            recordingPlayer.muted = true;
        }

        recordingPlayer.addEventListener('loadedmetadata', function() {
            if(navigator.userAgent.toLowerCase().indexOf('android') == -1) return;

            // android
            setTimeout(function() {
                if(typeof recordingPlayer.play === 'function') {
                    recordingPlayer.play();
                }
            }, 2000);
        }, false);

        recordingPlayer.poster = '';

        if(arg instanceof MediaStream) {
            recordingPlayer.srcObject = arg;
        }
        else {
            recordingPlayer.src = url;
        }

        if(typeof recordingPlayer.play === 'function') {
            recordingPlayer.play();
        }

        recordingPlayer.addEventListener('ended', function() {
            url = getURL(arg);

            if(arg instanceof MediaStream) {
                recordingPlayer.srcObject = arg;
            }
            else {
                recordingPlayer.src = url;
            }
        });

        parentNode.appendChild(recordingPlayer);
    }
</script>


@endsection
