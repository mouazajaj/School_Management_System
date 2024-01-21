<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ClassModel;
use App\Models\ClassTeacher;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Assign;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\Assign_Teacher\AddRequest;
use App\Http\Requests\Admin\Assign_Teacher\UpdateRequest;

class ClassTeacherController extends Controller
{
   public function list(){
        
        $data['header_title']="Class Teacher List";
        $data['class_teacher']=ClassTeacher::getClass_Teacher();
        $data['classes']=ClassModel::getClasses();
        
        return view('admin.class_teacher.list',$data);
    }
    
    public function add(){
        
        $data['header_title']="Class Teacher Assign";
        $data['classes']=ClassModel::getClasses();
        $data['teachers']=User::role('Teacher')->get();
        
        return view('admin.class_teacher.add',$data);
    
    }

      public function insert(AddRequest $request){

        if(!empty($request->teacher_id)){

          foreach($request->teacher_id as $teacher_id){

          $class_teachers=new ClassTeacher;
          $class_teachers->class_id=$request->class_id;
          $class_teachers->teacher_id=$teacher_id;
          $class_teachers->status=$request->status;
          $class_teachers->created_by=Auth::id();
          $class_teachers->save();}}

        return redirect()->route('class_teacher.list')->with('success',"succesfully assign");
 }
    
    public function edit($id){
      
        $data['class_teacher']=ClassTeacher::find($id);
        $data['classes']=ClassModel::getClasses();
        $data['teachers']=User::getTeachers();
        return view('admin.class_teacher.edit',$data);
    }

     public function update($id,UpdateRequest $request){
      
        $class_teacher=ClassTeacher::find($id);
        $class_teacher->class_id=$request->class_id;
        $class_teacher->status=$request->status;
        $class_teacher->created_by=Auth::id();
        $class_teacher->save();
        return redirect()->route('class_teacher.list')->with('success',"class_teacher succesfully updated");
    }

      public function delete($id){
      
        $class_teacher=ClassTeacher::find($id);
        $class_teacher->delete();
        return redirect()->route('class_teacher.list')->with('success',"class_teacher succesfully deleted");
    }
}