<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function postNotes(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('d/m/Y');
        $time = date('h:i:s');
        $teacher_id = session('teacher_id');
        $section_id = $request->section_id;
        $id = $request->id;
        $value = $request->value;
        $reason = $id .':'. $value;
        $attendance = Attendance::where('id_section',$section_id)->where('date',$date)->first();
        if(isset($attendance)){
            if($attendance->reason != null){
                $reason_old = json_decode($attendance->reason);
                foreach($reason_old as $key => $item){
                    $part = explode(':',$item);
                    $id_old = $part[0];

                    if($id_old == $id){
                        unset($reason_old[$key]);
                    }
                }
            }
            $reason_old[] = $reason;
            $attendance->reason = json_encode(array_values($reason_old));
            $attendance->save();
        }else{
            $attendance = new Attendance();
            $attendance->id_section = $section_id;
            $attendance->id_teacher = $teacher_id;
            $value = Attendance::where('id_section',$section_id)->orderBy('id','desc')->first();
            if(isset($value)){
                $attendance->lesson = ($value->lesson)+1;
            }else{
                $attendance->lesson = 1;
            }
            $reason_new[] = $reason;
            $attendance->reason = json_encode($reason_new);
            $attendance->date = $date;
            $attendance->time = $time;
            $attendance->save();
        }
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $student = Student::where('email',$email)->first();

        if($student && Hash::check($password,$student->password)){
            if(session('teacher_id')){
                session()->forget('teacher_id');
            }
            $request->session()->put('student_id',$student->id);
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }

    public function historyTution()
    {
        $student_id = session('student_id');
        $tutions = Tution::where('id_student',$student_id)->get();

        return view('frontend.member.historytution',compact('tutions'));
    }

    public function showTuition()
    {
        $semester_id = session('semester_id');
        $student_id = session('student_id');

        $sections = Score::where('id_student',$student_id)->where('id_section','!=',null)->where('id_semester',$semester_id)->get();

        $projects = Score::join('type_project','score.id_type','=','type_project.id')
                    ->join('subject','subject.id','=','type_project.id_subject')
                    ->select('type_project.title AS title',
                            'score.session AS session',
                            'subject.credits AS credits')
                    ->where('score.id_student',$student_id)
                    ->where('score.id_semester',$semester_id)
                    ->where('score.id_type','!=',null)
                    ->get();
        $tutions = Tution::where('id_student',$student_id)->where('id_semester',$semester_id)->get();
        return view('frontend.member.tuition',compact('sections','projects','tutions'));
    }
}
