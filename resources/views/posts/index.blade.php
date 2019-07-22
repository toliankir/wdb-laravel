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
                @can('administrate', App\Post::class)
                <th>Owner</th>
                @endcan
                <th class="w-15">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $index => $post)
            <tr>
                <th>{{($posts->currentPage()-1) * $posts->perPage() + 1 + $index}}</th>
                <td>{{$post->title}}</td>
                <td>{{substr($post->body,0 , 100)}}</td>
                @can('administrate', App\Post::class)
                <td>{{$post->creator()}}</td>
                @endcan
                <td>
                    {!! Form::open(['url' => route('admin.posts.destroy', $post->id), 'method' => 'DELETE']) !!}
                    
                    @can('userEdit', $post)
                    <a class="btn btn-success btn-sm" href="{{route('admin.posts.edit', $post->id)}}">Edit</a>
                    @endcan
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
            <tr>
                <td colspan="5">
                    <div class="d-flex justify-content-center">
                        {{$posts->links()}}
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <a class="btn btn-info float-right" href="{{route('posts.create')}}">Create new post</a>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
@endsection