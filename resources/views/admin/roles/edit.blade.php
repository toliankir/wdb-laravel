@extends('layouts.app')

@section('content')
    <div class="container">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1>Role: {{$role->role}}</h1>
        {!! Form::open(['url' => route('admin.roles.update', $role->id),'method' => 'PUT']) !!}
        @include('admin.roles.form')
        {!! Form::close() !!}
        <h4>Permissions for "{{$role->role}}" role:</h4>
        <ul>
            @forelse($role->getPermissions() as $permission)
                <li>{{$permission->permission}}</li>
                @empty
                <li>No permission for this role.</li>
            @endforelse
        </ul>
        <a class="btn btn-info" href="{{route('admin.permissions.show', $role->id)}}">Permissions</a>

    </div>
@endsection
