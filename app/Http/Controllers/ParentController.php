<?php

namespace App\Http\Controllers;


use App\Models\Exam;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\ClassSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Models\ClassSubjectTimeTable;
use App\Http\Requests\Admin\Parent\AddRequest;
use App\Http\Requests\Admin\Parent\UpdateRequest;

class ParentController extends Controller
{
        public function list(){
        
        $data['header_title']="Parents List";
        $data['parents']=User::getParents();
        return view('admin.parent.list',$data);
    }

     public function add(){
        
        $data['header_title']="Add New Parent";
        return view('admin.parent.add',$data);
    }

    public function insert(AddRequest $request){
        
        $parent=new User;
        $parent->name=$request->name;
        $name=$request->name;
        $parent->email=$request->email;
        $parent->gender=$request->gender;
        $parent->date_of_birth=$request->date_of_birth;
        $parent->mobile_phone=$request->mobile_phone;
         $parent->status=$request->status; 
        if(!empty($request->profile_picture)) {
             
            $file = $request->file('profile_picture') ;
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/assets/img/profiles' ;
            $file->move($destinationPath,$fileName);
            $parent->profile_picture=$fileName;

        }
        
        $parent->password=Hash::make($request->password);
        $parent->assignRole('parent');
        $parent->save();
         return redirect()->route('parent.list')->with('success',$name." succesfully created");
        
        
    }

    public function edit($id){
        
        $data['header_title']="Edit Parent";
        $data['parent']=User::getParent($id);
        return view('admin.parent.edit',$data);
    }

    public function update($id,UpdateRequest $request){
        
        $parent=User::getParent($id);
        $name=$request->name;
        $parent->gender=$request->gender;
        $parent->date_of_birth=$request->date_of_birth;
        $parent->mobile_phone=$request->mobile_phone;
        
        if(!empty($request->file('profile_picture'))){

            if(File::exists(asset('assets/img/profiles/'.$parent->profile_picture))){
                
                File::delete(asset('assets/img/profiles/'.$parent->profile_picture));
                
            }

            $extension=$request->file('profile_picture')->getClientOriginalName();
            $file=$request->file('profile_picture');
            $randomstr=Str::random(20);
            $filename=strtolower($randomstr).'.'.$extension;
            $destinationPath = 'assets/img/profiles/' ;
            $file->move($destinationPath,$filename);
            $parent->profile_picture=$filename;
             }
        if($parent->email!=$request->email){
            
            $request->validate(['email'=>['required','unique:users']]);
            $parent->email=$request->email;
        }

        if($parent->name!=$request->name){
            
            $request->validate(['name'=>['unique:users','required','max:50']]);
            $parent->name=$request->name;
            
        }

             
        $parent->status=$request->status;
        $parent->password=Hash::make($request->password);
        $parent->save();
         return redirect()->route('parent.list')->with('success',$name." succesfully updated");
        
    }


    public function delete($id,Request $request){
        
        $parent=User::getParent($id);
        $name=$parent->name;
        $parent->delete();
         return redirect()->route('parent.list')->with('success',$name." succesfully deleted");
        
    }

    public function mystudents(){
        
        $mystudents=User::parent_mystudents(Auth::id());
        $data['mystudents']=$mystudents;
        return view('admin.parent.mystudents',$data);
    }

    
    public function subjects($student_id){
        
        $User=User::getStudent($student_id);
        $subjects=ClassSubject::mysubjects($User->class_id);
        $data['subjects']=$subjects;
        return view('admin.parent.subjects',$data);
    }

    public function ClassSubjectTimeTable($class_id,$subject_id){
        
        $class_subject_time=ClassSubjectTimeTable::TeacherSubjectTimeTable($class_id,$subject_id);
        $data['subject_time']=$class_subject_time;
        return view('admin.teacher.mysubject_times',$data);
        
    }

public function myexam_timetable(){
    
        $myexames=Exam::getExames();
        $timetable=User::myexam_timetable_parent();
        $data['header_title']='myexam timetable';
        $result=array();
        $result2=array();
        $students_names=array();
        foreach($timetable as $value){
            
            array_push($students_names, $value->user_name);
        }
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
        
        foreach($myexames as $value){
        
        }
        $data['myexames']=array_keys($result2);
        $data['timetable']=$result2;
        $data['students_names']=collect($students_names)->unique();
        //return($data['students_names']);
        return view('admin.parent.myexam_timetable',$data);
        
        }
}