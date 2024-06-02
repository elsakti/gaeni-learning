<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'courses';

    protected $fillable = [
        'category_id',
        'instructor',
        'name',
        'image',
        'description',
        'start_time',
        'end_time',
        'start_at',
        'end_at',
        'status',
        'gform'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_courses', 'course_id', 'user_id')
            ->withPivot('graduation');
    }

    public function absences()
    {
        return $this->hasMany(Absence::class);
    }

}
