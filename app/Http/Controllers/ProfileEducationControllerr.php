<?php

namespace App\Http\Controllers;

use App\create_question;
use App\educations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Response;


class ProfileEducationControllerr extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::guard($this->getGuard())->user();
        $questions  = create_question::all();

//        $Company_Names = DB::table('experiences')
//            ->join('companies', 'experiences.company_id', '=', 'companies.id')
//            ->leftjoin('job_specifications','job_specifications.id','=','experiences.job_specifications_id')
//            ->join('job_backgrounds','job_backgrounds.id','=','experiences.specialization_id')
//            ->select('experiences.id','companies.name','experiences.position','experiences.specialization_id','experiences.start_year','experiences.start_month',
//                'experiences.end_year','experiences.end_month','experiences.job_specifications_id','experiences.position','experiences.salary','experiences.job_desc','experiences.pjs','experiences.jd_present','job_specifications.job_specification','job_backgrounds.Job_Background')
//            ->where('experiences.user_id',$user->id )
//            ->wherenull('experiences.deleted_at')
//            ->get();

        $educations = DB::table('educations as a')

                     ->join('countries as c' ,'c.id','=','a.countries_id')
                     ->join('qualifications as d','d.id','=','a.qualifications_id')
            ->join('academic_fields as e','a.academic_fields_id','=','e.id')
            ->join('universities as f','a.university_name','=','f.id')
            ->select('a.university_name','a.id','a.countries_id','a.academic_fields_id as field','a.major','a.courses_id','e.academic_field',
                    'a.graduation_date','a.countries_id','a.grade','a.cgpa','a.desc','c.name as cname','d.name as qname','a.qualifications_id','a.other_uni','a.desc','f.name as fname')->get();

        return $user->isAdmin() ? redirect('/admin') : view('/profile/profile_education')
            ->with(compact('user','questions','educations'));
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
    public function store(Request $request)
    {

        $this->validate($request, [
            'university_name' => 'required',

        ]);




        $user = Auth::user();
        $add_education = new educations();
        $add_education->university_name = $request->university_name;
        $add_education->graduation_date = $request->graduation_date;
        $add_education->user_id = $user->id;
        $add_education->countries_id = $request->country_institute;
       // $add_education->states_id = $request->state_institute;
        $add_education->major = $request->add_major;
        $add_education->academic_fields_id = $request->add_field;
        $add_education->courses_id = $request->add_course;
        $add_education->grade = $request->add_grade;
        $add_education->qualifications_id = $request->add_qualification;
        $add_education->cgpa = $request->add_cgpa;
        $add_education->other_uni = $request->add_others_uni;
        $add_education->desc = $request->add_information;

        $add_education->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function getcountry()
    {

        $countries= DB::table('countries')->select('id','name')->get();

        return response()->json($countries);

    }

    public function getstates(request $request)
    {

        $states= DB::table('states')->select('id','name')->where('country_id',$request->country)->get();

        return response()->json($states);

    }

    public function getcourse(request $request)
    {

        $course= DB::table('courses')->select('id','course')->where('academic_fields_id',$request->field)->get();

        return response()->json($course);

    }

    public function getuni()
    {

        $universities= DB::table('universities')->get();
        return response()->json($universities);

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
            'institute_name' => 'required',
            'qualification' => 'required',

        ]);


        $education = educations::find ($request->id);
        $education->university_name = $request->institute_name;
        $education->other_uni = $request->others_institute_name;
        $education->qualifications_id = $request->qualification;
        $education->graduation_date = $request->graduation_date;
        $education->countries_id = $request->country_institute;
        $education->courses_id = $request->course;
        $education->major = $request->major;
        $education->grade = $request->grade;
        $education->cgpa = $request->cgpa;
        $education->desc = $request->information;

        $education->save();


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

    private function getGuard()
    {
    }

}
