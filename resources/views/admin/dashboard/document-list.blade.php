@extends('admin.layouts.template')
@section('title','รายชื่อ')
@section('content')
<div class="row" style="margin:15px;">
        <div class="col-lg-3 col-lg-offset-9">
                <a href="{{asset('admin/document/search/'.$type)}}" class="btn btn-primary col-lg-12">
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
                            <th>ประเภท</th>
                            <th>ชั้นตอนที่ 1</th>
                            <th>ชั้นตอนที่ 2</th>
                            <th>ชั้นตอนที่ 3</th>
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
                                    <td>{{ $lists->typename }}</td>
                                    <td>
                                        @if ($lists->doc1 == 1)
                                        <button type="button" class="btn btn-success"><i class="fa fa-check"></i></button>
                                        @elseif($lists->doc1 == 0)
                                        <button type="button" class="btn btn-danger"><i class="fa fa-times"></i></button>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($lists->doc2 == 1)
                                        <button type="button" class="btn btn-success"><i class="fa fa-check"></i></button>
                                        @elseif($lists->doc2 == 0)
                                        <button type="button" class="btn btn-danger"><i class="fa fa-times"></i></button>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($lists->doc3 == 1)
                                        <button type="button" class="btn btn-success"><i class="fa fa-check"></i></button>
                                        @elseif($lists->doc3 == 0)
                                        <button type="button" class="btn btn-danger"><i class="fa fa-times"></i></button>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($lists->adminget == NULL)
                                            <button type="button" class="btn btn-danger"> ยังไม่ได้ส่งเอกสาร </button>
                                        @elseif($lists->adminget!=NULL && $lists->adminset==NULL)
                                            <button type="button" class="btn btn-warning"> ยังไม่ได้ยืนยัน </button>
                                        @elseif($lists->adminset!=NULL)
                                            <button type="button" class="btn btn-success"> ยืนยันแล้ว </button>
                                        @endif
                                        <a href="{{asset('admin/view-user/'.$lists->student)}}" class="btn btn-primary"><i class="fa fa-search"></i></a>
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
