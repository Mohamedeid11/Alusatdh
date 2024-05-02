<?php

namespace Modules\Course\app\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Course\app\Services\CourseService;
use Modules\Course\app\ViewModels\CourseViewModel;
use Modules\Course\Http\Requests\StoreCourseRequest;
use Modules\Course\Http\Requests\UpdateCourseRequest;
use Modules\Course\Models\Course;

class CourseController extends Controller
{
    protected $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
        $this->middleware('permission:courses.read', ['only' => ['index']]);
        $this->middleware('permission:courses.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:courses.edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:courses.delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with('users')->get();
        return view('dashboard.courses.index' , compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.courses.form' , new CourseViewModel());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request): RedirectResponse
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show(Course $course)
    {
        return view('course::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('course::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
