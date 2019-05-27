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
        {!! Form::open(['url' => route('admin.roles.store'),'method' => 'POST']) !!}
        <p>
            {{ Form::label('name', 'Role', ['class' => 'control-label']) }}
            {{ Form::text('role',
                 old('role') ? old('role') : null,
                 [
                    'class' => 'form-group user-email',
                    'placeholder' => 'Role',
                 ])
            }}
        </p>
        <p>
            {{ Form::submit('Submit Form')}}
        </p>
        {!! Form::close() !!}
    </div>
@endsection
