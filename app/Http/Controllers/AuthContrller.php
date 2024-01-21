<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ForgetPasswordMail;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthContrller extends Controller
{
    public function login(){
        
        if(!empty(Auth::check())){
            
            return redirect('admin/dashboard');
        }
        return view('Auth.login');
    }

    
    public function Authlogin(LoginRequest $request){
        
        $remeber=!empty($request->cccremember)?true:false;
        
       if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],$remeber)){
        
        switch(Auth::user()->roles->value('name')){
            
            case'Student':
               return redirect('student/dashboard');
            break;

            case'Teacher':
                 return redirect('teacher/dashboard');
            break;

            case'Parent':
                 return redirect('parent/dashboard');
            break;   
            
            case 'Admin':
                 return redirect('admin/dashboard');
            break;}}
            
        else{
            
            return redirect()->back()->with('error','please enter correct username and password');}
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url('/login'));
    }
    
    public function forgetpassword(){
        
         return view('Auth.forget-password');
    }
    
    public function postforgetpassword(Request $request){
        
        $user=User::getEmailSingle($request->email);
        
        if(!empty($user)){
            
            $user->remember_token=Str::random(30);
            $user->save();
            Mail::to($user->email)->send(new ForgetPasswordMail($user));
            return redirect()->back()->with('success',"email has been sent check your box");
        }
        else{
            
            return redirect()->back()->with('error',"email not found in the system");
        }
        
        
    }

    public function reset($remember_token){
        
        $user=User::getTokenSingle($remember_token);
        
        if(!empty($user)){
            
            $data['user']=$user;
            return view('auth.reset',$data);
        }
        else{
            abort(404);
        }
        
        
    }

    
    public function postreset($token,Request $request){
        
            if($request->password==$request->confirmpassword){
                
                $user=User::getTokenSingle($token);
                $user->password=Hash::make($request->password);
                $user->remember_token=Str::random(30);
                $user->save();
                return redirect(url(''))->with('success',"password reset succesfull");}
                
            else{
                
                return redirect()->back()->with("error","password and confirm password does not match");
                }
        
        
    }
      public function changepassowrd(Request $request){
        
            $data['header_title']="Change Password";
            return view('auth.change-password',$data);
        }
    public function postchangepassowrd(Request $request){

           $user=User::getUser(Auth::id());
           
            if(Hash::check($request->password,$request->old_password)){
                
                $user->passowrd=Hash::make($request->passowrd);
                $user->save();
                return redirect()->back()->with('success','Password successful updated');
            }

            else{
                return redirect()->back()->with('error','old passowrd not correct');
            }
        }
}