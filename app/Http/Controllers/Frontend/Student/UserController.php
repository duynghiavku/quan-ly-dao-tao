<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
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
