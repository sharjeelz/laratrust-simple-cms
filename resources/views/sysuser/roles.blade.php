@extends('layouts.app')
@section('content')
@section('title','Roles')
@section('css')
@endsection

<div class="container">
    <h6 class="element-header">System Roles</h6>
    <div style="text-align:right;margin:12px;"><a class="btn btn-success btn-md" href="{{url('role/create')}}"><i class="fa fa-cross"></i><span>Add Role</span></a> </div>
    <div class="table-responsive">
        <table id="usertable" width="100%" class="table table-striped table-lightfont">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Display Name</th>
                            <th>Description</th>
                            <th>Created at</th>
                            <th>Updated at</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                        <td>{{$role->name}}</td>
                        <td>{{$role->display_name}}</td>
                        <td>{{$role->description}}</td>
                        <td>{{ \Carbon\Carbon::parse($role->created_at)->format('d/m/Y h:i:s A')}}</td>
                        <td>{{ \Carbon\Carbon::parse($role->updated_at)->format('d/m/Y h:i:s A')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@section('js')
@endsection
@endsection