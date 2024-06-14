<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Submission;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index($id) {
        $course = Course::find($id);
        $tasks = Course::findOrFail($id)->tasks;
        $nowUser = ' ';
        if(Auth::user()->hasRole('admin')) {
            $nowUser = 'admin';
        } elseif(Auth::user()->hasRole('trainer')) {
            $nowUser = 'trainer';
        }
        return view($nowUser . '.tasks.index',[
            'title' => $course->name .' TASKS',
            'course' => $course,
            'tasks' => $tasks
        ]);
    }

    public function show($id)
    {
        $task = Task::find($id);
        // @dd($task);
        $submissions = Submission::where('task_id', $id)->get();
        // @dd($submissions);
        $nowUser = ' ';
        if(Auth::user()->hasRole('admin')) {
            $nowUser = 'admin';
        } elseif(Auth::user()->hasRole('trainer')) {
            $nowUser = 'trainer';
        }
        return view($nowUser . '.tasks.submissions',[
            'title' => $task->title,
            'task' => $task,
            'submissions' => $submissions
        ]);

    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required|exists:courses,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'open_date' => 'required|date|before:closed_date',
            'closed_date' => 'required|date',
            'status' => 'required|in:pending,opened,closed',
            'type' => 'required|in:link,pdf,zip',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $validatedData = $validator->validated();

        try {
            Task::create($validatedData);
            return redirect()->back()->with('success', 'Task created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while creating the task: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $nowUser = ' ';
        $course = Task::find($id)->course;
        $task = Task::find($id);
        if(Auth::user()->hasRole('admin')) {
            $nowUser = 'admin';
        } elseif(Auth::user()->hasRole('trainer')) {
            $nowUser = 'trainer';
        }
        return view($nowUser . '.tasks.edit',[
            'title' => $task->title . ' EDIT',
            'task' => $task,
            'course'=> $course
        ]);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required|exists:courses,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'open_date' => 'required|date|before:closed_date',
            'closed_date' => 'required|date',
            'status' => 'required|in:pending,opened,closed',
            'type' => 'required|in:link,pdf,zip',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $validatedData = $validator->validated();

        try {
            $task = Task::findOrFail($id);
            $task->update($validatedData);
            if(Auth::user()->hasRole('admin')) {
                return redirect()->route('admin_dashboard')->with('success', 'Task updated successfully!');
            } elseif(Auth::user()->hasRole('trainer')) {
                return redirect()->route('trainer_dashboard')->with('success', 'Task updated successfully!');
            }
        } catch (\Exception $e) {
            report($e);
            return redirect()->back()->with('error', 'An error occurred while updating the task: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        try {
            $task->delete();
            return redirect()->back()->with('success', 'Task deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the task: ' . $e->getMessage());
        }

    }

    public function toggle($id)
    {
        $task = Task::find($id);

        try {
            if($task->status == 'closed'){
                $task->update(['status' => 'opened']);
            } elseif($task->status == 'pending') {
                $task->update(['status' => 'opened']);
            } elseif($task->status == 'opened') {
                $task->update(['status' => 'closed']);
            }
            return redirect()->back()->with('success', 'Task updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while closing the task: ' . $e->getMessage());
        }
    }

    public function submission(Request $request)
    {
        $namefile = '';
        try {
            if ($request->hasFile('file')) {
                $validator = Validator::make($request->all(), [
                    'user_id' => 'required|exists:users,id',
                    'task_id' => 'required|exists:tasks,id',
                    'file' => 'required|max:10000|mimes:pdf,zip',
                    'time_submit' => 'required',
                    'status' => 'required|in:on_time,late',
                    'grade' => 'nullable',
                    'feedback' => 'nullable'
                ]);
            } else {
                $validator = Validator::make($request->all(), [
                    'user_id' => 'required|exists:users,id',
                    'task_id' => 'required|exists:tasks,id',
                    'link' => 'required|url',
                    'time_submit' => 'required',
                    'status' => 'required|in:on_time,late',
                    'grade' => 'nullable',
                    'feedback' => 'nullable'
                    ]);
            }
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            } else {
                if ($request->hasFile('file')) {
                    if (!Storage::exists('public/tasks/submissions/')) {
                        Storage::makeDirectory('public/tasks/submissions/');
                    }

                    $fileWithExt = $request->file('file')->getClientOriginalName();
                    $fileTemp = pathinfo($fileWithExt, PATHINFO_FILENAME);
                    $ext = $request->file('file')->getClientOriginalExtension();
                    $namefile = $fileTemp . '_' . time() . '.' . $ext;
                    $request->file('file')->storeAs('public/tasks/submissions', $namefile);
                } else {
                    $namefile = $request->link;
                }
            }
                $newData = Submission::create([
                    'user_id' => $request->user_id,
                    'task_id' => $request->task_id,
                    'file' => $namefile,
                    'time_submit' => $request->time_submit,
                    'status' => $request->status,
                ]);
                if ($newData) {
                    return redirect()->back()->with('success', 'Send submission successfully!');
                } else {
                    return redirect()->back()->with('error', 'An error occurred while send submission');
                }

        } catch (\Exception $e) {
            $errorMessage = 'An error occurred while sending the submission: ' . $e->getMessage();
            return redirect()->back()->with('error', $errorMessage);
        }
    }

    public function del_submission($id) {
        $submission = Submission::find($id);
        try {
            if ($submission) {
                $submission->delete();
                return redirect()->back()->with('success', 'Delete submission successfully!');
            }
        } catch (\Throwable $e) {
            $errorMessage = 'An error occurred while sending the submission: ' . $e->getMessage();
            return redirect()->back()->with('error', $errorMessage);
        }
    }

    public function add_grade($id)
    {
        session()->put('previousUrl', url()->previous());
        $submission = Submission::find($id);
        $nowUser = ' ';
        if(Auth::user()->hasRole('admin')) {
            $nowUser = 'admin';
        } elseif(Auth::user()->hasRole('trainer')) {
            $nowUser = 'trainer';
        }
        return view($nowUser . '.tasks.grade',[
            'title' => 'Grade submission',
            'submission' => $submission
        ]);

    }

    public function update_grade(Request $request, $id) {
        $submission = Submission::find($id);
        $validator = Validator::make($request->all(), [
            'grade' => 'required|in:A,AB,B,C,D,E',
            'feedback' => 'nullable'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $validatedData = $validator->validated();
        }


        try {
            if($validatedData) {
                $submission->update([
                    'grade' => $request->grade,
                    'feedback' => $request->feedback
                ]);
            }
        $redirectRoute = Auth::user()->hasRole('admin') ? 'admin_dashboard' : 'trainer_dashboard';

        if (session()->has('previousUrl')) {
            $previousUrl = session()->pull('previousUrl');
            return redirect()->to($previousUrl)->with('success', 'Task updated successfully!');
        } else {
            return redirect()->route($redirectRoute)->with('success', 'Task updated successfully!');
        }
        } catch (\Throwable $e) {
            $errorMessage = 'An error occurred while sending the submission: ' . $e->getMessage();
            return redirect()->back()->with('error', $errorMessage);
        }
    }

}
