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
    <h4>Actions for "{{$role->role}}" role:</h4>
    <ul>
        @forelse ($role->getActions as $action)
        <li>
            {{$action->controller.'@'.$action->method}}
        </li>
        @empty
        No Actions
        @endforelse

    </ul>
    <a class="btn btn-info" href="{{route('admin.permissions.show', $role->role)}}">Permissions</a>

</div>
@endsection