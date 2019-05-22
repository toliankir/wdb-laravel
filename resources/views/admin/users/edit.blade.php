@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>User: {{$user->name}}, id #{{$user->id}}</h1>
        {!! Form::open(['url' => route('admin.users.update', $user->id),'method' => 'PUT']) !!}
        @include('admin.users.form')
        {!! Form::close() !!}
    </div>
@endsection
