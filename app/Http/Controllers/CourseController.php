<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Enroll;
use Session;
class CourseController extends Controller
{
    private $enroll;
    public function index()
    {
        return view('teacher.course.index' , ['categories' => Category::where('status', 1)->get()]);
    }

    public function create(Request $request)
    {
        Course::newCourse($request);
        return redirect('/course/add')->with('message' , 'Course Info Created Successfully');
    }

    public function manage()
    {
        return view('teacher.course.manage' , ['courses' => Course::where('teacher_id', Session::get('teacher_id'))->orderBy('id' , 'desc')->get()]);
    }

    public function edit($id)
    {
        return view('teacher.course.edit' , ['course' => Course::find($id) , 'categories' => Category::all()]);
    }

    public function update(Request $request, $id)
    {
        Course::updateCourse($request);
        return redirect('/course/add')->with('message' , 'Course Info Updated Successfully');
    }

    public function delete($id)
    {
        $this->enroll = Enroll::where('course_id', $id)->first();
        if($this->enroll)
        {
            return redirect()->back()->with('message' , 'Sorry.. You Can not delete this course' );
        }
        Course::deleteCourse($id);
        return redirect('/course/manage')->with('message' , 'Course Info Deleted Successfully');
    }
}
