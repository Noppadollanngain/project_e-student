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
                            <th>สถานะ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($possition as $possitions)
                        <tr>
                            <td>{{ $row++ }}</td>
                            <td>{{ $possitions->name }}</td>
                            <td>
                                <?= Form::open(array('url' => 'admin/possition/' . $possitions->id, 'method' => 'delete','onsubmit' => 'return confirm(" แน่ใจว่าต้องการลบข้อมูล?");')) ?>
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                    <a class="btn btn-warning" href="{{ url('admin/possition/'.$possitions->id.'/edit') }}">
                                        <i class="fa fa-gears"></i>
                                    </a>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="text-align:center;">
                    {!! $possition->render()  !!}
                </div>

                <h3>เพิ่มข้อมูลตำแหน่งเจ้าหน้าที่</h3>

                {!! Form::open(array('url' => 'admin/possition')) !!}

                        <div class="form-group">
                            <?= Form::label('title', 'ตำแหน่ง'); ?>
                            <?= Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'ระบุตำแหน่ง..']); ?>
                        </div>

                        <div class="form-group">
                            <?= Form::submit('บันทึก', ['class' => 'btn btn-primary col-md-2 col-md-offset-8']); ?>
                            <button type="reset" class="btn btn-danger col-md-2">ยกเลิก</button>
                        </div>

                {!! Form::close() !!}

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
