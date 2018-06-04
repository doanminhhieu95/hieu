@extends('master') @section('content')
<div class="main">

    <?php 
    $date = date("d-m-Y");
    $now = date("H:i:s");
    $plus = 1;
    $date = date("d-m-Y",strtotime("$date -$plus day"));
    ?>
    <script type="text/javascript">
        (function ($) {
            $(document).ready(function () {
                var main = $('#resultlottery');
                var url = main.attr('action');

                //load dai
                $(".ngaydo").datetimepicker({
                    format: 'd-m-Y',
                    scrollMonth: false,
                    scrollInput: false,
                    lang: "vi",
                    timepicker: false,
                    changeYear: true,
                    changeMonth: true,
                    yearStart: '2013',
                    yearEnd: '2018',
                    maxDate: new Date(),
                    onSelectDate: function (dp, $input) {
                        load_city();
                    }
                });

                function load_city() {
                    var date = main.find('input#date').val();
                    jQuery(this).nstUI({
                        method: "loadAjax",
                        loadAjax: {
                            url: '/home/load_city.html',
                            data: {
                                'date': date
                            },
                            field: {
                                load: 'divkqxs_load',
                                show: ''
                            },
                            event_complete: function (data, setting) {
                                $('#load_city').html(data);
                                load_resultlottery();
                            }
                        }
                    });
                }


                //load ket qua
                jQuery(document.body).on('change', '#resultlottery select#daido', function () {
                    load_resultlottery();
                    return false;
                });
                //load ket qua
                jQuery(document.body).on('click', '#resultlottery input.btn-signin', function () {
                    load_resultlottery();
                    return false;
                });

                function load_resultlottery() {
                    var daido = main.find('select#daido').val();
                    var date = main.find('input#date').val();
                    var number = main.find('input#number').val();
                    jQuery(this).nstUI({
                        method: "loadAjax",
                        loadAjax: {
                            url: url,
                            data: {
                                'city': daido,
                                'date': date,
                                'number': number
                            },
                            field: {
                                load: 'divkqxs_load',
                                show: ''
                            },
                            event_complete: function (data, setting) {
                                $('#divkqxs').html(data);
                            }
                        }
                    });
                }


            });
        })(jQuery);
    </script>
    <div class="fl box-number">
        <div class="box-number-content">
            <div class="select-number">
                <div class="fl">
                    <form id="resultlottery" method="POST" action="/home/get_resultlottery.html">
                        <div class="row">
                            <div class="col-xs-3">
                                <input id="number" type="text" name="so" class="form-control txt-red" placeholder="Nhập số" />
                            </div>
                            <div class="col-xs-3">
                                <?php
                                    $h = date($date." H:i:s");
                                    $k = date($date." 19:00:00");
                                ?>
                                    <input type="text" name="so" id="date" value="{{$date}}" class="form-control ngaydo txt-red" readonly="readonly" />
                            </div>
                            <div class="col-xs-4">
                                <div id="load_city">
                                    <select id="daido" name="city" class="form-control txt-red" placeholder="Chọn đài">
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-2">
                                <input type="submit" value="XEM" class="btn btn-signin form-control" id="xem"/>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>

            <div style="position:relative;min-height:300px">
                <div id="divkqxs" class="box-ketqua">
                    <style>
                        b.hight-light {
                            background-color: #ff0;
                        }
                    </style>
                    <div class="bang-ketqua" id="ketqua">
                    </div>
                    <!-- end -->
                </div>
                <div id="divkqxs_load" class="form_load"></div>
            </div>
        </div>
    </div>
    <div class="fl box-chat">
        <div>
            <div class="box-chat-title" style="float:left;">
                
            </div>
            <div style="float:right;" class="fb-share-button" data-href="http://bingwin288.com/" data-layout="button" data-size="small" data-mobile-iframe="true">
                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fbingwin288.com%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a>
            </div>
        </div>
        <div class="clearfix"></div>
        <div id="chat_logined" class="box-chat-content">
            <div id="cboxdiv" style="position: relative; margin: 0 auto; width: 286px; font-size: 0; line-height: 0;">
                <div style="position: relative; height:432px; overflow: auto; overflow-y: auto; -webkit-overflow-scrolling: touch; border:#EDDEDB 1px solid;">
                    <iframe src="https://www2.cbox.ws/box/?boxid=2389336&boxtag=PbKTg9" marginheight="0" marginwidth="0" frameborder="0"
                        width="100%" height="100%" scrolling="auto" allowtransparency="yes" name="cboxmain4-4255997" id="cboxmain4-4255997"></iframe>
                </div>
                <!-- <div style="position: relative; height: 106px; overflow: hidden; border:#EDDEDB 1px solid; border-top: 0px;">
                    <iframe src="https://www2.cbox.ws/box/?boxid=2389315&boxtag=9a5Iq6&sec=form" marginheight="0" marginwidth="0" frameborder="0"
                        width="100%" height="100%" scrolling="no" allowtransparency="yes" name="cboxform4-4255997" id="cboxform4-4255997"></iframe>
                </div> -->
            </div>
        </div>
        <!-- <div id="chat_login" style="display:block;" class="box-chat-content-2">
            <span>Hãy đăng nhập để chat</span>
        </div> -->

    </div>
    <div class="clearfix"></div>
    <!-- <div class="info">
        <div class="icon-info">
            <a style="font-size: 12px;" href="{{route('naptienthucong')}}">
                <i class="icon icon-heo"></i>
                <p style="font-size: 12px;">Cách nạp tiền</p>
            </a>
        </div>
        <div class="icon-info">
            <a style="font-size: 12px;" href="{{route('cachruttien')}}">
                <i class="icon icon-dola"></i>
                <p style="font-size: 12px;">Cách rút tiền</p>
            </a>
        </div>
        <div class="icon-info">
            <a style="font-size: 12px;" href="#">
                <i class="icon icon-moigioi"></i>
                <p style="font-size: 12px;">Kinh nghiệm</p>
            </a>
        </div>
        <div class="icon-info">
            <img src="lode/public/site/layout/images/icon_vnd.png" />
            <p style="font-size: 12px;">Tổng tiền cược trong ngày</p>
        </div>
        <div class="tiencuoc" id="div_tongtiencuoc" money="4180581000">
            <i class="tc">4</i>
            <i class="tcdot">,</i>
            <i class="tc">1</i>
            <i class="tc">8</i>
            <i class="tc">0</i>
            <i class="tcdot">,</i>
            <i class="tc">5</i>
            <i class="tc">8</i>
            <i class="tc">1</i>
            <i class="tcdot">,</i>
            <i class="tc">0</i>
            <i class="tc">0</i>
            <i class="tc">0</i>
        </div>
    </div> -->
    <div class="banner">
        <ul class="banner-slider">
            <li>
                <img src="lode/public/site/layout/images/img_banner.png" />
            </li>
            <li>
                <img src="lode/public/site/layout/images/img_banner2_1.png" />
            </li>
        </ul>
        <div class="slider-controls">
            <span id="slider-next" class="slider-btn"></span>
            <span id="slider-prev" class="slider-btn"></span>
        </div>
    </div>
