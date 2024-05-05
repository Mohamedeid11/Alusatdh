<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
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

        $user = User::create($validatedData);

        $user->assignRole($user->user_type);

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
    public function edit(User $user)
    {
        $countryList = new CountryList();
        $countries = $countryList->getList(); // Get all countries in an array

        $timezones = timezone_identifiers_list();

        return view('dashboard.users.edit', compact('user', 'countries', 'timezones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        // dd($request->all());
        $validatedData = $request->validated();

        if ($request->hasFile('photo')) {

            // Get the file name with extension
            $fileNameWithExt = $request->file('photo')->getClientOriginalName();
            // Get just the filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just the extension
            $extension = $request->file('photo')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Before saving the photo, create the directory if it doesn't exist
            if (!Storage::exists('public/users-photos')) {
                // Create the directory with 775 permissions
                Storage::makeDirectory('public/users-photos', 0775, true); // The third parameter creates the directories recursively
            }
            // Upload Image
            $path = $request->file('photo')->storeAs('public/users-photos', $fileNameToStore);

            $validatedData['photo'] = $path;

        } elseif ($request->has('avatar_remove') && $request->get('avatar_remove')) {

            // User wants to remove the current photo
            if ($user->photo) {

                Storage::delete($user->photo);
                $validatedData['photo'] = null;

            }

        } else {

            // No changes to the photo, keep the existing one
            $validatedData['photo'] = $user->photo;

        }


        $user->update($validatedData);

        $user->assignRole($user->user_type);

        return redirect()->back()->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // You can't delete a system admin
        if($user->system){
            return redirect()->back()->with('error', 'You cannot delete a system admin .');
        }

        // Check if the admin has a photo and delete it from storage
        if ($user->photo && Storage::exists($user->photo))
        {
            Storage::delete($user->photo);
        }

        // Delete user
        $user->delete();
        Session()->flash('success', 'User Deleted Successfully');
        return redirect()->back();
    }
}
