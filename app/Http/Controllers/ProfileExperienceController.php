<?php

namespace App\Http\Controllers;

use App\experience;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

use Illuminate\Support\Facades\Input;
use Response;
use Illuminate\Support\Facades\Auth;
use App\VideoInterview;
use App\create_question;
use App\company;
use DB;



class ProfileExperienceController extends Controller
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
        $experiences = experience::where('user_id',$user->id)->get();
        $industry_name = DB::table('experiences')
        ->join('industries', 'experiences.industries_id', '=', 'industries.id')
        ->select('industries.name')
        ->where('experiences.user_id',$user->id )
        ->get();


        $Company_Names = DB::table('experiences')
            ->join('companies', 'experiences.company_id', '=', 'companies.id')
            ->select('experiences.id','companies.name','experiences.position','experiences.position_level','experiences.specialization','experiences.start_year','experiences.start_month',
                'experiences.end_year','experiences.end_month','experiences.position','experiences.salary')
            ->where('experiences.user_id',$user->id )
            ->get();



        return $user->isAdmin() ? redirect('/admin') : view('/profile/profile_experience')->with(compact('user','questions','videos',
            'experiences','industry_name','Company_Names'));
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

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request  $request)
    {

        $user = Auth::user();


       $this->validate($request, [
     'position' => 'required',
          'company_name'=> 'required',
           'jd_start_year'=> 'required',
           'jd_start_month'=> 'required',
          'specialization'=> 'required',
          'position_level'=> 'required',
         'salary'=> 'required',

       ]);





            $company = new company();
            $company->name = $request->company_name;
            $company->save();

            //$industry_id=industry::select('id')->where('name',$request->industry)->get();


            $company_id = company::select('id')->where('name', $request->company_name)->take(1)->get();
            $experience = new experience();
            $experience->user_id = $user->id;
            $experience->company_id = $company_id[0]->id;
            $experience->position = $request->position;
            $experience->specialization = $request->specialization;
            $experience->position_level = $request->position_level;
            $experience->start_year = $request->jd_start_year;
            $experience->start_month = $request->jd_start_month;
            if ($request->has('jd_end_year')) {
                $experience->end_year = $request->jd_end_year;
                $experience->end_month = $request->jd_end_month;
            }
            $experience->salary = $request->salary;
            //$experience->industry_id = $industry_id;

            $experience->save();
            return response()->json($experience);
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
    public function update(Request $request)
    {

        $user = Auth::guard($this->getGuard())->user();
        $experiences = experience::where('user_id',$user->id)->get();

        $experience = experience::find ($request->id);
        $experience->position = $request->position;
       $experience->position_level = $request->position_level;
        $experience->specialization = $request->specialization;
       $experience->start_year = $request->jd_start_year;
     $experience->start_month = $request->jd_start_month;
        $experience->end_year = $request->jd_end_year;
        $experience->end_month = $request->jd_end_month;
       $experience->salary = $request->salary;
        $experience->save();

        $sample = experience::getAge();

       // $read_experience=experience::where('id',$request->id)->take(1)->get();

       // return response()->json($experience);
       // return response()->json(['experience'=>$read_experience]);
        //return Redirect::to('/profile/profile_experience');
        //return redirect('/profile/profile_experience');

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
