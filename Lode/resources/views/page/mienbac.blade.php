@extends('master') @section('content')
<div class="main">
    @if(Session::has('loidanhde'))
    <div class="alert alert-danger">
        {{Session::get('loidanhde')}}
    </div>
    @endif @if(Session::has('danhde'))
    <div class="alert alert-{{Session::get('flag')}}">
        {{Session::get('danhde')}}
    </div>
    @endif @if(Session::has('loidulieu'))
    <div class="alert alert-danger">
        {{Session::get('loidulieu')}}
    </div>
    @endif @if(count($errors)>0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $err) {{$err}} @endforeach
    </div>
    @endif
    <?php 
        $date = date("d-m-Y");
        $hetgio = "18:00:00";
        $now = date("H:i:s");
        $plus = 1;
        if($now>$hetgio){
            $date = date("d-m-Y",strtotime("$date +$plus day"));
        }
    ?>
    <style>
        .tab_number_content {
            display: none;
        }
    </style>
    <script type="text/javascript">
        (function ($) {
            $(document).ready(function () {
                var main = $('#form');
                var url = main.attr('action');
                var url_load_type_info = '/loto/load_type_info.html';
                var config_max_bet_numbers = '10';
                var regions = 'bac';
                var time = new Date();
                var day = new Date();
                var s = time.getHours();
                if (s > 15) {
                    day.setDate(day.getDate() + 1);
                }
                // alert(day);
                //load dai
                var date = main.find('.bcontent input#date').val();

                $(".date_bet").datetimepicker({
                    scrollMonth: false,
                    scrollInput: false,
                    format: 'd-m-Y',
                    lang: "vi",
                    timepicker: false,
                    changeYear: true,
                    changeMonth: true,
                    yearStart: '2018',
                    yearEnd: '2019',
                    minDate: new Date(day),
                    onSelectDate: function (dp, $input) {
                        load_city($input.val());
                        show_date_bet();
                        // $('.bcontent input#date').val($input.val());
                    }
                });

                function load_city(date) {
                    jQuery(this).nstUI({
                        method: "loadAjax",
                        loadAjax: {
                            url: '/home/load_city.html',
                            data: {
                                'date': date,
                                'regions': regions
                            },
                            field: {
                                load: 'divkqxs_load',
                                show: ''
                            },
                            event_complete: function (data, setting) {
                                $('#load_city').html(data);
                            }
                        }
                    });
                }

                function show_date_bet() {
                    var date_bet = $('.bcontent input#date').val();
                    $('#ngaydanh').html(date_bet);
                }

                //hien thi dai do
                jQuery(document.body).on('change', 'select#daido', function () {
                    show_city_bet();
                });

                function show_city_bet() {
                    var element = $('select#daido').find('option:selected');
                    var city_name = element.data("name");
                    $('#daidanh').html(city_name);
                }
                //hien thi ngay choi va dai do
                //show_date_bet();
                //show_city_bet();

                var bet_type_cur = main.find('.kieu-danh .act');
                load_bet_type(bet_type_cur);
                jQuery(document.body).on('click', '.kieu-danh .kd', function () {
                    if ($(this).hasClass('act'))
                        return;
                    main.find('.kieu-danh .act').removeClass('act');
                    $(this).addClass('act');
                    load_bet_type($(this));
                });

                function load_bet_type(bet_type_cur) {
                    var type = bet_type_cur.data('type');
                    jQuery(this).nstUI({
                        method: "loadAjax",
                        loadAjax: {
                            url: url,
                            data: {
                                'type': type,
                                'load_loto_type': true
                            },
                            field: {
                                load: 'bet_type_load',
                                show: ''
                            },
                            event_complete: function (data, setting) {
                                $('#bet_type_content').html(data);
                                //hien thi ngay choi va dai do
                                show_date_bet();
                                show_city_bet();
                            }
                        }
                    });
                }

                //lay thong tin cua kieu choi
                jQuery(document.body).on('click', '#tabBetType .kd1', function () {
                    if ($(this).hasClass('act'))
                        return;

                    main.find('#tabBetType .act').removeClass('act');
                    $(this).addClass('act');
                    load_loto_type_info($(this));
                });

                function load_loto_type_info(bet_type_cur) {
                    var loto_id = bet_type_cur.data('loto_id');
                    jQuery(this).nstUI({
                        method: "loadAjax",
                        loadAjax: {
                            url: url_load_type_info,
                            data: {
                                'loto_id': loto_id
                            },
                            field: {
                                load: 'loto_type_info_load',
                                show: ''
                            },
                            event_complete: function (data, setting) {
                                $('#loto_type_info').html(data);
                                //hien thi ngay choi va dai do
                                show_date_bet();
                                show_city_bet();
                            }
                        }
                    });
                }

                //click chon so
                var main_type = $('#loto_type_info');
                jQuery(document.body).on('click', '#loto_type_info .so-item', function () {
                    if ($(this).hasClass('so-act')) {
                        $(this).removeClass('so-act')
                    } else {
                        $(this).addClass('so-act');
                    }
                    load_number_bet($(this));
                });

                function load_number_bet(cur) {
                    var max = $('#max').val();

                    //so duoc danh toi da
                    // var max_bet_numbers = jQuery('#max_bet_numbers').val();
                    // max_bet_numbers = parseInt(max_bet_numbers);

                    var numbers = jQuery('span.so-item.so-act');
                    var numbers_bet = new Array();
                    jQuery.each(numbers, function (i, val) {
                        var number = $(this).text();
                        numbers_bet.push(number);
                    });

                    numbers_bet = $.unique(numbers_bet);
                    // alert(numbers_bet.length);
                    // if (max_bet_numbers > 0 && numbers_bet.length > max_bet_numbers) {
                    //     alert('Bạn chỉ được chọn ' + max_bet_numbers + ' số đánh'); //số đá
                    //     cur.removeClass('so-act');
                    //     return false;
                    // }
                    if (numbers_bet.length > max) {
                        alert('Bạn chỉ được chọn tối đa ' + max + ' số!');
                        cur.removeClass('so-act');
                        return false;
                    }

                    var bet_numbers_val = numbers_bet.join('-');
                    $('.danh-de').find('input#bet_numbers').val(bet_numbers_val);
                    $('#number').val(bet_numbers_val);
                    $('#numberhd').val(bet_numbers_val);
                    //load tong so tien thanh toan
                    // load_total_amount($("#tienmotcon").val());
                }

                //click chon so
                load_tab_number();
                jQuery(document.body).on('click', '#loto_type_info .tab_number', function () {
                    if ($(this).hasClass('tabactived'))
                        return;
                    jQuery('.tabactived').addClass('tabInactived');
                    jQuery('.tabactived').removeClass('tabactived');

                    $(this).removeClass('tabInactived');
                    $(this).addClass('tabactived');
                    load_tab_number();
                });

                function load_tab_number() {
                    var tab_id = jQuery('.tabactived').data('number');
                    if (tab_id >= 0) {
                        $('.tab_number_content').hide();
                        $('#tab_number_' + tab_id).show();
                    }
                }

                //lay thong tin cua kieu choi
                // jQuery(document.body).on('keyup', '#tongtiendanh', function () {
                //     var tongtiendanh = $(this).val();
                //     tongtiendanh = tongtiendanh.replace(/,/g, '');
                //     tongtiendanh = parseInt(tongtiendanh);
                //     var rate = $('input#bet_rate').val();
                //     var pay_number = $('input#pay_number').val();


                //     var numbers = $('#sodanh').text();
                //     numbers = numbers.split(' - ');

                //     var total_number = numbers.length;
                //     var multi = $('#tabBetType .act').data('multi');
                //     if (!multi) {
                //         total_number = 1;
                //     }
                //     $("#tienmotcon").val(+(tongtiendanh / pay_number / total_number).toFixed(
                //         3));
                //     var tienthang1con = (tongtiendanh / pay_number / total_number).toFixed(
                //         3) * rate;
                //     tienthang1con = number_format(tienthang1con, 1, ",") + ' K';
                //     $('#tienthang1con').html(tienthang1con);

                //     //load_total_amount($("#tienmotcon").val());
                // });
                // jQuery(document.body).on('keyup', '#tienmotcon', function () {
                //     load_total_amount($(this).val());
                //     //                        load_total_amount();
                // });

                //tong so tien can thanh toan
                // function load_total_amount(tienmotcon) {
                //     tienmotcon = tienmotcon.replace(/,/g, '');
                //     tienmotcon = parseInt(tienmotcon);
                //     var rate = $('input#bet_rate').val();
                //     var pay_number = $('input#pay_number').val();

                //     var tienthang1con = tienmotcon * rate;
                //     tienthang1con = number_format(tienthang1con, 1, ",") + ' K';
                //     $('#tienthang1con').html(tienthang1con);
                //     var total_amount_content = $('#total_amount b');
                //     var multi = $('#tabBetType .act').data('multi');

                //     var numbers = $('#sodanh').text();
                //     numbers = numbers.split(' - ');

                //     var total_number = numbers.length;
                //     var tongtiendanh = tienmotcon * pay_number;
                //     if (multi && total_number > 1) {
                //         tongtiendanh = tongtiendanh * total_number;
                //     } else {

                //     }
                //     $("#tongtiendanh").val(tongtiendanh).keyup();
                // }
                // window.reset_form = function () {
                //     $('#loto_type_info .so-item').removeClass('so-act');
                //     load_number_bet($(this));
                //     var dai = $("#daido").val();
                //     main.get(0).reset();
                //     $("#daido").val(dai);
                // }
            });

        })(jQuery);

        // function FormatNumber(obj) {
        //     var strvalue;
        //     if (eval(obj))
        //         strvalue = eval(obj).value;
        //     else
        //         strvalue = obj;
        //     var num;
        //     num = strvalue.toString().replace(/\$|\,/g, '');
        //     if (isNaN(num))
        //         num = "";
        //     sign = (num == (num = Math.abs(num)));
        //     num = Math.floor(num * 100 + 0.50000000001);
        //     num = Math.floor(num / 100).toString();
        //     for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
        //         num = num.substring(0, num.length - (4 * i + 3)) + ',' +
        //         num.substring(num.length - (4 * i + 3));
        //     //return (((sign)?'':'-') + num); 
        //     eval(obj).value = (((sign) ? '' : '-') + num);
        // }
    </script>
    <div class="page-lode">
        <div class="block">
            <div style="background: #f6f6f6;" class="bhead">
                <div id="BDHeader" class="fl">Biên đề - Miền Bắc</div>
                <div class="clearfix"></div>
            </div>
            <div class="bcontent">
                <!-- <form role="form" action="{{route('miennam')}}" method="post"> -->
                <!-- {{csrf_field()}} -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ngày</label>
                                <input type="text" id="date" value="{{$date}}" class="form-control date_bet txt-red" style="width:150px;" readonly="readonly"
                                />
                                <div name="date_error" class="error"></div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Đài</label>
                                <select class="form-control" id="city">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Loại chơi</label>
                                <select class="form-control" id="loaide">
                                    @foreach($loaide as $loai)
                                    <option value="{{$loai->id}}">{{$loai->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Kiểu chơi</label>
                                <select class="form-control" id="kieuchoi">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tiền đặt (K)</label>
                                <input type="text" class="form-control" id="tiendat" required/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Đánh số</label>
                                <input type="text" class="form-control" placeholder="Chọn số bên dưới" id="number" disabled="disable" />
                                <input type="hidden" id="numberhd" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Luật chơi</label>
                                <textarea class="form-control" rows="5" cols="50" disabled="disable" id="luatchoi">
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <input id="max" value="0" type="hidden" />
                <div class="box-footer">
                    @if(Auth::check())

                    <button class="btn btn-danger delete-modal">
                        Xác nhận
                    </button>
                    @else
                    <button type="submit" class="btn btn-danger" disabled="disable">Xác nhận</button>
                    <p class="text-danger">Vui lòng đăng nhập để có thể cược!</p>
                    @endif
                </div>
                <!-- </form> -->
            </div>
        </div>
        <div class="chon-so" style="position:relative;min-height:100px">
            <div id="bet_type_content">
            </div>
        </div>
    </div>

    <!-- <div style="display:none;">
        <div class="widget" id="verify_login">
            <div class="title">
                <img src="lode/public/admin/images/icons/dark/bubbles2.png" alt="" class="titleIcon" />
                <h6>Thông báo</h6>
            </div>
            <div class="body">
                <div id="notice">Bạn cần đăng nhập để thực hiện chức năng này</div>
                <div class="textC" style="margin-top:10px;">
                    <a id="cancel" href="" class="mws-button gray" style="margin: 5px;">
                        <img src="lode/public/admin/images/icons/dark/close.png" class="icon" />
                        <span>Hủy bỏ</span>
                    </a>
                </div>
            </div>
            <div id="verify_action_load" class="form_load"></div>
        </div>
    </div>
    <div style="display:none;">
        <div class="widget" id="verify_time_bet">
            <div class="title">
                <img src="lode/public/admin/images/icons/dark/bubbles2.png" alt="" class="titleIcon" />
                <h6>Thông báo</h6>
            </div>
            <div class="body">
                <div id="notice">Chúng tôi đã khóa bảng.Quý khách vui lòng quay lại sau</div>
                <div class="textC" style="margin-top:10px;">
                    <a id="accept" href="/" class="mws-button blue" style="margin: 5px;">
                        <img src="lode/public/admin/images/icons/light/create.png" class="icon" style='margin-bottom:-3px' />
                        <span>Chấp nhận</span>
                    </a>
                    <a id="cancel" href="" class="mws-button gray" style="margin: 5px;">
                        <img src="lode/public/admin/images/icons/dark/close.png" class="icon" style='margin-bottom:-3px' />
                        <span>Hủy bỏ</span>
                    </a>
                </div>
            </div>
            <div id="verify_action_load" class="form_load"></div>
        </div>
    </div> -->
    <!-- <script>
        $(".loto-form-panel").submit(function () {
            var main_frm = $(this);
            var action = main_frm.attr("action");
            var data = main_frm.serialize();
            $("#overlay-modal").show();
            $.ajax({
                url: action,
                method: "POST",
                dataType: "json",
                data: data + "&_submit=1",
                success: function (o) {
                    $("#overlay-modal").show();
                    if (o.valid) {
                        for (var k in o.valid) {
                            $("*[name=" + k + "_error]").html(o.valid[k]);
                        }
                    }
                    if (o.info && confirm("Bạn đã chọn:\n\n" + o.info +
                            "\n\nBạn chắc chắn muốn đánh không?")) {
                        $.ajax({
                            url: action,
                            method: "POST",
                            dataType: "json",
                            data: data + "&_submit=1&confirm=1",
                            success: function (o1) {
                                if (o1.complete) {
                                    alert(o1.msg);
                                    //                            main_frm.get(0).reset();
                                    reset_form();
                                    $(".danh-de .error").html("");

                                }
                                $("#overlay-modal").hide();
                            },
                            error: function () {
                                alert(
                                    "Đã có lỗi xảy ra trong quá trình gửi dữ liệu, Phiếu đánh chưa được tạo, vui lòng thử lại"
                                );
                                $("#overlay-modal").hide();
                            }
                        });
                    } else {
                        $("#overlay-modal").hide();
                    }
                },
                error: function () {
                    alert("Đã có lỗi xảy ra trong quá trình gửi dữ liệu");
                    $("#overlay-modal").hide();
                }
            });
            return false;
        });
    </script> -->
</div>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Phiếu ghi đề</h4>
            </div>
            <div class="modal-body">
                <p>Ngày đánh:
                    <span id="ngay"></span>
                </p>
                <p>Đài:
                    <span id="dai"></span>
                </p>
                <p>Loại chơi:
                    <span id="loai"></span>
                </p>
                <p>Kiểu chơi:
                    <span id="kieu"></span>
                </p>
                <p>Đánh số:
                    <span id="danh"></span>
                </p>
                <p>Tiền đặt:
                    <span id="tien"></span>K</p>
                <p>Tổng tiền:
                    <span id="dat"></span>*
                    <span id="dattien"></span>=
                    <span id="tong"></span>
                </p>
            </div>
            <div class="modal-footer">
                <form action="{{route('mienbac')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="date" id="ngayhd" />
                    <input type="hidden" name="city" id="daihd" />
                    <input type="hidden" name="loaide" id="loaihd" />
                    <input type="hidden" name="kieuchoi" id="kieuhd" />
                    <input type="hidden" name="money" id="tienhd" />
                    <input type="hidden" name="number" id="danhhd" />
                    <!-- <button type="submit" class="btn actionBtn btn-success" data-dismiss="modal">
                        <span id="footer_action_button" class='glyphicon glyphicon-ok'></span> Xác nhận
                    </button> -->
                    <input type="submit" class="btn btn-success" value="Xác nhận" />
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class='glyphicon glyphicon-remove'></span> Hủy bỏ
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection @section('script')

<script>
    $(document).ready(function () {
        var idloaide = $('#loaide').val();
        $.get("lo-de-mien-bac/ajax/kieuchoi/" + idloaide, function (data) {
            $("#kieuchoi").html(data);
            var idkieuchoi = $('#kieuchoi').val();
            $.get("lo-de-mien-bac/ajax/luatchoi/" + idkieuchoi, function (data) {
                $("#luatchoi").html(data);
            });
            $.get("lo-de-mien-bac/ajax/chonso/" + idkieuchoi, function (data) {
                $("#bet_type_content").html(data);
            });
            $.get("lo-de-mien-bac/ajax/max/" + idkieuchoi, function (data) {
                $("#max").val(data);
            });
            $.get("lo-de-mien-bac/ajax/money/" + idkieuchoi, function (data) {
                $("#dat").html(data);

            });
        });

        $("#loaide").change(function () {
            var idloaide = $(this).val();
            $.get("lo-de-mien-bac/ajax/kieuchoi/" + idloaide, function (data) {
                $("#kieuchoi").html(data);
                var idkieuchoi = $('#kieuchoi').val();
                $.get("lo-de-mien-bac/ajax/luatchoi/" + idkieuchoi, function (data) {
                    $("#luatchoi").html(data);
                });
                $.get("lo-de-mien-bac/ajax/chonso/" + idkieuchoi, function (data) {
                    $("#bet_type_content").html(data);
                    // alert(data);
                });
                $.get("lo-de-mien-bac/ajax/max/" + idkieuchoi, function (data) {
                    $("#max").val(data);
                });
                $("#number").val("");
                $.get("lo-de-mien-bac/ajax/money/" + idkieuchoi, function (data) {
                    $("#dat").html(data);
                });
            });
        });
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
        $.get("lo-de-mien-bac/ajax/city/" + thu, function (data) {
            $("#city").html(data);
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
            $.get("lo-de-mien-bac/ajax/city/" + thu, function (data) {
                $("#city").html(data);
            });
        });
        $("#date").keypress(function () {
            alert("Hãy chọn ngày!");
        });
        $("#kieuchoi").change(function () {
            var idkieuchoi = $(this).val();
            $.get("lo-de-mien-bac/ajax/luatchoi/" + idkieuchoi, function (data) {
                $("#luatchoi").html(data);

            });
            $.get("lo-de-mien-bac/ajax/chonso/" + idkieuchoi, function (data) {
                $("#bet_type_content").html(data);
            });
            $.get("lo-de-mien-bac/ajax/max/" + idkieuchoi, function (data) {
                $("#max").val(data);
            });
            $("#number").val("");
            $.get("lo-de-mien-bac/ajax/money/" + idkieuchoi, function (data) {
                $("#dat").html(data);
            });
        });
        $(document).on('click', '.delete-modal', function () {
            $('#myModal').modal('show');
            $('#ngay').html($('#date').val());
            $('#dai').html($('#city option:selected').text());
            $('#loai').html($('#loaide option:selected').text());
            $('#kieu').html($('#kieuchoi option:selected').text());
            $('#danh').html($('#numberhd').val());
            $('#tien').html($('#tiendat').val());

            $('#ngayhd').val($('#date').val());
            $('#daihd').val($('#city option:selected').val());
            $('#loaihd').val($('#loaide option:selected').val());
            $('#kieuhd').val($('#kieuchoi option:selected').val());
            $('#danhhd').val($('#numberhd').val());
            $('#tienhd').val($('#tiendat').val());
            $("#dattien").html($('#tiendat').val());
            $("#tong").html($('#tiendat').val() * $("#dat").html() + "K");
        });
    });
</script>

@endsection