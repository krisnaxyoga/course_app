<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCourseVideoRequest;

class CourseVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course)
    {
        return view('admin.course_videos.create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseVideoRequest $request, Course $course)
    {
        DB::transaction(function () use ($course, $request) {
            $validated = $request->validated();

            $validated['course_id'] = $course->id;

            $course = CourseVideo::create($validated);


        });
        return redirect()->route('admin.courses.show', $course->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseVideo $courseVideo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $courseVideo = CourseVideo::find($id);
        return view('admin.course_videos.edit', compact('courseVideo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCourseVideoRequest $request, $id)
    {
        $courseVideo = CourseVideo::find($id);

        DB::transaction(function () use ($courseVideo, $request) {
            $validated = $request->validated();

            $courseVideo->update($validated);

        });


        return redirect()->route('admin.courses.show', $courseVideo->course_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $courseVideo = CourseVideo::find($id);
        $courseVideo->delete();
        return redirect()->route('admin.courses.show', $courseVideo->course_id);
    }
}