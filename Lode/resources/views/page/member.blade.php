@extends('master') @section('content')
<div class="main page-lode">
    @if(count($errors)>0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $err) {{$err}}<br/> @endforeach
    </div>
    @endif @if(Session::has('giaodich'))
    <div class="alert alert-{{Session::get('flag')}}">
        {{Session::get('giaodich')}}
    </div>
    @endif @if(Session::has('ruttien'))
    <div class="alert alert-{{Session::get('flag')}}">
        {{Session::get('ruttien')}}
    </div>
    @endif
    <div class="taikhoan">
        <div class="account-header clearfix ">
            <div id="infoUser" class="pull-left">
                <div class="title-block ">
                    <h4 class="title">
                        <i class="iconUser"></i>Thông tin tài khoản:</h4>
                    <a class="edit-info" href="{{route('reset')}}">
                        <i class="iconEdit"></i>chỉnh sửa</a>
                </div>
                <div class="meta">
                    <p>Email: {{$user->email}}</p>
                    <?php $lenght = strlen($user->phone);?>
                    <p>Số điện thoại: {{substr($user->phone,0,$lenght-5)}}*****</p>
                </div>
            </div>
            <div id="user-balance" class="pull-right">
                <strong>
                    <i class="iconBalance"></i>Số tiền hiện có:</strong>
                <span class="number-balance">{{$user->money}} K</span>
            </div>
        </div>
        <div class="lich-su-danh gd">
            <div class="bhead">
                <div class="fl">
                    Lịch sử đánh đề</div>
            </div>

            <div class="bcontent" id="ls-danh-loto">
                <table id="tblshower_playhistory">
                    <tbody id="table_playhistory">
                        <tr>
                            <td>Ngày tạo</td>
                            <td>Ngày đánh</td>
                            <td>Đài</td>
                            <td>Loại đề</td>
                            <td>Số</td>
                            <td>Tiền 1 con</td>
                            <td>Tổng tiền</td>
                            <td>Trúng</td>
                            <td>Kết quả</td>
                            <td>Ghi chú</td>
                        </tr>
                        @foreach($danhde as $dd) @if($dd->jackpot != -1)
                        <tr>
                            <td>{{$dd->created_at}}</td>
                            <td>{{$dd->ngaydanh}}</td>
                            <td>{{$dd->city->name}}</td>
                            <td>{{$dd->kieuchoi->name}}</td>
                            <td>{{$dd->number}}</td>
                            <td>{{$dd->money}}</td>
                            <td>{{$dd->kieuchoi->money*$dd->money}}</td>
                            <td>{{$dd->jackpot}}</td>
                            <td>{{$dd->money*$dd->jackpot*$dd->kieuchoi->giaithuong}}</td>
                            <td>Ghi chú</td>
                        </tr>
                        @else
                        <tr>
                            <td>{{$dd->created_at}}</td>
                            <td>{{$dd->ngaydanh}}</td>
                            <td>{{$dd->city->name}}</td>
                            <td>{{$dd->kieuchoi->name}}</td>
                            <td>{{$dd->number}}</td>
                            <td>{{$dd->money}}</td>
                            <td>{{$dd->kieuchoi->money*$dd->money}}</td>
                            <td>Đang cập nhật</td>
                            <td>Đang cập nhật</td>
                            <td>Ghi chú</td>
                        </tr>
                        @endif @endforeach
                    </tbody>
                </table>
                <div class="row">
                {{$danhde->links()}}
            </div>
            </div>
        </div>

        <div class="lich-su-danh gd">
            <div class="bhead">
                <div class="fl">
                    Lịch sử giao dịch</div>
            </div>
            <div class="bcontent" id="ls-danh-tran">
                <table id="tblshower_transaction">
                    <tbody id="table_cashhistory">
                        <tr>
                            <td>Ngày tạo</td>
                            <td>Ngày GD</td>
                            <td>Ngân hàng</td>
                            <td>Tiền GD</td>
                            <td>Tiền sau GD</td>
                            <td>Trạng thái</td>
                            <td>Ghi chú</td>
                        </tr>
                        @foreach($giaodich as $gd)
                        <tr>
                            <td>{{$gd->created_at}}</td>
                            @if($gd->ngayGD=="")
                            <td>Đang cập nhật</td>
                            @else
                            <td>{{$gd->ngayGD}}</td>
                            @endif
                            <td>{{$gd->nganhang->name}}</td>
                            <td>{{$gd->moneyGD}}</td>
                            @if($gd->ngayGD=="")
                            <td>Đang cập nhật</td>
                            @else
                            <td>{{$gd->tiensauGD}}</td>
                            @endif
                            <td>{{$gd->trangthai}}</td>
                            <td>Ghi chú</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    {{$giaodich->links()}}
                </div>
            </div>
        </div>
        <div class="giao-dich">
            <div class="deposit-container clearfix">
                <div class="fl block-gd nap-tien">
                    <form action="#" id="frm-smartpay-deposit-make" class="">
                        <div class="title block-title">NẠP TIỀN siêu tốc
                            <i class="iconNews"></i>
                        </div>
                        <div class="tb-deposit-quick">
                            <table style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td colspan="2">
                                            <a href="http://smartpay.click/" target="_blank">
                                                <img src="lode/public/site/images/banner-smartpay-new-1.jpg" width="100%" />
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 135px;">
                                            Chọn ngân hàng (
                                            <font color="red">
                                                <b>*</b>
                                            </font>)
                                        </td>
                                        <td>
                                            <select name="bank" class="form-control">
                                                <option></option>
                                                <option value="vcb">Ngân hàng Vietcombank </option>
                                                <option value="eab">Ngân hàng DongA </option>
                                                <option value="acb">Ngân hàng ACB </option>
                                                <option value="vtb">Ngân hàng VietinBank </option>
                                                <option value="bidv">Ngân hàng Đầu Tư &amp; Phát triển Việt Nam (BIDV) </option>
                                                <option value="sab">Ngân hàng Sacombank </option>
                                                <option value="tcb">Ngân hàng Techcombank </option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Số tiền (
                                            <font color="red">
                                                <b>K</b>
                                            </font>)
                                        </td>
                                        <td>
                                            <input type="text" name="amount" class="form-control format_currency" id="from_overview_smartpay_naptien_tien">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        </td>
                                        <td>
                                            <input class="btn btn-signin pull-right" id="btn-deposite-quick" type="submit" value="Nạp tiền" disabled="disable"/>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="warning-notification">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
                                    <tr>
                                        <td align="center" valign="middle">
                                            <img src="lode/public/site/images/Icon_Service_Full.png" width="100" height="100" />
                                        </td>
                                        <td valign="middle" style="padding-left:20px;">Hệ thống Smartpay đang tạm ngưng trong ít phút</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <style>
                            .tb-deposit-quick {
                                position: relative;
                            }

                            .warning-notification {
                                display: none;
                                visibility: hidden;
                            }

                            .maintenance-service .warning-notification {
                                position: absolute;
                                top: 0;
                                left: 0;
                                bottom: 0;
                                right: 0;
                                border: 1px solid #797979;
                                z-index: 9;
                                padding-left: 20px;
                                padding-right: 20px;
                                background-color: #797979;
                                background-color: rgba(121, 121, 121, 0.8);
                                color: #fff;
                                font-size: 20px;
                                display: block;
                                visibility: visible;
                            }
                        </style>
                    </form>
                </div>
                <div class="pull-right block-gd nap-tien">
                    <form action="{{route('giaodich')}}" id="frm-deposit-make" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <div class="title block-title">
                            Nạp tiền thủ công</div>
                        <div>
                            <table style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td style="width: 135px;">
                                            Chọn ngân hàng (
                                            <font color="red">
                                                <b>*</b>
                                            </font>)
                                        </td>
                                        <td>
                                            <select name="bank" id="from_overview_naptien_bank" class="form-control">
                                                @foreach($nganhang as $bank)
                                                <option value="{{$bank->id}}">{{$bank->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Tên người gửi (
                                            <font color="red">
                                                <b>*</b>
                                            </font>)
                                        </td>
                                        <td>
                                            <input id="from_overview_naptien_customer" name="sender" type="text" class="form-control" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Số tiền (
                                            <font color="red">
                                                <b>K</b>
                                            </font>)
                                        </td>
                                        <td>
                                            <input type="text" name="amount" class="form-control" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Mã giao dịch
                                        </td>
                                        <td>
                                            <input name="code" id="from_overview_naptien_magiaodich" type="text" class="form-control" placeholder="Nhập 5 số cuối của số điện thoại." required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        </td>
                                        <td>
                                            <input class="btn btn-signin" id="btn-form-submit-deposite" type="submit" value="Nạp tiền" />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
            <div style="clear:both;"></div>
            <div class="withdraw clearfix">
                <form id="frm-withdraw-make" action="{{route('ruttien')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="title block-title">
                        Rút tiền</div>
                    <div class="block-gd pull-left">
                        <table style="width: 100%;">
                            <tbody>
                                <tr>
                                    <td style="width: 135px;">
                                        Chọn ngân hàng (
                                        <font color="red">
                                            <b>*</b>
                                        </font>)
                                    </td>
                                    <td>
                                        <select name="bank" id="from_overview_ruttien_bank" class="form-control">
                                            @foreach($nganhang as $bank)
                                            <option value="{{$bank->id}}">{{$bank->name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Tên người nhận (
                                        <font color="red">
                                            <b>*</b>
                                        </font>)
                                    </td>
                                    <td>
                                        <input name="account" id="from_overview_ruttien_customer" type="text" class="form-control" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Số tài khoản (
                                        <font color="red">
                                            <b>*</b>
                                        </font>)
                                    </td>
                                    <td>
                                        <input name="stk" id="from_overview_ruttien_accountnumber" type="text" class="form-control" required>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="block-gd pull-right">
                        <table style="width: 100%;">
                            <tbody>
                                <tr>
                                    <td>
                                        Số tiền (
                                        <font color="red">
                                            <b>K</b>
                                        </font>)
                                    </td>
                                    <td>
                                        <input name="money" type="text" class="form-control" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Nhập mã (
                                        <font color="red">
                                            <b>*</b>
                                        </font>)
                                    </td>
                                    <td>
                                        <input name="code" autocomplete="off" id="from_overview_ruttien_sdt" type="text" class="form-control" placeholder="Nhập 5 số cuối của số điện thoại." required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                        <input id="btn-form-submit-withdraw" type="submit" class="btn btn-signin pull-right" value="Rút tiền">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
            <div class="clearfix">
            </div>
        </div>
    </div>
</div>
@endsection