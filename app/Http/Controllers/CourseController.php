<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use App\Models\UserCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class CourseController extends Controller
{
    public function index()
    {
        return view('admin.courses.index', [
            'title' => 'Courses List',
            'courses' => Course::all()
        ]);
    }

    public function edit($id)
    {
        return view('admin.courses.edit', [
            'title' => 'Edit Course',
            'course' => Course::findOrFail($id),
            'categories' => Category::all()
        ]);
    }

    public function create()
    {
        return view('admin.courses.create', [
            'title' => 'Add New Course',
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $courseImage = '';
        $request->validate([
            'name' => 'required|unique:courses',
            'instructor' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|mimes:svg',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'start_at' => 'required',
            'end_at' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $fileWithExt = $request->file('image')->getClientOriginalName();
            $imageTemp = pathinfo($fileWithExt, PATHINFO_FILENAME);
            $ext = $request->file('image')->getClientOriginalExtension();
            $courseImage = $imageTemp . '_' . time() . '.' . $ext;
            $request->file('image')->storeAs('public/image/', $courseImage);
        } else {
            $courseImage = 'no_file.svg';
        }
        $newCourse = Course::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'instructor' => $request->instructor,
            'image' => $courseImage,
            'description' => $request->description,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'start_time' => Carbon::createFromFormat('H:i', $request->start_time, 'Asia/Jakarta')->format('H:i'),
            'end_time' => Carbon::createFromFormat('H:i', $request->end_time, 'Asia/Jakarta')->format('H:i'),
            'gform' => $request->gform
        ]);

        if ($newCourse) {
            toast($request->name . ' Course Has Been Added!', 'success');
            return redirect()->route('admin_courses');
        } else {
            return back()->with('error', 'There was a problem adding the course.');
        }
    }


    public function update(Request $request)
    {
        $courseImage = '';
        $course = Course::find($request->id);
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'name' => Rule::unique('courses')->ignore($course->id),
            'instructor' => 'required',
            'image' => 'required|image|mimes:svg',
            'description' => 'required',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'start_at' => 'required',
            'end_at' => 'required',
        ]);

        if ($request->hasFile('image')) {
            if (Storage::exists("public/image/$course->image")) {
                Storage::delete("public/image/$course->image");
            }
            $fileWithExt = $request->file('image')->getClientOriginalName();
            $imageTemp = pathinfo($fileWithExt, PATHINFO_FILENAME);
            $ext = $request->file('image')->getClientOriginalExtension();
            $courseImage = $imageTemp . '_' . time() . '.' . $ext;
            $request->file('image')->storeAs('public/image/', $courseImage);
        } else {
            $courseImage = $course->image;
        }

        $course->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'instructor' => $request->instructor,
            'image' => $courseImage,
            'description' => $request->description,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'gform' => $request->gform
        ]);
        if ($course) {
            toast($request->name . ' Course Has Been Updated!', 'success');
            return redirect()->route('admin_courses');
        } else {
            return back()->with('error', 'There was a problem updating the course.');
        }
    }

    public function destroy($id)
    {
        $course = Course::find($id);
        $user_course = UserCourse::where('course_id', $id);
        if ($user_course) {
            $user_course->delete();
        }
        if (Storage::exists("public/image/$course->image")) {
            Storage::delete("public/image/$course->image");
        }
        if ($course) {
            $course->delete();
        }
        toast($course->name . ' Course Has Been Deleted!', 'success');
        return redirect()->route('admin_courses');
    }

    

}
