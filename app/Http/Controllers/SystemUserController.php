<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;
use DateTime;
use App\Permission;

class SystemUserController extends Controller
{
    /**
     * Display a listing of the System Users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $get_all_users = User::all();
        return view('sysuser.users')->with(['users' => $get_all_users]);
    }
     /**
     * Display a listing of the System Permissions.
     *
     * @return \Illuminate\Http\Response
     */
    public function Permissionsindex()
    {
        $get_all_permissions = Permission::all();

        return view('sysuser.permissions')->withPermissions($get_all_permissions);
    }


    /**
     * Display a listing of the System Roles.
     *
     * @return \Illuminate\Http\Response
     */
    public function Rolesindex()
    {
        $condition = ['type' => null];
        $get_all_roles = Role::all();
        return view('sysuser.roles')->withRoles($get_all_roles);
    }

    public function createRole()
    {
        return view('sysuser.create-role');
    }
    /**
     * Store Role
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeRole(Request $request)
    {
        $role = new Role();
        $role->name = $request->get('name');
        $role->display_name = $request->get('display_name');
        $role->description = $request->get('description');
        $role->save();
        return redirect('roles');
    }

    public function createPermission()
    {

        return view('sysuser.create-permission');
    }
    public function storePermission(Request $request)
    {

        $permission = new Permission();
        $permission->name = $request->get('name');
        $permission->display_name = $request->get('display_name');
        $permission->description = $request->get('description');
        $permission->save();
        return redirect('permissions');
    }



}
