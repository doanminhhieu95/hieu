<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--[if lt IE 7 ]><html class="ie ie6" dir="ltr" lang="en-US" ><![endif]-->
<!--[if IE 7 ]><html class="ie ie7" dir="ltr" lang="en-US" ><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" dir="ltr" lang="en-US" ><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html dir="ltr" lang="en-US">
<!--<![endif]-->

<head>

    <title>Web chơi lô đề online, đánh số đề trực tuyến tỷ lệ 1 ăn 700</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="title" content="Web chơi lô đề online, đánh số đề trực tuyến tỷ lệ 1 ăn 700" />
    <meta name="description" content="BINGWIN288 là cty lô đề trên mạng, đánh số đề tại BINGWIN288 đảm bảo tỷ lệ ăn cao, rút & nạp tiền nhanh, an toàn. Có bí kíp soi cầu lô đề, số đề giúp khách hàng thắng đề"
    />
    <meta name="keywords" content="lo de, so de, danh de" />
    <meta name="robots" content="index, follow" />
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <base href="{{asset('')}}">
    <link rel="stylesheet" href="lode/public/site/css/css.css" type="text/css" />

    <script type="text/javascript">
        var site_url = 'lode/';
        var base_url = 'lode/';
        var public_url = 'lode/public';
    </script>
    <link rel="icon" href="lode/public/site/layout/images/icon.png" type="lode/public/site/layout/image/vnd.microsoft.icon">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700&subset=vietnamese'
        rel='stylesheet' type='text/css' />
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,400italic,700,300,300italic&subset=vietnamese' rel='stylesheet'
        type='text/css' />
    <link href="lode/public/min/begin.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="lode/public/min/begin.js"></script>
    <script type="text/javascript">
        $(function () {
            $(".slide_show").colorbox({
                rel: 'slide_show',
                slideshow: true
            });
        });
    </script>
    <script type="text/javascript">
        function time() {
            var today = new Date();
            var weekday = new Array(7);
            weekday[0] = "Chủ nhật";
            weekday[1] = "Thứ 2";
            weekday[2] = "Thứ 3";
            weekday[3] = "Thứ 4";
            weekday[4] = "Thứ 5";
            weekday[5] = "Thứ 6";
            weekday[6] = "Thứ 7";
            var day = weekday[today.getDay()];
            var dd = today.getDate();
            var mm = today.getMonth() + 1; //January is 0!
            var yyyy = today.getFullYear();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            nowTime = h + ":" + m + ":" + s;
            if (dd < 10) {
                dd = '0' + dd
            }
            if (mm < 10) {
                mm = '0' + mm
            }
            today = day + ', ' + dd + '/' + mm + '/' + yyyy;

            tmp = today + ' | ' + nowTime;

            document.getElementById("time_view").innerHTML = tmp;

            clocktime = setTimeout("time()", "1000", "JavaScript");

            function checkTime(i) {
                if (i < 10) {
                    i = "0" + i;
                }
                return i;
            }
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".datepicker").datetimepicker({
                scrollMonth: false,
                scrollInput: false,
                lang: "vi",
                format: 'd-m-Y',
                timepicker: false,
                changeYear: true,
                changeMonth: true,
                yearStart: '2018',
                yearEnd: '2019',
                maxDate: new Date()
            });
            $(".datepicker1").datetimepicker({
                scrollMonth: false,
                scrollInput: false,
                lang: "vi",
                format: 'd-m-Y',
                timepicker: false,
                changeYear: true,
                changeMonth: true,
                yearStart: '2018',
                yearEnd: '2019',
                minDate: new Date()
            });
            $(".datepicker2").datetimepicker({
                scrollMonth: false,
                scrollInput: false,
                lang: "vi",
                format: 'd-m-Y',
                timepicker: false,
                yearStart: '1930',
                yearEnd: '2010',
                maxDate: new Date()
            });
            //tao dong ho
            time();
        });
    </script>
</head>
<!-- <script src="https://uhchat.net/code.php?f=3c3d9a"></script> -->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5adaee88227d3d7edc242bf3/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<body>
    <div class="wrapper">
        
        @include('header')
        @yield('content')
        @include('footer')
        @include('script')
        @yield('script')
        <noscript>
            <img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=gKoEo1IWx810T3" style="display:none" height="1" width="1"
                alt="" />
        </noscript>

    </div>
</body>

</html>