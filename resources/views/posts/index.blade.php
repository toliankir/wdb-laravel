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
            @forelse ($own_posts as $index => $post)
                <tr>
                    <th>{{($own_posts->currentPage()-1) * $own_posts->perPage() + 1 + $index}}</th>
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
                    <div class="d-flex justify-content-center">
                        {{$own_posts->links()}}
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <a class="btn btn-info float-right" href="{{route('posts.create')}}">Create new post</a>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection
