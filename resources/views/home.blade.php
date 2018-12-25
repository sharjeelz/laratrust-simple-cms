@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container">
                        <li><a href="{{url('users')}}">Users</a></li>
                        <li><a href="{{url('roles')}}">Roles</a></li>
                        <li><a href="{{url('permissions')}}">Permissions</a></li>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
