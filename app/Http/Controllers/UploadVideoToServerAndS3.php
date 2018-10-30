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

		$file_idx = 'video-blob';
		$fileName = $_POST['video-filename'];
		$tempName = $_FILES[$file_idx]['tmp_name'];
	   
		$filePath = 'uploads/videos/' . $fileName;
		
		//Store data in the database
		$user = Auth::user()->id;
		$videoname = $request->input('video-filename');
		$now = new DateTime();
		
		$data = array('user_id'=>$user,'video_name'=>$videoname,'created_at'=>$now);
		DB::table('video_interviews')->insert($data);
		
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