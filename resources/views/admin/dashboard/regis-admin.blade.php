@extends('admin.layouts.template')
@section('title','Admin Dashboard')
@section('content')
<div class="row">
	<div class="col-lg-12">
        <h1 class="page-header">Blank Page</h1>
        <form role="form">
                <div class="form-group col-md-6">
                    <label>Username</label>
                    <input class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label>Password</label>
                    <input class="form-control" placeholder="password" type="password">
                </div>
                <div class="form-group col-md-6">
                        <label>Confirm Password</label>
                        <input class="form-control" placeholder="password" type="password">
                    </div>
                <div class="form-group col-md-6">
                    <label>ตำแหน่ง</label>
                    <select class="form-control" name="possition">
                            <option value="null">เลือกตำแหน่ง</option>
                         @foreach ($possition as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-12">
                        <label>e-mail</label>
                        <input class="form-control" placeholder="e-mail" type="e-mail">
                    </div>
                <div class="form-group col-md-6">
                    <label>ชื่อ</label>
                    <input class="form-control" name="fname" placeholder="ชื่อ">
                </div>
                <div class="form-group col-md-6">
                        <label>นามสกุล</label>
                        <input class="form-control" name="lname" placeholder="นามสกุล">
                </div>

                <div class="form-group col-md-12" style="margin-top:15px;">
                        <button type="submit" class="btn btn-default col-md-3 col-md-offset-6">Submit Button</button>
                        <button type="reset" class="btn btn-default col-md-3">Reset Button</button>
                </div>
            </form>
	</div>
	<!-- /.col-lg-12 -->
</div>
@endsection
