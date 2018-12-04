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
use GuzzleHttp\Client;

class PersonalityCareerController extends Controller
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

        return $user->isAdmin() ? redirect('/admin') : view('/personality/personality_career')->with(compact('user','questions', 'profiles', 'states', 'countries', 'videos'));
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



 	public function saveApiData()
{
    $requestContent = [
        //'auth' => ['Authorization' => 'Basic 67f561943ca74434b66b8740a739966c:x'],
        'headers' => [
			'Authorization' => "Basic 67f561943ca74434b66b8740a739966c:x",
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ],
        'json' => [
            'deck_id' => "career-deck"
        ]
    ];

    try {
        $client = new Client();
        $apiRequest = $client->request('POST', 'https://api.traitify.com/v1/assessments', $requestContent);
        $response = json_decode($apiRequest->getBody());
        dd($response);
    } catch (RequestException $re) {
          // For handling exception.
    }
}


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function editPost(Request $request)
    {


		
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