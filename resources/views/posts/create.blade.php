@extends('layouts.app')

@section('content')
    <div class="container">
        {!! Form::open(['url' => route('posts.store'),'method' => 'POST']) !!}
        @include('posts.form')
        {!! Form::close() !!}
    </div>
@endsection
