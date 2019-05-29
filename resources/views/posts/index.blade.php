@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Posts</h1>
        <table class="table">
            <thead>
            <tr>
                <th>#id</th>
                <th>title</th>
                <th>body(100chars)</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($own_posts as $post)
                <tr>
                    <th>{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{substr($post->body,0 , 100)}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3"> You don't have posts in DB</td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3">
                    <a class="btn btn-info" href="{{route('posts.create')}}">Create new post</a>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection
