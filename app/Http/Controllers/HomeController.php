<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index() {
        return view('web.home.index', [
            'title'=> ' Gema LMS - Home',
            'courses' => Course::all()
        ]);
    }

    public function detail($name)   {
        $course = Course::where('name', $name)->firstOrFail();
        return view('web.course.detail.index', [
            'title' => $course->name,
            'course' => $course
        ]);
    }


}
