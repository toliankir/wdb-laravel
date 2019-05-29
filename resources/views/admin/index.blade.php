@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Admin Dashboard</h1>
        <div class="row">
            <div class="col-md-4 card shadow-sm pt-1">
                <h4>Users:</h4>
                <p class="text-center">
                    {{$users_count}}
                </p>
                <ul>
                    @foreach($last_users as $user)
                        <li>{{$user->name}}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-4 card shadow-sm pt-1">
                <h4>Roles count:</h4>
                <p class="text-center">
                    {{$roles_count}}
                </p>
                <ul>
                    @foreach($last_roles as $role)
                        <li>{{$role->role}}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-4 card shadow-sm pt-1">
                <h4 class="float-left">Permissions count:</h4>
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
@endsection
