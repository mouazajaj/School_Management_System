<?php

namespace App\Http\Controllers;

use App\Models\Week;
use App\Models\Subject;
use App\Models\ClassModel;
use App\Models\ClassSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ClassSubjectTimeTable;
use App\Http\Requests\Admin\ClassSubjectTimeTable\AddRequest;

class ClassSubject_TimeTableController extends Controller
{
    public function list(Request $request){
        
        $data['header_title']="Class TimeTable List";
            
        $data['getClass']=ClassModel::getClasses();
            
        if(!empty($request->class_id)){
                
            $data['getSubjects']=Subject::mysubjects($request->class_id);
                 
        }
            
        $getweeks=Week::getRecort();
        $data['weeks']=$getweeks;
            
        return view('admin.timetable.list',$data);
    }

    
    public function insert(AddRequest $request)
        {
         
        foreach($request->timetable as $timetable){
                
            if($timetable['room_number']!=null || $timetable['exam_date']!=null || $timetable['start_date']!=null|| $timetable['end_date']!=null){
                    
                $save=new ClassSubjectTimeTable;
                $save->class_id=$request->class__id;
                $save->subject_id=$request->subject__id;
                $save->week_id=$timetable['week_id'];
                $save->start_date=$timetable['start_date'];
                $save->end_date=$timetable['end_date'];
                $save->room_number=$timetable['room_number'];  
                $save->save();
            }}
        return redirect()->route('class_subject_timetable.list')->with('success','time successfully');
                  
        }

    public function get_subject(Request $request){
            
        $getSubjects=ClassSubject::mysubjects($request->class_id);
            
        $html="<option value=''>select subject</option>";
            
        foreach($getSubjects as $value){
                
            $html.="<option value='".$value->subject_id."'>".$value->subject_name."</option>";
        }
        $json['html']=$html;
        echo json_encode($json);
        }
        
    public function StudentTimeTable(Request $request){
            
        $data['header_title']='Subject TimeTable';
        $mysubjects=ClassSubjectTimeTable::StudentTimeTable(Auth::user()->class_id);
        $data['mysubjects']=$mysubjects;  
            
        return view('admin.student.mytimetable',$data);}
        
    public function TeacherTimeTable($subject_id){
            
        $data['header_title']='Subject TimeTable';
        $mysubjects=ClassSubjectTimeTable::TeacherTimeTable(Auth::user()->class_id,$subject_id);
        $data['mysubjects']=$mysubjects;  

        return view('admin.teacher.mytimetable',$data); }

}