<?php

use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FacultyController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\GroupProjectController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\SemesterController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\TutionController;
use App\Http\Controllers\Admin\TypeProjectController;
use App\Http\Controllers\Admin\YearStudyController;
use App\Http\Controllers\Admin\YearTrainController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\Student\ProjectController;
use App\Http\Controllers\Frontend\Student\ScheduleController;
use App\Http\Controllers\Frontend\Student\SectionController as StudentSectionController;
use App\Http\Controllers\Frontend\Student\UserController;
use App\Http\Controllers\Frontend\Teacher\ProjectController as TeacherProjectController;
use App\Http\Controllers\Frontend\Teacher\ScoreController;
use App\Http\Controllers\Frontend\Teacher\TeacherController as FrontendTeacherController;
use App\Models\Tution;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/index', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/',[HomeController::class,'index'])->name('index');

Route::prefix('sv')->middleware(['student'])->group(function(){
    Route::get('lich-hoc',[ScheduleController::class,'showSchedule']);
});
Route::prefix('gv')->group(function(){
  Route::get('quan-ly-diem',[ScoreController::class,'showListScore']);
  Route::get('quan-ly-diem/{id}',[ScoreController::class,'manageScore']);
  Route::post('quan-ly-diem/nhap-diem',[ScoreController::class,'importScore']); //Ajax
  Route::post('quan-ly-diem/xac-nhan',[ScoreController::class,'postScore']);
});
