@extends('admin.master') @section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        @if(Session::has('delete'))
        <div class="alert alert-{{Session('flag')}}">
            {{session('delete')}}
        </div>
        @endif
        <h1>
            Quản lý Kiểu chơi
            <small>{{$type}}</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <i class="fa fa-dashboard"></i> Home</a>
            </li>
            <li>
                <a href="#">Tables</a>
            </li>
            <li class="active">Data tables</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @if(Session::has('thanhcong'))
        <div class="alert alert-success">
            {{session('thanhcong')}}
        </div>
        @endif @if(Session::has('edit'))
        <div class="alert alert-success">
            {{session('edit')}}
        </div>
        @endif
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Kiểu chơi</h3>
                        <!-- <button type="button" class="btn btn-success btn-info btn-xs">
                            <a href="kieuchoi/create" style="color:inherit;">Thêm</a>
                        </button> -->
                        <button type="button" class="btn btn-success btn-info btn-xs">
                            <a href="/kieuchoi?area=1" style="color:inherit;">Miền Bắc</a>
                        </button>
                        <button type="button" class="btn btn-success btn-info btn-xs">
                            <a href="/kieuchoi?area=2" style="color:inherit;">Miền Trung</a>
                        </button>
                        <button type="button" class="btn btn-success btn-info btn-xs">
                            <a href="/kieuchoi?area=3" style="color:inherit;">Miền Nam</a>
                        </button>
                        <button type="button" class="btn btn-success btn-info btn-xs">
                            <a href="/kieuchoi" style="color:inherit;">Tất cả</a>
                        </button>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Tiền trúng</th>
                                    <th>Tiền đánh</th>
                                    <th>Cách chơi</th>
                                    <th>Loại</th>
                                    <th>Số chơi</th>
                                    <th>Loại đề</th>
                                    <th>Khu vực</th>
                                    <th>Edit</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kieuchoi as $kc)
                                <tr>
                                    <td>{{$kc->id}}</td>
                                    <td>{{$kc->name}}</td>
                                    <td>{{$kc->giaithuong}}</td>
                                    <td>{{$kc->money}}</td>
                                    <td>{{$kc->luatchoi}}</td>
                                    <td>{{$kc->loai}}</td>
                                    <td>{{$kc->max}}</td>
                                    <td>{{$kc->loaide->name}}</td>
                                    <td>{{$kc->area->name}}</td>
                                    <td>
                                        <a href="/kieuchoi/{{$kc->id}}/edit">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{route('kieuchoi.update',[$kc->id])}}" method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="put" />
                                            <button type="submit" class="btn btn-danger btn-xs">Xóa</button>
                                            <input type="hidden" name ="delete" value="1"/>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection