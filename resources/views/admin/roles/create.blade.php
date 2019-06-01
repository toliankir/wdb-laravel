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
        @include('admin.roles.form')
        {!! Form::close() !!}
    </div>
@endsection
