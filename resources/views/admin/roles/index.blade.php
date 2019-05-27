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
                    <td class="w-25">
                        {!! Form::open(['url' => route('admin.roles.destroy', $role->id), 'method' => 'DELETE']) !!}
                        {{Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'])}}
                        <a class="btn btn-sm btn-success" href="{{route('admin.permissions.show', $role->id)}}">Permissions</a>
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
                    {!! Form::open(['url' => route('admin.roles.store'),'method' => 'POST', 'class' => 'float-right']) !!}
                    {{ Form::text('role',
                         old('role') ? old('role') : null,
                         [
                            'class' => 'form-group user-email',
                            'placeholder' => 'Role',
                         ])
                    }}
                    {{ Form::button('Create new role', ['type' => 'Submit', 'class' => 'btn btn-info'])}}
                    {!! Form::close() !!}
                </td>
            </tr>
            </tfoot>
        </table>
    </div>

@endsection
