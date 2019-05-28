@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Role - {{$role_name}}</h1>
        <table class="table">
            <thead>
            <tr>
                <th>#id</th>
                <th>Permission</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>

                @forelse ($test->getPermissions() as $permission)
                    <tr>
                        <td>{{$permission->id}}</td>
                        <td>{{$permission->permission}}</td>
                        <td>

                            {!! Form::open(['url' => route('admin.permissions.destroy', $permission->id), 'method' => 'DELETE']) !!}
                            {{Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'])}}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">No permissions</td>
                    </tr>
                    @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3">
                    {!! Form::open(['url' => route('admin.permissions.store'),'method' => 'POST', 'class' => 'float-right']) !!}
                    {{ Form::hidden('role_id', $role_id)}}
                    {{ Form::text('permission',
                         old('permission') ? old('permission') : null,
                         [
                            'class' => 'form-group user-email',
                            'placeholder' => 'Permission',
                         ])
                    }}
                    {{ Form::button('Add new permission', ['type' => 'Submit', 'class' => 'btn btn-info'])}}
                    {!! Form::close() !!}
                </td>
            </tr>
            </tfoot>
        </table>
        Permissions
        {{$role_id}}
    </div>
@endsection
