<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\subject\AddRequest;
use App\Http\Requests\Admin\subject\UpdateRequest;

class SubjectController extends Controller
{
    
    public function list(){
        
        $data['header_title']="Subjects List";
        $data['subjects']=Subject::getsubjects();
        return view('admin.Subject.list',$data);
    }

    public function add(){
        
        $teachers=Teacher::role('Teacher')->get();
        $data['teachers']=$teachers;
        $data['header_title']="Add New Subject";
        return view('admin.Subject.add',$data);
    }

    public function insert(AddRequest $request){
        
        $subject=new Subject;
        $subject->name=$request->name;
        $subject->teacher_id=$request->teacher_id;
        $name=$request->name;
        $subject->type=$request->type;
        $subject->status=$request->status;
        $subject->save();
            
        return redirect()->route('subject.list')->with('success ',$name."succesfully created");
        }

    public function edit($id){
            
        $subject=subject::getSubject($id);
            
        if(!empty($subject)){
                
            $data['subject']=$subject;
            return view('admin.Subject.edit',$data);
        }
        else{
                
            abort(404);
        }
            
    }

     public function update($id,UpdateRequest $request){
            
        $subject=subject::getSubject($id);
        $name=$request->name;
        if($subject->name!=$request->name){
            
            $request->validate(['name'=>['unique:subjects','max:30']]);
             $subject->name=$request->name;
        }
        $name=$subject->name;
        $subject->type=$request->type;
        $subject->teacher_id=$request->teacher_id;
        $subject->status=$request->status;
        $subject->save();
        
        return redirect()->route('subject.list')->with('success',$name." successful update");
    }
    
     public function delete($id){
            
        $subject=Subject::getSubject($id);
        $name=$subject->name;
        Subject::destroy($id);
        
        return redirect()->route('subject.list')->with('success',$name." have been deleted");
    }
}