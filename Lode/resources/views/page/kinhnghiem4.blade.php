@extends('master') @section('content')
<div class="main">
    <div class="main page-lode">
        <div class="tro-giup">
            <div class="left">
                <div class="title">Bài viết khác</div>
                <div>
                    <ul class="menu-help" id="ul_help">
                        <li id="gioithieu" class="">
                            <a id="gioithieu1" href="{{route('kinhnghiem1')}}">Câu chuyện về con đề số 60</a>
                        </li>
                        <li id="gioithieu" class="">
                            <a id="gioithieu1" href="{{route('kinhnghiem2')}}">Phải chăng số 21-61 có ý nghĩa là con đĩ?</a>
                        </li>
                        <li id="gioithieu" class="">
                            <a id="gioithieu1" href="{{route('kinhnghiem3')}}">Giấc mơ kì lạ về con lô số 16</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="right">
                <div class="title" id="div_trogiup_title">Hướng dẫn cách đánh đề tỷ lệ thắng 95%</div>
                <div id="div_trogiup_detail" style="margin-top: 10px;">
                    <h3 style="text-align: justify;">
                        I.Chuẩn bị tâm lý, tư tưởng</h3>
                    <p style="text-align: justify;">
                        Phải có sức khoẻ, vui vẻ mới đủ tự tin và có trực giác tốt. Mỗi lần có kết quả lô dù thua hay thắng cũng ko được run sợ,
                        mất thì mất rồi, ngu thì ngu rồi, phải tỉnh táo coi như lại bắt đầu mới với nhà cái, không được có
                        tâm lý ham gỡ gấp thếp…</p>
                    <p style="text-align: justify;">
                        &nbsp;</p>
                    <h3 style="text-align: justify;">
                        II.Chuẩn bị vốn&nbsp;</h3>
                    <p style="text-align: justify;">
                        _ Phải đánh theo lượng tiền mình đang có (vốn) không được đánh tất tay để còn có thể gỡ lại. Nếu thua thì không phải chủ
                        lô đang nợ mình mà là mình đã mất rồi, muốn ăn được của chủ lô ngày hôm sau thì phải đủ cơ sở về
                        cầu kéo và cả vốn thì mới ăn, ăn chắc, ăn ít còn hơn không ăn mà bị mất.</p>
                    <p style="text-align: justify;">
                        _ Kháng chiến là trường kỳ, rất nhiều anh em đã hy sinh vì cay cú, vì tất tay.</p>
                    <p style="text-align: justify;">
                        _Phải tâm niệm rằng không bao giờ chắc chắn 100% là con số nào sẽ ra vì vậy mà để đường lùi.</p>
                    <p style="text-align: justify;">
                        _ Không vay mượn, cầm cắm đồ đạc để chơi, vì như thế ảnh hưởng lớn đến tâm lý, không thể tỉnh táo được. &nbsp;</p>
                    <p style="text-align: justify;">
                        &nbsp;</p>
                    <p style="text-align: justify;">
                        <img alt="" src="lode/public/site/layout/images/huong-dan-danh-de-luon-thang-.jpg" style="width: 700px;">
                    </p>
                    <p style="text-align: justify;">
                        &nbsp;</p>
                    <h3 style="text-align: justify;">
                        &nbsp;III.Cơ sở khoa học:</h3>
                    <p style="text-align: justify;">
                        Tạm loại trừ khả năng nhà cái có thể mua hội đồng xổ số, chúng ta hy vọng vào cách quay xổ số truyền thống vẫn là các lồng
                        quay, các viên bi đấy, có thể có quy luật nào đó trong mỗi ngày liên tiếp, thời tiết mùa đông, mùa
                        hè cũng có thể ảnh hưởng...</p>
                    <p style="text-align: justify;">
                        &nbsp;</p>
                    <h3 style="text-align: justify;">
                        IV.Các phương pháp chủ yếu:</h3>
                    <p>
                        &nbsp;</p>
                    <p style="text-align: justify;">
                        <strong>1.Phương pháp đánh lô theo cầu : </strong>
                    </p>
                    <p style="text-align: justify;">
                        - Các cầu thông thường: ghép các số của giải ngày hôm trước lại, nếu ngày hôm sau ra tạo thành cầu, có thể cầu ghép số ngang,
                        cầu ghép số dọc, cầu lô rơi....</p>
                    <p style="text-align: justify;">
                        - Các cầu khác: có thể cầu theo ngày, VD ngày mùng 3 tháng 8 đánh 383, mùng 4 tháng 8 đánh 484... Thậm chí lấy số của VN-Index
                        ngày hôm đó đánh lô cũng tạo thành cầu.</p>
                    <p style="text-align: justify;">
                        Có thể thấy phương pháp theo cầu thiên biến vạn hoá, có thể có hàng nghìn cầu các loại khác nhau. Đã có người đánh lô ăn
                        20 ngày liên tiếp vì theo cầu, nhưng cầu cũng rất hay gãy, không thể xác định được thông thường cầu
                        dài bao nhiêu lâu. Hiện tại cầu đầu đít giải ĐB đang chạy khá ổn định.</p>
                    <p style="text-align: justify;">
                        &nbsp;</p>
                    <p style="text-align: justify;">
                        <strong>2.Phương pháp đánh lô theo kinh nghiệm :</strong>
                    </p>
                    <p style="text-align: justify;">
                        - Đánh theo biển số xe, đầu số ĐT của các tỉnh quay số ngày hôm đó, VD Xổ số Hải phòng đánh 161...</p>
                    <p style="text-align: justify;">
                        - Thống kê ngày mấy, thứ mấy hay ra số gì, đánh theo.</p>
                    <p style="text-align: justify;">
                        - Thống kê sau con số gì hay ra con số gì...ví dụ con 36 và con 56...</p>
                    <p style="text-align: justify;">
                        - Đánh theo tần xuất ra nhiều của các con số.</p>
                    <p style="text-align: justify;">
                        - Đánh xung quanh con lô ra 2 nháy.</p>
                    <p style="text-align: justify;">
                        Đánh theo kinh nghiệm cũng rất phong phú, nhưng cũng tuỳ giai đoạn mà kinh nghiệm được áp dụng đúng hay sai, theo nguyên
                        tắc không có gì mãi mãi.</p>
                    <p style="text-align: justify;">
                        &nbsp;</p>
                    <p style="text-align: justify;">
                        <strong>3.Phương pháp đánh lô duy tâm: </strong>
                    </p>
                    <p style="text-align: justify;">
                        Theo giấc mơ, theo tai nạn, theo ngày lễ....</p>
                    <p style="text-align: justify;">
                        &nbsp;</p>
                    <p style="text-align: justify;">
                        <strong>4.Phương pháp nuôi và gấp thếp: </strong>
                    </p>
                    <p style="text-align: justify;">
                        Về mặt toán học, nuôi gấp thếp lô đề không bao giờ thua, nhưng thực tế mấy ai nuôi từ bé tí và đủ vốn đến lúc nuôi gấp thếp
                        thật lớn, hơn nữa khi bạn nuôi thật lớn thì lại có nguy cơ bị nhà cái từ chối nhận. Quan điểm cá
                        nhân tôi chơi phương pháp này phải kiên nhẫn chờ đủ 25 ngày, và nuôi gấp thếp chỉ trong vòng 5 ngày,
                        nếu chưa ra phải bỏ ngay. Khi gấp thếp rất ảnh hưởng đến tâm lý vì lượng tiền bỏ ra quá lớn, ảnh
                        hưởng đến tâm lý là ảnh hưởng đến công việc, sức khoẻ, gia đình....</p>
                    <p style="text-align: justify;">
                        &nbsp;</p>
                    <p style="text-align: justify;">
                        Vài lời thừa vì anh em cũng đã quá hiểu rồi, chỉ mong các anh em mới phải giữ tâm lý thật bình tĩnh và tỉnh táo mới có thể
                        kiếm được điếu thuốc cốc trà đá hàng ngày.</p>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endsection