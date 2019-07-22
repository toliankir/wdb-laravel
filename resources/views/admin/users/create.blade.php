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
    <h1>New user</h1>
    {!! Form::open(['url' => route('admin.users.store'),'method' => 'POST']) !!}
    @include('admin.users.form')
    {!! Form::close() !!}
</div>
@endsection