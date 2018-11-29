@extends('admin.layouts.template')
@section('title','Admin Dashboard')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header">Profile Admin</h3>
	</div>
</div>
<div class="row">
        @foreach ($admin as $item)
            <div class="col-lg-4">
                <a href="{{asset('/images/Profile/'.$item->image)}}" data-lity>
                    <img src="{{asset('/images/Profile/'.$item->image)}}" height="100%" width="100%">
                </a>
            </div>
            <div class="col-lg-8">
                <h4>ข้อมูลส่วนตัว <i class="fa fa-tags"></i></h4>


            <div class="form-group">
                <div class="col-lg-2">
                    <h4> ชื่อ-สกุล </h4>
                </div>
                <div class="col-lg-10">
                    <h4>{{ $item->fname." ".$item->lname }}</h4>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-2">
                    <h4> E-Mail </h4>
                </div>
                <div class="col-lg-10">
                    <h4>{{ $item->email }}</h4>
                </div>
            </div>
            <div class="form-group">
                    <div class="col-lg-2">
                        <h4> ตำแหน่ง </h4>
                    </div>
                    <div class="col-lg-10">
                        <h4>{{ $item->name }}</h4>
                    </div>
                </div>
        @endforeach
        </div>
    </div>
@endsection
