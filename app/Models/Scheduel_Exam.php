<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Scheduel_Exam extends Model
{
    use HasFactory;
    
    protected $table = 'schedule_exam';
    
    static public function getScheduel_exam($id){

        $scheduel_exam=self::find($id);
        
        return $scheduel_exam;
 }

    static public function getExam_Student($class_id){
        
        return self::select('schedule_exam.*','exam.name as exam_name','subjects.name as subject_name')
        ->join('exam','exam.id','schedule_exam.exam_id')
        ->join('subjects','subjects.id','schedule_exam.subject_id')
        ->join('classes','classes.id','schedule_exam.class_id')
        ->where('schedule_exam.class_id','=',$class_id)
        ->get();
    }
    
    static public function getExam_Teacher($class_id,$teacher_id){
        
        return self::select('schedule_exam.*','exam.name as exam_name','subjects.name as subject_name')
        ->join('exam','exam.id','schedule_exam.exam_id')
        ->join('subjects','subjects.id','schedule_exam.subject_id')
        ->join('classes','classes.id','schedule_exam.class_id')
        ->where('schedule_exam.class_id','=',$class_id)
        ->where('subjects.teacher_id','=',$teacher_id)
        ->get();
    }

    static public function getExam_Parent($student_id,$class_id){
        
        return self::select('schedule_exam.*','exam.name as exam_name','subjects.name as subject_name','users.name as user_name')
        ->join('exam','exam.id','schedule_exam.exam_id')
        ->join('subjects','subjects.id','schedule_exam.subject_id')
        ->join('classes','classes.id','schedule_exam.class_id')
        ->join('users','users.class_id','schedule_exam.class_id')
        ->whereIn('schedule_exam.class_id',$class_id)
        ->whereIn('users.id',$student_id)
        ->get();
        
    }
    
    static public function getScheduels(){

        $scheduels=self::select('schedule_exam.*','subjects.name as subject_name','classes.name as class_name','exam.name as exam_name','users.name as created_name')
        ->join('subjects','subjects.id','=','schedule_exam.subject_id')
        ->join('classes','classes.id','=','schedule_exam.class_id')
        ->join('exam','exam.id','=','schedule_exam.exam_id')
        ->join('users','users.id','=','schedule_exam.created_by');

        if(!empty(Request::get('subject_id'))){

            return $scheduels=$scheduels->where('schedule_exam.subject_id','=',Request::get('subject_id'))->paginate(5);
        }

        if(!empty(Request::get('class_id'))){

            return $scheduels=$scheduels->where('schedule_exam.class_id','=',Request::get('class_id'))->paginate(5);
        }

        if(!empty(Request::get('exam_id'))){

            return $scheduels=$scheduels->where('schedule_exam.exam_id','=',Request::get('exam_id'))->paginate(5);
        }

        return $scheduels->paginate(5);
 }
   
}