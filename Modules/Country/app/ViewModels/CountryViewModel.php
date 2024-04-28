<?php

namespace Modules\Country\app\ViewModels;

use Modules\Country\Models\Country;
use Spatie\ViewModels\ViewModel;

class CountryViewModel extends ViewModel
{
    public Country $country;

    public function __construct($country = null)
    {
        $this->country = is_null($country) ? new Country(old()) : $country;
    }

    public function action(): string
    {
        return is_null($this->country->id)
            ? route('country.store')
            : route('country.update', ['country' => $this->country->id]);
    }

    public function method(): string
    {
        return is_null($this->country->id) ? 'POST' : 'PUT';
    }

}
