@extends('admin.layouts.template')
@section('title','Admin Dashboard')
@section('content')
<div class="row">
	<div class="col-lg-12 page-header">
        <h3 class="">
            <div class="col-lg-4">
                คำค้นหาที่พบ
            </div>
            <div class="col-lg-2 col-lg-offset-6">
                <a href="{{asset('admin/search-user/'.$type)}}" class="btn btn-danger">
                    กลับหน้าค้นหา
                </a>
            </div>
        </h3>
	</div>
	<!-- /.col-lg-12 -->
</div>
@endsection
