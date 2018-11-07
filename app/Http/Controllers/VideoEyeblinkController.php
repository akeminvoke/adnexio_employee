<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\VideoInterview;
use App\create_question;
use DB;




class VideoEyeBlinkController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index()
    {
        $user = Auth::guard($this->getGuard())->user();	
        $questions  = create_question::all();
        $videos = VideoInterview::where('user_id',$user->id)->get();

        return $user->isAdmin() ? redirect('/admin') : view('/video/video_pastrecord')->with(compact('user','questions','videos'));
		
		//return response()->json([
		//	"message" => "successful",
		//	"data" => $videos
		//]);
    }

    private function getGuard()
    {
        return property_exists($this, 'guard') ? $this->guard : null;
    }

    public function create()
    {
        //
    }



    public function store(Request $request)
    {

		
		$video_id = $request->video_id;
		$video_name = $request->video_name;
		//$user_id = $request->user_id;
		$eye_blink = $request->eye_blink;

		$video = VideoInterview::where("video_name",$video_name)
		->update( 
		   array( 
				 //"user_id" => $user_id,
				 "eye_blink" => $eye_blink
				 )
		   );
		return response()->json([
			'message' => 'Insert successfully'
		]);
		
		//$video_id = $request->video_id;
		//$eye_blink = $request->eye_blink;
		
		//DB::table('video_interviews')
        //    ->where('video_id', $video_id)
        //    ->update(['eye_blink' => $eye_blink]);
		//return response()->json([
		//	'message' => 'Insert successfully'
		//]);
		
	}



    public function show()
    {	
		$videos = VideoInterview::all();
		
		return response()->json([
			"message" => "successful",
			"data" => $videos
		]);
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

