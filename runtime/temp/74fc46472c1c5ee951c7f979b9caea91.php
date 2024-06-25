<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"/www/wwwroot/www.kefu.com/public/../application/mobile/view/index/index.html";i:1715770051;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="/favicon.ico"/>
    <title><?php echo $business_name; ?></title>
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <script>
        ROOT_URL = '<?php echo $basename; ?>';
    </script>
    <link href="/assets/libs/layer/admin/layui.css?v=AI_KF" rel="stylesheet">
    <script src="/assets/libs/push/pusher.min.js?v=AI_KF" type="text/javascript"></script>
    <script type="text/javascript" src="/assets/libs/jquery/jquery.min.js?v=AI_KF"></script>
    <script src="/assets/libs/layui/layui.js?v=AI_KF" type="text/javascript"></script>
    <script src="/assets/libs/jquery/jquery.cookie.js?v=AI_KF" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="/assets/css/mobile/mobile.css">
    <script src="/assets/libs/jquery/jquery.form.min.js?v=AI_KF" type="text/javascript"></script>
    <link href="/assets/libs/layer/skin/layer.css?v=AI_KF" type="text/css" rel="stylesheet" />
    <script src="/assets/libs/layer/layer.js?v=AI_KF" type="text/javascript"></script>
    <script type="text/javascript" src="/assets/libs/webrtc/recorder.js?v=AI_KF"></script>
    <script>
        $.cookie('state','off');
        var visiter ='<?php echo $visiter; ?>';
        var business_id  ='<?php echo $business_id; ?>';
        var record='<?php echo $from_url; ?>';
        record.replace("%23","#");
        record.replace("%26","&");
        var pic ='<?php echo $avatar; ?>';
        var channel= '<?php echo $channel; ?>';
        var visiter_id= '<?php echo $visiter_id; ?>';
        var special = '<?php echo $special; ?>';

        var cid ='<?php echo $groupid; ?>';
        var url ='<?php echo $url; ?>';
        if (pic == "") {
            pic = "/assets/images/index/avatar-red2.png";
        }
         var service_id=0;
        function a() {
            var e = document.getElementById("chat-message-audio-source").src
                , b = document.getElementById("chat-message-audio");
            b.src = "";
            var p = b.play();
            p && p.then(function(){}).catch(function(e){});
            b.src = e;
            $(document).unbind("click", a);
        }
        $(document).on("click", a);
        var wolive_connect =function () {
            
                    var pusher = new Pusher('<?php echo $app_key; ?>', 
                        {encrypted: <?php echo $value; ?>,
                        enabledTransports: ['ws'],
                        wsHost: '<?php echo $whost; ?>',
                        <?php echo $port; ?>: <?php echo $wport; ?>,
                        authEndpoint: '/auth.php',
                        disableStats: true
                    });

                    var channels = pusher.subscribe("cu" + channel);

            channels.bind('my-chexiao', function (data) {
                $("#xiaox_"+data.message.cid).remove();
            });
                    channels.bind('my-event', function (data) {
                        if ($.cookie('state') != 'off') {
                            document.getElementById("chat-message-audio").play();
                        }
                        var msg = '';
                        msg += '<li class="chatmsg" id="xiaox_'+data.message.cid+'"><div style="position: absolute;top:0;left:0;">';
                        msg += '<img class="my-circle  se_pic" src="' + data.message.avatar + '" width="46px" height="46px"></div>';
                        msg += "<div class='outer-left'><div class='service'>";
                        msg += "<pre>" + data.message.content + "</pre>";
                        msg += "</div></div>";
                        if(data.message.tip != ''){
                            msg += "<div style='clear: both'></div><div class='showtime' style='margin-top: 10px'>"+data.message.tip+"</div></li>";
                        }else{
                            msg += "</li>";
                        }
                        $(".chatmsg_notice").remove();
                        $(".chatmsg_no").remove();
                        $(".conversation").append(msg);
                        var div = document.getElementById("wrap");
                        div.scrollTop = div.scrollHeight;
                        $("img[src*='upload/images']").parent().parent('.customer').css({
                            padding: '0',borderRadius: '0',maxHeight:'100px'
                        });
                        $("img[src*='upload/images']").parent().parent('.service').css({
                            padding: '0',borderRadius: '0',maxHeight:'100px'
                        });
                        setTimeout(function(){
                            $('.chatmsg').css({
                                height: 'auto'
                            });
                        },0)
                    });

                    channels.bind('push-comment',function(data){

                        var html = '<div style="margin-bottom: 20px;">'+data.message.title+'</div>';
                        $.each(data.message.comments,function(index,value){
                            html += ' <div class=\'evaluate-item evaluate-score\' data-score="0">\n' +
                                '                <span class="evaluate-title">'+value+'</span>\n' +
                                '                <input type="hidden" name="'+value+'"/>\n' +
                                '                <img class="star" data-id="1" src="/assets/images/index/star.png" alt="">\n' +
                                '                <img class="star" data-id="2" src="/assets/images/index/star.png" alt="">\n' +
                                '                <img class="star" data-id="3" src="/assets/images/index/star.png" alt="">\n' +
                                '                <img class="star" data-id="4" src="/assets/images/index/star.png" alt="">\n' +
                                '                <img class="star" data-id="5" src="/assets/images/index/star.png" alt="">\n' +
                                '            </div>';
                        });

                        if (data.message.word_switch == 'open') {
                            html += '<div class=\'evaluate-item\' style="height: 80px;line-height: 1;margin-top: 10px;align-items: flex-start">\n' +
                                '                <span style="display: inline-block;margin-right: 12px;white-space: nowrap">'+ data.message.word_title +'</span>\n' +
                                '                <textarea class="about-text" name="" id="" cols="30" rows="4"></textarea>\n' +
                                '            </div>';
                        }

                        html += ' <div class="evaluate-btn">\n' +
                            '                <button class="reset"><?php echo $lang["cancel"]; ?></button>\n' +
                            '                <button class="submit"><?php echo $lang["submit"]; ?></button>\n' +
                            '            </div>';
                        $('.bg .dialog-body').html(html);
                        $('.bg').show();

                    });

                    channels.bind('first_word',function(data){
                    var msg = '';
                        msg += '<li class="chatmsg_no"><div style="position: absolute;left:0;">';
                        msg += '<img class="my-circle  se_pic" src="' + data.message.avatar + '" width="46px" height="46px"></div>';
                        msg += "<div class='outer-left'><div class='service'>";
                        msg += "<pre>" + data.message.content + "</pre>";
                        msg += "</div></div>";
                        msg += "</li>";

                        $(".conversation").append(msg);

                    });

                    channels.bind('cu_notice', function (data) {
                        $("#img_head").attr("src", data.message.avatar);
                        $("#services").text(data.message.nick_name);
                        $(".chatmsg_notice").remove();
                        $.cookie("services",data.message.service_id);
                        service_id =data.message.service_id;
                        getquestion(business_id);
                        getdata();
                    });

                    channels.bind('getswitch', function (data) {
                        $("#img_head").attr("src", data.message.avatar);
                        $("#services").text(data.message.nick_name);
                        $("#services").attr("data", data.message.service_id);
                        service_id = data.message.service_id;
                        $("#log").html('');
                        layer.msg("<?php echo $lang['transfer_service']; ?>" + data.message.nick_name);
                    });

                   function getlisten(chas){
                        var channels = pusher.subscribe("se"+chas);

                        //通知游客 客服离线
                        channels.bind('logout', function (data) {
                            $("#status").text("<?php echo $lang['off_line']; ?>");
                        });
                        //表示客服在线
                        channels.bind("geton", function (data) {
                            $("#status").text('');
                        });
                    }
                    if($.cookie("services")){
                        var id =$.cookie("services");
                        getlisten(id);
                    }

                     pusher.connection.bind('state_change', function(states) {
                        if(states.current == 'unavailable' || states.current == "disconnected" || states.current == "failed" ){
                            $.cookie("cid","");
                            var id =$.cookie("services");
                            if(id){
                              pusher.unsubscribe("se"+id);
                            }

                            pusher.unsubscribe("cu" + channel);
                             if (typeof pusher.isdisconnect == 'undefined') {
                                    pusher.isdisconnect = true;   
                                    pusher.disconnect();
                                    delete pusher; 
                                    window.setTimeout(function(){
                                            wolive_connect();
                                      },1000);
                             }                           
                         }
                    });

                    pusher.connection.bind('connected', function() {
                        $.cookie("cid","");
                    
                    });
                }


    </script>
    <style type="text/css">
        #close_icon {
            position: absolute;
            right: 10px;
            top: 2px;
            cursor: pointer;
        }

        .input-but {
            position: relative;
            display: inline-block;
            vertical-align: middle;
            width: 30px;
            height: 30px;

        }

        .my-circle {
            border-radius: 30px;
        }

        .size {
            min-width: 30px;
            height: 25px;
            line-height: 30px;
            border: none;
        }

        .fileinput {
            width: 30px;
            height: 30px;
            position: absolute;
            top: 0px;
            right: 0px;
            opacity: 0;
            filter: alpha(opacity=0);
            cursor: pointer;
        }


     
       .chatmsg_question{
             position: relative;
             margin-bottom: 228px;
        }

        .chatmsg .my-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .foot_msg {
            width: 100%;
            height: 100%;
            overflow: auto;
            position: relative;
        }


        #text_in {
            width: 100%;
            padding-right: 20%;
            height: 50px;
            float: left;
            border: 0;
            padding-left: 12px;
            color: #555555;
            font-size: 14px;
        }

        #text_in+.send-btn {
            position: absolute;
            right:12px;
            top:9px;
            width:60px;
            height: 32px;
            line-height: 32px;
            font-size: 14px;
            padding: 0;
            text-align: center;
        }

        .msg-toolbar {
            width: 100%;
            height: 44px;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            top: 50px;
            background-color: #F2F5F7;
        }

        .msg-toolbar a {
            float: left;
            width: 25%;
            margin: 0;
            text-align: center;
        }

        .msg-toolbar a img {
            margin-top: 10.5px;
            height: 23px;
            width: 23px;
        }

        .tool_box {
            width: 100%;
            height: auto;
            position: absolute;
            bottom: 94px;
            top: -160px;
            display: none;
            background-color: #fff;
        }

        .wl_faces_main ul {
            margin: 5px 5px;
            overflow: hidden;
            width: 100%;
        }

        .wl_faces_main ul li {
            float: left;
            height: 30px;
            width: 26px;
            text-align: center;

        }

        .wl_faces_main ul li img {
            width: 22px;
            height: 22px;
            padding: 0;
        }

        .customer {
            background-color: #<?php echo $theme; ?>;
            display: inline-block;
            padding: 12px;
            float: right;
            word-break: break-all;
            word-wrap: break-word;
            color: #ffffff;
            border-radius: 8px;
            border-top-right-radius: 0;
            max-width: 80%;
            box-sizing: border-box;
        }

        .outer-left:before, .outer-left > i {
            height: 0;
            border: 0;
        }

        .outer-right:before, .outer-right > i {
            height: 0;
            border: 0;            
        }

        .service {
            background-color: #e9f0ef;
            display: inline-block;
            margin-left: 10px;
            padding: 12px;
            float: left;
            word-break: break-all;
            word-wrap: break-word;
            color: #333;
            border-radius: 8px;
            border-top-left-radius: 0;
            position: relative;
            left: 0;
            max-width: 80%;
        }

        .content {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow-y: auto;
            margin: 0;
        }
        .bg,.offline,.lang-bg {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-color: rgba(0, 0, 0, .4);
            z-index: 998;
            display: none;
        }

        .dialog {
            width: 65%;
            padding: 20px 25px;
            border-radius: 5px;
            background-color: #fff;
            margin: 25% auto 0;
            position: relative;
            padding-bottom: 65px;
        }

        .bg .title,.lang-bg .title {
            font-size: 15px;
            text-align: center;
            color: #555555;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .lang-choose span{
            display: inline-block;
            padding: 5px 10px;
            background: #f0f2f7;
            color: #555555;
            font-size: 14px;
            margin-right: 5px;
            margin-bottom: 15px;
            cursor: pointer;
            width: 94.5px;
            text-align: center;
        }

        .lang-close{
            position: absolute;
            right: 8px;
            top: 8px;
            cursor: pointer;
        }

        .lang-choose span:hover{
            background: #<?php echo $theme; ?>;
            color: #ffffff;
        }

        .evaluate-item {
            height: 26px;
            display: flex;
            align-items: center;
        }

        .evaluate-item img {
            height: 16px;
            width: 16px;
            cursor: pointer;
            margin-left: 14px;
        }

        .evaluate-item img:first-of-type {
            margin-left: 14px;
        }

        .evaluate-text {
            display: none;
            border: 1px solid #4AACFF;
            color: #4AACFF;
            height: auto;
            font-size: 13px;
            border-radius: 5px;
            margin-left: 12px;
            padding: 0 5px;
        }

        .about-text {
            border: 1px solid #E5E3E9;
            border-radius: 10px;
            width: 68%;
            padding: 5px 10px;
        }

        .evaluate-btn {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .dialog .evaluate-btn {
            position: absolute;
            width: 100%;
            bottom: 0;
            left: 0;
            height: 45px;
            line-height: 45px;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        .dialog .evaluate-btn button {
            width: 50%;
            border: 0;
            font-size: 15px;
        }

        .dialog .evaluate-btn button.reset {  
            border-bottom-left-radius: 5px;
            background-color: #F5F5F5;
            color: #555555;
        }


        .dialog .evaluate-btn button.submit {
            border-bottom-right-radius: 5px;
            background-color: #1E9FFF;
            color: #fff;
        }

        .evaluate-title {
            min-width: 85px;
            text-align: left;
        }

        .offline-item {
            margin-bottom: 15px;
        }

        .offline-title {
            text-align: left;
            margin-bottom: 10px;
        }

        .offline-item input {
            height: 40px;
            border-radius: 20px;
            padding: 0 5%;
            border: 1px solid #E8E6EB;
            width: 90%;
        }

        .keyword {
            position: fixed;
            bottom: 94px;
            left: 0;
            max-width: 100%;
            height: 48px;
            white-space: nowrap;
            z-index: 90;
            display: none;
            overflow-y: auto;
        }

        .keyword #question_key_list {
            margin-top: 8px;
            margin-left: 20px;
        }

        .keyword .swiper-slide {
            display: inline-block;
            width: auto;
            height: 24px;
            line-height: 24px;
            padding: 0 10px;
            border-radius: 12px;
            border: 1px solid #E2E2E2;
            font-size: 12px;
            margin-right: 10px;
            background-color: #fff;
            cursor: pointer;
        }
		.fanhui{
            color: #fff!important;
            line-height: 45px;
		}

        .lang-flag{
            width: 16px;
            display: inline-block;
            margin-right: 3px;
            margin-top: -2px;
        }
    </style>
</head>
<body>
<audio id="chat-message-audio">
    <source id="chat-message-audio-source" src="/upload/voice/default.mp3" type="audio/mpeg" />
</audio>
<div id="container">
<div class="bg">
    <div class="dialog">
        <div class="title"><?php echo $lang['evaluate_service']; ?></div>
        <div class="dialog-body">
            <div style="margin-bottom: 20px;">请对我的服务进行评价，满意请打5星哦~</div>
            <div class='evaluate-item evaluate-score' data-score="0">
                <span class="evaluate-title">服务态度态度</span>
                <img class="star" data-id="1" src="/assets/images/index/star.png" alt="">
                <img class="star" data-id="2" src="/assets/images/index/star.png" alt="">
                <img class="star" data-id="3" src="/assets/images/index/star.png" alt="">
                <img class="star" data-id="4" src="/assets/images/index/star.png" alt="">
                <img class="star" data-id="5" src="/assets/images/index/star.png" alt="">
            </div>
            <div class='evaluate-item' style="height: 80px;line-height: 1;margin-top: 10px;align-items: flex-start">
                <span style="display: inline-block;margin-right: 12px;white-space: nowrap">意见意见建议</span>
                <textarea class="about-text" name="" id="" cols="30" rows="4"></textarea>
            </div>
            <div class="evaluate-btn">
                <button class="reset">取消</button>
                <button class="submit">提交</button>
            </div>
        </div>
    </div>
</div>

    <div class="lang-bg">
        <div class="dialog" style="padding-bottom: 20px">
            <div class="title"><?php echo $lang['choose_lang']; ?></div>
            <img src="/assets/images/index/closer.gif" class="lang-close">
            <div class="dialog-body lang-choose">
              <span data-lang="cn"><img src="/assets/images/flag/cn.png" class="lang-flag" />中文简体</span>
              <span data-lang="tc"><img src="/assets/images/flag/tc.png" class="lang-flag" />中文繁體</span>
              <span data-lang="en"><img src="/assets/images/flag/en.png" class="lang-flag" />English</span>
              <span data-lang="vi"><img src="/assets/images/flag/vi.png" class="lang-flag" />Việt Nam</span>
              <span data-lang="th"><img src="/assets/images/flag/th.png" class="lang-flag" />ประเทศไทย</span>
              <span data-lang="rus"><img src="/assets/images/flag/rus.png" class="lang-flag" />Россия</span>
              <span data-lang="id"><img src="/assets/images/flag/id.png" class="lang-flag" />Indonesia</span>
              <span data-lang="jp"><img src="/assets/images/flag/jp.png" class="lang-flag" />にほん</span>
              <span data-lang="kr"><img src="/assets/images/flag/kr.png" class="lang-flag" />대한민국</span>
              <span data-lang="es"><img src="/assets/images/flag/es.png" class="lang-flag" />España</span>
              <span data-lang="fra"><img src="/assets/images/flag/fra.png" class="lang-flag" />Français</span>
              <span data-lang="it"><img src="/assets/images/flag/it.png" class="lang-flag" />Italian</span>
              <span data-lang="de"><img src="/assets/images/flag/de.png" class="lang-flag" />Deutsch</span>
              <span data-lang="pt"><img src="/assets/images/flag/pt.png" class="lang-flag" />Português</span>
              <span data-lang="ara"><img src="/assets/images/flag/ara.png" class="lang-flag" />عربي</span>
              <span data-lang="dan"><img src="/assets/images/flag/dan.png" class="lang-flag" />Dansk</span>
              <span data-lang="el"><img src="/assets/images/flag/el.png" class="lang-flag" />Ελληνικά</span>
              <span data-lang="nl"><img src="/assets/images/flag/nl.png" class="lang-flag" />Nederlands</span>
              <span data-lang="pl"><img src="/assets/images/flag/pl.png" class="lang-flag" />Polskie</span>
              <span data-lang="fin"><img src="/assets/images/flag/fin.png" class="lang-flag" />Suomi</span>
            </div>
        </div>
    </div>

    <script>
        $('.lang-close').click(function () {
            $('.lang-bg').hide();
        });
        $('.lang-choose span').click(function () {
            $.ajax({
                url:"/index/index/set_lang",
                type: "post",
                data: {lang:$(this).data("lang"),visiter:visiter_id},
                dataType:'json',
                success:function(res){
                    window.location.reload();
                }
            });
        });
    </script>

<div class="offline"  <?php if($reststate == true): ?>style="display: block;" <?php endif; ?>>
    <div class="dialog">
        <div class="dialog-body">
            <div style="margin-bottom: 20px;"><?php echo $restsetting['reply']; ?></div>
            <?php if($restsetting['name_state'] == 'open'): ?>
            <div class='offline-item'>
                <div class="offline-title"><?php echo $lang['name']; ?></div>
                <input placeholder="<?php echo $lang['please_enter_anme']; ?>" id="offline_name" type="text">
            </div>
            <?php endif; if($restsetting['tel_state'] == 'open'): ?>
            <div class='offline-item'>
                <div class="offline-title"><?php echo $lang['contact']; ?></div>
                <input placeholder="<?php echo $lang['please_enter_contact']; ?>" id="offline_mobile" type="number" onkeypress='return( /[\d]/.test(String.fromCharCode(event.keyCode)))'>
            </div>
            <?php endif; if(($restsetting['name_state'] == 'open') || ( $restsetting['tel_state'] == 'open')): ?>
            <div class="evaluate-btn">
                <button class="reset"><?php echo $lang['cancel']; ?></button>
                <button class="submit"><?php echo $lang['submit']; ?></button>
            </div>
            <?php endif; ?>
        </div>
    </div>    
</div>
    <div class="header" style="background-color: #000722">
        <span id="services" style="color: #FFF;"></span><span id="status"></span>
    </div>
    	<a href="javascript:history.back(-1)"style="color: #fff!important;line-height: 45px;">
		<i class="layui-icon" style="position: absolute;left:10px;font-size: 20px;z-index: 997" >&#xe603;</i>
	</a>
    <a href="javascript:" style="color: #fff!important;line-height: 45px;">
        <i id="lang" class="layui-icon layui-icon-website" style="position: absolute;right:10px;font-size: 20px;z-index: 997;cursor: pointer;" ></i>
    </a>
<script>
    $('#lang').click(function () {
        $('.lang-bg').show();
    });
</script>
    <div class="content" id="wrap" style="background-color: #fff">
        <div style="height: 55px;width: 100%;"></div>
        <ul id="log" class="conversation" >

        </ul>
        <div style="height: 94px;width: 100%;"></div>
    </div>
    <div class="keyword">
        <div class="swiper-wrapper" id="question_key_list">
        </div>
    </div>
    <div class="foot_all" style="position:fixed;bottom:0px;width: 100%;height: 94px;padding:0;z-index: 997">

        <div class="tool_box">
            <div class="wl_faces_content">
                <div class="wl_faces_main">
                    
                </div>
            </div>
        </div>
        <div class="foot_msg">
            <div class="footer">
                <input type="text" id="text_in" placeholder="<?php echo $lang['please_enter']; ?>" class="layui-input" autocomplete="off"/>
                <button class="layui-btn layui-btn-normal send-btn" style="background-color: #000722"
                        onclick="send()"><?php echo $lang['send']; ?>
                </button>
            </div>
            <div class="msg-toolbar">
                <a id="face_icon" href="javascript:" onclick="faceon()"><img src="/assets/images/admin/B/smile.png" alt=""></a>

                <?php if($atype == 'open'): ?>
                <a onclick="getaudio()"><img src="/assets/images/admin/B/smile.png" alt=""></a>
                <?php endif; ?>


                <a id="images" href="javascript:">
                    <form id="picture" enctype="multipart/form-data">
                        <div class="layui-box input-but  size">
                            <img src="/assets/images/admin/B/photo.png" alt="">
                            <input type="file" name="upload" class="fileinput" onchange="put()"/>
                        </div>
                    </form>
                </a>
                <a id="files" href="javascript:">
                    <form id="file" enctype="multipart/form-data">
                        <div class="layui-box input-but  size">
                            <img src="/assets/images/admin/B/file.png" alt="">
                            <input type="file" name="folder" class="fileinput" onchange="putfile()"/>
                        </div>
                    </form>
                </a>
                <a onclick="hint()" id="clickbf" style="margin-top: 7px;"><i class="layui-icon state-mp3" style="font-size: 28px;cursor: pointer;color: #999999">&#xe685;</i></a>
            </div>
        </div>
    </div>
</div>
<script>
    var please_select_images = "<?php echo $lang['please_select_images']; ?>";
    var not_supported = "<?php echo $lang['not_supported']; ?>";
    var no_data = "<?php echo $lang['no_data']; ?>";
    var tip_waiting = "<?php echo $lang['tip_waiting']; ?>";
    var tip = "<?php echo $lang['tip']; ?>";
    var is_transfer_service = "<?php echo $lang['is_transfer_service']; ?>";
    var yes = "<?php echo $lang['yes']; ?>";
    var no = "<?php echo $lang['no']; ?>";
    var transferring = "<?php echo $lang['transferring']; ?>";
    var guess_ask = "<?php echo $lang['guess_ask']; ?>";
    var please_enter_message = "<?php echo $lang['please_enter_message']; ?>";
</script>
<script type="text/javascript" src="/assets/js/moblie/mochat.js"></script>
<script>
    function isWeiXin(){
        var ua = window.navigator.userAgent.toLowerCase();
        if(ua.match(/MicroMessenger/i) == 'micromessenger'){
            return true;
        }else{
            return false;
        }
    }
    if(isWeiXin()){
        $('.fanhui').hide();
    }
    var hint=function(){
        var state=$.cookie('state');
        if(state == "on"){
            $('.state-mp3').html('&#xe685;');
            layer.msg("<?php echo $lang['close_wav']; ?>",{end:function(){
                    $.cookie('state',"off");
                }});
        }else{
            $('.state-mp3').html('&#xe645;');
            layer.msg("<?php echo $lang['open_wav']; ?>",{end:function(){
                    $.cookie('state',"on");
                }});
        }
    }
    $(document).one('click',function () {
        var state=$.cookie('state');
        if(state == "off"){
            $('.state-mp3').html('&#xe645;');
            $.cookie('state',"on");
        }
    });
    $(document).on('click','.reset',function(){
        $('.bg').hide();
        $('.offline').hide();
    })

    $(document).on('click','.offline .submit',function(){
        let name = $('#offline_name').val();
        let mobile = $('#offline_mobile').val();
        $.ajax({
            url:ROOT_URL+"/admin/event/info",
            type: "post",
            data: {visiter_id:visiter_id,business_id: business_id,name:name,tel:mobile},
            dataType:'json',
            success:function(res){
                if(res.code != 0){
                    layer.msg(res.msg,{icon:2});
                } else {
                    layer.msg(res.msg,{icon:1});
                    setTimeout(function(){
                        $('.offline').hide();
                    },2000)
                }
            }
        });
    });

    $(document).on('click','.bg .submit',function(){
        let comment = '';
        if($('.about-text').val()){
            comment = $('.about-text').val();
        }
        let scores = [];
        $(".evaluate-score").each(function(item){
            let title = $(this).find('.evaluate-title').text();
            let score = $(this).attr('data-score');
            scores[item] = {'title':title,'score':score}
        });

        $.ajax({
            url:ROOT_URL+"/admin/event/comment",
            type: "post",
            data: {service_id:service_id, visiter_id:visiter_id,comment: comment,business_id: business_id,scores:JSON.stringify(scores)},
            dataType:'json',
            success:function(res){
                if(res.code != 0){
                    layer.msg(res.msg,{icon:2});
                } else {
                    layer.msg(res.msg,{icon:1});
                    setTimeout(function(){
                        $('.bg').hide();
                    },2000)
                }
            }
        });
    });

    $(document).on('click','.star',function(row){
        let light = '/assets/images/index/star-light.png';
        let dark = '/assets/images/index/star-dark.png';
        let star = '/assets/images/index/star.png';
        let index = row.target.dataset.id;
        $(this).parent().find('.star').attr('src',star);
        switch(index)
        {
            case '1':
                $(this).attr('src',dark);
                $(this).parent('.evaluate-item').attr('data-score',1)
                break;
            case '2':
                $(this).attr('src',dark);
                $(this).prev('.star').attr('src',dark)
                $(this).parent('.evaluate-item').attr('data-score',2)
                break;
            case '3':
                $(this).attr('src',light);
                $(this).prevAll('.star').attr('src',light);
                $(this).parent('.evaluate-item').attr('data-score',3)
                break;
            case '4':
                $(this).attr('src',light);
                $(this).prevAll('.star').attr('src',light)
                $(this).parent('.evaluate-item').attr('data-score',4)
                break;
            case '5':
                $(this).parent().find('.star').attr('src',light);
                $(this).parent('.evaluate-item').attr('data-score',5)
                break;
        }
    });

    $(document).on('touchend', '.content', function () {
        $("#text_in").blur();
        $('.tool_box').css({
            display: 'none'
        });
    });

    var getaudio =function(){

     var sid =$.cookie('services');
     if(sid == service_id){

         //音频先加载
                var audio_context;
                var recorder;
                var wavBlob;
                //创建音频
                try {
                    // webkit shim
                    window.AudioContext = window.AudioContext || window.webkitAudioContext;
                    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.mediaDevices.getUserMedia;
                    window.URL = window.URL || window.webkitURL;

                    audio_context = new AudioContext;

                    if (!navigator.getUserMedia) {
                        console.log('语音创建失败');
                    }
                    ;
                } catch (e) {
                    console.log(e);
                    return;
                }
                navigator.getUserMedia({audio: true}, function (stream) {
                    var input = audio_context.createMediaStreamSource(stream);
                    recorder = new Recorder(input);

                    var falg = window.location.protocol;
                    if (falg == 'https:') {
                        recorder && recorder.record();

                        //示范一个公告层
                        layui.use(['jquery', 'layer'], function () {
                            var layer = layui.layer;

                            layer.msg('录音中...', {
                                icon: 16
                                , shade: 0.01
                                , skin: 'layui-layer-lan'
                                , time: 0 //20s后自动关闭
                                , btn: ['发送', '取消']
                                , yes: function (index, layero) {
                                    //按钮【按钮一】的回调
                                    recorder && recorder.stop();
                                    recorder && recorder.exportWAV(function (blob) {
                                        wavBlob = blob;
                                        var fd = new FormData();
                                        var wavName = encodeURIComponent('audio_recording_' + new Date().getTime() + '.wav');
                                        fd.append('wavName', wavName);
                                        fd.append('file', wavBlob);

                                        var xhr = new XMLHttpRequest();
                                        xhr.onreadystatechange = function () {
                                            if (xhr.readyState == 4 && xhr.status == 200) {
                                                jsonObject = JSON.parse(xhr.responseText);

                                                voicemessage = '<div style="cursor:pointer;text-align:center;" onclick="getstate(this)" data="play"><audio src="'+jsonObject.data.src+'"></audio><i class="layui-icon" style="font-size:25px;">&#xe652;</i><p>音频消息</p></div>';

                                                    var sid = $('#channel').text();
                                    
                                                    var time;

                                                    var sdata = $.cookie('cu_com');

                                                    if (sdata) {
                                                        var json = $.parseJSON(sdata);
                                                        var img = json.avater;

                                                    }

                                                       if($.cookie("itime") == ""){
                                                            var myDate = new Date();
                                                                time = myDate.getHours()+":"+myDate.getMinutes();
                                                            var timestamp = Date.parse(new Date());
                                                            $.cookie("itime",timestamp/1000);
                                                        
                                                        }else{

                                                            var timestamp = Date.parse(new Date());
                                                            var lasttime =$.cookie("itime");
                                                            if((timestamp/1000 - lasttime) >30){
                                                                var myDate =new Date(timestamp);
                                                                time = myDate.getHours()+":"+myDate.getMinutes();
                                                            }else{
                                                                time ="";
                                                            }

                                                            $.cookie("itime",timestamp/1000);
                                                        }
                                               
                                                var str = '';
                                                    str += '<li class="chatmsg"><div class="showtime">' + time + '</div>';
                                                    str += '<div style="position: absolute;top: 26px;right: 2px;"><img  class="my-circle cu_pic" src="' + pic + '" width="40px" height="40px"></div>';
                                                    str += "<div class='outer-right'><div class='customer'>";
                                                    str += "<pre>" +  voicemessage + "</pre>";
                                                    str += "</div></div>";
                                                    str += "</li>";

                                                    $(".conversation").append(str);
                                                    $("#text_in").empty();

                                                    var div = document.getElementById("wrap");
                                                    div.scrollTop = div.scrollHeight;
                                                    $("img[src*='upload/images']").parent().parent('.customer').css({
                                                        padding: '0',borderRadius: '0',maxHeight:'100px'
                                                    });
                                                    $("img[src*='upload/images']").parent().parent('.service').css({
                                                        padding: '0',borderRadius: '0',maxHeight:'100px'
                                                    });
                                                    setTimeout(function(){
                                                        $('.chatmsg').css({
                                                            height: 'auto'
                                                        });
                                                    },0)
                                                   $.ajax({
                                                    url:ROOT_URL+"/admin/event/chat",
                                                    type: "post",
                                                    data: {visiter_id:visiter_id,content: voicemessage,business_id: business_id, avatar: pic,record: record,service_id:service_id},
                                                    dataType:'json',
                                                    success:function(res){
                                                        if(res.code != 0){
                                                            layer.msg(res.msg,{icon:2});
                                                        }
                                                    }
                                                });
                                            }
                                        };
                                        xhr.open('POST', '/admin/event/uploadVoice');
                                        xhr.send(fd);
                                    });
                                    recorder.clear();
                                    layer.close(index);
                                }
                                , btn2: function (index, layero) {
                                    //按钮【按钮二】的回调
                                    recorder && recorder.stop();
                                    recorder.clear();
                                    audio_context.close();
                                    layer.close(index);
                                }
                            });

                        });
                    } else {
                        
                            layer.msg('音频输入只支持https协议！');
                        
                    }


                }, function (e) {
                     layer.msg('音频输入只支持https协议！');
                });


        }
    }
   var getstate =function(obj){
       
       var c=obj.children[0];
 
       var state=$(obj).attr('data');
   
       if(state == 'play'){
         c.play();
         $(obj).attr('data','pause');
         $(obj).find('i').html("&#xe651;");
       
       }else if(state == 'pause'){
          c.pause();
         $(obj).attr('data','play');
          $(obj).find('i').html("&#xe652;");
       }

        c.addEventListener('ended', function () {  
         $(obj).attr('data','play');
         $(obj).find('i').html("&#xe652;");
        
       }, false);
    }
   document.getElementById("wrap").onscroll = function(){
        var t =  document.getElementById("wrap").scrollTop;
        if( t == 0 ) {
            if($.cookie("cid") != ""){
                getdata();
            }
        }
    }
    
    var text = document.getElementById('text_in');
    // 获取焦点，拉到底部
    text.onfocus  = function() {
        $(".tool_box").hide();
        let height = +document.documentElement.clientHeight;
        setTimeout(function(){
            $('html ,body').animate({scrollTop: height}, 0);
        },200)
    }
    // 失去焦点，拉到顶部
    text.onblur = function() {
        setTimeout(function() {
            $('html ,body').animate({scrollTop: 0}, 0);
        },0)
    }

</script>
<script>
function fuckyou(){
window.close();
window.location="about:blank";
}
function click(e) {
if (document.all) {
  if (event.button==2||event.button==3) { 
alert("欢迎光临寒舍，有什么需要帮忙的话，请与站长联系！谢谢您的合作！！！");
oncontextmenu='return false';
}
}
if (document.layers) {
if (e.which == 3) {
oncontextmenu='return false';
}
}
}
if (document.layers) {
fuckyou();
document.captureEvents(Event.MOUSEDOWN);
}
document.onmousedown=click;
document.oncontextmenu = new Function("return false;")
document.onkeydown =document.onkeyup = document.onkeypress=function(){ 
if(window.event.keyCode == 123) { 
fuckyou();
window.event.returnValue=false;
return(false); 
} 
}
</script>
</body>
</html>