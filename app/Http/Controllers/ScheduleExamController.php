<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Subject;
use App\Models\ClassModel;
use App\Models\ClassSubject;
use Illuminate\Http\Request;
use App\Models\Scheduel_Exam;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\Exam\Schedule\AddRequest;
use App\Http\Requests\Admin\Exam\Schedule\UpdateRequest;

class ScheduleExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $data['header_title']="Schedule";
        $data['scheduels']=Scheduel_Exam::getScheduels();
        $data['exames']=Exam::getExames();
        $data['classes']=ClassModel::getClasses();
        $data['subjects']=Subject::getSubjects();
        return view('admin.exam.schedule.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add()
    {
        $exames=Exam::getExames();
        $classes=ClassModel::getClasses();
        $subjects=ClassSubject::subjects();
        $data['exames']=$exames;
        $data['classes']=$classes;
        $data['timetable']=$subjects;
        return view('admin.exam.schedule.add',$data);
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function insert(AddRequest $request)
    {
        foreach($request->timetable as $timetable){
                
            if($timetable['room_number']!=null || $timetable['exam_date']!=null ){
                    
                $schudel=new Scheduel_Exam;
                $schudel->class_id=$request->class__id;
                $schudel->exam_id=$request->exam__id;
                $schudel->subject_id=$timetable['subject_id'];
                $schudel->exam_date=$timetable['exam_date'];
                $schudel->start_time=$timetable['start_time'];
                $schudel->end_time=$timetable['end_time'];
                $schudel->room_number=$timetable['room_number'];
                $schudel->passing_mark=$timetable['passing_mark'];
                $schudel->full_mark=$timetable['full_mark'];
                $schudel->created_by=Auth::id();
                $schudel->save();
    }}
    return redirect()->route('exam.schedule.list')->with('success',"Succesfully Add");

}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $exames=Exam::getExames();
        $classes=ClassModel::getClasses();
        $subjects=Subject::getSubjects();
        $data['header_title']='Edit Schedule Exam';
        $data['schedule_exam']=Scheduel_Exam::getScheduel_exam($id);
        $data['exames']=$exames;
        $data['classes']=$classes;
        $data['subjects']=$subjects;
        return view('admin.exam.schedule.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        $schudel=Scheduel_Exam::getScheduel_exam($id);
        $schudel->class_id=$request->class_id;
        $schudel->exam_id=$request->exam_id;
        $schudel->subject_id=$request->subject_id;
        $schudel->exam_date=$request->exam_date;
        $schudel->start_time=$request->start_time;
        $schudel->end_time=$request->end_time;
        $schudel->room_number=$request->room_number;
        $schudel->passing_mark=$request->passing_mark;
        $schudel->full_mark=$request->full_mark;
        $schudel->save();
        return redirect()->route('exam.schedule.list')->with('success',"Succesfully Update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $schudel=Scheduel_Exam::getScheduel_exam($id);
        $schudel->delete();
        return redirect()->route('exam.schedule.list')->with('success',"Succesfully Deleted");




































































        
    }
}