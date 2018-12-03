<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\VideoInterview;
use App\create_question;
use App\Profiles;
use App\States;
use App\Country;
use App\User;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use DB;


class MainController extends Controller
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
		$profiles  = Profiles::where('user_id',$user->id)->get();
		//$states  = States::all();
		$states  = States::where('country_id',132)->get();
		//$countries  = Country::all();
		$countries  = Country::where('id',132)->get();		
        $videos = VideoInterview::where('user_id',$user->id)->get();

        return $user->isAdmin() ? redirect('/admin') : view('main')->with(compact('user','questions', 'profiles', 'states', 'countries', 'videos'));

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

        $user = Auth::guard($this->getGuard())->user();
		
		//if ($request->has('name','ic_no','contact_no','address','address1','postal_code','city','state','country','dob','gender')) {

		if ($request->has('val-name','val-ic_no','val-contact_no','val-address','val-address1','val-postal_code','val-city','val-state','val-country','val-dob','val-gender')) {

		$this->validate($request, [
			'val-name' => 'required|string|min:3',
			'val-ic_no' => 'required|string|min:14',
			'val-contact_no' => 'required|string|min:12',	
			'val-address' => 'required',
			'val-address1' => 'required',
			'val-postal_code' => 'required|string|min:5',
			'val-city' => 'required',
			'val-state' => 'required',
			'val-country' => 'required',
			'val-dob' => 'required',
			'val-gender' => 'required',		
		]);		
			
			
		$name = $request->input('val-name');
		$ic_no = $request->input('val-ic_no');
		$contact_no = $request->input('val-contact_no');
		$address = $request->input('val-address');
		$address1 = $request->input('val-address1');
		$postal_code = $request->input('val-postal_code');	
		$city = $request->input('val-city');		
		$state = $request->input('val-state');
		$country = $request->input('val-country');
		$dob = $request->input('val-dob');		
		$gender = $request->input('val-gender');
					

		$users = User::find ($user->id);
		$users->name = $name;
		$users->save();
		
		
		$profiles = Profiles::find($user->id);
		$profiles->ic_no = $ic_no;
		$profiles->contact_no = $contact_no;
		$profiles->address = $address;
		$profiles->address1 = $address1;
		$profiles->postal_code = $postal_code;
		$profiles->city = $city;
		$profiles->state = $state;
		$profiles->country = $country;
		$profiles->dob = $dob;
		$profiles->gender = $gender;						
		$profiles->save();
		


		}
		
	
		return redirect('/main')->with('status', 'File save successfully.');

			
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