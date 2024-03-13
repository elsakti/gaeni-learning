<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index() {
        return view('admin.users.index',[
            'title' => 'All Users',
            'users' => User::all(),
            'courses' => Course::all()
        ]);
    }

    public function create() {
        return view('admin.users.create',[
            'title' => 'Add User'
        ]);
    }

    public function edit($id) {
        return view('admin.users.edit',[
            'title' => 'User Edit',
            'user' => User::find($id)
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'institute' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required|min:8'
        ]);
        $newUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'institute' => $request->institute,
            'phone' => $request->phone,
            'password' => Hash::make($request->password)
        ]);
        if ($newUser) {
            $newUser->assignRole('student');
            $request->session()->regenerate();
            toast($request->name . ' Has Been Registered!','success');
            return redirect()->route('admin_users');
        }
    }

    public function update(Request $request, $id) {
        $user = User::find($id);
        $validated = $request->validate([
            'name' => 'required',
            'institute' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);
        $user->update($validated);
        toast($request->name . ' Account Has Been Updated!','success');
        return redirect()->route('admin_users');
    }
    
    public function deleteAll(Request $request) {
        $ids = $request->ids;
        User::whereIn('id',$ids)->delete();
        toast('Account Has Been Deleted!','success');
        return response()->json(['success','Selected Users Deleted']);
    }

    public function addCourseToAll(Request $request) {
        $ids = $request->ids;
        $course_id = $request->course_id;
    
        $users = User::whereIn('id', $ids)->get();
        foreach ($users as $user) {
            $user->courses()->attach($course_id);
        }
    
        toast('Course Has Been Added to Selected Users!','success');
        return response()->json(['success','Course added to selected users']);
    }

    public function assignTrainer($id) {
        $user = User::find($id);
    
        if ($user && $user->hasRole('student')) {
            $user->removeRole('student');
            $user->assignRole('trainer');
    
            toast('User has been assigned as trainer','success');
        } else {
            toast('Invalid user or user is not a student','error');
        }
        return back();
    }
}
