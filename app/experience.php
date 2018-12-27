<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;


class experience extends Model
{
    use SoftDeletes;
    protected $table = 'experiences';

    protected $fillable = [
        'id','user_id','company_id','position','position_level','specialization_id','start_year','start_month','end_month','end_year','salary','industry_id','job_desc','job_specifications_id','pjs','jd_present',
    ];

    protected $dates =['deleted_at'];


    public function company() {
        return $this->belongsTo('App\company');
    }

    public function industry() {
        return $this->hasone('App\industry');
    }

    public function user()
    {
        return $this->hasMany('App\User',experience_id,id);
    }

    public function saveExperience($request)
    {
        $user = Auth::user();

        $company_exist = company::select('name')->where('name', $request['company_name_edit'])->take(1)->get();


        if( isset($company_exist)) {
            $add_company = new company();
            $add_company ->name = $request['company_name'];
            $add_company->save();
            $company_id = company::select('id')->where('name', $request['company_name'])->take(1)->get();
            //  $company_id = company::find('name',$request->company_name_edit)->select('id')->get();
        }else {
            // $company_id = company::find('name',$request->company_name_edit)->select('id')->get();\
            $company_id = company::select('id')->where('name', $request['company_name_edit'])->take(1)->get();
        } ;

        //$industry_id=industry::select('id')->where('name',$request->industry)->get();

        //   $company_id = company::select('id')->where('name', $request->company_name)->take(1)->get();
//        $experience = new experience();
        $this->user_id = $user->id;
        $this->company_id = $company_id[0]->id;
        $this->position = $request['position'];
        $this->specialization_id = $request['specialization'];
        $this->start_year = $request['jd_start_year'];
        $this->start_month = $request['jd_start_month'];

        if($request['val_present'] === 'Present') {
            $this->jd_present = $request['val_present'];
            $this->end_year = $request['Present'];
            $this->end_month = "Present";
        } else
        {
            $this->end_year = $request['jd_end_year'];
            $this->end_month = $request['jd_end_month'];
            $this->jd_present = null;
        }


        $this->salary = $request['salary'];

        $this->job_desc = $request['job_desc'];
        // $experience->job_specifications_id = $request->job_spec;


        if( !empty($request['other_job_spec'])) {
            $this->job_specifications_id = null;
            $this->pjs = $request['other_job_spec'];
        }
        else{
            $this->job_specifications_id = $request['job_spec'];
            $this->pjs = null;
        }

        //$experience->industry_id = $industry_id;

        $this->save();


        //  return response()->json($experience);


        return 1;
    }

    public function updateExperience($request){

        $company_exist = company::select('name')->where('name', $request['company_name_edit'])->first();
        // $company_exist = company::find('name',$request->company_name_edit);


        $user = Auth::user();

        $experiences = experience::where('user_id',$user->id)->get();

        $experience = experience::find($request['id']);
        $experience->position = $request['position'];
        $experience->specialization_id = $request['specialization_id'];

        if( !empty($request['keyin_job_spec_edit'])) {
            $experience->job_specifications_id = null;
            $experience->pjs = $request['keyin_job_spec_edit'];
        }
        else{
            $experience->job_specifications_id = $request['specification_id'];
            $experience->pjs = null;
        }
        //$experience->job_specifications_id = $request->specification_id;
        $experience->start_year = $request['jd_start_year'];
        $experience->start_month = $request['jd_start_month'];
        // $experience->end_year = $request['jd_end_year'];
        //$experience->end_month = $request->jd_end_month;
        $experience->salary = $request['salary'];
        $experience->job_desc = $request['job_desc_edit'];
        if(!$company_exist ) {
            $add_company = new company();
            $add_company ->name = $request['company_name_edit'];
            $add_company->save();
            $company_id = company::select('id')->where('name', $request['company_name_edit'])->take(1)->get();
            //  $company_id = company::find('name',$request->company_name_edit)->select('id')->get();
        }else {

            $company_id = company::select('id')->where('name', $request['company_name_edit'])->take(1)->get();
        } ;


        if($request['val_present'] === 'Present') {
            $experience->jd_present = $request['val_present'];
            $experience->end_year = "Present";
            $experience->end_month = "Present";
        } else
        {
            $experience->end_year = $request['jd_end_year'];
            $experience->end_month = $request['jd_end_month'];
            $experience->jd_present = null;
        }
        $experience->company_id = $company_id[0]->id ;
        $experience->save();


    }

}

