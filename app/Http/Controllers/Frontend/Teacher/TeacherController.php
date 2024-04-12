public function showInfomation()
    {
        $teacher_id = session('teacher_id');
        $semester_id = session('semester_id');
        $sections = Section::join('subject','section.id_subject','=','subject.id')
        ->select('section.room AS room',
                'section.name AS name',
                'section.id AS id')
        ->where('section.id_teacher',$teacher_id)
        ->where('subject.semester_id',$semester_id)
        ->get();

        return view('frontend.teacher.section',compact('sections'));
    }