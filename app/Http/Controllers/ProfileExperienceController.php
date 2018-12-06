<?php

namespace App\Http\Controllers;

use App\experience;
use App\Job_Background;
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

        //   $experiences = experience::where('user_id',$user->id)->get();
//        $industry_name = DB::table('experiences')
//        ->join('industries', 'experiences.industries_id', '=', 'industries.id')
//        ->select('industries.name')
//        ->where('experiences.user_id',$user->id )
//        ->get();


        $Company_Names = DB::table('experiences')
            ->join('companies', 'experiences.company_id', '=', 'companies.id')
            ->leftjoin('job_specifications','job_specifications.id','=','experiences.job_specifications_id')
            ->join('job_backgrounds','job_backgrounds.id','=','experiences.specialization_id')
            ->select('experiences.id','companies.name','experiences.position','experiences.specialization_id','experiences.start_year','experiences.start_month',
                'experiences.end_year','experiences.end_month','experiences.job_specifications_id','experiences.position','experiences.salary','experiences.job_desc','experiences.pjs','experiences.jd_present','job_specifications.job_specification','job_backgrounds.Job_Background')
            ->where('experiences.user_id',$user->id )
            ->wherenull('experiences.deleted_at')
            ->get();



        return $user->isAdmin() ? redirect('/admin') : view('/profile/profile_experience')->with(compact('user','questions',
            'Company_Names'));
    }

    private function getGuard()
    {
        return property_exists($this, 'guard') ? $this->guard : null;
    }

    public function getjb()
    {

        $jb= DB::table('Job_backgrounds')->select('Id','Job_Background')->get();

        return response()->json($jb);

    }



    public function getjobspec(request $request)
    {



        $js= DB::table('Job_specifications')->select('Id','Job_Specification')->where('Job_Background_ID',$request->specialization)->get();

        return response()->json($js);

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
            'company_name' => 'required',
            'jd_start_year' => 'required',
            'jd_start_month' => 'required',
            'specialization' => 'required',
            //'position_level' => 'required',
            'salary' => 'required',
            'job_spec' => 'required',
            //'job_desc' => 'required',


        ]);

        //$company_exist = company::select('name')->where('name', $request->company_name_edit)->take(1)->get();

        //if( !isset($company_exist)) {
            $add_company = new company();
            $add_company ->name = $request->company_name;
            $add_company->save();
            $company_id = company::select('id')->where('name', $request->company_name)->take(1)->get();
            //  $company_id = company::find('name',$request->company_name_edit)->select('id')->get();
        //}else {
            // $company_id = company::find('name',$request->company_name_edit)->select('id')->get();\
            //$company_id = company::select('id')->where('name', $request->company_name_edit)->take(1)->get();
        //} ;



        //$industry_id=industry::select('id')->where('name',$request->industry)->get();


        $company_id = company::select('id')->where('name', $request->company_name)->take(1)->get();
        $experience = new experience();
        $experience->user_id = $user->id;
        $experience->company_id = $company_id[0]->id;
        $experience->position = $request->position;
        $experience->specialization_id = $request->specialization;

        $experience->start_year = $request->jd_start_year;
        $experience->start_month = $request->jd_start_month;

        if($request->val_present === 'Present') {
            $experience->jd_present = $request->val_present;
            $experience->end_year = "Present";
            $experience->end_month = "Present";
        } else
        {
            $experience->end_year = $request->jd_end_year;
            $experience->end_month = $request->jd_end_month;
            $experience->jd_present = null;
        }


        $experience->salary = $request->salary;

        $experience->job_desc = $request->job_desc;
        // $experience->job_specifications_id = $request->job_spec;


        if( isset($request->other_job_spec)) {
            $experience->job_specifications_id = null;
            $experience->pjs = $request->other_job_spec;
        }
        else{
            $experience->job_specifications_id = $request->job_spec;
            $experience->pjs = null;
        }

        //$experience->industry_id = $industry_id;

        $experience->save();




        return redirect('/profile/profile_experience');
        //  return response()->json($experience);
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

        $this->validate($request, [
            'position' => 'required',


        ]);
        $company_exist = company::select('name')->where('name', $request->company_name_edit)->first();
        // $company_exist = company::find('name',$request->company_name_edit);



        $user = Auth::guard($this->getGuard())->user();
        $experiences = experience::where('user_id',$user->id)->get();

        $experience = experience::find ($request->id);
        $experience->position = $request->position;
        $experience->specialization_id = $request->specialization_id;

        if( isset($request->keyin_job_spec_edit)) {
            $experience->job_specifications_id = null;
            $experience->pjs = $request->keyin_job_spec_edit;
        }
        else{
            $experience->job_specifications_id = $request->specification_id;
            $experience->pjs = null;
        }
        //$experience->job_specifications_id = $request->specification_id;
        $experience->start_year = $request->jd_start_year;
        $experience->start_month = $request->jd_start_month;
        // $experience->end_year = $request->jd_end_year;
        //$experience->end_month = $request->jd_end_month;
        $experience->salary = $request->salary;
        $experience->job_desc = $request->job_desc_edit;
        if(!$company_exist ) {
            $add_company = new company();
            $add_company ->name = $request->company_name_edit;
            $add_company->save();
            $company_id = company::select('id')->where('name', $request->company_name_edit)->take(1)->get();
            //  $company_id = company::find('name',$request->company_name_edit)->select('id')->get();
        }else {
            // $company_id = company::find('name',$request->company_name_edit)->select('id')->get();\
            $company_id = company::select('id')->where('name', $request->company_name_edit)->take(1)->get();
        } ;


        if($request->val_present === 'Present') {
            $experience->jd_present = $request->val_present;
            $experience->end_year = "Present";
            $experience->end_month = "Present";
        } else
        {
            $experience->end_year = $request->jd_end_year;
            $experience->end_month = $request->jd_end_month;
            $experience->jd_present = null;
        }
        $experience->company_id = $company_id[0]->id ;
        $experience->save();



    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {

        $deletedexp = experience::where('id',$request->valexperiencedelete )->delete();

        return redirect('/profile/profile_experience');

    }

}
