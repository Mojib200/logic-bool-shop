<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


use Illuminate\Http\Request;

class RoleController extends Controller
{
    function role_page(){
        $permission_info=Permission::all();
        $role_info=Role::all();
        $users = User::all();
        return view('layouts.admin.role.role',
    [
        'permission_info'=>$permission_info,
        'role_info'=>$role_info,
        'users'=>$users,
    ]);
    }

    function role_permission(Request $request){
        Permission::create([
            'name' => $request->permission,
        ]);
        $notification = array(
            'message' => 'Permission Insert Done Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
    function role_add(Request $request){
        $role = Role::create(['name' => $request->role_name,
    ]);
    $role->givePermissionTo([$request->permissions]);
        $notification = array(
            'message' => 'Role Insert Done Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
    function role_user_assigned(Request $request){
        $user = User::find($request->user_id);
        $user->assignRole($request->role_id);
        $notification = array(
            'message' => 'Assigned Done Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
    function delete_role_info($id){
        $user = User::find($id);
        $user->syncRoles([]);
        $user->syncPermissions([]);
        $notification = array(
            'message' => 'Delete Done Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
    function edit_permission_info($id){
        $permission_info = Permission::all();
        $role_info=Role::find($id);
        return view('layouts.admin.role.edit_role',[
            'role_info'=>$role_info,
            'permission_info'=>$permission_info,
        ]);
    }
    function update_permission_info(Request $request){
        $role= Role::find($request->role_id);
        $role->syncPermissions([$request->permissions]);
        $notification = array(
            'message' => 'Role Update !!',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
}
