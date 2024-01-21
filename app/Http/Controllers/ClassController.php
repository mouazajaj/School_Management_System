<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\Class\AddRequest;

class ClassController extends Controller
{
    public function list()
    {
        $data['header_title']="Classes List";
        $data['classes']=ClassModel::getClasses();   
        return view('admin.class.list',$data);
    }
    
     public function add()
    {
        $data['header_title']="Add Class";
        return view('admin.class.add',$data);
    }
    
     public function insert(AddRequest $request)
    {
        $class=new ClassModel();
        $class->name=$request->name;
        $name=$request->name;
        $class->status=$request->status;
        $class->created_by=Auth::id();
        $class->save();
        return redirect()->route('class.list')->with('success',$name." succesfully created");
    }
    public function edit($id,Request $request)
    {
        $class=ClassModel::getClass($id);
         
        if(!empty($class)){

            $data['class']=$class;
            return view('admin.class.edit',$data);
    }
        else{
            
            abort(404);
        }
    }
    public function update($id,Request $request)
    {
        $class=ClassModel::getClass($id);
        $name=$request->name;
        
        if($class->name!=$request->name){
            
            $request->validate(['name'=>['unique:classes','max:30']]);
             $class->name=$request->name;
            
        }
        
        $class->status=$request->status;
        $class->created_by=Auth::id();
        $class->save();
        return redirect()->route('class.list')->with('success',$name." successful update");
    }
            
     public function delete($id){
            
        $class=ClassModel::getClass($id);
        $name=$class->name;
        ClassModel::destroy($id);
        return redirect()->route('class.list')->with('success',$name." have been deleted");
    }
}