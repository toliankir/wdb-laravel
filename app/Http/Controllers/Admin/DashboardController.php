<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Permission;
use App\Post;
use App\Role;
use App\User;
use App\Action;

class DashboardController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        $lastUsers = User::latest()->take(5)->get();
        $rolesCount = Role::count();
        $lastRoles = Role::latest()->take(5)->get();
        $postsCount = Post::count();
        $lastPosts = Post::latest()->take(5)->get();
        $actionsCount = Action::count();
        $lastActions = Action::take(5)->get();
        return view('admin.index', [
            'users_count' => $usersCount,
            'last_users' => $lastUsers,
            'roles_count' => $rolesCount,
            'last_roles' => $lastRoles,
            'posts_count' => $postsCount,
            'last_posts' => $lastPosts,
            'actions_count' => $actionsCount,
            'last_actions' => $lastActions
        ]);
    }
}
