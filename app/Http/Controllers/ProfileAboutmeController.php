<?php

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

class ProfileAboutmeController extends Controller
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
		$states  = States::all();
		$countries  = Country::all();
        $videos = VideoInterview::where('user_id',$user->id)->get();

        return $user->isAdmin() ? redirect('/admin') : view('/profile/profile_aboutme')->with(compact('user','questions', 'profiles', 'states', 'countries', 'videos'));
    }

    private function getGuard()
    {
        return property_exists($this, 'guard') ? $this->guard : null;
    }
	
	
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     *
     *
     */
    public function pull(Request $request)
    {

        $pull = Auth::guard($this->getGuard())->user();

        return response()->json($pull);


    }


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
    public function editPost(Request $request)
    {


		
		
        $user = Auth::guard($this->getGuard())->user();
		
		//if ($request->has('name','ic_no','contact_no','address','address1','postal_code','city','state','country','dob','gender')) {

		if ($request->has('name','ic_no','contact_no','address','address1','postal_code','city','state','country','dob','gender')) {

		$this->validate($request, [
			'name' => 'required|string|min:3',
			'ic_no' => 'required|string|min:14',
			'contact_no' => 'required|string|min:12',	
			'address' => 'required',
			'address1' => 'required',
			'postal_code' => 'required|string|min:5',
			'city' => 'required',
			'state' => 'required',
			'country' => 'required',
			'dob' => 'required',
			'gender' => 'required',		
		]);		
			
			
		$name = $request->name;
		$ic_no = $request->ic_no;
		$contact_no = $request->contact_no;		
		$address = $request->address;
		$address1 = $request->address1;	
		$postal_code = $request->postal_code;	
		$city = $request->city;		
		$state = $request->state;
		$country = $request->country;
		$dob = $request->dob;		
		$gender = $request->gender;		

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
		
		
		
		return redirect('/profile/profile_aboutme')->with('status', 'File save successfully.');
		
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
    public function destroy($id)
    {
        //
    }	

}
