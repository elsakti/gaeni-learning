<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendances';

    protected $fillable = ['user_id', 'absence_id','time_attend', 'notes', 'type'];

    public function absence() {
        return $this->belongsTo(Absence::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
