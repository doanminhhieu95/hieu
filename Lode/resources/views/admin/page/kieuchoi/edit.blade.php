@extends('admin.master') @section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            General Form Elements
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <i class="fa fa-dashboard"></i> Home</a>
            </li>
            <li>
                <a href="#">Forms</a>
            </li>
            <li class="active">General Elements</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @if(count($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                {{$err}} <br/>
            @endforeach
        </div>
        @endif
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sửa Kiểu chơi</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('kieuchoi.update',[$kieuchoi->id])}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="put" />
                        <input type="hidden" name="edit" value="edit"/>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="name" class="form-control" id="name" placeholder="" name="name" value="{{$kieuchoi->name}}" required>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiền trúng</label>
                                <input type="name" class="form-control" id="tientrung" placeholder="" name="giaithuong" value="{{$kieuchoi->giaithuong}}" required>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiền chơi</label>
                                <input type="name" class="form-control" id="tienchoi" placeholder="" name="money" value="{{$kieuchoi->money}}" required>
                            </div>
                        </div>
                        <div class="box-body">
                            <label for="exampleInputPassword1">Cách chơi</label>
                            <textarea class="form-control" rows="5" id="cachchoi" name="luatchoi" >{{$kieuchoi->luatchoi}}</textarea>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Loại</label>
                                <input type="name" class="form-control" id="loai" placeholder="" name="loai" value="{{$kieuchoi->loai}}" required>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số chơi</label>
                                <input type="name" class="form-control" id="sochoi" placeholder="" name="max" value="{{$kieuchoi->max}}" required>
                            </div>
                        </div>
                        <div class="box-body">
                            <label for="exampleInputPassword1">Khu vực</label>
                            <select class="form-control" id="khuvuc" name="idarea">
                            @foreach($area as $khuvuc)
                                <option 
                                @if($kieuchoi->area->id == $khuvuc->id)
                                {{"Selected"}}
                                @endif
                                value="{{$khuvuc->id}}">{{$khuvuc->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="box-body">
                            <label for="exampleInputPassword1">Loại đề</label>
                            <select class="form-control" id="loaide" name="idloaide" >
                            </select>
                        </div>
                        <!-- /.box-body -->
                        <input type="hidden" value="{{$kieuchoi->idloaide}}" id="loaidehd"/>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Xác nhận</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
        <script>
            $(document).ready(function () {
                var idkhuvuc = $('#khuvuc').val();
                var idloaide = $('#loaidehd').val();
                $.get("ajax/loaide/" + idkhuvuc +"/"+idloaide, function (data) {
                    $("#loaide").html(data);
                });
                $("#khuvuc").change(function () {
                    var idkhuvuc = $(this).val();
                    $.get("ajax/loaide/" + idkhuvuc, function (data) {
                        $("#loaide").html(data);
                    });
                });
            });
        </script>
    </section>
    <!-- /.content -->
    
</div>
<!-- /.content-wrapper -->
@endsection