<div class="header">
    <div class="logo">
        <a href="/">
            <img src="lode/public/site/layout/images/logo.png">
        </a>
    </div>
    @if(Auth::check())
    <div class="login" id="form_logined" style="width:500px">
        <div style="text-align: right;" class="user-logined">
            <span>Chào bạn:
                <b>
                    <a href="{{route('member')}}" style="color: #d70a0a; text-decoration: underline;" id="form_username">{{Auth::user()->name}}</a>
                </b>
            </span>
            -
            <a href="{{route('member')}}">Tài khoản</a>
        </div>
        <div class="txt-link reset-pwd">
            <a href="{{route('dangxuat')}}">Đăng Xuất</a>
        </div>
    </div>
    @else
    <div class="login col-xs-7" style="display: block;height:80px;" id="form_login">
        <!-- <form action="#" method="post"> -->
            <!-- <input type="hidden" name="_token" value="{{csrf_token()}}"> -->
            <div class="row">
                <div style="padding-right:0;" class="col-xs-4">
                    <input type="text" placeholder="Email" name="email" class="form-control txt-red" id="email" required>
                </div>
                <div style="padding-right:0;" class="col-xs-3">
                    <input type="password" placeholder="Mật khẩu" name="password" class="form-control txt-red" id="password" required>
                </div>
                <div style="padding-right:0;" class="col-xs-3">
                    <input type="submit" value="Đăng nhập" id="submit" class="btn btn-signin form-control">
                </div>
                <div style="padding-right:0;" class="col-xs-2">
                    <a href="{{route('dangky')}}"><input type="button" value="Đăng ký" class="btn btn-signout form-control"></a>
                </div>
                <div>
                    <div class="clear "></div>
                    <div class="error" style="color:red;background:none;border:none;padding:0px 15px"
                        name="login_error"></div>
                    <div class="clear "></div>
                </div>
            </div>
        <!-- </form> -->
        <div class="txt-link reset-pwd">
            <a href="{{route('forgot')}}">Quên mật khẩu?</a>
        </div>
    </div>
    @endif
    <div class="clearfix"></div>
    <div class="menu">
        <ul>
            <li class="mn-home active">
                <a href="/">&nbsp;</a>
            </li>
            <li class="">
                <a href="{{route('mienbac')}}">Lô đề Miền Bắc</a>
            </li>
            <li class="">
                <a href="{{route('mientrung')}}">Lô đề Miền Trung</a>
            </li>
            <li class="">
                <a href="{{route('miennam')}}">Lô đề Miền Nam</a>
            </li>
        </ul>
        <div class="bank" id="btn-bank-info-show">
            <span class="icon-bank"></span>
            <span class="bank-txt">Tài khoản ngân hàng</span>
        </div>
        <div class="info-bank" style="display: none;">
        </div>
        <div class="clearfix"></div>
    </div>
    <script>
        $(document).ready(function () {
            $(document).click(function () {
                $(".info-bank").hide();

            });
            $("#btn-bank-info-show").click(function (event) {
                $(".info-bank").show();
                event.stopPropagation();
            });
            $("#submit").click(function (){
                // alert('ok');
                var email = $("#email").val();
                var password = $("#password").val();
                // alert(email);
                if(email!="" && password !=""){
                    $.get("ajax/dangnhap/"+email+"/"+password, function (data){
                        // alert(data);
                        if(data=="Tài khoản hoặc mật khẩu không chính xác!"){
                            $(".error").html(data);
                        }else 
                        window.location = "/lo-de-mien-bac";
                    });
                }
            });
        });
    </script>
</div>
<div class="notification">
    <div class="notification-head">
        <span class="notification-icon"></span>
    </div>
    <div class="notification-text">
        <marquee behavior="scroll" direction="left">
            <span id="div_thongbao">Cam kết an toàn trên mỗi giao dịch với ghi chú buôn bán tiền ảo hợp pháp</span>
        </marquee>
    </div>
    <div class="date-time">
        <span id="time_view"></span>
    </div>
    <div class="clearfix"></div>
</div>
