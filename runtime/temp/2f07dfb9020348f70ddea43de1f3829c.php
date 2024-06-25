<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"/www/wwwroot/www.kefu.com/public/../application/mobile/view/admin/talk.html";i:1715055252;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="/favicon.ico" />
    <title>谈话页面</title>
    <script>
    ROOT_URL = "<?php echo !empty($baseroot)?$baseroot:''; ?>";
    </script>
    <script type="text/javascript" src="/assets/libs/jquery/jquery.min.js?v=AI_KF"></script>
    <script src="/assets/libs/layui/layui.js?v=AI_KF" type="text/javascript"></script>
    <script src="/assets/libs/jquery/jquery.cookie.js?v=AI_KF" type="text/javascript"></script>
    <link href="/assets/libs/layui/css/layui.css?v=AI_KF" rel="stylesheet">
    <script src="/assets/libs/push/pusher.min.js?v=AI_KF" type="text/javascript"></script>
    <script src="/assets/libs/layer/layer.js?v=AI_KF" type="text/javascript"></script>
    <script src="/assets/libs/jquery/jquery.form.min.js?v=AI_KF" type="text/javascript"></script>
    <script src="/assets/libs/vue/vue.js?v=AI_KF" type="text/javascript"></script>
    <script type="text/javascript" src="/assets/libs/webrtc/recorder.js?v=AI_KF"></script>
    <style>
        [v-cloak]{
            display: none;
        }
        * {
            -webkit-overflow-scrolling: touch;
        }

        html, body, button, input, textarea, pre {
            font-family: "Helvetica Neue", Helvetica, "Microsoft Yahei", Arial, sans-serif
        }
        
        .foot_msg {
            width: 100%;
            height: 100%;
            overflow: auto;
            position: relative;
        }

        .msg-toolbar {
            padding: 0 5%;
            height: 44px;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            margin: 0 auto;
            background-color: #F2F5F7;
            display: flex;
        }

        .msg-toolbar a {
            flex-grow:  1;
            text-align: center;
        }

        .msg-toolbar a img {
            margin-top: 10.5px;
            height: 23px;
            width: 23px;
        }

        .input-but {
            position: relative;
            display: inline-block;
            vertical-align: middle;
            width: 30px;
            height: 30px;

        }

        .my-circle {
            border-radius: 10px;
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

        .edit-ipt {
            border: 2px solid #ddd;
            width: 78%;
            outline: none;
            text-indent: 10px;
            border-radius: 6px;
            /*margin-left: 2px;*/
            background-color: #fff;
            padding-top: 6px;
            font-weight: normal;
            font-size: 16px;
            overflow-y: auto;
            height: auto;
            min-height: 32px;
            overflow-x: hidden;
            word-break: break-all;
            font-style: normal;
        }

        .outer-right {
            float: right;
            width: 80%;
            position: relative;
            right: 16%;
            clear: both;
            font-size: 14px;
        }

        .outer-left {
            float: right;
            width: 80%;
            position: relative;
            clear: both;
            right: 5%;
            font-size: 14px;
        }

        .outer-iframe-left {
            float: left;
            position: relative;
            clear: both;
            padding-top: 5px;
        }

        .service {
            background-color: #1e9fff;
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

        .customer {
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
            left: 0px;
            max-width: 80%;
        }

        .chatmsg {
            margin-bottom: 20px;
            position: relative;
            height: 250px;
        }

        .chatmsg_notice {
            position: relative;
        }

        .chatmsg img {
            max-width: 100%;
            max-height: 100px;
            cursor: pointer;
        }

        .wolive_img img {
            width: 100%;
            max-height: none;
        }

        .chatmsg:after, .chatmsg p {
            content: "";
            display: table;
            width: 100%;
            clear: both;
        }

        .wolive_price {
            color: red;
            margin: 10px 0;
        }

        .service-name {
            float: left;
            display: block;
            position: relative;
            font-size: 12px;
            color: #8D8D8D;
        }

        .showtime {
            color: #D2D2D2;
            position: relative;
            margin-bottom: 10px;
            font-size: 12px;
            text-align: center;
            height: 15px;
            padding-top: 10px;
        }

        .content {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            overflow-y: auto;
        }

        ::-webkit-scrollbar {
            display: none;
        }

        .newmsg {
            position: absolute;
            left: 33px;
            top: 13px;
            display: inline-block;
            line-height: 18px;
            color: #0C0C0C;
            text-align: center;
            width: 20px;
            height: 20px;
            border: 1px solid #ddd;
            border-radius: 20px;
            background: #ddd;
        }

        .hide {
            display: none;
        }

        .tool_box {
            width: 100%;
            height: auto;
            position: absolute;
            bottom: 94px;
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
            padding: 0px;
        }
        
        .chatmsg .my-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        #text_all {
            width: 100%;
            padding-right: 20%;
            height: 50px;
            float: left;
            border: 0;
            padding-left: 12px;
            color: #555555;
            font-size: 14px;
        }

        #text_all+.send-btn {
            position: absolute;
            right:12px;
            top:9px;
            width:60px;
            height: 32px;
            line-height: 32px;
            padding: 0;
            text-align: center;
        }
        .wolive_product {
            display: block;
            height: 100%;
            position: relative;
            min-width: 170px;
        }
        .wolive_img {
            width: 100%;
        }
        .wolive_head {
            padding-top: 10px;
        }

        .bg {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            z-index: 10;
            background-color: rgba(0, 0, 0, 0.3)
        }

        .group {
            width: 300px;
            position: absolute;
            left:50%;
            top:50%;
            transform: translate(-50%, -60%);
            margin: auto;
            background-color: #fff;
            border-radius: 5px;
        }

        .group-title {
            line-height: 50px;
            height: 50px;
            text-align: center;
            font-weight: bold;
        }

        .group-list {
            margin-bottom: 5px;
        }

        .group-item {
            padding: 0 20px;
            height: 50px;
            line-height: 50px;
            border-top: 1px solid #DDDDDD;
        }

        .group-item:first-of-type {
            border-top: 0;
        }

        .group-btn {
            width: 300px;
            height: 45px;
            position: relative;
        }

        .group-cancel,.group-submit {
            width: 150px;
            height: 45px;
            line-height: 45px;
            text-align: center;
            font-size: 14px;
            position: absolute;
            bottom: 0;
        }

        .group-cancel {
            color: #555555;
            background-color: #F5F5F5;
            border-bottom-left-radius: 5px;
            left: 0;
        }

        .group-submit {
            background-color: #2E9FFF;
            color: #fff;
            border-bottom-right-radius: 5px;
            right: 0;
        }

        .group-item input[type='checkbox'] {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            margin-right: 2px;
            background-color: #fff;
            background: url("/assets/images/mobile/select.png") no-repeat center;
            background-size: 16px 16px;
            font-size: 12px;
            display: inline-block;
            position: relative;
            top: 4px;
            -webkit-appearance:none;
            outline: none;
        }

        .group-item input[type=checkbox]:checked{
            background: url("/assets/images/mobile/select-active.png") no-repeat center;
            background-size: 16px 16px;
        }

        .group-num {
            color: #999999;
            margin-left: 5px;
        }

        .group-name {
            margin-left: 5px;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
        }

        .footer{
            border-top: 1px solid #ebeff0;
        }

        .user-name {
            display: inline-block;
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .push-evaluation {
            width: 100px;
            height: 30px;
            text-align: center;
            line-height: 30px;
            border-radius: 15px;
            background-color: #F5FAFF;
            color: #50ACFF;
            margin: 0 auto 15px;
        }
        .revoke-text{cursor: pointer;color: #dcdcdc;}
        .trans{
            cursor: pointer;
            color: #f2f2f2;
            background: #a2a2a2;
            padding: 2px 10px;
            border-radius: 2500px;
            margin-left: 5px;
            font-size: 8px;
        }
        .trans-data {
            margin-top: 10px;
            border-top: 1px dashed #a2a2a2;
            padding-top: 10px;
        }
    </style>
    <script>
        var config = {
            'app_key': '<?php echo $app_key; ?>',
            'web_host': '<?php echo $whost; ?>',
            'web_port': '<?php echo $wport; ?>',
            'value': '<?php echo $value; ?>',
            'business_id': '<?php echo $user["business_id"]; ?>',
            'service_id': '<?php echo $user["service_id"]; ?>',
            'voice_state': '<?php echo $voice; ?>',
            'voice_address': '<?php echo $voice_address; ?>'
        };

        var pic = '<?php echo $avatar; ?>';
        var imghead = '<?php echo $img; ?>';
        var num = 0;
        //标记已看消息
        function getwatch(cha) {
            $.ajax({
                url:ROOT_URL+"/admin/set/getwatch",
                type: "post",
                data: {visiter_id: cha}
            });
        }

        // new pusher 链接websocket
        var wolive_connect = function () {
            if (config.value == 'true') {
                var pusher = new Pusher(config.app_key, {
                    encrypted: true
                    , enabledTransports: ['wss']
                    , wsHost: config.web_host
                    , wssPort: config.web_port
                    , authEndpoint: '/auth.php'
                    , disableStats: true
                });
            } else {
                var pusher = new Pusher(config.app_key, {
                    encrypted: false
                    , enabledTransports: ['ws']
                    , wsHost: config.web_host
                    , wsPort: config.web_port
                    , authEndpoint: '/auth.php'
                    , disableStats: true
                });
            }

            var value = "<?php echo $user['service_id']; ?>";
            var channel = pusher.subscribe("kefu" + value);
            // 发送一个推送
            channel.bind("callbackpusher",function(data){
                $.post("<?php echo url('admin/set/callback','',true,true); ?>",data,function(res){

                })
            });
//接收消息
            channel.bind("cu-event", function (data) {
                if("<?php echo $voice; ?>" == 'open'){
                    document.getElementById("chat-message-audio").play();
                }
                var showtime = '';
                if (data.message.visiter_id == "<?php echo $data['visiter_id']; ?>") {
                    var msg = '';
                    msg += '<li class="chatmsg"><div class="showtime">' + showtime + '</div><div style="position: absolute;left:12px;">';
                    msg += '<img class="my-circle  se_pic" src="' + pic + '" width="40px" height="40px"></div>';
                    msg += "<div class='outer-left'><div class='customer'>";

                    if(data.message.content.indexOf('<img')>= 0||data.message.content.indexOf('<a')>= 0||!isNaN(data.message.content)||data.message.content.indexOf('<video')>= 0){
                        msg += "<pre>" + data.message.content + "</pre>";
                    }else{
                        msg += "<pre>" + data.message.content + "<span class='trans' data-cid='"+data.message.cid+"'>翻 译</span></pre>";
                    }
                    msg += "</div></div>";
                    msg += "</li>";
                    $('.conversation').append(msg);
                    getwatch(data.message.visiter_id);
                } else {
                    num++;
                    if (num > 0) {
                        $(".newmsg").removeClass('hide');
                    } else {
                        $(".newmsg").addClass('hide');
                    }
                    $(".newmsg").text(num);
                }
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

            channel.bind('logout', function () {
                $("#status").text('[离线]');
            });

            channel.bind('geton', function () {
                $("#status").text('');
            });


            pusher.connection.bind('state_change', function (states) {
                // states = {previous: 'oldState', current: 'newState'}
                if (states.current == 'unavailable' || states.current == "disconnected" || states.current == "failed") {

                    pusher.unsubscribe("kefu" + value);
                    pusher.unsubscribe("all" + all);
                    $.cookie("hid", '');
                    wolive_connect();
                }

            });

            pusher.connection.bind('connected', function () {
                $(".chatmsg").remove();
                $.cookie('hid', '');
                getdata();
            });
        }
    </script>
</head>

<body>
<audio id="chat-message-audio">
    <source id="chat-message-audio-source" src="<?php echo $voice_address; ?>" type="audio/mpeg" />
</audio>
    <header style="width: 100%;height: 50px;background: #1E9FFF;color: #fff;position:fixed;line-height: 50px;z-index: 99">
        <span class="newmsg hide"></span>
        <i class="layui-icon" style="position: absolute;left:10px;font-size: 20px;z-index: 999" onclick="back()">&#xe603;</i>
        <span id="customer"
          style="position:absolute;left:0;font-size: 14px;width: 100%;display: flex;justify-content: center;"><span class="user-name"><?php echo $data['visiter_name']; ?></span><span
        id="status"></span></span>
        <img onclick="openGroup()" style="position:absolute;right:15px;width: 18px;height: 18px;top: 16px;" src="/assets/images/mobile/more.png" alt="">
</header>
        <section class="content" id="wrap" style="background-color: #ffffff">
            <div style="height: 55px;width: 100%;"></div>
            <ul class="conversation" id="log">
            </ul>
            <div id="bottom" style="height: 94px;width: 100%;"></div>
        </section>
        <footer style="position:fixed;bottom:0px;width: 100%;height: 94px;padding:0">
            <div class="tool_box">
                <div class="wl_faces_content">
                    <div class="wl_faces_main">
                    </div>
                </div>
            </div>
            <div class="foot_msg">
                <div class="footer">
                    <input type="text" id="text_all" placeholder="发消息..." class="layui-input" />
                    <button class="layui-btn layui-btn-normal send-btn" onclick="send()">发送
                    </button>
                </div>
                <div class="msg-toolbar">
                    <a id="face_icon" href="javascript:" onclick="faceon()"><img src="/assets/images/admin/B/smile.png" alt=""></a>
                    <?php if($atype == 'open'): ?>
                    <a onclick="getaudio()"><img src="/assets/images/admin/B/smile.png" alt=""></a>
                    <?php endif; ?>
                    <a id="images" href="javascript:">
                        <form id="picture" enctype="multipart/form-data">
                            <div class="layui-box input-but size">
                                <img src="/assets/images/admin/B/photo.png" alt="">
                                <input type="file" name="upload" class="fileinput" onchange="put()"/>
                            </div>
                        </form>
                    </a>
                    <a id="files" href="javascript:">
                        <form id="file" enctype="multipart/form-data">
                            <div class="layui-box input-but size">
                                <img src="/assets/images/admin/B/file.png" alt="">
                                <input type="file" name="folder" class="fileinput" onchange="putfile()"/>
                            </div>
                        </form>
                    </a>
                    <!-- 推送评价 -->
                    <a id="evaluate" href="javascript:" onclick="toEvaluate()"><img src="/assets/images/mobile/get-evaluate.png" alt=""></a>

                    <a id="trans" href="javascript:" onclick="toTrans()"><img src="/assets/images/admin/B/fanyi.png" alt=""></a>

                </div>
            </div>
        </footer>
        <input type="hidden" id="lang" value="<?php echo $data['lang']; ?>"/>
        <div id='group' class="bg" v-if="openGroup" v-cloak>
            <div class="group">
                <div class="group-title">编辑分组</div>
                <div class="group-list">
                    <div class="group-item" v-for='item in list'>
                        <input class='checkbox' v-model="item.choose" :value="item.id" name='group' type='checkbox'>
                        <span class="group-name">{{item.group_name}}<span class="group-num">({{item.count}})</span></span>
                    </div>
                </div>
                <div class="group-btn">
                    <div @click="openGroup = false" class="group-cancel">取消</div>
                    <div @click="edit" class="group-submit">确定</div>
                </div>
            </div>
        </div>
<script type="application/javascript">
    var se = '<?php echo $se['nick_name']; ?>';
    var visiter_id = '<?php echo $data['visiter_id']; ?>';
    var img = '<?php echo $data['avatar']; ?>';
    var  nickname='<?php echo $data['visiter_name']; ?>';
</script>
<script type="text/javascript" src="/assets/js/admin/mchat.js?v=AI_KF"></script>
</body>

</html>