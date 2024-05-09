<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\PersonalInfo;
use App\Models\Language;
use App\Models\Education;
use App\Models\Experience;

class UserController extends Controller
{


    public function downloadPersonalInfo(){

        if(empty(session('uid'))){
            return redirect()->route('welcome');
        }else{
            $info = PersonalInfo::where('user_id',session('uid'))->with('languages')->with('educations')->with('experiences')->first();
            return view('dashboard',compact('info'));
        }

        
    }


    public function previewCv(){
        if(empty(session('uid'))){
            return redirect()->route('welcome');
        }else{
            $info = PersonalInfo::where('user_id',session('uid'))->with('languages')->with('educations')->with('experiences')->first();
            return view('preview',compact('info'));
        }
    }


    public function signout(Request $request){

        $request->session()->flush();
        return redirect()->route('welcome');

    }


    public function updatePwd(Request $request){
        $currentPwd = $request->input('cpassword');
        $newPwd = $request->input('newpassword');
        $reNewPwd = $request->input('confirmPassword');

        if($newPwd != $reNewPwd){
            return response()->json(['result'=>false,'msg'=>'New password confirmation failed, please try again.']);
        }else{
            $user = User::where('id',session('uid'))->first();
            if($user){
    
                if(password_verify($currentPwd,$user->password)){

                    $user->password = bcrypt($newPwd );

                    if($user->save()){
                        $request->session()->flush();
                        return response()->json(['result'=>true,'msg'=>'Password has been updated successfully.']);
                    }else{
                        return response()->json(['result'=>false,'msg'=>'Failed to update the password, please try again.']);
                    }

                    


                }else{
                    return response()->json(['result'=>false,'msg'=>'Old password verification failed.']);
                }
    
    
            }else{
                return response()->json(['result'=>false,'msg'=>'User verification failed, please login and try again.']);
            }
        }

       



        
    }


    


    public function removeExperience(Request $request){
        $expId = $request->input('expId');

        $info = PersonalInfo::where('user_id',session('uid'))->first();
        if($info){

            if(Experience::find($expId)->delete()){
                return response()->json(['result'=>true,'msg'=>'Experience has been removed successfully.']);
            }else{
                return response()->json(['result'=>false,'msg'=>'Failed to remove your experience details, please try again.']);
            }

            
        }else{
            return response()->json(['result'=>false,'msg'=>'Failed to verify your account, please login and try again.']);
        }



        
    }

    

    public function removeEducation(Request $request){
        $eduId = $request->input('eduId');

        $info = PersonalInfo::where('user_id',session('uid'))->first();
        if($info){

            if(Education::find($eduId)->delete()){
                return response()->json(['result'=>true,'msg'=>'Education detail has been removed successfully.']);
            }else{
                return response()->json(['result'=>false,'msg'=>'Failed to remove your education details, please try again.']);
            }

            
        }else{
            return response()->json(['result'=>false,'msg'=>'Failed to verify your account, please login and try again.']);
        }



        
    }

    public function removeLanguage(Request $request){
        $langId = $request->input('langId');

        $info = PersonalInfo::where('user_id',session('uid'))->first();
        if($info){

            if(Language::find($langId)->delete()){
                return response()->json(['result'=>true,'msg'=>'Language has been removed successfully.']);
            }else{
                return response()->json(['result'=>false,'msg'=>'Failed to remove your language details, please try again.']);
            }

            
        }else{
            return response()->json(['result'=>false,'msg'=>'Failed to verify your account, please login and try again.']);
        }



        
    }




