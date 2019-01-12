@extends('admin.layouts.template')
@section('title','News Dashboard')
@section('content')
<div class="row">
	<div class="col-lg-12">
        <div class="row">
            <div class="col-lg-10">
                <h1 class="page-header">ข่าวสาร</h1>
            </div>
            <div class="col-lg-2">
                <a href="{{route('admin.news.create')}}" class="page-header btn btn-success col-lg-12"> <i class="fa fa-plus-circle"></i> เพิ่มข่าว</a>
            </div>
        </div>
    </div>
    @foreach ($data as $item)
    <a href="" style="color:#303030">
        <div class="col-lg-12">
            <div @if ($item->status!=0)
                    class="panel panel-info"
                @else
                    class="panel panel-warning"
                @endif >
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-lg-8">
                            {{$item->header}}
                        </div>
                        <div class="col-lg-4">
                            สร้างเมื่อ {{$item->create_message}}
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <p>{{$item->message}}</p>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-lg-4">
                            สร้างโดย {{$item->getF}} {{$item->getL}}
                        </div>
                        <div class="col-lg-4">
                            ส่งโดย
                            @if ($item->setF==NULL)
                                -
                            @else
                                {{$item->setF}} {{$item->setL}}
                            @endif
                        </div>
                        <div class="col-lg-4">
                            ส่งเมื่อ
                            @if ($item->status!=0)
                                {{$item->send_message}}
                            @else
                                -
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
    @endforeach
    <div style="text-align:center;">
        {!! $data->render()  !!}
    </div>
</div>
@endsection
