<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $categories = Category::all();
        $courses = Course::with(['category','teacher','students'])->orderByDesc('id')->get();
        return view('front.index',compact('categories','courses'));
    }

    public function details(Course $course){
        return view('front.index');
    }
}