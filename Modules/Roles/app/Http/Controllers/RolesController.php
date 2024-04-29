<?php

namespace Modules\Roles\Http\Controllers;

//use App\Http\Controllers\Controller;
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
        return view('dashboard.roles.view', new RoleViewModel($role));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleUpdateRequest $request, Role $role): RedirectResponse
    {
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
        $role->delete();
        Session()->flash('success', 'Role Deleted Successfully');
        return redirect()->back();
    }
}
