@extends('admin.layouts.template')
@section('title','News Create')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">สร้างข้อมูลข่าว</h1>
	</div>
    {!! Form::open(array('url' => 'admin/News/create_set','files' => true)) !!}
        <div class="form-group">
            <label>หัวข้อข่าว</label>
            <input name="header" class="form-control">
            <p class="help-block">** ส่วนแสดงหัวของข้อความ โปรดระบุข้อความ</p>
        </div>
        <div class="form-group">
            <label>เนื้อความข่าว</label>
            <textarea name="message" class="form-control" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label>เลือกไฟล์ภาพ</label>
            <input name="images" type="file">
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-8">
                <button type="submit" class="btn btn-success col-md-5 col-md-offset-1">สร้างข้อความ</button>
                <a href="{{route('admin.news')}}" class="btn btn-danger col-md-5 col-md-offset-1">กลับหน้าข่าว</a>
            </div>
        </div>
    {!! Form::close() !!}
</div>
@endsection
