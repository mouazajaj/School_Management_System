<?php

use App\Models\User;
use App\Models\Teacher;
use App\Models\ParentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthContrller;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\ClassTeacherController;
use App\Http\Controllers\ScheduleExamController;
use App\Http\Controllers\Examination_MarksController;
use App\Http\Controllers\ClassSubject_TimeTableController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    
    return Teacher::all()->pluck('id');
    
    });
Route::fallback(function () {
    
    abort(404);
});
       
Route::post('/', function (Request $request) {
    
    return User::role('Student')->where('parent_id','3');}
  );
  
       
Route::get('parent/dashboard', function () {
    $role=Auth::user()->roles->value('name');
    return view('parent.dashboard',['role'=>$role]);
})->middleware(['auth','role:Parentr']);

Route::get('student/dashboard', function () {
    $role=Auth::user()->roles->value('name');
    return view('student.dashboard',['role'=>$role]);
})->middleware(['auth','role:Student'])->name('dashboard');

Route::get('teacher/dashboard', function () {
    $role=Auth::user()->roles->value('name');
    return view('teacher.dashboard',['role'=>$role]);
})->middleware(['auth','role:Teacher']);

Route::get('dashboard', function () {
    $role=Auth::user()->roles->value('name');
    return view('parent.dashboard',['role'=>$role]);
})->middleware(['auth','role:Parent']);


Route::get('/login',[AuthContrller::class,'login']);
Route::post('login',[AuthContrller::class,'Authlogin']);
Route::get('logout',[AuthContrller::class,'logout'])->name('logout');
Route::get('forget-password',[AuthContrller::class,'forgetpassword']);
Route::post('forget-password',[AuthContrller::class,'postforgetpassword']);
Route::get('reset/{token}',[AuthContrller::class,'reset']);
Route::post('reset/{token}',[AuthContrller::class,'postreset']);
Route::get('change-password',[AuthContrller::class,'changepassowrd']
)->middleware('auth')->name('change-password');
Route::post('change-password',[AuthContrller::class,'postchangepassowrd']
)->middleware('auth');

