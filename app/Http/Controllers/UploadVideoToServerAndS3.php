<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DateTime;
use DB;


class UploadVideoToServerAndS3 extends Controller
{
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
        //echo "123";



	
		define("SEARCH", 1);
		define("DETECTED", 0);
		define("FIDGET_FPS", 10);
		
		$minEAR = 1.0;
		$maxEAR = 0.0;
		$earState = SEARCH;
		$blink = 0;
		
		$stringData = $_POST['data-string'];
		
		
			//echo '<pre>';
			//print_r($response);	
		
	  
		//var_dump($stringData);
	  
		$data = str_getcsv($stringData, ";"); //parse the rows 
	
		foreach($data as &$row) 
		{
			$row = str_getcsv($row, ","); //parse the items in rows 
		
			//echo implode(" ", $row);
			//echo "<br>";
			if (sizeof($row) == 4)
			{
				//$bl = eye_blink($row[0]);
				$b = $this->eye_blink($row[0]);
				$f = $this->fidget_value($row[1], $row[2], $row[3]);
				
				echo "Eye blink : " . $b . ", fidget : " . $f ."<br>";
			}
		}
	
	

		$file_idx = 'video-blob';
		$fileName = $_POST['video-filename'];
		$tempName = $_FILES[$file_idx]['tmp_name'];
		
		$t_minutes = $_POST['data-t-minutes'];
		//$t_seconds = $_POST['data-t-seconds']; 
		
	   
		$filePath = 'uploads/videos/' . $fileName;
		
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
			Storage::disk('s3')->put($fileName,  fopen($filePath, 'r+'), 'public');	
		}

	}



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
		
		$fidget = $fidget * 33.45 + 11.41;
		
		return $fidget;
		
	}



	public function eye_blink($ear)
	{
		
		global $minEAR;
		global $maxEAR;
		global $earState;
		global $blink;
		
		if ($ear < $minEAR)
		{
			$minEAR = $ear;
		}
		
		if ($ear > $maxEAR)
		{
			$maxEAR = $ear;
		}
		
								
		switch ($earState){
		
			case SEARCH:
				if ($maxEAR - $minEAR > 0.07)
				{
					$earState = DETECTED;
					
					//$minEAR = $maxEAR;
					$minEAR = 1.0;
					$maxEAR = 0.0;
				}
			break;
			
			case DETECTED:
				if ($maxEAR - $minEAR > 0.07)
				{
					$earState = SEARCH;
					
					//maxEAR = minEAR;				
					$minEAR = 1.0;
					$maxEAR = 0.0;
					
					$blink = $blink + 1;
					
					
				}						
			break;
			
			
		}
		
		return $blink;
	}






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