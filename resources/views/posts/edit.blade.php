@extends('layouts.app')

@section('content')
<div class="container">
    {!! Form::open(['url' => route('posts.update', $post->id),'method' => 'PUT']) !!}
    @include('posts.form')
    {!! Form::close() !!}
</div>
@endsection