<?php

namespace Modules\Country\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Modules\Country\app\Services\CountryService;
use Modules\Country\app\ViewModels\CountryViewModel;
use Modules\Country\Http\Requests\StoreCountryRequest;
use Modules\Country\Http\Requests\UpdateCountryRequest;
use Modules\Country\Models\Country;

class CountryController extends Controller
{

    protected $countryService;

    public function __construct(CountryService  $countryService)
    {
        $this->countryService = $countryService;
//        $this->middleware('permission:country.read,admin', ['only' => ['index']]);
//        $this->middleware('permission:country.create,admin', ['only' => ['create', 'store']]);
//        $this->middleware('permission:country.edit,admin', ['only' => ['edit', 'update']]);
//        $this->middleware('permission:country.delete,admin', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = $this->countryService->getAllData();
        return view('dashboard.countries.index' ,compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.countries.form' , new CountryViewModel());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCountryRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        if ($request->hasFile('icon') && $request->file('icon')->isValid()) {
            $path = $request->file('icon')->store('country/img', 'public');
            $validatedData['icon'] = $path;
        }

        $category =$this->countryService->storeData($validatedData);
        if ($category){
            Session()->flash('success', 'Country Created Successfully');
        }else{
            Session()->flash('error', 'Country didn\'t Created');

        }

        return redirect()->route('country.index');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('country::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country)
    {
        return view('dashboard.countries.form' , new CountryViewModel($country));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCountryRequest $request, Country $country): RedirectResponse
    {
        $validatedData = $request->validated();

        if ($request->hasFile('icon') && $request->file('icon')->isValid()) {
            if ($country->icon && Storage::disk('public')->exists($country->icon)) {
                Storage::disk('public')->delete($country->icon);
            }

            $path = $request->file('icon')->store('country/img', 'public');
            $validatedData['icon'] = $path;
        }

        $category =$this->countryService->updateData($validatedData, $country);
        if ($category){
            Session()->flash('success', 'Country Created Successfully');
        }else{
            Session()->flash('error', 'Country didn\'t Created');

        }

        return redirect()->route('country.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
// Check if the admin has a photo and delete it from storage
        if ($country->icon && Storage::disk('public')->exists($country->icon)) {
            Storage::disk('public')->delete($country->icon);
        }

        $country->delete();
        Session()->flash('success', 'Country Deleted Successfully');
        return redirect()->back();
    }
}
