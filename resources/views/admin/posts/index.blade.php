@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Posts</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#id</th>
                <th>Title</th>
                <th>Body(100chars)</th>
                <th>Owner</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($posts as $post)
                <tr>
                    <th>{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{substr($post->body,0 , 100)}}</td>
                    <td>{{$post->creator()}}</td>
                    <td>
                        {!! Form::open(['url' => route('admin.posts.destroy', $post->id), 'method' => 'DELETE']) !!}
                        <a class="btn btn-success btn-sm" href="{{route('admin.posts.edit', $post->id)}}">Edit</a>
                        {{Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'])}}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5"> You don't have posts in DB</td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            </tfoot>
        </table>
    </div>
@endsection
