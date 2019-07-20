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
        <table class="table table-striped">
            <thead>
            <tr>
                <th>id</th>
                <th>Role name</th>
                <th>Homepage</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($roles as $role)
                <tr>
                    <th>{{$role->id}}</th>
                    <td>{{$role->role}}</td>
                    <td>{{$role->homepage}}</td>
                    <td class="w-25">
                        {!! Form::open(['url' => route('admin.roles.destroy', $role->id), 'method' => 'DELETE']) !!}
                        <a class="btn btn-sm btn-success" href="{{route('admin.roles.edit', $role->id)}}">Edit</a>
                        <a class="btn btn-sm btn-info" href="{{route('admin.permissions.show', $role->id)}}">Permissions</a>
                        <a class="btn btn-sm btn-info" href="{{route('admin.rules.show', $role->role)}}">Actions</a>
                        {{Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'])}}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No roles in base</td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="4">
                    <a class="btn btn-info float-right" href="{{route('admin.roles.create')}}">Create new role</a>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>

@endsection
