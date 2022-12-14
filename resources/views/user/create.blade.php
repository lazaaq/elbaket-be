@extends('layouts.app')
@section('content')
<!-- Page header -->
<div class="page-header">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class=""></i> <span class="text-semibold">User</span></h4>
        </div>
    </div>

    <div class="breadcrumb-line breadcrumb-line-component">
        <ul class="breadcrumb">
            <li><a href="{{url('admin/dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li>
            <li><a href="">Master Data</a></li>
            <li><a href="">User</a></li>
            <li class="active">Create</li>
        </ul>
    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
    <div class="panel panel-flat">
        <div class="panel-body">
            <form class="form-horizontal form-validate-jquery" action="{{route('user.store')}}" method="post" enctype="multipart/form-data" files=true>
            {{ csrf_field() }}
                <fieldset class="content-group">
                <legend class="text-bold">Create User</legend>
                <div class="form-group">
                    <label class="control-label col-lg-3">School</label>
                    <div class="col-lg-9">
                        <select id="school" class="select-search" name="school">
                        </select>
                        @if ($errors->has('school'))
                        <label style="padding-top:7px;color:#F44336;">
                        <strong><i class="fa fa-times-circle"></i> {{ $errors->first('school') }}</strong>
                        </label>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-3">Phone Number</label>
                    <div class="col-lg-9">
                        <input type="number" name="phone_number" class="form-control" value="{{ old('phone_number') }}" placeholder="">
                        @if ($errors->has('phone_number'))
                        <label style="padding-top:7px;color:#F44336;">
                        <strong><i class="fa fa-times-circle"></i> {{ $errors->first('phone_number') }}</strong>
                        </label>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-3">Name <span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="">
                        @if ($errors->has('name'))
                        <label style="padding-top:7px;color:#F44336;">
                        <strong><i class="fa fa-times-circle"></i> {{ $errors->first('name') }}</strong>
                        </label>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-3">Username <span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                        <input type="text" name="username" class="form-control" value="{{ old('username') }}" placeholder="">
                        @if ($errors->has('username'))
                        <label style="padding-top:7px;color:#F44336;">
                        <strong><i class="fa fa-times-circle"></i>{{ $errors->first('username') }}</strong>
                        </label>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-3">Email <span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="">
                        @if ($errors->has('email'))
                        <label style="padding-top:7px;color:#F44336;">
                        <strong><i class="fa fa-times-circle"></i>{{ $errors->first('email') }}</strong>
                        </label>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-3">Password <span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                        <input type="password" name="password" class="form-control" value="{{ old('password') }}" placeholder="">
                        @if ($errors->has('password'))
                        <label style="padding-top:7px;color:#F44336;">
                        <strong><i class="fa fa-times-circle"></i>{{ $errors->first('password') }}</strong>
                        </label>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-3">Password Confirmation <span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                        <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}" placeholder="">
                        @if ($errors->has('password_confirmation'))
                        <label style="padding-top:7px;color:#F44336;">
                        <strong><i class="fa fa-times-circle"></i>{{ $errors->first('password_confirmation') }}</strong>
                        </label>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-3">Role <span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                        <div class="multi-select-full" id="select-role">
                            <select id="role" name="role[]" class="multiselect" multiple="multiple">
                                @foreach($role as $data)
                                <option value="{{$data->id}}" {{ (collect(old('role'))->contains($data->id)) ? 'selected':'' }}>{{$data->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($errors->has('role'))
                        <label style="padding-top:7px;color:#F44336;">
                        <strong><i class="fa fa-times-circle"></i>{{ $errors->first('role') }}</strong>
                        </label>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-3">Picture</label>
                    <div class="col-lg-9">
                        <input type="file" name="picture" class="file-input-custom" data-show-caption="true" data-show-upload="false" accept="image/*">
                        {{-- <input type="file" name="picture" class="form-control"> --}}
                        @if ($errors->has('picture'))
                        <label style="padding-top:7px;color:#F44336;">
                        <strong><i class="fa fa-times-circle"></i>{{ $errors->first('picture') }}</strong>
                        </label>
                        @endif
                    </div>
                </div>
                </fieldset>
            <div>

            <div class="col-md-4">
                <a href="{{route('user.index')}}"type="reset" class="btn btn-default" id=""> <i class="icon-arrow-left13"></i> Back</a>
            </div>
                <div class="col-md-8 text-right">
                    <button type="reset" class="btn btn-default" id="reset">Reset <i class="icon-reload-alt position-right"></i></button>
                    <button type="submit" class="btn btn-primary bg-primary-800">Submit <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /content area -->
@endsection
@push('after_script')
<script type="text/javascript">
    $(document).ready(function(){
        $('#school').select2({
        ajax : {
            url :  "{{ url('select/data-school') }}",
            dataType: 'json',
            data: function(params){
                return {
                    term: params.term,
                };
            },
            processResults: function(data){
                return {
                    results: data
                };
            },
            cache : true,
        },
        });

        $("#role").change(function() {
        var role = $('#role option').filter(':selected').text();
        var teacher = $('#role option:contains("teacher")').val();
        var admin_school = $('#role option:contains("admin school")').val();        
        if (role == 'admin school') {
            $('#role').val([teacher,admin_school]);
            $('#select-role').last().find('ul li:contains("teacher")').addClass('active');
            $('#select-role').last().find('ul li:contains("teacher") span').addClass('checked');
        }
        });
    });
</script>
@endpush
