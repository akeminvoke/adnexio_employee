<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\VideoInterview;
use App\create_question;
use App\Cv;
use DB;

class ProfileCvuploadController extends Controller
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
        $questions  = create_question::all();
        $videos = VideoInterview::where('user_id',$user->id)->get();

        return $user->isAdmin() ? redirect('/admin') : view('/profile/profile_cvupload')->with(compact('user','questions','videos'));
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
    public function filestore(Request $request)
    {
        $user = Auth::guard($this->getGuard())->user();
        $image = $request->file('file');

        $imageName = $image->getClientOriginalName();
        $upload_success = $image->move(public_path('uploads/cv'),$imageName);

        $imageUpload= Cv::create([
            'filename' => $image->getClientOriginalName(),
            'user_id' => $user->id,

        ]);


        /*$imageUpload = new Cv();
        $imageUpload->filename = $imageName;
        $imageUpload->save();*/
        return response()->json(['success'=>$imageName]);

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
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
    public function fileDestroy(Request $request)
    {

        $filename =  $request->get('filename');
        Cv::where('filename',$filename )->delete();
        $path=public_path().'/uploads/cv/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }	

}
