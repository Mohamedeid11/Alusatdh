<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Monarobase\CountryList\CountryList;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $countryList = new CountryList();
        $countries = array_values($countryList->getList());

        $timezones = timezone_identifiers_list();

        return [

            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|email:rfc,dns|max:255|unique:users,email',
            'user_type' => 'required|in:admin,teacher,student',
            'gender' => 'required|in:male,female',
            'country' => ['required', Rule::in($countries)],
            'city' => 'nullable|string|max:255',
            'timezone' => ['required', Rule::in($timezones)],
            'phone' => ['nullable', 'string', 'regex:/^\+?[0-9\-\(\) ]{6,20}$/','max:20']

        ];
    }
}
