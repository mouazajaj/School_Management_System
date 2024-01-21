<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\User;
use App\Models\ClassModel;
use Illuminate\Support\Str;
use App\Models\ClassTeacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Models\ClassSubjectTimeTable;
use App\Http\Requests\Admin\Teacher\AddRequest;
use App\Http\Requests\admin\Teacher\UpdateRequest;

class TeacherController extends Controller
{
    public function list(){
        
        $data['header_title']="Teachers List";
        $data['teachers']=User::getTeachers();
        
        return view('admin.teacher.list',$data);
    }

    public function add(){
        
        $data['header_title']="Add New teacher";
        
        return view('admin.teacher.add',$data);
    }

    public function insert(AddRequest $request){
        
        $teacher=new User;
        $teacher->name=$request->name;
        $name=$request->name;
        $teacher->email=$request->email;
        $teacher->gender=$request->gender;
        $teacher->date_of_birth=$request->date_of_birth;
        $teacher->mobile_phone=$request->mobile_phone;
        $teacher->status=$request->status;
        $teacher->address=$request->address; 
        $teacher->qualification=$request->qualification;
        $teacher->experience =$request->experience ;
        $teacher->note=$request->note; 
        
        if(!empty($request->profile_picture)) {
             
            $file = $request->file('profile_picture') ;
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/assets/img/profiles' ;
            $file->move($destinationPath,$fileName);
            $teacher->profile_picture=$fileName;

        }
        
        $teacher->password=Hash::make($request->password);
        $teacher->assignRole('Teacher');
        $teacher->save();
         return redirect()->route('teacher.list')->with('success',$name." succesfully created");
        
    }

    public function edit($id){
        
        $data['header_title']="Edit Teacher";
        $data['teacher']=User::getTeacher($id);
        return view('admin.teacher.edit',$data);
    }
    

    public function update($id,UpdateRequest $request){
        
        $teacher=User::getTeacher($id);
        $name=$request->name;
        $teacher->gender=$request->gender;
        $teacher->date_of_birth=$request->date_of_birth;
        $teacher->mobile_phone=$request->mobile_phone;
        
        if(!empty($request->file('profile_picture'))){

            if(File::exists(asset('assets/img/profiles/'.$teacher->profile_picture))){
                
                File::delete(asset('assets/img/profiles/'.$teacher->profile_picture));
                
            }

            $extension=$request->file('profile_picture')->getClientOriginalName();
            $file=$request->file('profile_picture');
            $randomstr=Str::random(20);
            $filename=strtolower($randomstr).'.'.$extension;
            $destinationPath = 'assets/img/profiles/' ;
            $file->move($destinationPath,$filename);
            $teacher->profile_picture=$filename;
             }
        if($teacher->email!=$request->email){
            
            $request->validate(['email'=>['required','unique:users']]);
            $teacher->email=$request->email;
        }

        if($teacher->name!=$request->name){
            
            $request->validate(['name'=>['unique:users','required','max:50']]);
            $teacher->name=$request->name;
            
        }
             
        $teacher->status=$request->status;
        $teacher->qualification=$request->qualification;
        $teacher->experience=$request->experience;
        $teacher->note=$request->note;
        $teacher->password=Hash::make($request->password);
        $teacher->save();
         return redirect()->route('teacher.list')->with('success',$name." succesfully updated");
        }
    
    public function delete($id,Request $request){
        
        $teacher=User::getTeacher($id);
        $name=$teacher->name;
        $teacher->delete();
         return redirect()->route('teacher.list')->with('success',$name." succesfully deleted");
        
    }

    public function mystudents(){
        
        $students=User::getTeacherStudents(Auth::id());
        $data['students']=$students;
        $data['classes']=ClassModel::getClasses();
        return view('admin.teacher.mystudents',$data);
        
    }

    public function myclasses_subjects(){
         
        $classes_subject=ClassTeacher:: getTeacherSubjects(Auth::id());
        $data['classes_subject']=$classes_subject;
        return view('admin.teacher.myclasses_subject',$data);
        
}
    public function ClassSubjectTimeTable($class_id,$subject_id){
        
        $class_subject_time=ClassSubjectTimeTable::TeacherSubjectTimeTable($class_id,$subject_id);
        $data['subject_time']=$class_subject_time;
        return view('admin.teacher.mysubject_times',$data);
        
    }
    public function myexam_timetable(){
    
        $myexames=Exam::getExames();
        $timetable=User::myexam_timetable_teacher();
        $data['header_title']='myexam timetable';
        $result=array();

        foreach($myexames as $value){
            
            array_push($result, $value);
        }
          
        $i=0;
        $result2 = array (

);
        foreach($myexames as $value){
            foreach($timetable as $values){
                if($values['exam_id']==$value['id'])
                    $result2[$value['name']][$i++]= $values;
            }
          $i=0;}
        
        $data['myexames']=array_keys($result2);
        
        $data['timetable']=$result2;
        //return(dd($myexames));
        return view('admin.teacher.myexam_timetabl',$data);
        
        }
}