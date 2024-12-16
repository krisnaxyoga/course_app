<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index(){
        $categories = Category::all();
        $courses = Course::with(['category','teacher','students'])->orderByDesc('id')->get();
        return view('front.index',compact('categories','courses'));
    }

    public function details(Course $course){
        return view('front.detail',compact('course'));
    }

    public function learning(Course $course,$courseVideoId){
        $user = Auth::user();

        if(!$user->hasActiveSubscription()){
            return redirect()->route('front.pricing');
        }
        $video = $course->course_video()->find($courseVideoId);
        $user->courses()->syncWithoutDetaching([$course->id]);
        return view('front.learning',compact('course','video'));
    }
}