@extends('admin.layouts.template')
@section('title','Admin List')
@section('content')
<div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Admin Active On System Total {{ $count }}
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>ชื่อ-นามสกุล</th>
                                <th>ตำแหน่ง</th>
                                <th>สถานะ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $lists)
                                @if ($lists->id!=Auth::user()->id)
                                    <tr>
                                        <td>{{ $num++ }}</td>
                                        <td>{{ $lists->fname.' '.$lists->lname }}</td>
                                        <td>{{ $lists->name }}</td>
                                        <td>
                                            <a class="btn btn-primary" href="{{asset('/admin/viewprofile/'.$lists->id)}}">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
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
