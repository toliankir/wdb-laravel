@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th>id</th>
                <th>Role name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($roles as $role)
                <tr>
                    <th>{{$role->id}}</th>
                    <td>{{$role->role}}</td>
                    <td>
                        {!! Form::open(['url' => route('admin.roles.destroy', $role->id), 'method' => 'DELETE']) !!}
                        {{Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'])}}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No roles in base</td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3">
                    {!! Form::open(['url' => route('admin.roles.create'), 'method' => 'GET', 'class' => 'float-right']) !!}
                    {{ Form::button('Create new role', ['type' => 'submit', 'class' => 'btn btn-info'])}}
                    {!! Form::close() !!}
                </td>
            </tr>
            </tfoot>
        </table>
        Roles
    </div>

@endsection
