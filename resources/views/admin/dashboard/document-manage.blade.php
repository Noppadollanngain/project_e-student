<?php
    use App\Http\Controllers\DocumentController;
?>
@extends('admin.layouts.template')
@section('title','รายชื่อ')
@section('content')
<div class="row" style="margin:15px;">
        <div class="col-lg-3 col-lg-offset-9">
                <a href="{{route('admin.search-user')}}" class="btn btn-primary col-lg-12">
                    ย้อนกลับไปหน้าค้นหา
                </a>
        </div>
</div>
<div class="row">
	<div class="panel panel-default">
        <div class="panel-heading">
            รายชื่อผู้ใช้
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>รหัสนักศึกษา</th>
                            <th>สัญญา</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th>ข้อมูลในระบบ</th>
                            <th>สถานะ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $lists)
                                <tr>
                                    <td>{{ $lists->username }}</td>
                                    <td>
                                        @if ($lists->estd_id!=null)
                                            {{ $lists->estd_id }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $lists->fname.' '.$lists->lname }}</td>
                                    <td>
                                        @if (DocumentController::bool_return($lists->id)==true)
                                            <button type="button" class="btn btn-success">มีข้อมูลเอกสารแล้ว</button>
                                        @elseif(DocumentController::bool_return($lists->id)==false)
                                            <button type="button" class="btn btn-danger">ไม่พบข้อมูลเอกสาร</button>
                                        @endif
                                    </td>
                                    <td>
                                        @if (DocumentController::bool_return($lists->id)==true)
                                            <a href="{{route('admin.update-doc',[ 'id' => $lists->id ])}}" class="btn btn-warning">รับเอกสาร</a>
                                        @elseif(DocumentController::bool_return($lists->id)==false)
                                            <a href="{{route('admin.create-doc',[ 'id' => $lists->id ])}}" class="btn btn-warning">รับเอกสาร</a>
                                        @endif
                                    </td>
                                </tr>

                        @endforeach
                    </tbody>
                </table>
                <div style="text-align:center;">
                    {!! $list->render()  !!}
                </div>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
@endsection
