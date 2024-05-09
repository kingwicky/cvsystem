<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\CpanelUser;
use App\Models\PersonalInfo;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Language;
use Illuminate\Support\Facades\DB;

class CpanelController extends Controller
{


    public function createCpanelAccount(Request $request){

        $username = $request->input('un');
        $pw = $request->input('pw');
        $name = $request->input('name');

        $cpanelUser = CpanelUser::where('username',$username)->first();
        if($cpanelUser){
            return response()->json(['result'=>false,'msg'=>'Username already exists.']);
        }else{


            $status = CpanelUser::insert(['name'=>$name,'username'=>$username,'password'=>bcrypt($pw),'status' => 1]);
            if($status){
                return response()->json(['result'=>true,'msg'=>'Account has been created.']);
            }else{
                return response()->json(['result'=>false,'msg'=>'Failed to create cpanel account, Please try again.']);
            }


            
        }


    }

    public function searchSeekers(Request $request){

        $field = $request->field;
        $qualification = $request->qualification;
        $position = $request->position;
        $lang = $request->language;

        
        $query = DB::table('personal_informations')
        ->join('user_educations', 'personal_informations.id', '=', 'user_educations.info_id')
        ->join('user_experiences', 'personal_informations.id', '=', 'user_experiences.info_id')
        ->join('user_languages', 'personal_informations.id', '=', 'user_languages.info_id')
        ->select('personal_informations.*');

        if ($field !== "0") {
            $query->where('user_educations.field', $field);
        }
        if ($qualification !== "0") {
            $query->where('user_educations.qualification', $qualification);
        }
        if ($position !== "0") {
            $query->where('user_experiences.position', $position);
        }
        if ($lang !== "0") {
            $query->where('user_languages.language', $lang);
        }
    
        $results = $query->distinct()->get();
        $viewList = array();

        foreach ($results as $result) {
            $name = $result->fname." ".$result->lname;
            $view = '<div class="col-md-4">

            <div class="card">
                <div class="card-header">
                    <h4>'.$result->title.'</h4>
                </div>

                <div class="card-body">


                    <div class="col-md-12">
                        <div class="row">

                            <div class="col-md-4">
                                <span>Name</span>
                            </div>
                            <div class="col-md-8">
                                <p>'.$name.'</p>
                            </div>


                        </div>
                    </div>

<hr>

                    <div class="col-md-12">
                        <div class="row">

                            <div class="col-md-4">
                                <span>E-mail Address</span>
                            </div>
                            <div class="col-md-8">
                                <p>'.$result->email.'</p>
                            </div>


                        </div>
                    </div>

                    <hr>

                    <div class="col-md-12">
                        <div class="row">

                            <div class="col-md-4">
                                <span>Contact No</span>
                            </div>
                            <div class="col-md-8">
                                <p>'.$result->mobile.'</p>
                            </div>


                        </div>
                    </div>

                    <hr>


                    <div class="col-md-12">
                        <div class="row">

                            <div class="col-md-4">
                                <span>Gender</span>
                            </div>
                            <div class="col-md-8">
                                <p>'.$result->gender.'</p>
                            </div>


                        </div>
                    </div>

                    <hr>

                    <a href='.route("cpanel.preview",["uid"=>$result->id]).' class="btn btn-secondary">View Details</a>

                </div>

            </div>

        </div>';

        array_push($viewList,$view);

        }


        
        return response()->json(['result'=>true,'data'=>$viewList,'sample'=>$results]);
    }

    public function setupFindPage(){

            $fields = Education::distinct()->orderby('field','asc')->pluck('field');
            $qualifications = Education::distinct()->orderby('qualification','asc')->pluck('qualification');
            $positions = Experience::distinct()->orderby('position','asc')->pluck('position');
            $languages = Language::distinct()->orderby('language','asc')->pluck('language');

            return view('cpanel_find',compact('fields','qualifications','positions','languages'));

    }

    public function previewCv($uid){
        
        if(empty(session('CPANEL_UID'))){
            return redirect()->route('cpanel.login.view');
        }else{
            $info = PersonalInfo::where('id',$uid)->with('languages')->with('educations')->with('experiences')->first();
            return view('cpanel_preview',compact('info'));
        }


    }

    public function viewCpanelHome(){

        if(empty(session('CPANEL_UID'))){
            return redirect()->route('cpanel.login.view');
        }else{
            $cvData = PersonalInfo::with('languages')->get();
            return view('cpanel_dashboard',compact('cvData'));
        }

        


    }




    public function loginToCpanel(Request $request){

        $fields = $request->only(['username','pwd']);
        $cpanelUser = CpanelUser::where('username',$fields['username'])->first();
        
        if($cpanelUser){

            if($cpanelUser->status == 1){
                if(password_verify($fields['pwd'],$cpanelUser->password)){

                    $request->session()->put('CPANEL_UID',$cpanelUser->id);
                    $request->session()->put('CPANEL_NAME',$cpanelUser->name);
                    return response()->json(['result'=>true,'msg'=>'_verified_']);
                }else{
                    return response()->json(['result'=>false,'msg'=>'Invalid cpanel credentials.']);
                }
            }else{
                return response()->json(['result'=>false,'msg'=>'The account has been disabled.']);
            }


            
        }else{
            return response()->json(['result'=>false,'msg'=>'Invalid cpanel user.']);
        }



        


    }
}
