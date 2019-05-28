@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit permission #{{$permission->id}}</h1>
        {!! Form::open(['url' => route('admin.permissions.update', $permission->id),'method' => 'PUT']) !!}
        <p>
            {{ Form::label('permission', 'Permission', ['class' => 'control-label']) }}
            {{ Form::text('permission',
                 old('permission') ? old('permission') : (!empty($permission) ? $permission->permission : null),
                 [
                    'class' => 'form-group user-email',
                    'placeholder' => 'User email',
                 ])
            }}
        </p>
        <p>
            {{ Form::submit('Submit Form', ['class' => 'btn btn-info'])}}
        </p>
        {!! Form::close() !!}
    </div>
@endsection
