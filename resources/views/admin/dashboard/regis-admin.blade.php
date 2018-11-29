@extends('admin.layouts.template')
@section('title','Admin Dashboard')
@section('content')
<div class="row">
	<div class="col-lg-12">
        <h1 class="page-header">Blank Page</h1>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
            {!! Form::open(array('url' => 'admin/regis','files' => true)) !!}
                <div class="form-group col-md-6">
                    <label>Username</label>
                    <input class="form-control" name="username" placeholder="username" value="{{ old('username') }}">
                </div>
                <div class="form-group col-md-6">
                    <label>Password</label>
                    <input class="form-control" name="password" placeholder="password" type="password">
                </div>
                <div class="form-group col-md-6">
                        <label>ตำแหน่ง</label>
                        <select class="form-control" name="possition">
                                <option value="null">เลือกตำแหน่ง</option>
                             @foreach ($possition as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                <div class="form-group col-md-6">
                        <label>Confirm Password</label>
                        <input class="form-control" name="password_confirmation" placeholder="password" type="password">
                    </div>
                <div class="form-group col-md-12">
                        <label>e-mail</label>
                        <input class="form-control" name="mail" placeholder="e-mail" type="e-mail" value="{{ old('mail') }}">
                    </div>
                <div class="form-group col-md-6">
                    <label>ชื่อ</label>
                    <input class="form-control" name="fname" value="{{ old('fname') }}" placeholder="ชื่อ">
                </div>
                <div class="form-group col-md-6">
                        <label>นามสกุล</label>
                        <input class="form-control" name="lname" value="{{ old('lname') }}" placeholder="นามสกุล">
                </div>
                <div class="form-group col-md-6">
                        <label>Image Profile</label>
                        <input name="image" type="file">
                    </div>

                <div class="form-group col-md-12" style="margin-top:15px;">
                        <button type="submit" class="btn btn-success col-md-2 col-md-offset-8">Submit Button</button>
                        <button type="reset" class="btn btn-danger col-md-2">Reset Button</button>
                </div>
            {!! Form::close() !!}
	</div>
	<!-- /.col-lg-12 -->
</div>
@if (count($errors) > 0||session()->has('confirmation'))
<script>
    swal({
        title: "เกิดข้อผิดพลาด",
        text: "<?php echo session()->get('confirmation'); ?>",
        timer: 2000,
        type: 'success',
        showConfirmButton: false
    });
</script>
@endif
@endsection
