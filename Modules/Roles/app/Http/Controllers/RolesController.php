<?php

namespace Modules\Roles\Http\Controllers;

//use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller; // Extend this class
use Modules\Roles\app\ViewModels\RoleViewModel;
use Modules\Roles\Http\Requests\RoleStoreRequest;
use Modules\Roles\Http\Requests\RoleUpdateRequest;
use Spatie\Permission\Models\Role;
use Modules\Roles\app\Models\Permission;


class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:roles.read', ['only' => ['index']]);
        $this->middleware('permission:roles.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:roles.edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:roles.delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::permissionsByGroups();

        return view('dashboard.roles.index', compact('roles' ,'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.roles.form' , new RoleViewModel());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleStoreRequest $request): RedirectResponse
    {
        $role =  Role::create($request->validated() + ['guard_name' => 'web']);

        if (isset($request->permissions)) {
            $permissionNames = Permission::whereIn('id', $request->permissions)
                ->pluck('name')
                ->toArray();
        }else{
            $permissionNames = [];
        }

        $role->givePermissionTo($permissionNames);
        Session()->flash('success', 'Role Added Successfully');
        return redirect()->route('roles.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function show(Role $role)
    {
        // Get all users with 'status' 1 who do not have the specific role
        $users = User::where('status', 1)->whereDoesntHave('roles', function ($query) use ($role) {
            $query->where('id', $role->id);  // Assuming you are passing a Role object
        })->get();

        return view('dashboard.roles.view', new RoleViewModel($role) ,compact( 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleUpdateRequest $request, Role $role): RedirectResponse
    {
        if ($request->name == 'admin'){
            Session()->flash('error', 'You can\'t update this role');
            return redirect()->back()->with('role');
        }

        $role->update($request->validated());

        if (isset($request->permissions)) {
            $permissionNames = Permission::whereIn('id', $request->permissions)
                ->pluck('name')
                ->toArray();
        }else{
            $permissionNames = [];
        }

        $role->syncPermissions($permissionNames);
        Session()->flash('success', 'Role Updated Successfully');
        return redirect()->back()->with('role');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $system_roles = ['super_admin' ,'admin' , 'student' , 'teacher'];

        if (in_array($role->name, $system_roles)){
            return response()->json(['message' => 'This Role can\'t be deleted'], 400);
        }

        $role->delete();
        return response()->json(['message' => 'Role deleted successfully'], 200);
    }

    public function assignUser(Request $request, Role $role)
    {
        // Assuming 'user_ids' is the name of the input field containing the user IDs
        $userIds = $request->input('users');

        if ($userIds) {
            // Retrieve all users by their IDs
            $users = User::findMany($userIds);

            // Assign the role to each user
            foreach ($users as $user) {
                $user->assignRole($role);
            }

            // Optional: Add a success message or perform other actions
            return redirect()->back()->with('success', 'Users have been assigned the role successfully!');
        } else {
            // No user IDs were provided, handle the error as needed
            return redirect()->back()->with('error', 'No users were selected.');
        }
    }
}
