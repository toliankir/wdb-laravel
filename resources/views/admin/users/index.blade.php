@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Users control dashboard</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Type</th>
                <th>Active</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <th>{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->type}}</td>
                    <td>{{$user->active ? 'Yes' : 'No' }}</td>
                    <td>

                        {!! Form::open(['url' => route('admin.users.destroy', $user->id), 'method' => 'DELETE']) !!}
                        <a class="btn btn-success btn-sm" href="{{route('admin.users.edit', $user->id)}}">Edit</a>
                        {{Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'])}}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No data.</td>
                </tr>


            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="6" >
                    {!! Form::open(['url' => route('admin.users.create'), 'method' => 'GET', 'class' => 'float-right']) !!}
                    {{ Form::button('Create new user', ['type' => 'submit', 'class' => 'btn btn-info'])}}
                    {!! Form::close() !!}
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection
