<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Absence extends Model
{
    use HasFactory;

    protected $table = 'absences';

    protected $fillable = ['course_id' ,'open_time', 'closed_time', 'date', 'status'];

    public function attendances() {
        return $this->hasMany(Attendance::class);
    }

    public function course() {
        return $this->belongsTo(Course::class);
    }

}
