<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use function PHPSTORM_META\map;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Request;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    static public function getUser($id){ 
        
        return self::find($id); 
    }

    //Admins
    
    static public function getAdmin($id){ 
        
        return self::role('Admin')->find($id); 
    }

      
    static public function getEmailSingle($email){
        
        return self::where('email','=',$email)->first();
    }
    
    static public function getTokenSingle($remember_token){
        
        return self::where('remember_token','=',$remember_token)->orderBy('id','desc')->first();
    }

    static public function getAdmins(){
        
        $admins=User::role('Admin');

        if(!empty(Request::get('email'))){
            
            return $admins=$admins->where('email', 'like','%'.Request::get('email').'%')->get();
        }
        
        if(!empty(Request::get('name'))){
            
            return $admins=$admins->where('name', 'like','%'.Request::get('name').'%')->get();
        }
        
        return $admins->get();
    }

    // Teachers

    static public function getTeachers(){

        $teachers=self::role('Teacher');

        if(!empty(Request::get('name'))){

            return $teachers=$teachers->where('users.name','like','%'.Request::get('name').'%')->paginate(5);
        }

        if(!empty(Request::get('email'))){

            return $teachers=$teachers->where('users.email','like','%'.Request::get('email').'%')->paginate(5);
        }

        if(!empty(Request::get('status')=="1")){

            return $teachers=$teachers->where('status',1)->paginate(5);
        }

        if(!empty(Request::get('status')=="0")){

            return $teachers=$teachers->where('status',0)->paginate(5);

        }

        return $teachers->paginate(5);
 }

    static public function getTeacher($id){

        $teachers=self::role('Teacher')->find($id);
        return $teachers;
    }

    static public function  myexam_timetable_teacher(){
        
        $class_id=Auth::user()->class_id;
        $teacher_id=Auth::user()->id;
        $myexam=Scheduel_Exam::getExam_Teacher($class_id,$teacher_id);
        
        return $myexam;
    }


        // Parents

    static public function getParent($id){
        
        return self::role('Parent')->find($id);
    }
    
    static public function getParents(){

        $parents=self::role('Parent');

        if(!empty(Request::get('name'))){

            return $parents=$parents->where('users.name','like','%'.Request::get('name').'%')->paginate(5);
        }

        if(!empty(Request::get('email'))){

            return $parents=$parents->where('users.email','like','%'.Request::get('email').'%')->paginate(5);
        }

        if(!empty(Request::get('status')=="1")){

            return $parents=$parents->where('status',1)->paginate(5);
        }

        if(!empty(Request::get('status')=="0")){

            return $parents=$parents->where('status',0)->paginate(5);

        }

        return $parents->paginate(5);
 }

 

    static public function  myexam_timetable_parent(){
        
        $students_id=array();
        $students_class_id=array();
        $students=User::role('Student')->where('parent_id',Auth::User()->id)->get();
        foreach($students->all() as $value){
           array_push($students_id,$value->id);
           array_push($students_class_id,$value->class_id);}
        $myexam=Scheduel_Exam::getExam_Parent($students_id,$students_class_id);
        return $myexam;
    }

// Students

    static public function getStudent($id){ 
        
        return self::Role('Student')->find($id); 
    }


    static public function getStudents(){ 
        
        $students=self::role('Student')->select('users.*','classes.name as class_name', 'users.name as parent_name')
        ->join('classes','classes.id','=','users.class_id'); 
        
        if(!empty(Request::get('name'))){
                
            return $students=$students->where('users.name','like','%'.Request::get('name').'%')->paginate(4);
        }

        if(!empty(Request::get('email'))){
                
            return $students=$students->where('users.email','like','%'.Request::get('email').'%')->paginate(4);
        }
        
        if(!empty(Request::get('status')=="1")){
                
            return $students=$students->where('users.status',1)->paginate(4);
        }
                    
        if(!empty(Request::get('status')=="0")){

            return $students=$students->where('users.status',0)->paginate(4);
                
        }

        if(!empty(Request::get('class_id'))){
                
            return $students=$students->where('class_id',Request::get('class_id'))->paginate(4);
        }
                    
        return $students->paginate(4);
    }

    static public function getTeacherStudents($teacher_id){

        $students=self::role('Student')
        ->select('users.*','classes.name as class_name')
        ->join('classes','classes.id','=','users.class_id')
        ->join('class_teacher','class_teacher.class_id','=','classes.id')
        ->where('class_teacher.teacher_id','=',$teacher_id)->groupBy('users.id')->paginate(4);
        
        return $students;
    }

    static public function parent_mystudents($parent_id){
        
        $mystudents=self::role('Student')->where('parent_id',$parent_id)->paginate(4);
        
        return $mystudents;
    }

    static public function myexam_timetable_student(){
        
        $class_id=Auth::user()->class_id;
        
        $myexam=Scheduel_Exam::getExam_Student($class_id);
        
        return $myexam;
    }

    



}









    
        

    

    
    