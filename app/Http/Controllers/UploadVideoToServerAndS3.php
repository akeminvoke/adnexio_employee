<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DateTime;
use DB;


class UploadVideoToServerAndS3 extends Controller
{
	
	private $fileName;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::guard($this->getGuard())->user();
        return $user->isAdmin() ? redirect('/admin') : view('video');
    }

    private function getGuard()
    {
        return property_exists($this, 'guard') ? $this->guard : null;
    }
	
	
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	 
    public function store(Request $request)
    {

		/*-------------------- Eye Blink & Fidget Value --------------------*/

		define("SEARCH", 1);
		define("DETECTED", 0);
		define("FIDGET_FPS", 20);
		
		$minEAR = 1.0;
		$maxEAR = 0.0;
		$earState = SEARCH;
		$blink = 0;
		$samples = array();
		$h_samples = array();
		$c_samples = array();
		
		//var_dump($samples);
		//var_dump($h_samples);
		//var_dump($c_samples);
		
		$stringData = $_POST['data-string'];

		//var_dump($stringData);

	  
		$data = str_getcsv($stringData, ";"); //parse the rows 
	
		foreach($data as &$row) 
		{
			$row = str_getcsv($row, ","); //parse the items in rows 

			//echo implode(" ", $row);
			//echo "<br>";
			if (sizeof($row) == 5)
			{
				
//				//$bl = eye_blink($row[0]);
//				$b = $this->eye_blink($row[0]);
//				$f = $this->fidget_value($row[1], $row[2], $row[3]);
				$b = $this->eye_blink($row[0], $row[3], $row[4]);
				$f = $this->fidget_value($row[1], $row[2], $row[3]);
				
				//echo "Eye blink : " . $b . ", fidget : " . $f ."<br>";
			}
		}
	
		/*-------------------- End Of Eye Blink & Fidget Value --------------------*/
		

		/*-------------------- Insert Blink Eye & Fidget Value Data --------------------*/


		$file_idx = 'video-blob';
		$this->fileName = $_POST['video-filename'];
		$tempName = $_FILES[$file_idx]['tmp_name'];
		$t_minutes = $_POST['data-t-minutes'];
		//$t_seconds = $_POST['data-t-seconds']; 
		
	   
		$filePath = 'uploads/videos/' . $this->fileName;
		
		//Store data in the database
		$user = Auth::user()->id;
		$videoname = $request->input('video-filename');	
		$now = new DateTime();
		
		$videodata = array('user_id'=>$user,'video_name'=>$videoname,'eye_blink'=>$b,'video_duration'=>$t_minutes,'fidget_value'=>$f,'created_at'=>$now);
		DB::table('video_interviews')->insert($videodata);

		if (!move_uploaded_file($tempName, $filePath)) {
			{
				echo 'Problem saving file: '.$tempName;
			}
			return;
		}
		else 
		{	
			//Store video file in Amazon S3
		Storage::disk('s3')->put($this->fileName,  fopen($filePath, 'r+'), 'public');
			
		/*-------------------- End Of Insert Blink Eye & Fidget Value Data --------------------*/
			
			
		/*-------------------- Tone Analyzer --------------------*/

		//ini_set('max_execution_time', 300); 
		
		
		//$audio_file = convert_mp3($source);
		//echo $audio_file . '<br>';
		
		$text = $this->speech_to_text();
		$tone_analyzer = $this->tone_analyzer($text);	
		
		//echo $text . '<br>';

		/*-------------------- End Tone Analyzer --------------------*/

		}
		
		/*-------------------- Insert Tone Analyzer Data --------------------*/
		
//		$insert_tone = DB::table('video_interviews')->select('video_id','user_id')->where('user_id', $user)->take(1)->orderBy('video_id', 'desc')->get(); 
//		
//		
//		DB::table('video_interviews')
//            ->where('user_id', $insert_tone[0]->user_id)->where('video_id', $insert_tone[0]->video_id)
//			->update(['text' => $text]);
//            //->update(['text' => 'test']);

//		$select_tone = DB::table('video_interviews')->select('video_id','user_id')->where('user_id', $user)->take(1)->orderBy('video_id', 'desc')->get(); 
//		
//		foreach($text as $texts)
//		{
//			
//		$tonedata = array('video_id'=>$select_tone[0]->video_id,'user_id'=>$select_tone[0]->user_id,'transcript'=>$texts,'created_at'=>$now);
//		DB::table('tone_analyzers')->insert($tonedata);
//		
//		}
//		
//		$tonedata = array('video_id'=>$select_tone[0]->video_id,'user_id'=>$select_tone[0]->user_id,'transcript'=>$text,'created_at'=>$now);
//		DB::table('tone_analyzers')->insert($tonedata);


			
		/*-------------------- End Of Insert Tone Analyzer Data --------------------*/	
		
	}




	/*-------------------- Funtions For Eye Blink & Fidget Value --------------------*/


	public function delta_position($cur_x, $cur_y, $prev_x, $prev_y)
	{
		return sqrt((($cur_x - $prev_x) * ($cur_x - $prev_x)) + (($cur_y - $prev_y) * ($cur_y - $prev_y)));
	}

	
	public function fidget_value($length, $center_x, $center_y)
	{
		static $counter = 0;
		static $prev_center_x = 0.0;
		static $prev_center_y = 0.0;
		static $total_length = 0.0;
		static $total_delta = 0.0;
		
		
//		echo 'counter : '. $counter. '<br><br>' ;
//		echo 'prev_center_x : '. $prev_center_x. '<br><br>' ;
//		echo 'prev_center_y : '. $prev_center_y. '<br><br>' ;
//		echo 'total_length : '. $total_length. '<br><br>' ;
//		echo 'total_delta : '. $total_delta. '<br><br>' ;
				
		$counter ++;
		
		if ($counter == 1)
		{
			$prev_center_x = $center_x;
			$prev_center_y = $center_y;
		}
		
		$total_length = $total_length + $length;
	
		$face_length = $total_length / $counter;
		
		$delta = $this->delta_position($center_x, $center_y, $prev_center_x, $prev_center_y) / $face_length * FIDGET_FPS;
		
		$prev_center_x = $center_x;
		$prev_center_y = $center_y;
		
		$total_delta = $total_delta + $delta;
		
		$fidget = $total_delta / $counter;

		$fidget = $fidget * 43.43 + 11.64;
		

		
		
		return $fidget;
		
	}
	
	// version 0.1
	public function average($num1, $num2)
	{
		return ($num1 + $num2)/2.0;
	}

	// version 0.1
	// To detect ascend and descend slopes within an array of sample values
	
	public function up_down_slope($arr, $lower, $upper)
	{
		$ave = array();
		$i = 0;
		$isSlope = true;
		$min = $arr[0];
		$max = $arr[0];
		$maxIndex = 0;
		$minIndex = 0;
		
		$arr_size = sizeof($arr);
		
		
		for ($i = 0; $i < $arr_size-1; $i ++)
		{
			// Create a new array containing average value between 2 adjacent elements of the original array
			array_push($ave, $this->average($arr[$i], $arr[$i+1]));
			
			// Update max, min values and their respective index
			
			if ($arr[$i] < $min)
			{
				$min = $arr[$i];
				
				$minIndex = $i;
			}
		
			if ($arr[$i] > $max)
			{
				$max = $arr[$i];
				
				$maxIndex = $i;
			}
		}
		
		
		// Update max, min values and their respective index of the last element (skipped in the above for loop)
		if ($arr[$arr_size-1] < $min)
		{
			$min = $arr[$arr_size-1];
			$minIndex = $arr_size-1;
			
		}
	
		if ($arr[$arr_size-1] > $max)
		{
			$max = $arr[$arr_size-1];
			$maxIndex = $arr_size-1;
		}
		

		// Check if out of max and min range; if maxIndex is first or last element; if minIndex is neither first nor last element
		if (($lower != 0.0 && ($max - $min < $lower || $max - $min > $upper)) || 
		($maxIndex == 0 || $maxIndex  == $arr_size-1) || 
		($minIndex > 0 && $minIndex < $arr_size-1) )
		{
			$isSlope = false;
		}
		else
		{
			// Get max, min, maxIndex and minIndex of average array
			for ($i = 0; $i < sizeof($ave); $i ++)
			{		
				if ($ave[$i] < $min)
				{		
					$min = $ave[$i];
					$minIndex = $i;
				}
			
				if ($ave[$i] > $max)
				{	
					$max = $ave[$i];
					$maxIndex = $i;
				}
			}
		
			// Check if values before maxIndex are in increasing order but in decreasing order after maxIndex
			for ($i = 0; $i < sizeof($ave)-1; $i ++)
			{		
				if ($i < $maxIndex - 1)
				{
					if (($ave[$i] <= $ave[$i + 1]) == false)
					{
						$isSlope = false;
					}
				}
				else if ($i >= $maxIndex) 
				{
					if (($ave[$i] >= $ave[$i + 1]) == false)
					{
						$isSlope = false;
					}
				}
			}	
		}					

		
		return array($isSlope, $maxIndex, $minIndex);
	}

	
	
	// version 0.1
	// To detect peak within a series of samples
	public function sample_window($ear, $center, $height)
	{	
		global $samples, $c_samples, $h_samples;
		
		$is_detected = false;
		
		$samples = (array) $samples;
		$c_samples = (array) $c_samples;
		$h_samples = (array) $h_samples;
		
		// Push latest values to respective arrays
		array_push($samples, $ear);
		array_push($c_samples, $center * -1.0);
		array_push($h_samples, $height);

		// Start to process when array size is 6
		if (sizeof($samples) == 6) // mobile uses smaller sample length ie. 6
		{
			// Detect ascend and descend slopes for EAR, height and center (nose) position
			$e = $this->up_down_slope($samples, 0.06, 0.2); // Check if EAR is within range of 0.06 and 0.2
			$h = $this->up_down_slope($h_samples, 0.0, 0.0);
			$c = $this->up_down_slope($c_samples, 0.0, 0.0);
		
			$ear_slope = $e[0];
			$ear_max_index = $e[1]; 	
			$ear_min_index = $e[2];
			
			$h_slope = $h[0];
			$h_max_index = $h[1]; 	
			$h_min_index = $h[2];

			$c_slope = $c[0];
			$c_max_index = $c[1]; 	
			$c_min_index = $c[2];			
			
			
			if ($h_slope && $ear_slope && 	// Both height and EAR contain ascend and descend slopes
			$ear_max_index == $h_max_index && $ear_min_index == $h_min_index && // EAR and height are having maximum and minimum values at the same time
			$h_max_index != $c_max_index && $h_min_index != $c_min_index) // Height and nose position are NOT having maximum and minimum values at the same time - to eliminate false results due to head up/down movement
			{
				$is_detected = true;

			}
							

			array_shift($samples); // remove first element
			array_shift($h_samples);
			array_shift($c_samples);

									
		}
		
		if ($is_detected == true)
		{
			// If detected, reset array
			
			$samples = array(); 
			$h_samples = array();
			$c_samples = array();
		}
		
		return $is_detected;
	}
				
				
	public function eye_blink($ear, $center, $height)
	{
		global $blink;
		
		if ($this->sample_window($ear, $center, $height))
		{
			$blink = $blink + 1;
		}
		
		return $blink;
	}



