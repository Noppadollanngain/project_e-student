@extends('admin.layouts.template')
@section('title','Admin Dashboard')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header">ระบุสิ่งที่ต้องการค้นหา <span style="color:red;font-size:1.5rem;">** เลือก 1 อย่างในการค้นหา</span></h3>
	</div>
</div>
<div class="row">
    <div class="col-lg-3">
        <h4 class="text-right"> คำค้นหารหัส นศ.</h4>
    </div>
    <div class="col-lg-9">
    {!! Form::open(array('url' => 'admin/search-user/word/'.$type)) !!}
        <div class="form-group input-group">
            <input type="text" class="form-control" name="std_id">
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
            </span>
        </div>
    {!! Form::close() !!}
    </div>
</div>
<div class="row">
    <div class="col-lg-3">
        <h4 class="text-right"> คำค้นหาจากชื่อ</h4>
    </div>
    <div class="col-lg-9">
        {!! Form::open(array('url' => 'admin/search-user/word/'.$type)) !!}
            <div class="form-group input-group">
                <input type="text" class="form-control" name="fname">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                </span>
            </div>
        {!! Form::close() !!}
    </div>
</div>
<div class="row">
    <div class="col-lg-3">
        <h4 class="text-right"> คำค้นหาจากนามสกุล</h4>
    </div>
    <div class="col-lg-9">
        {!! Form::open(array('url' => 'admin/search-user/word/'.$type)) !!}
            <div class="form-group input-group">
                <input type="text" class="form-control" name="lname">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                </span>
            </div>
        {!! Form::close() !!}
    </div>
</div>
<div class="row">
    <div class="col-lg-3">
        <h4 class="text-right"> คำค้นหาจากเลขที่สัญญา</h4>
    </div>
    <div class="col-lg-9">
        {!! Form::open(array('url' => 'admin/search-user/word/'.$type)) !!}
            <div class="form-group input-group">
                <input type="text" class="form-control" name="estd_id">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                </span>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
