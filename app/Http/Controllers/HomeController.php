<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\VideoInterview;
use App\create_question;
use DB;


class HomeController extends Controller
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

        return $user->isAdmin() ? redirect('/admin') : view('home')->with(compact('user','questions','videos'));

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
		
		if($request->hasFile('profile_image')) {

			//get filename with extension
			$filenamewithextension = $request->file('profile_image')->getClientOriginalName();
	 
			//get filename without extension
			$filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
	 
			//get file extension
			$extension = $request->file('profile_image')->getClientOriginalExtension();
	 
			//filename to store
			$filenametostore = $filename.'_'.time().'.'.$extension;
			//$filenametostore = 'Desert1.jpg';
	 
			//Store $filenametostore in the database
			$user = Auth::user()->id;

			$videoname = $request->input('video_name');

			$data = array('user_id'=>$user,'video_name'=>$videoname,'video_description'=>$filenametostore);

			DB::table('video_interview')->insert($data);
				
			//Upload File to s3
			Storage::disk('s3')->put($filenametostore, fopen($request->file('profile_image'), 'r+'), 'public');
			//Storage::disk('s3')->put($filenametostore, fopen("C:\Users\Public\Pictures\Sample Pictures\Hydrangeas.jpg", 'r+'), 'public');
			//echo "profile image " . $request->file('profile_image');

			return redirect('home')->with('status', 'File save successfully.');
		}
			
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

		//$videos = DB::select('select * from users', array('value'));
 
        // users id show
        // $tasks = DB::table('users')->where('id', '=', '1')->get();
 
        // Default tasks
        ///$videos = VideoInterview::all();


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