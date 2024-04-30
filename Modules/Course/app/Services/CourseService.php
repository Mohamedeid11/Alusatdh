<?php

namespace Modules\Course\app\Services;

use Modules\Country\Models\Country;
use Modules\Course\Models\Course;

class CourseService {

    public function getAllData()
    {
        return Course::latest()->get();
    }

    public function getPaginatedData(array $data , int $paginate = 15 )
    {
        return  Course::paginate($paginate);
    }

    public function storeData(array $data)
    {

        $country = Course::create($data);

        return  $country;
    }

    public function updateData(array $data , $country)
    {

        $country->update($data);

        return  $country;
    }

}
