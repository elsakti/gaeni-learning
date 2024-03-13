<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin() {
        return view('admin.dashboard.index', [
            'title' => 'Admin Dashboard'
        ]);
    }

    public function trainer() {
        return view('trainer.dashboard.index', [
            'title' => 'Trainer Dashboard'
        ]);
    }

    public function student() {
        return view('student.dashboard.index', [
            'title' => 'Student Dashboard'
        ]);
    }
}
