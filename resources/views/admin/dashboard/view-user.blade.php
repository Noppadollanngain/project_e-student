


@extends('admin.layouts.template')
@section('title','Data user')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header">ข้อมูลนักศึกษา</h3>
	</div>
</div>
@foreach ($dataget as $item)
<div class="row">
    <div class="col-lg-2">
       <h4 class="text-right">ชื่อ-สกุล</h4>
    </div>
    <div class="col-lg-10">
        <h4 class="text-left">{{$item->fname}} {{$item->lname}}</h4>
    </div>
</div>
<div class="row">
    <div class="col-lg-2">
       <h4 class="text-right">รหัสนักศึกษา</h4>
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
                @if ($item->estd_id==NULL)
                    ยังไม่มีเลขที่สัญญา
                @else
                    {{$item->estd_id}}
                @endif
            </h4>
        </div>
    </div>
<div class="row">
    <div class="col-lg-2">
       <h4 class="text-right">E-mail</h4>
    </div>
    <div class="col-lg-10">
        <h4 class="text-left">{{$item->email}}</h4>
    </div>
</div>
<div class="row">
    <div class="col-lg-2">
       <h4 class="text-right">ประเภท</h4>
    </div>
    <div class="col-lg-10">
        <h4 class="text-left">{{$item->typename}}</h4>
    </div>
</div>
<div class="row">
    <div class="col-lg-2">
       <h4 class="text-right">รายการเอกสาร</h4>
    </div>
    <div class="col-lg-10">
        <div class="col-lg-3">
            <h4 class="text-left">เอกสารที่ 1</h4>
        </div>
        <div class="col-lg-9">
            <h4 class="text-left">
                @if ($item->doc1==1)
                    ส่งเเล้ว
                @elseif($item->doc1==0)
                    ยังไม่ได้ส่ง
                @endif
            </h4>
        </div>
        <div class="col-lg-3">
            <h4 class="text-left">เอกสารที่ 2</h4>
        </div>
        <div class="col-lg-9">
            <h4 class="text-left">
                @if ($item->doc2==1)
                    ส่งเเล้ว
                    @elseif($item->doc2==0)
                    ยังไม่ได้ส่ง
                @endif
            </h4>
        </div>
        <div class="col-lg-3">
            <h4 class="text-left">เอกสารที่ 3</h4>
        </div>
        <div class="col-lg-9">
            <h4 class="text-left">
                @if ($item->doc3==1)
                    ส่งเเล้ว
                @elseif($item->doc3==0)
                    ยังไม่ได้ส่ง
                @endif
            </h4>
        </div>
        <div class="col-lg-3">
            <h4 class="text-left">เอกสารที่ 4</h4>
        </div>
        <div class="col-lg-9">
            <h4 class="text-left">
                @if ($item->doc4==1)
                    ส่งเเล้ว
                @elseif($item->doc4==0)
                    ยังไม่ได้ส่ง
                @endif
            </h4>
        </div>
        <div class="col-lg-3">
            <h4 class="text-left">เอกสารที่ 5</h4>
        </div>
        <div class="col-lg-9">
            <h4 class="text-left">
                @if ($item->doc5==1)
                    ส่งเเล้ว
                @elseif($item->doc5==0)
                    ยังไม่ได้ส่ง
                @endif
            </h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-2">
        <h4 class="text-right">สถานะรับ</h4>
    </div>
    <div class="col-lg-10">
        @if ($item->getF!=null&&$item->getL!=null)
            <h4 class="text-left">ผู้รับเอกสาร {{$item->getF}} {{$item->getL}}</h4>
        @else
            <h4 class="text-left">ยังไม่ได้รับการส่ง</h4>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-lg-2">
        <h4 class="text-right">สถานะส่ง</h4>
    </div>
    <div class="col-lg-10">
        @if ($item->setF!=null&&$item->setL!=null)
            <h4 class="text-left">ผู้ตรวจเอกสาร {{$item->setF}} {{$item->setL}}</h4>
        @else
            <h4 class="text-left">ยังไม่ได้รับการตรวจ</h4>
        @endif
    </div>
</div>
@endforeach
@endsection
