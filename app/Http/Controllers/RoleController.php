<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function allPermissions()
    {
        $permission = Permission::all();
        return view('admin.permission.all_permission', compact('permission'));
    }

    public function addPermissions($id = 0)
    {
        if ($id > 0) {
            $data = Permission::findOrFail($id);
            return view('admin.permission.add_permission', compact('data'));
        }

        return view('admin.permission.add_permission');
    }

    public function savePermission(Request $request, $id = 0)
    {
        if ($id > 0) {
            Permission::findOrFail($id)->update([
                'name' => $request->name,
                'group_name' => $request->group_name
            ]);
        } else {
            $role = Permission::create([
                'name' => $request->name,
                'group_name' => $request->group_name
            ]);
        }


        $notification = array(
            'message' => 'Permission Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect('/permissions/all')->with($notification);
    }

    public function deletePermission($id)
    {
        Permission::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Permission Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function allRoles()
    {

        $roles = Role::all();
        return view('admin.roles.all_roles', compact('roles'));
    }

    public function addRole($id = 0)
    {
        if ($id > 0) {
            $data = Role::findOrFail($id);
            return view('admin.roles.add_roles', compact('data'));
        } else {
            return view('admin.roles.add_roles');
        }


    }

    public function saveRole(Request $request, $id = 0)
    {
        if ($id > 0) {
            Role::findOrFail($id)->update([
                'name' => $request->name,
            ]);
        } else {
            Role::create([
                'name' => $request->name,
            ]);
        }


        $notification = array(
            'message' => 'Role Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect('/roles/all')->with($notification);

    }

    public function deleteRole($id)
    {
        Role::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Role Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect('/roles/all')->with($notification);

    }

    public function addRolePermission()
    {
        $role = Role::all();
        $permission = Permission::all();
        $permission_groups = User::getPermissionGroups();
        return view('admin.roles.add_role_permision', compact('role', 'permission', 'permission_groups'));
    }

    public function saveRolePermission(Request $request)
    {
        $data = array();
        $permission = $request->permission;
        foreach ($permission as $key => $value) {
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $value;
            DB::table('role_has_permissions')->insert($data);
        }
        $notification = array(
            'message' => 'Permission For Role Added Successfully',
            'alert-type' => 'success'
        );
        return redirect('/role_permission/all')->with($notification);
    }

    public function allRolePermission()
    {
        $roles = Role::all();
        return view('admin.roles.all_roles_permissions', compact('roles'));
    }

    public function editRolePermission($id)
    {
        try {
            $role = Role::findOrFail($id);
            $permission = Permission::all();
            $permission_groups = User::getPermissionGroups();
        } catch (\Exception $th) {
        }
        return view('admin.roles.edit_role_permision', compact('role', 'permission', 'permission_groups'));
    }

    public function updateRolePermission(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $permissions = $request->permission;
        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }
        $notification = array(
            'message' => 'Permission For Role Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect('/role_permission/all')->with($notification);
    }

    public function deleteRolePermission($id)
    {
        $role = Role::findOrFail($id);
        if (!is_null($role)) {
            $role->delete();
        }
        $notification = array(
            'message' => 'Permission For Role Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function selectRoleAjax(Request $request)
    {
        $role_id = $request->role_id;
        if ($role_id > 0) {
            $data = User::checkRoleHasPermission($role_id);
            $role = true;
            if ($data->isEmpty()) {
                $role = false;
            }
            return $role;
        }

    }
}