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
                <div class="title" id="div_trogiup_title">Kinh nghiệm đánh đề</div>
                <div id="div_trogiup_detail" style="margin-top: 10px;">
                    <div class="ct_dt">
                        <h2>
                            <a href="{{route('kinhnghiem1')}}">Câu chuyện về con đề số 60</a>
                        </h2>
                        <p>1 nhóm đi du lịch Madagui, trong đó có 1 cô bé mơ thấy những cảnh tượng kỳ lạ trước chuyến đi. 1
                            cô bé bí ẩn, 1 bầy nhện và con rết (rít) to đùng</p>
                    </div>
                    <div class="ct_dt">
                        <h2>
                            <a href="{{route('kinhnghiem2')}}">Phải chăng số 21-61 có ý nghĩa là con đĩ?</a>
                        </h2>
                        <p>Trong số đề 21-61 là hình ảnh người con gái lả lơi dân gian gọi là con đĩ. Và nội dung trong bài
                            viết này cũng ứng nghiệm với con số 21</p>
                    </div>
                    <div class="ct_dt">
                        <h2>
                            <a href="{{route('kinhnghiem3')}}">Giấc mơ kì lạ về con lô số 16</a>
                        </h2>
                        <p>Con lô số 16 là con ong. Trong trường hợp của bài viết này con lô số 16 là hiện thân của thiếu nữ
                            áo dài trắng, là nghĩa địa bỏ hoang, là căn nhà số 16 Hàng Trống</p>
                    </div>
                    <div class="ct_dt">
                        <h2>
                            <a href="{{route('kinhnghiem4')}}">Hướng dẫn cách đánh đề tỷ lệ thắng 95%</a>
                        </h2>
                        <p>Chút kinh nghiệm này để dành cho những anh em nào ham mê cờ bạc mà muốn gỡ lại thì hãy kiên trì áp
                            dụng cách đánh của tôi thì sẽ đảm bảo 95% thắng.</p>
                    </div>
                </div>
                <div class="paging"></div>
                <style>
                    .paging a,
                    .paging strong {
                        display: inline-block;
                        padding: 0 9px;
                        background: #ddd;
                        margin: 0 2px;
                        color: #000;
                    }
                </style>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endsection