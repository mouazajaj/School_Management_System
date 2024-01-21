<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\User;
use App\Models\Subject;
use App\Models\ClassModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\Student\AddRequest;
use App\Http\Requests\Admin\Student\UpdateRequest;

class StudentController extends Controller
{
     public function list(){
        
        $data['header_title']="Students List";
        $data['students']=User::getStudents();
        $data['classes']=ClassModel::getclasses();
        
        return view('admin.student.list',$data);
    }

     public function add(){
        
        $data['parents']=User::getParents();
        $data['classes']=ClassModel::getClasses();
        $data['header_title']="Add New Student";
        
        return view('admin.student.add',$data);
    }

    public function insert(AddRequest $request){
        
        $student=new User;
        $name=$request->name;
        $student->name=$request->name;
        $student->email=$request->email;
        $student->admission_number=$request->admission_number;
        $student->roll_number=$request->roll_number;
        $student->class_id=$request->class_id;
        $student->gender=$request->gender;
        $student->date_of_birth=$request->date_of_birth;
        $student->parent_id=$request->parent_id;
        $student->mobile_phone=$request->mobile_phone;

        
        if(!empty($request->profile_picture)) {
             
            $file = $request->file('profile_picture') ;
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = 'assets/img/profiles/';
            $file->move($destinationPath,$fileName);
            $student->profile_picture=$fileName;

        }
        
        $student->status=$request->status;
        $student->password=Hash::make($request->password);
        $student->assignRole('Student');
        $student->save();
        
         return redirect()->route('student.list')->with('success',$name." succesfully created");
        
        
    }

    public function edit($id){
        
        $data['header_title']="Edit Student";
        $data['student']=User::getStudent($id);
        $data['classes']=ClassModel::getClasses();
        $data['parents']=User::getParents();
        return view('admin.student.edit',$data);
    }

    public function update($id,UpdateRequest $request){
        
        $student=User::getStudent($id);
        $name=$request->name;
        $student->parent_id=$request->parent_id;
        $student->gender=$request->gender;
        $student->date_of_birth=$request->date_of_birth;
        $student->mobile_phone=$request->mobile_phone;
        
        if(!empty($request->file('profile_picture'))){

            if(file_exists('assets/img/profiles/'.$student->profile_picture)){
                
                File::delete('assets/img/profiles/'.$student->profile_picture);
                
            }            
            $extension=$request->file('profile_picture')->getClientOriginalName();
            $file=$request->file('profile_picture');
            $randomstr=Str::random(20);
            $filename=strtolower($randomstr).'.'.$extension;
            $destinationPath = 'assets/img/profiles/' ;
            $file->move($destinationPath,$filename);
            $student->profile_picture=$filename;
            }
              
        if(!empty($request->passowrd)){
            
            $student->password=Hash::make($request->password);
        }
        
        if($student->email!=$request->email){
            
            $request->validate(['email'=>['required','unique:users']]);
            $student->email=$request->email;
        }

        if($student->name!=$request->name){
            
            $request->validate(['name'=>['unique:users','required','max:50']]);
            $student->name=$request->name;
            
        }

        if($student->admisson_number!=$request->admisson_number){
            
            $request->validate(['admisson_number'=>['max:50','unique:users','required']]);
            $student->admisson_number=$request->admisson_number;
            
        }

        if($student->roll_number!=$request->roll_number){
            
            $request->validate(['roll_number'=>['max:50','unique:users']]);
            $student->roll_number=$request->roll_number;
            
        }
     
        $student->status=$request->status;
        $student->save();
         return redirect()->route('student.list')->with('success',$name." succesfully updated");
        
    }

    public function delete($id){
        
        $student=Student::getStudent($id);
        $name=$student->name;
        $student->delete();
        return redirect()->route('student.list')->with('success',$name." succesfully deleted");
        
    }

    public function mysubjects(){
    
        $mysubjects=Subject::mysubjects(Auth::user()->class_id);
        $data['mysubjects']=$mysubjects;
        return view('admin.student.mysubjects',$data);
        
    }

    public function myexam_timetable(){
    
        $myexames=Exam::getExames();
        $timetable=User::myexam_timetable();
        $data['header_title']='myexam timetable';
        $result=array();

        foreach($myexames as $value){
            
            array_push($result, $value);
        }
          
        $i=0;
        foreach($myexames as $value){
            foreach($timetable as $values){
                if($values['exam_id']==$value['id'])
                    $result2[$value['name']][$i++]= $values;
            }
          $i=0;}
        
        $data['myexames']=array_keys($result2);
        
        $data['timetable']=$result2;
        //return($data['timetable']);
        return view('admin.student.myexam_timetable',$data);
        
        }
}