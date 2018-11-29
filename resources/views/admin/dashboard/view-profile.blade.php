@extends('admin.layouts.template')
@section('title','Admin Dashboard')
@section('content')
    @foreach ($admin as $item)
<div class="row">
	<div class="page-header col-lg-12">
        <div class="col-lg-4">
            <h3>Profile Admin</h3>
        </div>
        <div class="col-lg-3 col-lg-offset-5">
            @if (Auth::user()->possition == 1)
                <h3>
                    <a class="btn btn-warning" href="#">
                        edit <i class="fa fa-gear"></i>
                    </a>
                    <a onclick="delete_confrim({{$item->id}})" class="btn btn-danger" href="javascript::void(0)">
                        delete <i class="fa fa-trash-o"></i>
                    </a>
                </h3>
            @endif
        </div>
	</div>
</div>
    <div class="row">
            <div class="col-lg-4">
                <a href="{{asset('/images/Profile/'.$item->image)}}" data-lity>
                    <img src="{{asset('/images/Profile/'.$item->image)}}" height="100%" width="100%">
                </a>
            </div>
            <div class="col-lg-8">
                <h4>ข้อมูลส่วนตัว <i class="fa fa-tags"></i></h4>


            <div class="form-group">
                <div class="col-lg-2">
                    <h4> ชื่อ-สกุล </h4>
                </div>
                <div class="col-lg-10">
                    <h4>{{ $item->fname." ".$item->lname }}</h4>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-2">
                    <h4> E-Mail </h4>
                </div>
                <div class="col-lg-10">
                    <h4>{{ $item->email }}</h4>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-2">
                    <h4> ตำแหน่ง </h4>
                 </div>
                <div class="col-lg-10">
                    <h4>{{ $item->name }}</h4>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection
@section('scripts')
    <script>
        function delete_confrim($id){
            swal({
                title: "Are you sure ?",
                text: "เมื่อกดตกลงเจ้าหน้าที่จะถูกลบออกจากระบบ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
                    swal("เจ้าหน้าที่ถูกลบแล้ว", {
                        icon: "success",
                      });
                    setTimeout(function() {
                        window.location.href = '/admin/viewprofile/destroy/'+$id;
                    }, 2000);
                } else {

                }
              });
        }
    </script>
@endsection
