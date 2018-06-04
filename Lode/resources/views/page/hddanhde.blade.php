@extends('master') @section('content')
<div class="main">
    <div class="main page-lode">
        <div class="tro-giup">
            <div class="left">
                <div class="title">Trợ giúp</div>
                <div>
                    <ul class="menu-help" id="ul_help">
                        <li id="gioithieu" class="act">
                            <a href="{{route('hddanhde')}}">Hướng Dẫn Đánh Đề</a>
                        </li>
                        <li id="gioithieu" class="">
                            <a href="{{route('naptienthucong')}}">Cách nạp tiền thủ công</a>
                        </li>
                        <li id="gioithieu" class="">
                            <a href="{{route('cachruttien')}}">Cách rút tiền</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="right">
                <div class="title" id="div_trogiup_title">Hướng Dẫn Đánh Đề</div>
                <div id="div_trogiup_detail" style="margin-top: 10px;">
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51);">
                        <span style="box-sizing: border-box; margin: 0px; padding: 0px; font-weight: 700;">I. Để tham gia&nbsp;chơi l&ocirc; đề, số đề th&igrave; trước ti&ecirc;n&nbsp;bạn đăng k&yacute; t&agrave;i
                            khoản tr&ecirc;n trang lode88.net</span>
                    </p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51);">
                        <img alt="Description: dk.png" src="lode/ldimages/hd1.png" style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; vertical-align: middle; height: 65px; width: 458px;"
                        />
                    </p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51);">
                        <span style="box-sizing: border-box; margin: 0px; padding: 0px; font-weight: 700;">II. Sau khi đăng k&yacute; xong bạn tiến h&agrave;nh Nạp tiền</span>
                    </p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51);">
                        Để tiện lợi cho việc gửi tiền v&agrave;o chơi l&ocirc; đề th&igrave; Lode88 c&oacute; hỗ trợ đủ c&aacute;c ng&acirc;n h&agrave;ng
                        th&ocirc;ng dụng nhất hiện nay: Vietcombank, Đ&ocirc;ng &Aacute;, ACB, VietinBank, BIDV, Sacombank,Techcombank.
                    </p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51);">
                        Khi gửi tiền xong th&igrave; bạn vui l&ograve;ng lập lệnh Nạp tiền. Khi nhận được tiền th&igrave; bộ phận hỗ trợ của Lode88
                        sẽ cập nhật tiền v&agrave;o t&agrave;i khoản l&ocirc; đề cho bạn. (
                        <span style="box-sizing: border-box; margin: 0px; padding: 0px; font-weight: 700;">
                            <a href="{{route('naptienthucong')}}">Xem hướng dẫn Nạp Tiền</a>)</span>
                    </p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51);">
                        <span style="box-sizing: border-box; margin: 0px; padding: 0px; font-weight: 700;">III. C&aacute;ch Đ&aacute;nh Số Đề</span>
                    </p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51);">
                        <span style="box-sizing: border-box; margin: 0px; padding: 0px; font-weight: 700;">&nbsp;1.&nbsp;</span>Sau khi c&oacute; tiền trong t&agrave;i khoản th&igrave; ở giao diện trang chủ,
                        bạn chọn l&ocirc; đề m&igrave;nh cần đ&aacute;nh: L&ocirc; đề Miền Bắc, L&ocirc; đề Miền Trung, L&ocirc;
                        đề Miền Nam.</p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51);">
                        <img alt="Description: chon dai.png" src="lode/ldimages/hd2.png" style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; vertical-align: middle; height: 104px; width: 470px;"
                        />
                    </p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51);">
                        <span style="box-sizing: border-box; margin: 0px; padding: 0px; font-weight: 700;">2</span>. Như tr&ecirc;n l&agrave; đ&atilde; chọn đ&aacute;nh l&ocirc; đề Miền Nam. Trong một ng&agrave;y
                        th&igrave; l&ocirc; đề Miền Nam c&oacute; nhiều đ&agrave;i, bạn chọn đ&agrave;i cần đ&aacute;nh.</p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51);">
                        <img alt="" src="lode/ldimages/hd3.png" style="width: 700px; height: 354px;" />
                    </p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51);">
                        <span style="box-sizing: border-box; margin: 0px; padding: 0px; font-weight: 700;">3.</span>&nbsp;Tiếp đến bạn chọn dạng l&ocirc; đề cần đ&aacute;nh c&aacute;c con số đề y&ecirc;u
                        th&iacute;ch.
                    </p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51);">
                        <img alt="" src="lode/ldimages/hd4.png" style="width: 700px; height: 246px;" />
                    </p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51);">
                        <span style="box-sizing: border-box; margin: 0px; padding: 0px; font-weight: 700;">4</span>. Sau khi chọn kiểu đ&aacute;nh v&agrave; con số ưa th&iacute;ch rồi th&igrave; bạn điền
                        số tiền cần đ&aacute;nh v&agrave; bấm
                        <strong>X&aacute;c Nhận</strong>
                    </p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51);">
                        <img alt="" src="lode/ldimages/hd5.png" style="width: 700px; height: 361px;" />
                    </p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51);">
                        5. Khi bấm X&aacute;c Nhận, hệ thống hỏi &quot; Bạn c&oacute; chắc chắn muốn đ&aacute;nh kh&ocirc;ng?&quot; , kiểm tra thấy
                        con số m&igrave;nh chọn v&agrave; số tiền đ&atilde; đ&uacute;ng rồi th&igrave; bạn bấm
                        <strong>Xác nhận</strong>, nếu kh&ocirc;ng đ&uacute;ng bạn bấm
                        <strong>Hủy bỏ </strong>v&agrave; chọn lại.</p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51);">
                        <img alt="" src="lode/ldimages/hd6.png" style="width: 700px; height: 532px;" />
                    </p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51);">
                        - Đối với Bao L&ocirc; 2 số của l&ocirc; đề Miền Nam th&igrave; bạn chỉ cần thanh to&aacute;n 15 giải tr&ecirc;n tổng 18
                        giải. Thắng gấp 79 lần, nếu số đ&oacute; về N lần th&igrave; tiền thắng được xN lần. Như v&iacute;
                        dụ tr&ecirc;n t&ocirc;i đ&aacute;nh 990k, bao l&ocirc; 2 số đ&agrave;i Long An, nếu kết quả xổ số
                        18 giải của đ&agrave;i Long An c&oacute; ra số đu&ocirc;i l&agrave; 88 th&igrave; t&ocirc;i thắng
                        được&nbsp; 5,214K ( 5 triệu 214 ng&agrave;n). Nếu ra 2 lần th&igrave; số tiền được x2, tức l&agrave;:
                        &nbsp;5,214k x 2= 10,428k</p>
                    <p font-size:="" helvetica="" style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; color: rgb(51, 51, 51);">
                        - Tương tự bạn c&oacute; thể chọn đ&aacute;nh l&ocirc; đề miền trung, l&ocirc; đề miền bắc v&agrave; chọn những con số đề
                        y&ecirc;u th&iacute;ch một c&aacute;ch dễ d&agrave;ng. Ch&uacute;c c&aacute;c bạn tham gia chơi l&ocirc;
                        đề, số đề nhiều may mắn v&agrave; thắng lớn!</p>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endsection