    public function updateCv(Request $request){

        // $request->validate([
        //     // 'profile_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        //     'profile_image' => 'image|mimes:jpeg,png,jpg',
        // ]);


        $title = $request->input('title');
        $summary = $request->input('summary');
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $cod = $request->input('cod');
        $tel = $request->input('tel');
        $address1 = $request->input('address1');
        $address2 = $request->input('address2');
        $state = $request->input('state');
        $zip = $request->input('zip');
        $country = $request->input('country');
        $dob = $request->input('dob');
        $sex = $request->input('sex');
        $dateTime = now()->format('Y-m-d H:i:s');
    

        $eduArray = json_decode($request->input('education_list'),true);
        $expArray = json_decode($request->input('experience_list'),true);
        $langArray = json_decode($request->input('language_list'),true);

        $info = PersonalInfo::where('user_id',session('uid'))->first();

        if($info){


            $info->title = $title;
            $info->summary = $summary;
            $info->fname = $fname;
            $info->lname = $lname;
            $info->country_code = $cod;
            $info->mobile = $tel;
            $info->address1 = $address1;
            $info->address2 = $address2;
            $info->state = $state;
            $info->zip = $zip;
            $info->country = $country;
            $info->dob = $dob;
            $info->gender = $sex;
            $info->updated_at = $dateTime;


            if ($request->hasFile('profile_image')) {

               
                    $file = $request->file('profile_image');
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $file->move('storage/images', $fileName);
                    $info->profile_image = 'images/' . $fileName;
                    
           

                // $imagePath = $request->file('profile_image')->store('images', 'public');

                // $info->profile_image = $imagePath;

              }


            if($info->save()){


                
                if(!empty($eduArray)){

                    foreach($eduArray as $eduObj){
                        $eduField = $eduObj['field'];
                        $eduQualification = $eduObj['qualification'];
                        $eduSchool = $eduObj['school'];
                        $eduYear = $eduObj['year'];
                        $eduStatus = $eduObj['status'];


                        $education = new Education();
                        $education->field = $eduField;
                        $education->qualification = $eduQualification;
                        $education->school = $eduSchool;
                        $education->year = $eduYear;
                        $education->status = $eduStatus;
                        $education->info_id = $info->id;

                        $education->save();




                    }

                }



                if(!empty($expArray)){

                    foreach($expArray as $expObj){
                        $expPosition = $expObj['position'];
                        $expCompany = $expObj['company'];
                        $expDuration = $expObj['duration'];

                        $experience = new Experience();
                        $experience->position = $expPosition;
                        $experience->company = $expCompany;
                        $experience->duration = $expDuration;
                        $experience->info_id = $info->id;

                        $experience->save();


                    }

                }


                if(!empty($langArray)){

                    foreach($langArray as $langObj){

                        $langunageName = $langObj['lang'];
                        $languageLevel = $langObj['level'];

                        $language = new Language();
                        $language->language = $langunageName;
                        $language->level = $languageLevel;
                        $language->info_id = $info->id;

                        $language->save();



                    }

                }














                return response()->json(['result'=>true,'msg'=>"Your information has been updated successfully."]);
            }else{
                return response()->json(['result'=>false,'msg'=>'Failed to update your information, please try again.']);
            }


            
        }else{
            return response()->json(['result'=>false,'msg'=>'Failed to verify your account, please login and try again.']);
        }


        // if(PersonalInfo::find(['$title'=>$title])){
        //     return response()->json(['result'=>true,'msg'=>"Successfully Updated."]);
        // }else{
        //     return response()->json(['result'=>'Failed to update information, please try again.']);
        // }


    }



    public function registerUser(Request $request){
        $name = e($request->input('name'));
        $email = e($request->input('email'));
        $pwd = e($request->input('pwd'));
        $currentDate = now()->format('Y-m-d H:i:s');

        
        // if(DB::table('users')->where('email', $email)->first()){
        //     return response()->json(["result" => false,"msg"=>"E-mail address is already registered, please try again using a different e-mail address."]);
        // }else{

        //     if(DB::table('users')->insert(['name'=>$name,'email'=>$email,'password'=>bcrypt($pwd),'status'=> 1,'created_at'=>$currentDate])){
        //         return response()->json(["result" => true,"msg"=>"Account has been created successfully."]);
        //     }else{
        //         return response()->json(["result" => false,"msg"=>"Failed to create the account please try again."]);
        //     }
 
        // }


        if(User::where('email', $email)->first()){
            return response()->json(["result" => false,"msg"=>"E-mail address is already registered, please try again using a different e-mail address."]);
        }else{

            if(User::insert(['name'=>$name,'email'=>$email,'password'=>bcrypt($pwd),'status'=> 1,'created_at'=>$currentDate])){
                return response()->json(["result" => true,"msg"=>"Account has been created successfully."]);
            }else{
                return response()->json(["result" => false,"msg"=>"Failed to create the account please try again."]);
            }
 
        }



        
    }

