@extends('admin.master') @section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản lý giao dịch
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
                        <h3 class="box-title">Giao dịch</h3>
                        <button type="button" class="btn btn-success btn-info btn-xs">
                            <a href="/giaodich?trangthai=0" style="color:inherit;">Đang chờ</a>
                        </button>
                        <button type="button" class="btn btn-success btn-info btn-xs">
                            <a href="/giaodich" style="color:inherit;">Tất cả</a>
                        </button>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ID user</th>
                                    <th>Ngày tạo</th>
                                    <th>Ngày giao dịch</th>
                                    <th>Ngân hàng</th>
                                    <th>Số tiền giao dịch</th>
                                    <th>Trạng thái</th>
                                    <th>Hủy bỏ</th>
                                    <th>Cập nhật</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($giaodich as $gd)
                                <tr>
                                    <td>{{$gd->id}}</td>
                                    <td>{{$gd->iduser}}</td>
                                    <td>{{$gd->created_at}}</td>
                                    <td>{{$gd->ngayGD}}</td>
                                    <td>{{$gd->nganhang->name}}</td>
                                    <td>{{$gd->moneyGD}}</td>
                                    <td>{{$gd->trangthai}}</td>
                                    <td>
                                        @if($gd->trangthai == "Đang chờ")
                                        <form action="{{route('giaodich.update',[$gd->id])}}" method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="put" />
                                            <button type="submit" class="btn btn-danger btn-xs">Hủy bỏ</button>
                                            <input type="hidden" name ="huybo" value="0"/>
                                        </form>
                                        @endif
                                    </td>
                                    <td>
                                        @if($gd->trangthai == "Đang chờ")
                                        <form action="{{route('giaodich.update',[$gd->id])}}" method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="put" />
                                            <button type="submit" class="btn btn-success btn-xs">Cập nhật</button>
                                            <input type="hidden" name ="capnhat" value="1"/>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row" style="margin-left:3px;">
                            {{$giaodich->links()}}
                        </div>
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
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <div class="deleteContent">
                    Are you Sure you want to delete
                    <span class="dname"></span> ?
                    <span class="hidden did"></span>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn actionBtn" data-dismiss="modal">
                    <span id="footer_action_button" class='glyphicon'> </span>
                </button>
                <button type="button" class="btn btn-warning" data-dismiss="modal">
                    <span class='glyphicon glyphicon-remove'></span> Close
                </button>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/app1.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
@endsection