<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassSubject extends Model
{
    use HasFactory;
    
    protected $table = 'class_subject';
    
    public static function getClass_Subject(){
     
          $class_subject=self::select('class_subject.*','classes.name as class_name','subjects.name as subject_name','users.name as created_by')
         ->join('users','users.id','=','class_subject.created_by')
         ->join('subjects','subjects.id','=','class_subject.subject_id')
         ->join('classes','classes.id','=','class_subject.class_id');
         
          if(!empty(Request::get('class_name'))){

               return $class_subject->where('classes.name', 'like','%'.Request::get('class_name').'%')->paginate(5);
          }

          if(!empty(Request::get('subject_name'))){

               return $class_subject->where('subjects.name','like','%'.Request::get('subject_name').'%')->paginate(5);
          }

          if(!empty(Request::get('status')=="1")){

               return $class_subject->where('class_subject.status',1)->paginate(5);

          }

          elseif(!empty(Request::get('status')=="0")){

               return $class_subject->where('class_subject.status',0)->paginate(5);

       }

       return $class_subject->paginate(5);
    }

     public static function mysubjects($class_id){

        return self::select('class_subject.*','classes.name as class_name','subjects.name as subject_name')
        ->join('subjects','subjects.id','=','class_subject.subject_id')
        ->join('classes','classes.id','=','class_subject.class_id')
        ->where('class_subject.class_id',$class_id)->paginate(5);
     }


     public static function subjects(){
          
          if(!empty(Request::get('class_id'))){
     
               return self::select('class_subject.*','classes.name as class_name','subjects.name as subject_name')
               ->join('subjects','subjects.id','=','class_subject.subject_id')
               ->join('classes','classes.id','=','class_subject.class_id')
               ->where('class_subject.class_id',Request::get('class_id'))->paginate(5);
          }}}
  