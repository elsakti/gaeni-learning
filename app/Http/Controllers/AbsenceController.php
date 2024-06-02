<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Attendance;
use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $course = Course::find($id);
        $absences = Course::findOrFail($id)->absences;
        $nowUser = ' ';
        if(Auth::user()->hasRole('admin')) {
            $nowUser = 'admin';
        } elseif(Auth::user()->hasRole('trainer')) {
            $nowUser = 'trainer';
        } 
        return view($nowUser . '.absences.index', [
            'title' => $course->name . ' ABSENCES',
            'course' => $course,
            'absences' => $absences
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'date' => 'required|date|unique:absences,date,NULL,id,course_id,' . $request->course_id,
            'open_time' => 'required',
            'closed_time' => 'nullable',
            'status' => 'required|boolean',
        ]);

        $absence = new Absence();
        $absence->course_id = $request->course_id;
        $absence->date = $request->date;
        $absence->status = $request->status;
        $absence->open_time = $request->open_time;
        $absence->save();
        return redirect()->back();
    }

    public function update($id)
    {
        $absence = Absence::find($id);
        if($absence->status == true) {
            $absence->update(['status' => false, 'closed_time' => now()->format('H:i:s') ]);
        } else if ($absence->status == false) {
            $absence->update(['status' => true, 'open_time' => now()->format('H:i:s') ]);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $nowUser = ' ';
        $absence = Absence::find($id);
        if(Auth::user()->hasRole('admin')) {
            $nowUser = 'admin';
        } elseif(Auth::user()->hasRole('trainer')) {
            $nowUser = 'trainer';
        }
        return view( $nowUser . '.absences.attendances',[
            'title' => 'Show Absences' ,
            'absence' => $absence,
            'attendances' => Attendance::where('absence_id', $id)->get()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Absence::find($id)->delete();
        return redirect()->back();
    }

        public function attend(Request $request)
    {
        $attendance = Attendance::where('user_id', Auth::id())
            ->where('absence_id', $request->input('absence_id'))
            ->first();

        if ($attendance) {
            return redirect()->back()->with('error', 'You have already attended this absence');
        }

        $attendance = new Attendance();
        $attendance->user_id = Auth::id();
        $attendance->absence_id = $request->input('absence_id');
        $attendance->time_attend = Carbon::now()->format('H:i');
        $attendance->type = $request->input('type');
        $attendance->notes = $request->input('notes');
        $attendance->save();
        return redirect()->back();
    }

    public function delete_attend($id)
    {
        Attendance::find($id)->delete();
        return redirect()->back();
    }


    
}
