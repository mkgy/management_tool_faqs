<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    function __construct()
    {
        $this->middleware(['permission:role-list|role-create|role-edit|role-delete'], ['only' => ['index', 'store']]);
        $this->middleware(['permission:role-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:role-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:role-delete'], ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $roles = Role::orderBy('id', 'DESC')->paginate(5);
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $permission = Permission::get();

        //        echo "<pre>";
        // print_r($permission);
        // echo "</pre>";
        // die();

        return view('roles.create', compact('permission'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
        //      echo "<pre>";
        // print_r($request->input());
        // echo "</pre>";
        // die();


        // die($request->input('name'));
        $role = Role::create(['name' => $request->input('name')]);

        // insert into `role_has_permissions` (`permission_id`, `role_id`) values (role-create, 4)
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')
            ->with('success', 'Role created successfully');
    }

    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();

        return view('roles.show', compact('role', 'rolePermissions'));
    }

    public function edit($id)
    {
       
        $role = Role::find($id);
       
        $permission = Permission::get();
        // die($permission);
        
        // pluck() :== helps us to extract certain values into 1 dimension array.
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
        // ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->pluck('role_has_permissions.permission_id')
            ->all();
//             echo "<pre>";
//     print_r($rolePermissions);
// echo "</pre>";
        return view('roles.edit', compact('role', 'permission', 'rolePermissions'));
    }

    // Saving users changes 
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->permissions()->sync($request->input('permission'));

        return redirect()->route('roles.index')
            ->with('success', 'Role updated successfully');
    }

    public function destroy($id)
    {
        DB::table("roles")->where('id', $id)->delete();
        return redirect()->route('roles.index')
            ->with('success', 'Role deleted successfully');
    }
}
