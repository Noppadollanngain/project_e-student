@extends('admin.layouts.template')
@section('title','Admin Edit Profile')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header">Edit Profile Admin</h3>
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

        {!! Form::open(array('url' => 'admin/profile-edit/update/'.$item->id,'files' => true)) !!}
            <div class="form-group">
                <div class="col-lg-2">
                    <h4> ชื่อ-สกุล </h4>
                </div>
                <div class="col-lg-10">
                    <div class="form-group col-md-6">
                        <input class="form-control" name="fname" value="{{ $item->fname }}" placeholder="ชื่อ">
                    </div>
                    <div class="form-group col-md-6">
                        <input class="form-control" name="lname" value="{{ $item->lname }}" placeholder="นามสกุล">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-2">
                    <h4> E-Mail </h4>
                </div>
                <div class="col-lg-10">
                    <div class="form-group col-md-12">
                        <input class="form-control" name="mail" placeholder="e-mail" type="e-mail" value="{{ $item->email}}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-2">
                    <h4> ตำแหน่ง </h4>
                </div>
                <div class="col-lg-10">
                    <div class="form-group col-md-6">
                        <select class="form-control" name="possition">
                            <option value="null">เลือกตำแหน่ง</option>
                            @if (Auth::user()->possition==1)
                            @foreach ($possition as $item_pos)
                                @if ($item_pos->name==$item->name)
                                    <option selected="selected" value="{{$item_pos->id}}">{{$item_pos->name}}</option>
                                @else
                                    <option value="{{$item_pos->id}}">{{$item_pos->name}}</option>
                                @endif
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label>Image Profile</label>
                <input name="image" type="file">
            </div>
            <div class="form-group col-md-12" style="margin-top:15px;">
                <button type="submit" class="btn btn-success col-md-3 col-md-offset-6">Submit Button</button>
                <button type="reset" class="btn btn-danger col-md-3">Reset Button</button>
            </div>
        {!! Form::close() !!}
        @endforeach
        </div>
    </div>
    @if (session()->has('statusupdate'))
    <script>
        swal({
            title: "Success !",
            text: "การอัพเดทเสร็จสิ้น",
            icon: "success",
            timer: 2000,
            showConfirmButton: false
        });
    </script>
    @endif
@endsection
