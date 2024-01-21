<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassTeacher extends Model
{
    use HasFactory;

    protected $table = 'class_teacher';
    
    public static function getClass_Teacher(){
        
         $class_teacher=self::select('class_teacher.*','classes.name as class_name','teacher.name as teacher_name','users.name as created_by,')
         ->join('users','users.id','=','class_teacher.created_by')
         ->join('users as teacher','teacher.id','=','class_teacher.teacher_id')
         ->join('classes','classes.id','=','class_teacher.class_id');

        if(!empty(Request::get('teacher_name'))){

            return $class_teacher=$class_teacher->where('teacher.name','like','%'.Request::get('teacher_name').'%')->paginate(5);
        }

        if(!empty(Request::get('class_name'))){

            return $class_teacher=$class_teacher->where('classes.name','like','%'.Request::get('class_name').'%')->paginate(5);
        }

        if(!empty(Request::get('status')=="1")){

            return $class_teacher=$class_teacher->where('class_teacher.status',1)->paginate(5);
        }

        if(!empty(Request::get('status')=="0")){

            return $class_teacher=$class_teacher->where('class_teacher.status',0)->paginate(5);

        }

        return $class_teacher->paginate(5);
         
    }

static public function getTeacherSubjects($teacher_id){

    $subject_classes=self::select('class_teacher.*','classes.name as class_name','subjects.name as subject_name','subjects.type as subject_type','subjects.id as subject_id')
    ->join('classes','classes.id','=','class_teacher.class_id')
    ->join('class_subject','class_subject.class_id','=','classes.id')
    ->join('subjects','subjects.id','=','class_subject.subject_id')
    ->where('class_teacher.teacher_id','=',$teacher_id)->paginate(5);
    
    return $subject_classes;
    }
}