<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'course_students');
    }

    public function course_video()
    {
        return $this->hasMany(CourseVideo::class);
    }

    public function course_keypoints()
    {
        return $this->hasMany(CourseKeypoint::class);
    }
}
