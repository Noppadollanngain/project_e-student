@extends('admin.layouts.template')
@section('title','Create Document')
@section('stylesheet')
    <style>
        .form-group input[type="checkbox"] {
            display: none;
        }

        .form-group input[type="checkbox"] + .btn-group > label span {
            width: 20px;
        }

        .form-group input[type="checkbox"] + .btn-group > label span:first-child {
            display: none;
        }
        .form-group input[type="checkbox"] + .btn-group > label span:last-child {
            display: inline-block;
        }

        .form-group input[type="checkbox"]:checked + .btn-group > label span:first-child {
            display: inline-block;
        }
        .form-group input[type="checkbox"]:checked + .btn-group > label span:last-child {
            display: none;
        }
    </style>
@endsection
@section('content')
@foreach ($data as $item)
<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header">Create Document</h3>
	</div>
</div>
<div class="row">
    <div class="col-lg-2">
        <h4 class="text-right">ชื่อ-สกุล</h4>
    </div>
    <div class="col-lg-10">
        <h4 class="text-left">{{$item->fname." ".$item->lname}}</h4>
    </div>
</div>
<div class="row">
    <div class="col-lg-2">
        <h4 class="text-right">รหัส นศ.</h4>
    </div>
    <div class="col-lg-10">
        <h4 class="text-left">{{$item->username}}</h4>
    </div>
</div>
<div class="row">
    <div class="col-lg-2">
        <h4 class="text-right">เลขที่สัญญา</h4>
    </div>
    <div class="col-lg-10">
        <h4 class="text-left">
            @if ($item->estd_id==null)
                -
            @else
                {{$item->estd_id}}
            @endif
        </h4>
    </div>
</div>

{!! Form::open(array('url' => 'admin/document-create/'.$id)) !!}
<div class="row">
    <div class="col-lg-2">
        <h4 class="text-right">เลือกประเภท</h4>
    </div>
    <div class="col-lg-10">
        <div class="form-group">
            <select class="form-control" name="type">
                <option value="0">เลือกประเภท</option>
                @foreach ($possition as $lists)
                    <option value="{{$lists->id}}">{{$lists->typename}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-2">
        <h4 class="text-right">จัดการเอกสาร</h4>
    </div>
    <div class="col-lg-10">
        <div class="[ form-group ]">
            <input type="checkbox" value="1" name="doc1" id="fancy-checkbox-doc1" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="fancy-checkbox-doc1" class="[ btn btn-primary ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="fancy-checkbox-primary" class="[ btn btn-default active ]">
                    เอกสารลำดับ 1
                </label>
            </div>
        </div>
        <div class="[ form-group ]">
            <input type="checkbox" value="1" name="doc2" id="fancy-checkbox-doc2" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="fancy-checkbox-doc2" class="[ btn btn-primary ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="fancy-checkbox-primary" class="[ btn btn-default active ]">
                        เอกสารลำดับ 2
                </label>
            </div>
        </div>
        <div class="[ form-group ]">
            <input type="checkbox" value="1" name="doc3" id="fancy-checkbox-doc3" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="fancy-checkbox-doc3" class="[ btn btn-primary ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span></span>
                </label>
                <label for="fancy-checkbox-primary" class="[ btn btn-default active ]">
                    เอกสารลำดับ 3
                </label>
            </div>
        </div>
        <div class="[ form-group ]">
            <input type="checkbox" value="1" name="doc4" id="fancy-checkbox-doc4" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="fancy-checkbox-doc4" class="[ btn btn-primary ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="fancy-checkbox-primary" class="[ btn btn-default active ]">
                    เอกสารลำดับ 4
                </label>
            </div>
        </div>
        <div class="[ form-group ]">
            <input type="checkbox" value="1" name="doc5" id="fancy-checkbox-doc5" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="fancy-checkbox-doc5" class="[ btn btn-primary ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="fancy-checkbox-primary" class="[ btn btn-default active ]">
                    เอกสารลำดับ 5
                </label>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4 col-lg-offset-8">
        <button type="submit" class="btn btn-success col-lg-5">ยืนยันข้อมูล</button>
        <a href="{{route('admin.search-user')}}" class="btn btn-danger col-lg-5 col-lg-offset-1">กลับหน้าค้นหา</a>
    </div>
</div>
{!! Form::close() !!}

@endforeach
@if (session()->has('status_search_doc'))
<script>
    swal({
        title: "เกิดข้อผิดพลาด",
        text: "<?php  echo session()->get('status_search_doc');   ?>",
        timer: 2000,
        type: 'success',
        showConfirmButton: false
    });
</script>
@endif
@endsection
