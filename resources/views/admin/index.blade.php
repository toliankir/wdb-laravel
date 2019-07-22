@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    <div class="row">
        <div class="col-4">
            <div class="card shadow-sm p-2">
                <h4 class="text-center">Users:</h4>
                <p class="text-center">
                    {{$users_count}}
                </p>
                <ul>
                    @foreach($last_users as $user)
                    <li>{{$user->name}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow-sm p-2">
                <h4 class="text-center">Roles count:</h4>
                <p class="text-center">
                    {{$roles_count}}
                </p>
                <ul>
                    @foreach($last_roles as $role)
                    <li>{{$role->role}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow-sm p-2">
                <h4 class="text-center">Permissions count:</h4>
                <p class="text-center">
                    {{$permissions_count}}
                </p>
                <ul>
                    @foreach($last_permissions as $permission)
                    <li>{{$permission->permission}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-6">
            <div class="card shadow-sm bg-secondary text-white p-2">
                <h4 class="text-center">Posts:</h4>
                <p class="text-center">{{$posts_count}}</p>
                <ul>
                    @foreach($last_posts as $post)
                    <li>{{$post->title}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-6">
            <div class="card shadow-sm bg-secondary text-white p-2">
                <h4 class="text-center">Actions:</h4>
                <p class="text-center">{{$actions_count}}</p>
                <ul>
                    @foreach($last_actions as $action)
                    <li>
                        {{$action->controller.'@'.$action->method}}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-6"></div>
    </div>
</div>
@endsection