<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\ClassSubject;
use App\Models\ClassModel;
use Illuminate\Support\Facades\Auth;

class ClassSubjectController extends Controller
{
       public function list(){
        
        $data['header_title']="Class Subject List";
        $data['class_subject']=ClassSubject::getClass_Subject();
        
        return view('admin.assign_subject.list',$data);
    }
    
      public function add(){
        
        $data['header_title']="Subject Assign";
        $data['classes']=ClassModel::getClasses();
        $data['subjects']=Subject::getSubjects();
        
        return view('admin.assign_subject.add',$data);
        
    }

      public function insert(Request $request){

          if(!empty($request->subject_id)){
          
            foreach($request->subject_id as $subject_id){
              
              $class_subjects=new ClassSubject;
              $class_subjects->class_id=$request->class_id;
              $class_subjects->subject_id=$subject_id;
              $class_subjects->status=$request->status;
              $class_subjects->created_by=Auth::id();
              $class_subjects->save();
              
            }
          }
            
        return redirect()->route('class_subject.list')->with('success',"succesfully assign");
    }
    
    public function edit($id){
      
      $data['class_subjects']=ClassSubject::find($id);
      $data['classes']=ClassModel::getClasses();
      $data['subjects']=Subject::getSubjects();
      
      return view('admin.assign_subject.edit',$data);
    }

     public function update($id,Request $request){
      
      $ClassSubject=ClassSubject::find($id);
      $ClassSubject->class_id=$request->class_id;
      $ClassSubject->status=$request->status;
      $ClassSubject->created_by=Auth::id();
      $ClassSubject->save();
      
      return redirect()->route('class_subject.list')->with('success'," succesfully updated");
    }

      public function delete($id){
      
        $ClassSubject=ClassSubject::find($id);
        $ClassSubject->delete();
        
        return redirect()->route('class_subject.list')->with('success',"succesfully deleted");
    }
}