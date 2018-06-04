<script data-cfasync="false" src="cdn-cgi/scripts/d07b1474/cloudflare-static/email-decode.min.js"></script>
<script>
    $("#frm-register-user").submit(function () {
        $.ajax({
            url: '/user/register.html',
            dataType: "json",
            method: "POST",
            cache: false,
            data: "action=login&" + $("#frm-register-user").serialize(),
            success: function (data) {
                if (!data.complete) {
                    var error_string = "Lỗi khi đăng ký:\n";
                    for (var k in data) {
                        if (data[k].length > 0)
                            error_string += $(data[k]).text() + "\n";
                    }
                    alert(error_string);
                } else {
                    Dialog.close("#dangky");
                    alert("Bạn đã đăng ký thành công");
                    window.location.reload();
                }
            }
        });
        return false;
    });
</script>
<script>
    function FloatTopDiv() {
        startLX = ((document.body.clientWidth - MainContentW) / 2) - LeftBannerW - LeftAdjust, startLY =
            TopAdjust + 80;
        startRX = ((document.body.clientWidth - MainContentW) / 2) + MainContentW + RightAdjust, startRY =
            TopAdjust + 80;
        var d = document;

        function ml(id) {
            var el = d.getElementById ? d.getElementById(id) : d.all ? d.all[id] : d.layers[id];
            el.sP = function (x, y) {
                this.style.left = x + 'px';
                this.style.top = y + 'px';
            };
            el.x = startRX;
            el.y = startRY;
            return el;
        }

        function m2(id) {
            var e2 = d.getElementById ? d.getElementById(id) : d.all ? d.all[id] : d.layers[id];
            e2.sP = function (x, y) {
                this.style.left = x + 'px';
                this.style.top = y + 'px';
            };
            e2.x = startLX;
            e2.y = startLY;
            return e2;
        }
        window.stayTopLeft = function () {
            if (document.documentElement && document.documentElement.scrollTop)
                var pY = document.documentElement;
            else if (document.body)
                var pY = document.body;
            if (document.body.scrollTop > 30) {
                startLY = 3;
                startRY = 3;
            } else {
                startLY = TopAdjust;
                startRY = TopAdjust;
            };
            ftlObj.y += (pY + startRY - ftlObj.y) / 16;
            ftlObj.sP(ftlObj.x, ftlObj.y);
            ftlObj2.y += (pY + startLY - ftlObj2.y) / 16;
            ftlObj2.sP(ftlObj2.x, ftlObj2.y);
            setTimeout("stayTopLeft()", 1);
        }
        ftlObj = ml("divAdRight");
        //stayTopLeft();
        ftlObj2 = m2("divAdLeft");
        stayTopLeft();
    }

    function ShowAdDiv() {
        var objAdDivRight = document.getElementById("divAdRight");
        var objAdDivLeft = document.getElementById("divAdLeft");
        if (document.body.clientWidth < 1000) {
            objAdDivRight.style.display = "none";
            objAdDivLeft.style.display = "none";
        } else {
            objAdDivRight.style.display = "block";
            objAdDivLeft.style.display = "block";
            FloatTopDiv();
        }
    }
</script>
<script>
    document.write(
        "<script type='text/javascript' language='javascript'>MainContentW = 980;LeftBannerW = 170;RightBannerW = 170;LeftAdjust = 5;RightAdjust = 5;TopAdjust = 10;ShowAdDiv();window.onresize=ShowAdDiv;;<\/script>"
    );
</script>
<script type="text/javascript">
    function DropDown(el) {
        this.dd = el;
        this.placeholder = this.dd.children('span');
        this.opts = this.dd.find('ul.dropdown > li');
        this.val = '';
        this.index = -1;
        this.initEvents();
    }
    DropDown.prototype = {
        initEvents: function () {
            var obj = this;

            obj.dd.on('click', function (event) {
                $(this).toggleClass('active', '', 100);
                return false;
            });

            obj.opts.on('click', function () {
                var opt = $(this);
                obj.val = opt.text();
                obj.index = opt.index();
                obj.placeholder.text(obj.val);
            });
        },
        getValue: function () {
            return this.val;
        },
        getIndex: function () {
            return this.index;
        }
    }

    $(function () {

        var dd = new DropDown($('#dd'));
        var dd = new DropDown($('#dd1'));
        var dd = new DropDown($('#dd2'));
        var dd = new DropDown($('#dd3'));

        $(document).click(function () {
            // all dropdowns
            $('.wrapper-dropdown-3').removeClass('active');
        });

    });


    $('.banner-slider').bxSlider({
        pager: false,
        mode: 'fade',
        pause: 5000,
        auto: true,
        nextSelector: '#slider-next',
        prevSelector: '#slider-prev',
        nextText: '',
        prevText: '',
        controls: false
    });

    //
    //                
    //                $(".bank").click(function (event) {
    //                    showBankInfo();
    //                    event.stopPropagation();
    //                });
</script>
<script type="text/javascript">
    //initialize the 3 popup css class names - create more if needed
    var matchClass = ['popup1', 'popup2', 'popup3'];
    //Set your 3 basic sizes and other options for the class names above - create more if needed
    var popup1 =
        'width=400,height=300,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=20,top=20';
    var popup2 =
        'width=800,height=600,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=20,top=20';
    var popup3 =
        'width=1000,height=750,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=20,top=20';

    //When the link is clicked, this event handler function is triggered which creates the pop-up windows 
    function eventHandler() {
        var x = 0;
        var popupSpecs;
        //figure out what popup size, etc to apply to the click
        while (x < matchClass.length) {
            if ((" " + this.className + " ").indexOf(" " + matchClass[x] + " ") > -1) {
                popupSpecs = matchClass[x];
                var popurl = this.href;
            }
            x++;
        }
        //Create a "unique" name for the window using a random number
        var popupName = Math.floor(Math.random() * 10000001);
        //Opens the pop-up window according to the specified specs
        newwindow = window.open(popurl, popupName, eval(popupSpecs));
        return false;
    }

    //Attach the onclick event to all your links that have the specified CSS class names
    function attachPopup() {
        var linkElems = document.getElementsByTagName('a'),
            i;
        for (i in linkElems) {
            var x = 0;
            while (x < matchClass.length) {
                if ((" " + linkElems[i].className + " ").indexOf(" " + matchClass[x] + " ") > -1) {
                    linkElems[i].onclick = eventHandler;
                }
                x++;
            }
        }
    }

    function enterLogin(evt) {
        if (evt.keyCode == 13) {
            login();
        }
    }

    //Call the function when the page loads
    window.onload = function () {
        attachPopup();
    }
</script>
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-66148450-4', 'auto');
    ga('send', 'pageview');
</script>
<script src="lode/public/site/layout/js/bootstrap.min.js"></script>

<script type="text/javascript">
    _atrk_opts = {
        atrk_acct: "gKoEo1IWx810T3",
        domain: "lode88.net",
        dynamic: true
    };
    (function () {
        var as = document.createElement('script');
        as.type = 'text/javascript';
        as.async = true;
        as.src = "https://d31qbv1cthcecs.cloudfront.net/atrk.js";
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(as, s);
    })();
</script>
<script type="text/javascript">
if(screen.width <= 699){
    document.location = "http://m.thegioikimcuong.online"
}
  </script>
  <!-- <div id="fb-root"></div> -->
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.12';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>