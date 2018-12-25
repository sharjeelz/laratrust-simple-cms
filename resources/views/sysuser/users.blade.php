@extends('layouts.app')
@section('content')
@section('title','Users')
@section('css')
@endsection

<div class="container">
    <h6 class="element-header">System Users</h6>
    <div style="text-align:right;margin:12px;"><a class="btn btn-success btn-md" href="{{url('register')}}"><i class="fa fa-cross"></i><span>Add User</span></a> </div>

    <div class="table-responsive">
        <table id="usertable" width="100%" class="table table-striped table-lightfont">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date Created</th>
                            <th>Last Updated</th>
                            <th>Role <i>(s)</i></th>
                            <th>Permission <i>(s)</i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y h:i:s A')}}</td>
                        <td>{{ \Carbon\Carbon::parse($user->updated_at)->format('d/m/Y h:i:s A')}}</td>
                        <td>
                            @foreach ($user->roles as $role)
                            {{$role->name}}.
                            @endforeach
                        </td>
                        <td>
                            @foreach ($user->permissions as $permission)
                            {{$permission->name}}.
                            @endforeach
                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@section('js')
@endsection
@endsection