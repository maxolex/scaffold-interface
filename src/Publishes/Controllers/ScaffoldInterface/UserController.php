<?php

namespace App\Http\Controllers\ScaffoldInterface;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = \App\Models\User::all();

        return view('scaffold-interface.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('scaffold-interface.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new \App\Models\User();

        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect('scaffold-users');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = \App\Models\User::findOrfail($id);
        $roles = Role::all()->pluck('name');
        $permissions = Permission::all()->pluck('name');
        $userRoles = $user->roles;
        $userPermissions = $user->permissions;

        return view('scaffold-interface.users.edit', compact('user', 'roles', 'permissions', 'userRoles', 'userPermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = \App\Models\User::findOrfail($request->user_id);

        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect('scaffold-users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = \App\Models\User::findOrfail($id);

        $user->delete();

        return redirect('scaffold-users');
    }

    /**
     * Assign Role to user.
     *
     * @param \Illuminate\Http\Request
     *
     * @return \Illuminate\Http\Response
     */
    public function addRole(Request $request)
    {
        $user = \App\Models\User::findOrfail($request->user_id);
        $user->assignRole($request->role_name);

        return redirect('scaffold-users/edit/'.$request->user_id);
    }

    /**
     * Assign Permission to a user.
     *
     * @param \Illuminate\Http\Request
     *
     * @return \Illuminate\Http\Response
     */
    public function addPermission(Request $request)
    {
        if ($request->role_id == null)
        {
            $user = \App\Models\User::findorfail($request->user_id);
            $user->givePermissionTo($request->permission_name);

            return redirect('scaffold-users/edit/'.$request->user_id);
        }else{

            $role = Role::findById($request->role_id);
            $role->givePermissionTo($request->permission_name);

            return redirect('scaffold-roles/edit/'.$request->role_id);
        }

    }

    /**
     * revoke Permission to a user.
     *
     * @param \Illuminate\Http\Request
     *
     * @return \Illuminate\Http\Response
     */
    public function revokePermission(Request $request, $permission, $user_id)
    {
        if ($request->role_id == null)
        {
            $user = \App\Models\User::findorfail($user_id);

            $user->revokePermissionTo(\Illuminate\Support\Str::slug($permission, ' '));

            return redirect('scaffold-users/edit/'.$user_id);
        }else{
            $role = Role::findById($request->role_id);
            $role->revokePermissionTo(\Illuminate\Support\Str::slug($permission,''));
            return redirect('scaffold-roles/edit/'.$role->id);

        }

    }

    /**
     * revoke Role to a a user.
     *
     * @param \Illuminate\Http\Request
     *
     * @return \Illuminate\Http\Response
     */
    public function revokeRole($role, $user_id)
    {
        $user = \App\Models\User::findorfail($user_id);

        $user->removeRole(\Illuminate\Support\Str::slug($role, ' '));

        return redirect('scaffold-users/edit/'.$user_id);
    }
}
