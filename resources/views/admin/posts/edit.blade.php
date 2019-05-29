@extends('layouts.app')

@section('content')
    <div class="container">
        {!! Form::open(['url' => route('admin.posts.update', $post->id),'method' => 'PUT']) !!}
        @include('posts.form')
        {!! Form::close() !!}
    </div>
@endsection
