<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index', [
            'title' => 'All Users',
            'users' => User::all(),
            'courses' => Course::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create', [
            'title' => 'Add User'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'institute' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users',
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
            toast($request->name . ' Has Been Registered!', 'success');
            return redirect()->route('users.index');
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.users.index', [
            'title' => $user->name . 'Profile'
        ]);
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'title' => $user->name . 'Profile Edit',
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required',
            'institute' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);
        $user->update($validated);
        toast($request->name . ' Account Has Been Updated!','success');
        return redirect()->route('users.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        toast('Account Has Been Deleted!','success');
        return redirect()->route('users.index');
    }

    public function assignTrainer($id) {
        $user = User::find($id);

        if ($user && $user->hasRole('student')) {
            $user->removeRole('student');
            $user->assignRole('trainer');

            toast('User has been assigned as trainer', 'success');
        } else {
            toast('Invalid user or user is not a student', 'error');
        }

        return redirect()->route('users.index');
    }


}
