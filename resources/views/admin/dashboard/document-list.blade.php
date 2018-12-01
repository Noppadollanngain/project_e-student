@extends('admin.layouts.template')
@section('title','รายชื่อ')
@section('content')
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
                            <th>ลำดับ</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th>ประเภท</th>
                            <th>เอกสาร1</th>
                            <th>เอกสาร2</th>
                            <th>เอกสาร3</th>
                            <th>เอกสาร4</th>
                            <th>เอกสาร5</th>
                            <th>สถานะ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $lists)
                                <tr>
                                    <td>{{ $num++ }}</td>
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
                                        @if ($lists->doc4 == 1)
                                        <button type="button" class="btn btn-success"><i class="fa fa-check"></i></button>
                                        @elseif($lists->doc4 == 0)
                                        <button type="button" class="btn btn-danger"><i class="fa fa-times"></i></button>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($lists->doc5 == 1)
                                        <button type="button" class="btn btn-success"><i class="fa fa-check"></i></button>
                                        @elseif($lists->doc5 == 0)
                                        <button type="button" class="btn btn-danger"><i class="fa fa-times"></i></button>
                                        @endif
                                    </td>
                                    <td>
                                        ตรวจสอบแล้ว
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
