<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSubjectTimeTable extends Model
{
    use HasFactory;

    protected $table = 'class_subject_timetable';
    
    static public function StudentTimeTable($class_id)
    {
        $mytimetable=self::select('class_subject_timetable.*','subjects.name as subject_name','week.name as day')
        ->join('subjects','subjects.id','=','class_subject_timetable.subject_id')
        ->join('classes','classes.id','=','class_subject_timetable.class_id')
        ->join('week','week.id','=','class_subject_timetable.week_id')
        ->where('class_subject_timetable.class_id',$class_id)->get();

        return $mytimetable;
        
    }

    static public function TeacherTimeTable($class_id,$subject_id)
    {
        $mytimetable=self::select('class_subject_timetable.*','week.name as day')
        ->join('subjects','subjects.id','=','class_subject_timetable.subject_id')
        ->join('classes','classes.id','=','class_subject_timetable.class_id')
        ->join('users','users.class_id','=','classes.id')
        ->join('week','week.id','=','class_subject_timetable.week_id')
        ->where('class_subject_timetable.class_id',$class_id)
        ->get();

        return $mytimetable;
        
    }

    static public function TeacherSubjectTimeTable($class_id,$subject_id)
    {
        $mytimetable=self::select('class_subject_timetable.*','week.name as day','subjects.name as subject_name')
        ->join('subjects','subjects.id','=','class_subject_timetable.subject_id')
        ->join('classes','classes.id','=','class_subject_timetable.class_id')
        ->join('week','week.id','=','class_subject_timetable.week_id')
        ->where('class_subject_timetable.class_id',$class_id)
        ->where('class_subject_timetable.subject_id',$subject_id)
        ->get();

        return $mytimetable;
        
    }

    
}