</div>
@endsection @section('script')
<script>
    $(document).ready(function () {
        var iddate = $('#date').val();
        var day = iddate.substr(0, 2);
        var month = iddate.substr(3, 2);
        var year = iddate.substr(6, 4);
        var date = year + "-" + month + "-" + day;
        var d = new Date(date);
        var dd = String(d);
        var ddd = dd.slice(0, 3);
        if (ddd == "Sun") var thu = 1;
        if (ddd == "Mon") var thu = 2;
        if (ddd == "Tue") var thu = 3;
        if (ddd == "Wed") var thu = 4;
        if (ddd == "Thu") var thu = 5;
        if (ddd == "Fri") var thu = 6;
        if (ddd == "Sat") var thu = 7;
        $.get("ajax/city/" + thu, function (data) {
            $("#daido").html(data);
            var idcity = $('#daido').val();
            var day = $('#date').val();
            $.get("ajax/ketqua/" + idcity + "/" + day, function (data) {
                $("#ketqua").html(data);
            });
        });
        $("#date").change(function () {
            var iddate = $(this).val();
            var day = iddate.substr(0, 2);
            var month = iddate.substr(3, 2);
            var year = iddate.substr(6, 4);
            var date = year + "-" + month + "-" + day;
            var d = new Date(date);
            var dd = String(d);
            var ddd = dd.slice(0, 3);
            if (ddd == "Sun") var thu = 1;
            if (ddd == "Mon") var thu = 2;
            if (ddd == "Tue") var thu = 3;
            if (ddd == "Wed") var thu = 4;
            if (ddd == "Thu") var thu = 5;
            if (ddd == "Fri") var thu = 6;
            if (ddd == "Sat") var thu = 7;
            // alert(d);
            $.get("ajax/city/" + thu, function (data) {
                $("#daido").html(data);
                var idcity = $('#daido').val();
                var day = $('#date').val();
                $.get("ajax/ketqua/" + idcity + "/" + day, function (data) {
                    $("#ketqua").html(data);
                });
            });
        });

        $("#daido").change(function () {
            var idcity = $('#daido').val();
            var day = $('#date').val();
            $.get("ajax/ketqua/" + idcity + "/" + day, function (data) {
                $("#ketqua").html(data);
            });
        });
        $("#xem").click(function () {
            var number = $('#number').val();
            var regex = new RegExp(number, "g");
            var tr = $("div.box-number tr");
            var kq = new Array();
            for(var i=0; i<tr.length;i++){
                kq.push($("div.box-number tr:eq("+i+") td:odd").text());
            }
            for(var i=0; i<tr.length;i++){
                var a = $("div.box-number tr:eq("+i+") td:odd");
                if(i==0){
                    a.html('<b id="db" style="color:red">'+a.text().replace(number, '<b class="">'+number+'</b>'));
                }
                else{
                    a.html(a.text());
                }
                if(kq[i].indexOf(number)!=-1){
                    if(i==0){
                        a.html('<b id="db" style="color:red">'+a.text().replace(number, '<b class="hight-light">'+number+'</b>')+'</b>');
                    }
                    else
                    a.html(a.text().replace(regex, '<b class="hight-light">'+number+'</b>'));
                }
            }
            // var a = $("div.box-number tr:eq(2) td:odd");
            // a.text("a");
            // alert(a.text());
            // for(var i=0; i<a.lenth;i++){
            //     alert(a[i].text());
            // }
            // a.append('<b class="hight-light">'+a.text()+'</b>');
            // var b = $("tbody").find("tr:eq(1) td:eq(1)").text();
            // 
        });
    });
</script>
@endsection