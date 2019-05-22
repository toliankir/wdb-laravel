@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>New user</h1>
        {!! Form::open(['url' => route('admin.users.store'),'method' => 'POST']) !!}
        @include('admin.users.form')
        {!! Form::close() !!}
    </div>
@endsection