    public function loginUser(Request $request){
        
        $credentials = $request->only('username','pwd');
        $user = User::where('email',$credentials['username'])->first();

        if($user){

            if(password_verify($credentials['pwd'],$user->password)){
                $request->session()->put('uid',$user->id);
                $request->session()->put('name',$user->name);
                $request->session()->put('email',$user->email);
                return response()->json(["result"=>true]);
            }else{
                return response()->json(["result"=>false,"msg"=>"Authentication failed."]);
            }

            
        }else{
            return response()->json(["result"=>false,"msg"=>"User not found."]);
        }


        
    }


    public function createCv(Request $request){


        // $request->validate([
        //     // 'profile_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        //     'profile_image' => 'image|mimes:jpeg,png,jpg',
        // ]);
        
        $title = $request->input('title');
        $summary = $request->input('summary');
        $email = $request->input('email');
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $cod = $request->input('cod');
        $tel = $request->input('tel');
        $address1 = $request->input('address1');
        $address2 = $request->input('address2');
        $state = $request->input('state');
        $zip = $request->input('zip');
        $country = $request->input('country');
        $dob = $request->input('dob');
        $sex = $request->input('sex');
        $dateTime = now()->format('Y-m-d H:i:s');
    

        $eduArray = json_decode($request->input('education_list'),true);
        $expArray = json_decode($request->input('experience_list'),true);
        $langArray = json_decode($request->input('language_list'),true);

        if(PersonalInfo::where('email',$email)->first()){
            return response()->json(["result"=>false,"msg"=>"The e-mail address is already exists."]);
        }else{



              //////////SAVE PROFILE IMAGE//////

              $imagePath = "N/A";

              if ($request->hasFile('profile_image')) {

                    $file = $request->file('profile_image');
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $file->move('storage/images', $fileName);
                    // $info->profile_image = 'images/' . $fileName;

                    $imagePath = 'images/' . $fileName;

                // $imagePath = $request->file('profile_image')->store('images', 'public');
              }

            ///////////////////////////////////




            $infoId = PersonalInfo::insertGetId(['title'=>$title,'summary'=>$summary,'fname'=>$fname,'lname'=>$lname,'country_code'=>$cod
            ,'mobile'=>$tel,'email'=>$email,'address1'=>$address1,'address2'=>$address2,'state'=>$state,'zip'=>$zip,'country'=>$country
            ,'dob'=>$dob,'gender'=>$sex,'user_id'=>session('uid'),'created_at'=>$dateTime,'updated_at'=>$dateTime,'profile_image'=>$imagePath]);

            if($infoId){

                if(!empty($langArray)){

                    foreach($langArray as $langObj){

                        $langunageName = $langObj['lang'];
                        $languageLevel = $langObj['level'];

                        $language = new Language();
                        $language->language = $langunageName;
                        $language->level = $languageLevel;
                        $language->info_id = $infoId;

                        $language->save();



                    }

                }

                if(!empty($eduArray)){

                        foreach($eduArray as $eduObj){
                            $eduField = $eduObj['field'];
                            $eduQualification = $eduObj['qualification'];
                            $eduSchool = $eduObj['school'];
                            $eduYear = $eduObj['year'];
                            $eduStatus = $eduObj['status'];


                            $education = new Education();
                            $education->field = $eduField;
                            $education->qualification = $eduQualification;
                            $education->school = $eduSchool;
                            $education->year = $eduYear;
                            $education->status = $eduStatus;
                            $education->info_id = $infoId;

                            $education->save();




                        }

                }


                if(!empty($expArray)){

                    foreach($expArray as $expObj){
                        $expPosition = $expObj['position'];
                        $expCompany = $expObj['company'];
                        $expDuration = $expObj['duration'];

                        $experience = new Experience();
                        $experience->position = $expPosition;
                        $experience->company = $expCompany;
                        $experience->duration = $expDuration;
                        $experience->info_id = $infoId;

                        $experience->save();


                    }

                }




              




                return response()->json(["result"=>true,"msg"=>"Personal information saved successfully. "]);

            }else{

                return response()->json(["result"=>true,"msg"=>"Failed to store personal information, please try again."]);

            }
        }



        


    }



}
