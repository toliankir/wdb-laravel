<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Permission;
use App\Role;
use App\User;

class DashboardController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        $lastUsers = User::latest()->take(5)->get();
        $permissionsCount = Permission::count();
        $lastPermissions = Permission::latest()->take(5)->get();
        $rolesCount = Role::count();
        $lastRoles = Role::latest()->take(5)->get();
        return view('admin.index', [
            'users_count' => $usersCount,
            'last_users' => $lastUsers,
            'permissions_count' => $permissionsCount,
            'last_permissions' => $lastPermissions,
            'roles_count' => $rolesCount,
            'last_roles' => $lastRoles
        ]);
    }
}
