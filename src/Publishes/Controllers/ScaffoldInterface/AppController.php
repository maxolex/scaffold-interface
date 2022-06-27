<?php

namespace App\Http\Controllers\ScaffoldInterface;

use App\Http\Controllers\Controller;

/**
 * Class AppController.
 *
 * @author Maxolex Togolais <maxolex12@gmail.com>
 */
class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $users = \App\Models\User::all()->count();
        $roles = \Spatie\Permission\Models\Role::all()->count();
        $permissions = \Spatie\Permission\Models\Permission::all()->count();
        $entities = \Maxolex\ScaffoldInterface\Models\Scaffoldinterface::all();

        return view('scaffold-interface.dashboard.dashboard', compact('users', 'roles', 'permissions', 'entities'));
    }


    public function semantic_dashboard()
    {
        $users = \App\Models\User::all()->count();
        $roles = \Spatie\Permission\Models\Role::all()->count();
        $permissions = \Spatie\Permission\Models\Permission::all()->count();
        $entities = \Maxolex\ScaffoldInterface\Models\Scaffoldinterface::all();

        return view('scaffold-interface.dashboard.semantic-dashboard', compact('users', 'roles', 'permissions', 'entities'));
    }
}
