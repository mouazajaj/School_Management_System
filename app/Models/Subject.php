<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subjects';
    
    static public function getSubject($id){ 
        
        return self::find($id);
    }
    
     static public function getSubjects(){ 
        
         $subjects=self::select('subjects.*','users.name as teacher_name')->join('users','users.id','subjects.teacher_id');
         
        if(!empty(Request::get('name'))){
                
            return $subjects->where('subjects.name', 'like','%'.Request::get('name').'%')->paginate(5);
        }
        
        if(!empty(Request::get('type'))){
                
            return $subjects->where('subjects.type', '=',Request::get('type'))->paginate(5);
        }

        if(!empty(Request::get('status')=="1")){

            return $subjects->where('subjects.status',1)->paginate(5);
        
        }

        if(!empty(Request::get('status')=="0")){

            return $subjects->where('subjects.status',0)->paginate(5);

        }
              
        return $subjects->paginate(5);}
  
    static public function mysubjects($class_id)
    {
        self::select('subjects.*')
        ->join('class_subject','class_subject.id','=','subjects.id')
        ->join('classes','classes.id','=','class_subject.id')
        ->where('classes.id',$class_id)
        ->get();
    }
}