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
Route::post('/login',[UserController::class,'login'])->name('loginStudent');
Route::get('/logout',[UserController::class,'logout'])->name('logout');
Route::get('quen-mat-khau/{type}',[HomeController::class,'forgotPassword']);
Route::post('xac-minh-email',[HomeController::class,'confirmEmail']);  //ajax
Route::post('kiem-tra-otp',[HomeController::class,'checkOtp']);        //ajax
Route::get('mat-khau-moi',[HomeController::class,'newPassword']);
Route::post('mat-khau-moi',[HomeController::class,'postNewPassword']);

Route::prefix('sv')->middleware(['student'])->group(function(){
    Route::get('lich-hoc',[ScheduleController::class,'showSchedule']);
    Route::get('hoc-phi-da-nop',[UserController::class,'historyTution']);
    Route::get('hoc-phi-sap-nop',[UserController::class,'showTuition']);
    Route::get('dang-ki-tin-chi',[StudentSectionController::class,'showRegistration']);
    Route::post('dang-ki-tin-chi/mon-hoc',[StudentSectionController::class,'getSection']);    //Ajax
    Route::post('dang-ki-tin-chi',[StudentSectionController::class,'postRegistration']);
    Route::get('dang-ki-tin-chi/mon/{id}',[StudentSectionController::class,'registerCredits']);
    Route::get('dang-ki-tin-chi/huy/mon/{id}',[StudentSectionController::class,'destroyCredits']);
    Route::get('dang-ki-tin-chi/mon/do-an/{id}',[StudentSectionController::class,'creditProject']);
    Route::get('dang-ki-tin-chi/huy/mon/do-an/{id}',[StudentSectionController::class,'destroyCreditProject']);
});
Route::prefix('gv')->group(function(){
  Route::get('quan-ly-diem',[ScoreController::class,'showListScore']);
  Route::get('quan-ly-diem/{id}',[ScoreController::class,'manageScore']);
  Route::post('quan-ly-diem/nhap-diem',[ScoreController::class,'importScore']); //Ajax
  Route::post('quan-ly-diem/xac-nhan',[ScoreController::class,'postScore']);
  Route::post('diem-danh',[FrontendTeacherController::class,'postAttendance']); //Ajax
  Route::post('diem-danh/{id}',[FrontendTeacherController::class,'postAllAttendance']);
  Route::get('diem-danh/noi-dung/{id}',[FrontendTeacherController::class,'getContent']); //Ajax
  Route::get('danh-sach-hoc-phan',[FrontendTeacherController::class,'showListSection']);
});

Route::prefix('admin')->group(function(){
  //Giảng viên
  Route::get('teacher/add',[TeacherController::class,'create']);
  Route::get('teacher',[TeacherController::class,'index']);
  //Sinh viên
  Route::get('student/add',[StudentController::class,'create']);
  Route::get('student',[StudentController::class,'index']);

  //Khoa
  Route::get('faculty/add',[FacultyController::class,'create']);
  Route::get('faculty',[FacultyController::class,'index']);

  //Môn học
  Route::get('subject/add',[SubjectController::class,'create']);
  //Lớp học phần
  Route::get('section/add',[SectionController::class,'create']);
  Route::get('subject/section/{id}',[SectionController::class,'index']);

  //Ngành đào tạo
  Route::get('branch/add',[BranchController::class,'create']);
  Route::get('branch/class/{id}',[ClassController::class,'index']);

  //Niên khóa đào tạo
  Route::get('year-train/add',[YearTrainController::class,'create']);

  //Lớp sinh hoạt
  Route::get('class/add',[ClassController::class,'create']);

  //Năm học
  Route::get('year-study/add',[YearStudyController::class,'create']);
  Route::get('year-study',[YearStudyController::class,'index']);
  //Học kỳ
  Route::get('semester/add',[SemesterController::class,'create']);
  Route::get('semester',[SemesterController::class,'index']);
});