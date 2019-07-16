@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Rules</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>id</th>
                <th>Controller</th>
                <th>Method</th>
            </tr>
            </thead>
            <tbody>
            @forelse($rules as $rule)
                <tr>
                    <td>{{$rule->id}}</td>
                    <td>{{$rule->controller}}</td>
                    <td>{{$rule->method}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No rules in base</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
