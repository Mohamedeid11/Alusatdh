<?php

namespace Modules\Course\app\ViewModels;

use Modules\Course\Models\Course;
use Spatie\ViewModels\ViewModel;

class CourseViewModel extends ViewModel
{
    public Course $course;

    public function __construct($course = null)
    {
        $this->course = is_null($course) ? new Course(old()) : $course;
    }

    public function action(): string
    {
        return is_null($this->course->id)
            ? route('course.store')
            : route('course.update', ['course' => $this->course->id]);
    }

    public function method(): string
    {
        return is_null($this->course->id) ? 'POST' : 'PUT';
    }

}