//	public function eye_blink($ear)
//	{
//		
//		global $minEAR;
//		global $maxEAR;
//		global $earState;
//		global $blink;
//		
//		if ($ear < $minEAR)
//		{
//			$minEAR = $ear;
//		}
//		
//		if ($ear > $maxEAR)
//		{
//			$maxEAR = $ear;
//		}
//		
//								
//		switch ($earState){
//		
//			case SEARCH:
//				if ($maxEAR - $minEAR > 0.07)
//				{
//					$earState = DETECTED;
//					
//					//$minEAR = $maxEAR;
//					$minEAR = 1.0;
//					$maxEAR = 0.0;
//				}
//			break;
//			
//			case DETECTED:
//				if ($maxEAR - $minEAR > 0.07)
//				{
//					$earState = SEARCH;
//					
//					//maxEAR = minEAR;				
//					$minEAR = 1.0;
//					$maxEAR = 0.0;
//					
//					$blink = $blink + 1;
//					
//					
//				}						
//			break;
//			
//			
//		}
//		
//		return $blink;
//	}

	/*-------------------- End Of Funtions For Eye Blink & Fidget Value --------------------*/


	/*-------------------- Funtions For Tone Analyzer --------------------*/
	
	public function convert_mp3($source)
	{

		$this->videoname = $_POST['video-filename'];

		//$fileName = $_POST['video-filename'];

		//$fileName = $request->input('video-filename');
	
	
		$target_url = 'http://api.rest7.com/v1/sound_convert.php';
	
		$file_name_with_full_path = realpath($source);
		
		///echo 'directory result mp4 -> mp3 : ' . realpath($source) . '<br>';
		
		$post = array(
			///'url' => 'https://s3-ap-southeast-1.amazonaws.com/adnexio-video-webrtc/audio-file1.flac',
			'url' => 'https://s3-ap-southeast-1.amazonaws.com/adnexio-video-webrtc/'. $this->videoname,
			
			'format' => 'mp3' //specify output format, eg. mp3, wav, flac
			
			
		);
		
		//var_dump($post);
		
	
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$target_url);
		curl_setopt($ch, CURLOPT_POST,1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		$result=curl_exec ($ch);
		curl_close ($ch);
		//echo $result . '<br>' ;
		echo 'result mp4 -> mp3 : '. $result . '<br>' ;
		
		
		$json = @json_decode($result);
		
		//var_dump($json);
			
		return $json->file;
	}
	
	
	public function speech_to_text()
	{
	
		$source = '';
		
		$audio_file = $this->convert_mp3($source);
	
		$target_url = 'https://stream.watsonplatform.net/speech-to-text/api/v1/recognize';
	
		///echo 'directory result mp3 -> text : ' . $path . '<br>';
	
		$post = file_get_contents($audio_file);
		
		//$post = 'http://api.rest7.com/temp/1545044400/77ce1e611b91b0acbacaa17c568a52f01cb7309a1387919aa93611b21c393979dde04c2f.mp3';
		
		//var_dump($post);
		
		# bluemix authentication username 
		$username = 'apikey';
	
		# bluemix authentication password 
		$password = 'KA6lvZqb2NGChYyqkbIdCHSdpJwXmsukkTMSxrGWk_8T';
	
	
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$target_url);
		curl_setopt($ch, CURLOPT_POST,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: audio/mp3'));
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);	
		//curl_setopt($ch, CURLOPT_POSTFIELDS, 'mediaupload=' . $file_name_with_full_path);
		curl_setopt($ch, CURLOPT_POSTFIELDS,  $post);
		//curl_setopt($ch, CURLOPT_POSTFIELDS,  json_encode($post, JSON_UNESCAPED_UNICODE));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		$result=curl_exec($ch);
		curl_close ($ch);
		echo 'result mp3 -> text : '. $result . '<br>' ;
		
		
		$json = @json_decode($result);
		
		//var_dump($json);
		
		$transcripts = "";
		//$confidence = "";
		
		//$i = 0;

		foreach($json->results as $result)
		{			
			//$result['personality_type']['name'];
			
			//echo $result->alternatives->transcript . '<br>' ;
			
			//$alternativesss = $result->alternatives[0]->transcript[1];
			//$alternatives = $result->confidence;
		$user = Auth::user()->id;			
			
		$select_tone = DB::table('video_interviews')->select('video_id','user_id')->where('user_id', $user)->take(1)->orderBy('video_id', 'desc')->get(); 
			
			DB::table('tone_analyzers')->insert(
				['video_id' => $select_tone[0]->video_id,
				 'user_id' => $select_tone[0]->user_id,
				 'transcript' => $result->alternatives[0]->transcript,
				 'confidence_score' => $result->alternatives[0]->confidence
				]
				
			);	
			
			//$i++;
			
			//echo $alternatives[0]->transcript . '<br>' ;
			
			$transcripts = $transcripts . $result->alternatives[0]->transcript . ". ";
			//$confidence = $confidence . $alternatives[0]->confidence . ". ";
		}
		
		//echo $transcripts;
		
		return $transcripts;
		//return $confidence;
		
		return $json->file;
	}
	
	
	public function tone_analyzer($text)
	{
	
		$target_url = 'https://gateway.watsonplatform.net/tone-analyzer/api/v3/tone?version=2017-09-21';
			
		//var_dump($post);
		
		# bluemix authentication username 
		$username = 'apikey';
	
		# bluemix authentication password 
		$password = 'LwzCdMLZezD_Wp_CU0vN1hVpyCvYl-H_f6jJ5vKX-TtA';
	
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$target_url);
		curl_setopt($ch, CURLOPT_POST,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: text/plain'
		));
		
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);	
		curl_setopt($ch, CURLOPT_POSTFIELDS,  $text);
		//curl_setopt($ch, CURLOPT_POSTFIELDS,  json_encode($post, JSON_UNESCAPED_UNICODE));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		
		$result=curl_exec($ch);
		curl_close ($ch);
		echo 'result text -> tones : '. $result . '<br>' ;
		
		$json = @json_decode($result);
		//$json = json_decode($result->getBody()->getContents());
		
		//var_dump($json);
		//$tones = $json->document_tone->tones;
		
		echo 'text -> tones : '.  '<br>' ;
		//var_dump($tones);
		
		return $json;
	
	}

	/*-------------------- End Of Funtions For Tone Analyzer --------------------*/





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //		
    }	
	
}