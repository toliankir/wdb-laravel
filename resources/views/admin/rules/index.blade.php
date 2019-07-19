@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Rules</h1>
    @isset ($id)
    <h3>{{$id}}</h3>
    @endisset
    {!! Form::open(['url' => route('admin.rules.attach'), 'method' => 'POST']) !!}
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
                <td>
                    {{Form::hidden('testhidden['.$rule->id.']',$rule->controller.'@'.$rule->method)}}
                    {!! Form::checkbox('test['.$rule->id.']', $rule->controller.'@'.$rule->method, false, ['class' => 'form-control']) !!}
                </td>
            </tr>
            @empty

            <tr>
                <td colspan="4">No rules in base</td>
            </tr>
            @endforelse
            <tr>
                <td colspan="4">
                    {{Form::button('Sync', ['type' => 'submit', 'class' => 'btn btn-info btn-sm'])}}
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">
                    {{$rules->links()}}
                </td>
            </tr>
        </tfoot>
    </table>
    {!! Form::close() !!}
</div>
@endsection