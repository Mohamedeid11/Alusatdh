<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Monarobase\CountryList\CountryList;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        $countryList = new CountryList();
        $countries = $countryList->getList(); // Get all countries in an array
        $timezones = timezone_identifiers_list();

        return view('dashboard.users.index' , compact('users', 'countries', 'timezones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {
        $validatedData = $request->validated();

        User::create($validatedData);

        return redirect()->back()->with('success', 'User created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('dashboard.users.view', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        dd($user);
        // Check if the admin has a photo and delete it from storage
        if ($user->photo && Storage::disk('public')->exists($user->photo)) {
            Storage::disk('public')->delete($user->photo);
        }
        // Delete the admin record
        $user->delete();
        Session()->flash('success', 'User Deleted Successfully');
        return redirect()->back();
    }
}
