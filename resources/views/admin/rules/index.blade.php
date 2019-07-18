@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Rules</h1>
        @isset ($id)
        <h3>{{$id}}</h3>
        @endisset
        <table class="table table-striped">
            <thead>
            <tr>
                <th>id</th>
                <th>Controller</th>
                <th>Method</th>
                <th>URL</th>
            </tr>
            </thead>
            <tbody>
            @forelse($rules as $rule)
                <tr>
                    <td>{{$rule->id}}</td>
                    <td>{{$rule->controller}}</td>
                    <td>{{$rule->method}}</td>
                    <td>{{$rule->uri}}</td>
                    <td><a href={{route('admin.rules.attach', $rule->id)}}>Test</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No rules in base</td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="4">
                    {{$rules->links()}}
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection
