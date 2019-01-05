@extends('admin.layouts.template')
@section('title','Possition List')
@section('content')
<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            Possition Active On System Total {{ $count }}
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ชื่อตำแหน่ง</th>
                            <th>จำนวน</th>
                            <th>สถานะ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($possition as $possitions)
                        <tr>
                            <td>{{ $row++ }}</td>
                            <td>{{ $possitions->name }}</td>
                            <td>@if ($possitions->id==1)
                                    {{$num1}}
                                @elseif ($possitions->id==2)
                                    {{$num2}}
                                @elseif ($possitions->id==3)
                                    {{$num3}}
                                @endif
                            </td>
                            <td>
                                @if (Auth::user()->possition==1)
                                    <a class="btn btn-warning" href="{{ url('admin/possition/'.$possitions->id.'/edit') }}">
                                        <i class="fa fa-gears"></i>
                                    </a>
                                 @else
                                    สามารถไช้งานได้
                                @endif

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="text-align:center;">
                    {!! $possition->render()  !!}
                </div>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
@if (count($errors) > 0)
<script>
    swal({
        title: "เกิดข้อผิดพลาด",
        text: "กรุณาระบุบตำแหน่ง",
        timer: 2000,
        type: 'success',
        showConfirmButton: false
    });
</script>
@endif
@endsection
