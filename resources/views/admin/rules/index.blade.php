@extends('layouts.app')

@section('content')
<div class="container">
    @if ($role)
    <h1>Rules: {{$role->role}}</h1>
    {!! Form::open(['url' => route('admin.rules.sync',$role->role), 'method' => 'POST']) !!}
    {{Form::hidden('role',$role->role)}}
    {{Form::hidden('currentPage',$currentPage)}}

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Controller</th>
                    <th>Method</th>
                    <th>URL</th>
                    <th>Status</th>
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
                        {{Form::hidden('all-action['.$rule->id.']',$rule->controller.'@'.$rule->method)}}
                        {!! Form::checkbox('selected-action['.$rule->id.']', $rule->controller.'@'.$rule->method, $selectedActions->contains($rule->id), ['class' => 'form-control']) !!}
                    </td>
                </tr>
                @empty

                <tr>
                    <td colspan="5">No rules in base</td>
                </tr>
                @endforelse
                <tr>
                    <td colspan="5">
                        {{Form::button('Sync', ['type' => 'submit', 'class' => 'btn btn-info btn-sm float-right'])}}
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5">
                        {{$rules->links()}}
                    </td>
                </tr>
            </tfoot>
        </table>
        {!! Form::close() !!}
    </div>
    @else
    <h1>{{$requestedRole}} don't exist!</h1>
    @endif
@endsection
