<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseVideo extends Model
{
   use HasFactory;

   protected $guarded = [];

//    protected $table = 'course_videos';

   public function course()
   {
       return $this->belongsTo(Course::class);
   }


}