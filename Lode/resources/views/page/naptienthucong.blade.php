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
                        <li id="gioithieu" class="act">
                            <a href="{{route('naptienthucong')}}">Cách nạp tiền thủ công</a>
                        </li>
                        <li id="gioithieu">
                            <a href="{{route('cachruttien')}}">Cách rút tiền</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="right">
                <div class="title" id="div_trogiup_title">Cách nạp tiền thủ công</div>
                <div id="div_trogiup_detail" style="margin-top: 10px;">
                    <h1 color:="" font-weight:="" helvetica="" line-height:="" style="box-sizing: border-box; margin: 20px 0px 10px; padding: 0px; font-size: 36px; font-family: ">
                        C&aacute;c Bước Nạp Tiền</h1>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51); font-family: ">
                        &nbsp;</p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51); font-family: ">
                        1.&nbsp;Lấy th&ocirc;ng tin t&agrave;i khoản ng&acirc;n h&agrave;ng từ Hỗ trợ vi&ecirc;n lode88 qua Hotline, Livechat</p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51); font-family: ">
                        2.&nbsp;Bạn cần chuyển khoản v&agrave;o&nbsp;t&agrave;i khoản ng&acirc;n h&agrave;ng vừa lấy được</p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51); font-family: ">
                        3.&nbsp;Đăng nhập v&agrave;o t&agrave;i khoản
                        <strong>lode88.net</strong> của bạn</p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51); font-family: ">
                        V&agrave;o mục T&agrave;i khoản lập phiếu Nạp tiền&nbsp;</p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51); font-family: ">
                        Như h&igrave;nh b&ecirc;n dưới</p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51); font-family: ">
                        <img src="lode/ldimages/nt.png" style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; vertical-align: middle;"
                        />
                    </p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51); font-family: ">
                        &nbsp;</p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51); font-family: ">
                        <span style="box-sizing: border-box; margin: 0px; padding: 0px; font-weight: 700;">M&atilde; giao dịch:</span>
                    </p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51); font-family: ">
                        - Nếu bạn chuyển qua&nbsp;
                        <span style="box-sizing: border-box; margin: 0px; padding: 0px; font-weight: 700;">ATM</span>&nbsp;vui l&ograve;ng điền &quot;Số T&agrave;i Khoản Ng&acirc;n H&agrave;ng của bạn&quot;.
                    </p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51); font-family: ">
                        - Nếu bạn chuyển bằng h&igrave;nh thức&nbsp;
                        <span style="box-sizing: border-box; margin: 0px; padding: 0px; font-weight: 700;">Nộp Tiền mặt tại quầy&nbsp;</span>vui l&ograve;ng điền &quot;Họ V&agrave; T&ecirc;n người nộp tiền&quot;.</p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51); font-family: ">
                        - Nếu bạn chuyển qua&nbsp;
                        <span style="box-sizing: border-box; margin: 0px; padding: 0px; font-weight: 700;">Internetbanking&nbsp;</span>th&igrave; t&ugrave;y ng&acirc;n h&agrave;ng sẽ c&oacute; &quot;M&atilde;
                        Giao Dịch&quot; kh&aacute;c nhau:</p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51); font-family: ">
                        &nbsp;+ VCB: Số Lệnh Giao Dịch</p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51); font-family: ">
                        &nbsp;+ DAB: Số TKNH của bạn</p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51); font-family: ">
                        &nbsp;+&nbsp;ACB: Họ V&agrave; T&ecirc;n chủ TKNH</p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51); font-family: ">
                        &nbsp;+&nbsp;Vietinbank: Số TKNH của bạn</p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51); font-family: ">
                        &nbsp;+&nbsp;BIDV:&nbsp;Số Tham Chiếu</p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51); font-family: ">
                        &nbsp;+&nbsp;Sacombank: Số Giao Dịch</p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51); font-family: ">
                        &nbsp;+&nbsp;TCB: Số B&uacute;t To&aacute;n</p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51); font-family: ">
                        &nbsp;</p>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endsection