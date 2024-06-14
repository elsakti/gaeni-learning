<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Attendance;
use App\Models\Category;
use App\Models\Course;
use App\Models\Submission;
use App\Models\Task;
use App\Models\User;
use App\Models\UserCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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

    public function admin_users_course($id)
    {
        return view('admin.courses.users', [
            'title' => 'Users',
            'course' => Course::findOrFail($id),
            'users' => Course::findOrFail($id)->users
        ]);
    }

    public function trainer_users_course($id)
    {
        return view('trainer.course.users', [
            'title' => 'Users',
            'course' => Course::findOrFail($id),
            'users' => Course::findOrFail($id)->users
        ]);
    }

    public function assignCourseToUsers(Request $request)
    {
        $userIds = $request->input('user_ids');
        $courseId = $request->input('course_id');

        $course = Course::find($courseId);

        if ($course) {
            $course->users()->sync($userIds);
        }

        return redirect()->back()->with('success', 'Course assigned to users successfully!');
    }

    public function removeUser($courseId, $userId)
    {
        $course = Course::findOrFail($courseId);
        $user = User::findOrFail($userId);
        $course->users()->detach($userId);

        return redirect()->back()->with('success', 'User removed from course successfully.');
    }

    public function admin_detail_course($id)
    {
        $course = Course::find($id);
        return view('admin.courses.show',[
            'title' => $course->name . ' DETAIL',
            'course' => $course
        ]);
    }

    public function trainer_detail_course($id)
    {
        $course = Course::find($id);
        return view('trainer.course.show',[
            'title' => $course->name . ' DETAIL',
            'course' => $course
        ]);
    }

    public function student_detail_course($id)
    {
        $course = Course::find($id);

        $absence = $course->absences()->latest()->first();

        $attendances = Auth::user()->attendances()
            ->whereHas('absence', function ($query) use ($course) {
                $query->where('course_id', $course->id);
            })
            ->latest()->limit(3)->get();

        $tasks = Task::with('submissions')->where('course_id', $id)->get();

        $data = [
            'title' => $course->name . ' DETAIL',
            'course' => $course,
            'tasks' => $tasks,
        ];

        if ($absence) {
            $data['absence'] = $absence;
            $data['attendances'] = $attendances;
            $data['attended'] = Attendance::where('user_id', Auth::id())->where('absence_id', $absence->id)->exists();
            foreach ($data['tasks'] as $key => $task) {
                $data['tasks'][$key]['submitted'] = $task->submissions->where('user_id', Auth::id())->first() !== null;
            }
        } else {
            $data['absence'] = $absence;
            $data['attendances'] = $attendances;
            foreach ($data['tasks'] as $key => $task) {
                $data['tasks'][$key]['submitted'] = $task->submissions->where('user_id', Auth::id())->first() !== null;
            }
        }

        return view('student.course.show', $data);
    }


    public function hasAttended($absenceId)
    {
        return Attendance::where('user_id', Auth::id())
            ->where('absence_id', $absenceId)
            ->exists();
    }

    public function add_attendance(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
            'time_attend' => 'required',
            'notes' => 'nullable',
            'type' => 'required'
        ]);

        $absence = new Attendance();
        $absence->user_id = $request->user_id;
        $absence->course_id = $request->course_id;
        $absence->time_attend = $request->time_attend;
        $absence->notes = $request->notes;
        $absence->type = $request->type;
        $absence->save();
        return redirect()->back();
    }

    public function edit_assigned($id)
    {
        return view('admin.users.assign', [
            'title'=> 'Edit Assigned',
            'user'=> User::find($id),
            'courses' => Course::all()
        ]);
    }

    public function assign_courses(Request $request, $id)
    {
        $user = User::find($id);
        $courseIds = $request->input('course_ids');

        if ($user) {
            $user->courses()->sync($courseIds);
        }
        return redirect()->route('users.index');
    }


}
