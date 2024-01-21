<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\ClassModel;
use App\Models\ClassSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Console\Scheduling\Schedule;
use App\Http\Requests\Admin\Exam\AddRequest;
use App\Http\Requests\Admin\Exam\UpdateRequest;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $data['exames']=Exam::getExames();
        $data['header_title']='Exam List';
        return view('admin.exam.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add()
    {
    $data['header_title']="Add Exam";
     return view('admin.exam.add',$data);   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function insert(AddRequest $request)
    {
        $exam=new Exam();
        $exam->name=$request->name;
        $name=$request->name;
        $exam->note=$request->note;
        $exam->created_by=Auth::id();
        $exam->save();
        return redirect()->route('exam.list')->with('success',$name." succesfully created");
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['header_title']="Edit Exam";
        $data['exam']=Exam::getExam($id);
        return view('admin.exam.edit',$data);   
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $exam=Exam::getExam($id);
        $name=$request->name;
        $exam->name=$request->name;
        $exam->note=$request->note;
        $exam->created_by=Auth::id();
        $exam->save();
        return redirect()->route('exam.list')->with('success',$name." successful update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $exam=Exam::getExam($id);
        $name=$exam->name;
        Exam::destroy($id);
        return redirect()->route('exam.list')->with('success',$name." have been deleted");
    }

    
}