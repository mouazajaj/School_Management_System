<?php

namespace App\Http\Controllers;

use App\Models\Week;
use App\Models\Subject;
use App\Models\ClassModel;
use Illuminate\Http\Request;

class Examination_MarksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $data['header_title']="Class TimeTable List";
            
        $data['getClass']=ClassModel::getClasses();
            
        if(!empty($request->class_id)){
                
            $data['getSubjects']=Subject::mysubjects($request->class_id);
                 
        }
            
        $getweeks=Week::getRecort();
        $data['weeks']=$getweeks;
        
        return view('admin.exam.marks.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}