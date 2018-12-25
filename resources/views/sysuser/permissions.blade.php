@extends('layouts.app')
@section('content')
@section('title','Roles')
@section('css')
@endsection

<div class="container">
    <h6 class="element-header">System Permissions</h6>
    <div style="text-align:right;margin:12px;"><a class="btn btn-success btn-md" href="{{url('permission/create')}}"><i class="fa fa-cross"></i><span>Add Permission</span></a> </div>
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
                        @foreach ($permissions as $permission)
                        <tr>
                        <td>{{$permission->name}}</td>
                        <td>{{$permission->display_name}}</td>
                        <td>{{$permission->description}}</td>
                        <td>{{ \Carbon\Carbon::parse($permission->created_at)->format('d/m/Y h:i:s A')}}</td>
                        <td>{{ \Carbon\Carbon::parse($permission->updated_at)->format('d/m/Y h:i:s A')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@section('js')
@endsection
@endsection