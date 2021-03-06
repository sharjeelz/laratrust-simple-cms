@extends('layouts.app')
@section('content')
@section('title','Create Role')
<div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="element-wrapper">
                    <div class="element-box">
                        <form action="{{url('role')}}" method="POST" id="formValidate" novalidate="true">
                            @csrf
                            <h5 class="form-header">Create Role</h5>

                    <fieldset class="form-group">
                        <legend><span>Role</span></legend>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group"><label for="">Name</label><input name="name" class="form-control" data-error="Please Enter Name"
                                        placeholder="e.g Doctor, Pharma " required="required" type="text">
                                    <div class="help-block form-text with-errors form-control-feedback"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                    <div class="form-group"><label for="">Display Name</label><input name="display_name" class="form-control" data-error="Please Enter Name"
                                            placeholder="e.g Doctor, pharmaceutical" required="required" type="text">
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                    <div
                                    class="form-group"><label> Description</label><textarea name="description" class="form-control" rows="3"></textarea></div>
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

    @endsection