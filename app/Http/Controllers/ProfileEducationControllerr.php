<?php

namespace App\Http\Controllers;

use App\create_question;
use App\educations;
use App\Http\Requests\validate_education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Response;


class ProfileEducationControllerr extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


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
            ->leftjoin('academic_fields as e','a.academic_fields_id','=','e.id')
            ->leftjoin('courses as g','g.id','=','a.courses_id')
            ->leftjoin('universities as f','a.university_name','=','f.id')
            ->select('a.university_name','a.id','a.countries_id','a.academic_fields_id as field','a.major','a.courses_id','e.academic_field','a.other_academic_field','a.other_course',
                    'a.graduation_date','a.countries_id','a.grade','a.cgpa','a.desc','c.name as cname','g.course as gname','d.name as qname','a.qualifications_id','a.other_uni','a.desc','f.name as fname')
            ->where('a.user_id',$user->id )
            ->wherenull('a.deleted_at')
            ->get();

        return $user->isAdmin() ? redirect('/admin') : view('/profile/profile_education')
            ->with(compact('user','questions','educations'));
    }


    public function create()
    {


    }


    public function store(validate_education $request)
    {
        $add_education = new educations();

        $add_education->saveEducation($request);

    }


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

    public function getselectedcourse(request $request)
    {

        $course= DB::table('courses')->select('id','course as coursename')->where('academic_fields_id',$request->industry)->get();

        return response()->json($course);

    }

    public function getAllCourse(request $request)
    {

        $course= DB::table('courses')->select('id','course')->get();

        return response()->json($course);




    }

    public function getuni()
    {

        $universities= DB::table('universities')->get();
        return response()->json($universities);

    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request)
    {

        $education = new educations();

        $this->validate($request, [
            'institute_name' => 'required',
            'qualification' => 'required',

        ]);

       $education->updateEducation($request);


    }


    public function destroy(request $request )
    {
        $deletedEdu = educations::where('id',$request->valeducationdelete )->delete();

        return redirect('/profile/profile_education');
    }

    private function getGuard()
    {
    }

}
