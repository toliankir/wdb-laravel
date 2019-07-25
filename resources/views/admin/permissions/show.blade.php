@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Role - {{$role_name}}</h1>
          <table class="table">
            <thead>
            <tr>
                <th>#id</th>
                <th>Permission</th>
                <th>Position</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>

            @forelse ($permissions as $permission)
                <tr>
                    <td>{{$permission->id}}</td>
                    <td>{{$permission->permission}}</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{route('admin.permission.up', $permission->id)}}">Up</a>
                        <a class="btn btn-info btn-sm"
                           href="{{route('admin.permission.down', $permission->id)}}">Down</a>
                    </td>
                    <td>
                        {!! Form::open(['url' => route('admin.permissions.destroy', $permission->id), 'method' => 'DELETE']) !!}
                        {{Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'])}}
                        <a class="btn btn-success btn-sm" href="{{route('admin.permissions.edit', $permission->id)}}">Edit</a>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No permissions</td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="4">
                    {{ Form::open(['url' => route('admin.permissions.store'),'method' => 'POST', 'class' => 'float-right']) }}
                    {{ Form::hidden('redirects_to', old('redirects_to') ? old('redirects_to') : URL::previous()) }}
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
    </div>
@endsection
