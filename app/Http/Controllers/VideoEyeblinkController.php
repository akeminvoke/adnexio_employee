<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\VideoInterview;




class VideoEyeBlinkController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$videos = VideoInterview::all();
		
		return response()->json([
			"message" => "successful",
			"data" => $videos
		]);
    }



    public function create()
    {
        //
    }



    public function store(Request $request)
    {


		//$video = VideoInterview::find ($request->video_id);
		$video = VideoInterview::where('video_id', '77')->first();
		$video->eye_blink = $request->eye_blink;
		$video->save();
		return response()->json([
			'message' => 'Insert successfully'
		]);




		
	}



    public function show()
    {	
		//
    }



    public function edit($id)
    {
        //
    }



    public function update(Request $request)
    {

    }



    public function destroy($id)
    {
        //
    }	

}

