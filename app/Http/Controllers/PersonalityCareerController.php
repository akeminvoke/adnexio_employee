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
use GuzzleHttp\Client;
use App\Personality;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use DB;



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
		$personalities = Personality::where('user_id',$user->id)
		//->wherenull('deleted_at')
		->orderBy('personality_id', 'desc')
		->take(1)
		->get();

        return $user->isAdmin() ? redirect('/admin') : view('/personality/personality_career')->with(compact('user','questions', 'profiles', 'states', 'countries', 'videos', 'personalities'));
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
    public function store(Request $request)
    {

		$client = new Client();
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

        $apiRequest = $client->request('POST', 'https://api.traitify.com/v1/assessments', $requestContent);
        $response = json_decode($apiRequest->getBody()->getContents());
        
		//$response = $response->getBody()->getContents();
		//echo '<pre>';
		//print_r($response);		
		
		///dd($response);
		
		
		$user = Auth::guard($this->getGuard())->user();
		
		$data = new Personality();
		$data->user_id = $user->id;
        $data->assessment_id = $response->id;
        $data->save();
        //return response()->json('Successfully added');
		
		return redirect('/personality/personality_career')->with('status', 'File save successfully.');
			
	}


	public function getRequest(Request $request)
    {
		
        $client = new Client();
		$requestContent = [
			//'auth' => ['Authorization' => 'Basic 67f561943ca74434b66b8740a739966c:x'],
			'headers' => [
				'Authorization' => "Basic 67f561943ca74434b66b8740a739966c:x",
				'Accept' => 'application/json',
				'Content-Type' => 'application/json',
			],
			'query' => [
				'data' => 'types',
				//'data' => 'blend,types,traits,career_matches',
			]
		];
		
		$user = Auth::guard($this->getGuard())->user();
		
		$assessment_id = $request->input('assessment_id');
		
		//$personalities = Personality::find($user->id);
		$personalities = Personality::where('assessment_id', $assessment_id)->firstOrFail();
		//$personalities = Personality::where('assessment_id','=',$assessment_id)->find(1);
		//$personalities = Personality::where('assessment_id', $assessment_id)->find(2);
		//$personalities = Personality::where('assessment_id', $assessment_id)->first();
		//$personalities->assessment_id = $assessment_id;
		
        //$request = $client->get('https://api.traitify.com/v1/assessments/5c01e0c5-7099-428b-8614-d2aacff488fc', $requestContent);
		$request = $client->get('https://api.traitify.com/v1/assessments/' . $assessment_id .'', $requestContent);
        $response = json_decode($request->getBody()->getContents());
        //echo '<pre>';
        //print_r($response);
        //exit;
		
		$personalities->score = $response->personality_types[0]->score;
		$personalities->score2 = $response->personality_types[1]->score;
		$personalities->score3 = $response->personality_types[2]->score;
		$personalities->score4 = $response->personality_types[3]->score;
		$personalities->score5 = $response->personality_types[4]->score;
		$personalities->score6 = $response->personality_types[5]->score;
		$personalities->score7 = $response->personality_types[6]->score;
		$personalities->save();
		
		return redirect('/personality/personality_career')->with('status', 'File save successfully.');
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