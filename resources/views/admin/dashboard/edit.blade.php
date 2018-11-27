@extends('admin.layouts.template')
@section('title','Possition Edit')
@section('content')
<div class="row">
    <div class="panel panel-default">
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">

                <h3>เเก้ไขตำแหน่ง {{ $data_get->name }}</h3>

                {!! Form::model($data_get, array('url' => 'admin/possition/' . $data_get->id, 'method' => 'put')) !!}

                        <div class="form-group">
                            <?= Form::label('title', 'คำแก้ไขตำแหน่ง'); ?>
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
