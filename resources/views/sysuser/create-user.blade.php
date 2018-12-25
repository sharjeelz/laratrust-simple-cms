@extends('layouts.app')
@section('content')
@section('title','Create User')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<div class="container">
    <div class="content-box">
        <div class="row">
            <div class="col-sm-12">
                <div class="element-wrapper">
                    <div class="element-box">

                        <form enctype="multipart/form-data" action="{{url('user/create')}}" method="POST" id="formValidate" novalidate="true">
                            @csrf
                            <h5 class="form-header">Create User</h5>

                    <fieldset class="form-group">
                        <legend><span>User</span></legend>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group"><label for="">Name</label>
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                    <div class="help-block form-text with-errors form-control-feedback"></div>
                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                    <div class="form-group"><label for="">Email</label>
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                        @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                                <div class="col-sm-6">
                                        <div class="form-group"><label for="">Roles</label>
                                            <select class="roles_pills"  name="roles[]" multiple="multiple" style="width:100%;">
                                                @foreach ($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>

                                                @endforeach
  </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                            <div class="form-group"><label for="">Permissions</label>
                                                <select class="permissions_pills"  name="permissions[]" multiple="multiple" style="width:100%;">
                                                        @foreach ($permissions as $permission)
                                            <option value="{{$permission->id}}">{{$permission->name}}</option>

                                                @endforeach
                                                      </select>
                                            </div>
                                        </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                    <div class="form-group"><label for="">Picture</label>
                                        <input class="form-control{{ $errors->has('pic') ? ' is-invalid' : '' }}" type="file" name="pic"/>
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                        @if ($errors->has('pic'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('pic') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                </div>


                    </div>
                        <div class="row">
                                <div class="col-sm-6">
                                        <div class="form-group"><label for="">Password</label>
                                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                            <div class="help-block form-text with-errors form-control-feedback"></div>
                                            @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                            <div class="form-group"><label for="">Confirm Password</label>
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                <div class="help-block form-text with-errors form-control-feedback"></div>
                                                @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                            </div>
                                        </div>

                        </div>


                </fieldset>

                <div
                    class="form-buttons-w"><button class="btn btn-primary disabled" type="submit"> Submit</button></div>
            </form>
        </div>
    </div>
</div>
</div>
 </div>
</div>

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.permissions_pills').select2();
    $('.roles_pills').select2();
});
</script>

@endsection

@endsection