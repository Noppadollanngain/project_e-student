@extends('admin.layouts.template')
@section('title','Edit News')
@section('content')
@foreach ($data as $item)
<div class="row">
	<div class="col-lg-10">
		<h1 class="page-header">แก้ไขข้อมูลข่าว</h1>
    </div>
    <div class="col-lg-2">
        <a href="{{asset('admin/News/message/'.$item->id)}}" class="btn btn-primary page-header col-lg-12">ส่งข้อความ</a>
    </div>
</div>
<div class="row">
    <div class="col-lg-2">
        <a href="{{asset('/images/News/'.$item->image)}}" data-lity>
            <img src="{{asset('/images/News/'.$item->image)}}" height="100%" width="100%">
        </a>
    </div>
    <div class="col-lg-10">
        {!! Form::open(array('url' => 'admin/News/updatenews/'.$item->id ,'files' => true)) !!}
            <div class="form-group">
                <label>หัวข้อข่าว</label>
                <input name="header" class="form-control" value="{{$item->header}}">
                <p class="help-block">** ส่วนแสดงหัวของข้อความ โปรดระบุข้อความ</p>
            </div>
            <div class="form-group">
                <label>เนื้อความข่าว</label>
                <textarea name="message" class="form-control" rows="5">{{$item->message}}</textarea>
            </div>
            <div class="form-group">
                    <select class="form-control" name="type">
                    <option value="0">เลือกประเภท</option>
                    @foreach ($possition as $lists)
                        <option
                        @if ($lists->id==$item->typestudent)
                            selected="selected"
                        @endif value="{{$lists->id}}">{{$lists->typename}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>เลือกไฟล์ภาพ</label>
                <input name="image" type="file">
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-8">
                    <button type="submit" class="btn btn-success col-md-5 col-md-offset-1">แก้ไข</button>
                    <a href="{{route('admin.news')}}" class="btn btn-danger col-md-5 col-md-offset-1">กลับหน้าข่าว</a>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endforeach
@endsection
@section('scripts')
    @if (session()->has('statuscreate'))
    <script>
        swal({
            title: "Error !",
            text: "<?php  echo session()->get('statuscreate');   ?>",
            icon: "error",
            timer: 2000,
            showConfirmButton: false
        });
    </script>
    @endif
@endsection
