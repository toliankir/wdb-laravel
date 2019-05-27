@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Role - {{$role_name}}</h1>
        <table class="table">
            <thead>
            <tr>
                <th>#id</th>
                <th>Permission</th>
            </tr>
            </thead>
            <tbody>
            <tr></tr>
            </tbody>
            <tfoot>
            <tr>
            <td colspan="2">

            </td>
            </tr>
            </tfoot>
        </table>
        Permissions
        {{$role_id}}
    </div>
@endsection