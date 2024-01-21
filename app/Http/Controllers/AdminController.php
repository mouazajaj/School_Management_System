<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\admin\admin\AddRequest;
use App\Http\Requests\admin\Admin\UpdateRequest;

class AdminController extends Controller
{
    public function list(){
        
        $data['header_title']="Admins List";
        $data['admins']=User::getAdmins();
        return view('admin.admin.list',$data);
    }

    public function add(){
        
        $data['header_title']="Add New Admin";
        return view('admin.admin.add',$data);
    }

    public function insert(AddRequest $request){
        
        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->gender=$request->gender;
        $user->password=Hash::make($request->password);
        $user->assignRole('Admin');
        $user->save();
        return redirect()->route('admin.list')->with('success',"admin succesfully created");
    }

    public function edit($id){
            
        $admin=User::getAdmin($id);
        $data['admin']=$admin;
        return view('admin.admin.edit',$data);
        
    }

     public function update($id,UpdateRequest $request){
            
        $admin=User::getAdmin($id);
        $admin->gender=$request->gender;
        
        if(!empty($request->passowrd)){
            
            $admin->password=Hash::make($request->password);
        }
        
        if($admin->email!=$request->email){
            
            $request->validate(['email'=>['email','unique:users']]);
            $admin->email=$request->email;
        }

        if($admin->name!=$request->name){
            
            $request->validate(['name'=>['unique:users','max:50']]);
            $admin->name=$request->name;
            
        }
        
        $admin->save();
        
        return redirect()->route('admin.list')->with('success',"Admin successful update");
    }
    
     public function delete($id){
            
        $admin=User::getAdmin($id);
        $name=$admin->name;
        $admin->delete();
        $admin->save();
        return redirect()->route('admin.list')->with('success',$name." have been deleted");
    }
}