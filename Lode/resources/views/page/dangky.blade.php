@extends('master') @section('content')
@if(Session::has('dangky'))
    <div class="alert alert-success">
        {{Session::get('dangky')}}
    </div>
@endif
@if(count($errors)>0)
<div class="alert alert-danger">
@foreach($errors->all() as $err)
{{$err}}<br/>
@endforeach
</div>
@endif
<div id="dangky">
    <div class="dialog">
        <div class="dialog-title">Đăng ký</div>
        <div class="dialog-content">
            <form action="{{route('dangky')}}" method="post">
            {{csrf_field()}}
                <input name="name" onblur="" style="width: 95%;" class="input-dk" autocomplete="off" placeholder="Tên của bạn" required>
                <input name="emaildk" onblur="" style="width: 95%;" class="input-dk email" autocomplete="off" placeholder="Email của bạn" required>
                <label id="fomr_customer_inform"></label>

                <input name="passworddk" style="width: 95%;" class="input-dk mk txt-regis-password" type="password" autocomplete="off" placeholder="Mật khẩu" required>
                <input name="repassword" style="width: 95%;" class="input-dk mk2" type="password" autocomplete="off" placeholder="Nhập lại mật khẩu" required>
                <input name="phone" style="width: 95%;" class="input-dk phone" autocomplete="off" placeholder="Số điện thoại" required>
                <label>* Điền đúng số điện thoại để có thể rút tiền.</label>
                <input type="submit" value="Đăng ký" class="btn-input" id="singup">
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
@endsection