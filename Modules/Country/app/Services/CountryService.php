<?php

namespace Modules\Country\app\Services;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Modules\Country\Models\Country;

class CountryService {

    public function getAllData()
    {
        return Country::latest()->get();
    }

    public function getPaginatedData(array $data , int $paginate = 15 )
    {
        return  Country::paginate($paginate);
    }

    public function storeData(array $data)
    {

        $country = Country::create($data);

        return  $country;
    }

    public function updateData(array $data , $country)
    {

        $country->update($data);

        return  $country;
    }

}
