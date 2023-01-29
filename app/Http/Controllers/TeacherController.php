<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        return view('admin.teacher.index');
    }
    public function create(Request $request)
    {
        Teacher::newTeacher($request);
        return redirect('/add/teacher')->with('message', 'teacher info save successfully..');
    }
    public function manage()
    {
        return view('admin.teacher.manage', [
            'teachers' => Teacher::orderBy('id', 'desc')->get()
        ]);
    }

    public function edit($id)
    {
        return view('admin.teacher.edit', ['teacher' => Teacher::find($id)]);
    }

    public function update(Request $request, $id)
    {
        Teacher::updateTeacher($request, $id);
        return redirect('/manage/teacher')->with('message', 'Teacher Info Updated Successfully');
    }

    public function delete($id)
    {
        Teacher::deleteTeacher($id);
        return redirect('/manage/teacher')->with('message', 'Teacher Info Deleted Successfully');
    }
}
