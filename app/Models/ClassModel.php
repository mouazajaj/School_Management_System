<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassModel extends Model
{
    use HasFactory;
    
    protected $hidden = [];

    static public function getClass($id){ 
    
        return ClassModel::find($id);
    }
        
    static public function getClasses(){ 
        
        $classes=self::select('classes.*','users.name as created_by')->join('users','users.id','classes.created_by');
         
        if(!empty(Request::get('name'))){
                
            return $classes=$classes->where('classes.name','like','%'.Request::get('name').'%')->paginate(5);
        }
        
        
        if(!empty(Request::get('status')=='1')){
                
            return $classes=$classes->where('classes.status',1)->paginate(5);
        }
                    
        elseif(!empty(Request::get('status')=='0')){

            return $classes=$classes->where('classes.status',0)->paginate(5);
                
        }
        
        return $classes->paginate(5);}
             
    static public function getRecord(){ 
        
        $classes=self::select('classes.*')->join('users','users.id','classes.created_by')->where('status',0)->paginate(5);
         
        return $classes;
    }
             
    protected $fillable = ['name','status'];
    protected $table = 'classes';
}