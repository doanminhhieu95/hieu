@extends('master') @section('content')
<div class="main">
    <div class="main page-lode">
        <div class="tro-giup">
        <div class="left">
                <div class="title">Trợ giúp</div>
                <div>
                    <ul class="menu-help" id="ul_help">
                        <li id="gioithieu">
                            <a href="{{route('hddanhde')}}">Hướng Dẫn Đánh Đề</a>
                        </li>
                        <li id="gioithieu">
                            <a href="{{route('naptienthucong')}}">Cách nạp tiền thủ công</a>
                        </li>
                        <li id="gioithieu" class="act">
                            <a href="{{route('cachruttien')}}">Cách rút tiền</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="right">
                <div class="title" id="div_trogiup_title">Cách rút tiền</div>
                <div id="div_trogiup_detail" style="margin-top: 10px;">
                    <h1 color:="" font-weight:="" helvetica="" line-height:="" style="box-sizing: border-box; margin: 20px 0px 10px; padding: 0px; font-size: 36px; font-family: ">
                        C&aacute;c Bước R&uacute;t Tiền</h1>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51); font-family: ">
                        &nbsp;</p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51); font-family: ">
                        1. Đăng nhập v&agrave;o t&agrave;i khoản của bạn tại lode88</p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51); font-family: ">
                        V&agrave;o mục T&agrave;i khoản lập phiếu R&uacute;t tiền&nbsp;</p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51); font-family: ">
                        Như h&igrave;nh b&ecirc;n dưới</p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51); font-family: ">
                        <img src="lode/ldimages/rt.png" style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; vertical-align: middle;"
                        />
                    </p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51); font-family: ">
                        2. Lưu &yacute; : Nhập m&atilde; (*) l&agrave; 5 chữ số cuối của số điện thoại m&agrave; bạn đăng k&yacute;.</p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51); font-family: ">
                        &nbsp;</p>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endsection