Route::prefix('admin')->group(function () {
    
    Route::get('dashboard', function () {
    $role=Auth::user()->roles->value('name');
    return view('admin.dashboard',['role'=>$role]);}
);


    Route::controller(AdminController::class)->name('admin.')->prefix('admin/')->group(function () {
        
        Route::get('list','list')->name('list');
        Route::get('add','add')->name('add');
        Route::post('add','insert')->name('insert');
        Route::get('edit/{id}','edit')->name('edit');
        Route::post('edit/{id}','update')->name('update');
        Route::get('delete/{id}','delete')->name('delete');
    });

    Route::controller(ClassController::class)->name('class.')->prefix('class/')->group(function () {
        
        Route::get('list','list')->name('list');
        Route::get('add','add')->name('add');
        Route::post('add','insert')->name('insert');
        Route::get('edit/{id}','edit')->name('edit');
        Route::post('edit/{id}','update')->name('update');
        Route::get('delete/{id}','delete')->name('delete');
    });

    Route::controller(SubjectController::class)->name('subject.')->prefix('subject/')->group(function () {
        
        Route::get('list','list')->name('list');
        Route::get('add','add')->name('add');
        Route::post('add','insert')->name('insert');
        Route::get('edit/{id}','edit')->name('edit');
        Route::post('edit/{id}','update')->name('update');
        Route::get('delete/{id}','delete')->name('delete');
});

    Route::controller(ClassSubjectController::class)->name('class_subject.')->prefix('class_subject/')->group(function () {
        
        Route::get('list','list')->name('list');
        Route::get('add','add')->name('add');
        Route::post('add','insert')->name('insert');
        Route::get('edit/{id}','edit')->name('edit');
        Route::post('edit/{id}','update')->name('update');
        Route::get('delete/{id}','delete')->name('delete');});

    Route::controller(ClassTeacherController::class)->name('class_teacher.')->prefix('class_teacher/')->group(function () {
        
        Route::get('list','list')->name('list');
        Route::get('add','add')->name('add');
        Route::post('add','insert')->name('insert');
        Route::get('edit/{id}','edit')->name('edit');
        Route::post('edit/{id}','update')->name('update');
        Route::get('delete/{id}','delete')->name('delete');});


    Route::controller(ClassSubject_TimeTableController::class)->name('class_subject_timetable.')->prefix('class_subject_timetable/')->group(function () {
        
        Route::get('mytimetable','StudentTimeTable')->name('StudentTimeTable');
        Route::get('get_subject','get_subject')->name('get_subject');
        Route::get('list','list')->name('list');
        Route::post('add','insert')->name('insert');
        
        });
    
    Route::controller(StudentController::class)->name('student.')->prefix('student/')->group(function () {
        
        Route::get('list','list')->name('list');
        Route::get('add','add')->name('add');
        Route::post('add','insert')->name('insert');
        Route::get('edit/{id}','edit')->name('edit');
        Route::post('edit/{id}','update')->name('update');
        Route::get('delete/{id}','delete')->name('delete');
        Route::get('mysubjects','mysubjects')->name('mysubjects');
        Route::get('myexam_timetable','myexam_timetable')->name('myexam_timetable');
    });
    
    Route::controller(ParentController::class)->name('parent.')->prefix('parent/')->group(function () {
        
        Route::get('list','list')->name('list');
        Route::get('add','add')->name('add');
        Route::post('add','insert')->name('insert');
        Route::get('edit/{id}','edit')->name('edit');
        Route::post('edit/{id}','update')->name('update');
        Route::get('delete/{id}','delete')->name('delete');
        Route::get('mystudents','mystudents')->name('mystudents');
        Route::get('mystudents/subjects/{student_id}','subjects')->name('mystudent.subjects');
        Route::get('myclasses_subjects/{class_id}/{subject_id}','ClassSubjectTimeTable')->name('mystudent.subjects.timetable');
        Route::get('myexam_timetable','myexam_timetable')->name('myexam_timetable');
    });
    
    Route::controller(TeacherController::class)->name('teacher.')->prefix('teacher/')->group(function () {
        
        Route::get('list','list')->name('list');
        Route::get('add','add')->name('add');
        Route::post('add','insert')->name('insert');
        Route::get('edit/{id}','edit')->name('edit');
        Route::post('edit/{id}','update')->name('update');
        Route::get('delete/{id}','delete')->name('delete');
        Route::get('mystudents','mystudents')->name('mystudents');
        Route::get('myclasses_subjects','myclasses_subjects')->name('myclasses_subjects');
        Route::get('myclasses_subjects/{class_id}/{subject_id}','ClassSubjectTimeTable')->name('myclasses_subjects_timetable');
        Route::get('myexam_timetable','myexam_timetable')->name('myexam_timetable');
        });

    Route::controller(ExamController::class)->name('exam.')->prefix('exam/')->group(function () {
        
        Route::get('list','list')->name('list');
        Route::get('add','add')->name('add');
        Route::post('add','insert')->name('insert');
        Route::get('edit/{id}','edit')->name('edit');
        Route::post('edit/{id}','update')->name('update');
        Route::get('delete/{id}','delete')->name('delete');

        
        Route::controller(ScheduleExamController::class)->name('schedule.')->prefix('schedule/')->group(function () {
        
            Route::get('list','list')->name('list');
            Route::get('add','add')->name('add');
            Route::post('add','insert')->name('insert');
            Route::get('edit/{id}','edit')->name('edit');
            Route::post('edit/{id}','update')->name('update');
            Route::get('delete/{id}','delete')->name('delete');
            Route::get('schedule','schedule')->name('schedule');
        
    });

        Route::controller(Examination_MarksController::class)->name('marks.')->prefix('marks/')->group(function () {
        
            Route::get('list','list')->name('list');
            Route::get('add','add')->name('add');
            Route::post('add','insert')->name('insert');
            Route::get('edit/{id}','edit')->name('edit');
            Route::post('edit/{id}','update')->name('update');
            Route::get('delete/{id}','delete')->name('delete');
            //Route::get('schedule','schedule')->name('schedule');
        
    });
});

    
    })->middleware('auth');