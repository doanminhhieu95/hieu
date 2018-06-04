@extends('master') @section('content')
<div class="main page-lode">
    @if(Session::has('reset'))
    <div class="alert alert-{{Session::get('flag')}}">
        {{Session::get('reset')}}
    </div>
    @endif
    @if(count($errors)>0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $err)
            {{$err}}<br/>
        @endforeach
    </div>
    @endif
    <div id="div_updatethongkhachhang" class="ca-nhan">
        <form action="{{route('reset')}}" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <div class="title">Sửa thông tin</div>
            <div class="thong-tin form-horizontal">
                <div class="form-group">
                    <label for="inputEmail3" class="col-xs-3 control-label">Email (
                        <font color="red">
                            <b>*</b>
                        </font>)</label>
                    <div class="col-xs-4">
                        <input id="form_customer_id" type="hidden" class="form-control" value="32">
                        <input disabled="disabled" value="{{Auth::user()->email}}" id="form_customer_detail_email" type="text"
                            class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-xs-3 control-label">
                        Mật khẩu (
                        <font color="red">
                            <b>*</b>
                        </font>)
                    </label>
                    <div class="col-xs-4">
                        <input id="form_customer_detail_password" type="password" name="password" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-xs-3 control-label">
                        Xác Nhận mật khẩu (
                        <font color="red">
                            <b>*</b>
                        </font>)
                    </label>
                    <div class="col-xs-4">
                        <input id="form_customer_detail_password_confirm" type="password" name="password_repeate" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="sua-thong-tin" style="margin-top:10px;">
                <button type="submit" class="btn btn-signin" >
                    <i class="glyphicon glyphicon-floppy-saved"></i>Cập nhật</button>
            </div>
        </form>
    </div>
</div>
@endsection