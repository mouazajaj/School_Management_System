<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exam extends Model
{
    use HasFactory;
    
    static public function getExam($id){ 
    
        return Exam::find($id);
    }
    
    static public function getExames(){

        $exam=self::select('exam.*','users.name as created_by')->join('users','users.id','exam.created_by');
        
        if(!empty(Request::get('name'))){

            return $exam=$exam->where('exam.name','like','%'.Request::get('name').'%')->paginate(5);
        }
        

        return $exam->paginate(5);}
        
    protected $table = 'exam';
}