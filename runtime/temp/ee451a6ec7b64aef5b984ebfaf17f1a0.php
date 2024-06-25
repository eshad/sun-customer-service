<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"/www/wwwroot/www.kefu.com/public/../application/mobile/view/admin/index.html";i:1715055252;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8" />
    <title>AI智能客服管理系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta http-equiv="Access-Control-Allow-Origin" content="*">


    <link rel="stylesheet" href="/assets/libs/layui/css/layui.css?v=AI_KF" />
    <link rel="stylesheet" href="/assets/mobile/css/layout.css?v=AI_KF" />
    <link rel="stylesheet" href="/assets/mobile/css/reset.css?v=AI_KF" />
    <link rel="stylesheet" href="/assets/mobile/css/animate.css?v=AI_KF" />
    <link rel="stylesheet" href="/assets/mobile/css/swiper-3.4.1.min.css?v=AI_KF" />

    <script>
        ROOT_URL = "<?php echo !empty($baseroot)?$baseroot:''; ?>";
    </script>
    <script src="/assets/mobile/js/jquery-1.9.1.min.js?v=AI_KF"></script>
    <script src="/assets/mobile/js/zepto.min.js?v=AI_KF"></script>
    <script src="/assets/mobile/js/fontSize.js?v=AI_KF"></script>
    <script src="/assets/mobile/js/swiper-3.4.1.min.js?v=AI_KF"></script>
    <script src="/assets/mobile/js/wcPop/wcPop.js?v=AI_KF"></script>
    <script src="/assets/libs/push/pusher.min.js?v=AI_KF" type="text/javascript"></script>
    <script src="/assets/libs/jquery/jquery.cookie.js?v=AI_KF" type="text/javascript"></script>
    <script type="text/javascript" src="/assets/libs/layer/layer.js?v=AI_KF"></script>
    <script type="text/javascript" src="/assets/libs/layui/layui.js?v=AI_KF"></script>
    <style>
        .wechat__tabBar ul li.swiper-pagination-bullet-active span {
            color: #1E9FFF;
        }

        .wechat__tabBar {
            position: fixed;
            bottom: 0;
            width: 100%;
            z-index: 1001;
        }

        .wechat-img {
            height: 0.454rem;
            width: 0.454rem;
            margin-top: 0.145rem;
        }

        li.swiper-pagination-bullet-active .wechat-img {
            display: none;
        }

        .wechat-active-img {
            height: 0.454rem;
            width: 0.454rem;
            margin-top: 0.145rem;
            display: none;
        }

        li.swiper-pagination-bullet-active .wechat-active-img {
            display: inline-block;
        }

        .wc__headerBar.fixed {
            padding-bottom: 0.91rem;
        }

        .wc__headerBar .inner {
            height: 0.91rem;
        }

        .wc__headerBar .inner .barTitLg {
            padding-left: 0.2rem;
            font-size: 14px;
        }

        .wc__ucenter-list ul li {
            margin-top: 0;
        }

        .wc__ucenter-list ul li .person-info {
            padding: 0;
            height: 3.244rem;
            margin-bottom: 0.29rem;
        }

        .person-info .info-bg {
            width: 100%;
            height: 1.45rem;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1;
        }

        .wc__ucenter-list ul li .item .uimg {
            height: 1.359rem;
            width: 1.359rem;
            border-radius: 50%;
            margin: 0;
            position: absolute;
            top: 0.453rem;
            left: 50%;
            margin-left: -0.6795rem;
            z-index: 5;
            border: 2px solid #fff;
        }

        .wc__ucenter-list ul li .item .username {
            position: absolute;
            display: block;
            width: 100%;
            top: 2rem;
            text-align: center;
        }

        .wc__ucenter-list ul li .person-item {
            padding-left: 0;
            padding-right: 0;
            height: 1.36rem;
        }

        .wc__ucenter-list ul li .item:after {
            left: 0;
            right: 0;
        }

        .person-info-img {
            margin-left: 0.435rem;
            height: 0.726rem;
            width: 0.726rem;
            margin-right: 0.29rem;
        }

        .wc__ucenter-list ul li .item .person-label {
            color: #999999;
            position: absolute;
            top: 0.28rem;
            left: 1.433rem;
        }

        .wc__ucenter-list ul li .item .person-label+.txt {
            color: #555;
            font-size: 0.3rem;
            position: absolute;
            left: 1.433rem;
            top: 0.65rem;
        }

        .wc__ucenter-list ul li .item.quit {
            width: 80%;
            height: 0.798rem;
            line-height: 0.798rem;
            border-radius: 0.394rem;
            border: 1px solid #dddddd;
            margin: 0.29rem auto 0;
        }

        .wc__ucenter-list ul li .item.quit span {
            font-size: 0.3rem;
            color: #555555;
            text-align: center;
            width: 100%;
            display: block;
        }

        .switch div {
            width: 100%;
        }

        .wc__recordChat-list ul li.online .img img,.wc__recordChat-list ul li.offline .img img{
            width: 0.798rem;
            height: 0.798rem;
            margin-top: 0.151rem;
            border-radius: 50%;
        }

        .wc__recordChat-list ul li .img {
            margin-right: 0.05rem;
            height: 1.1rem;
        }

        .wc__recordChat-list ul li .img .wc__badge {
            line-height: 0.363rem;
            height: 0.363rem;
            border-radius: 0.1815rem;
            padding: 0 0.114rem;
            position: absolute;
            top: 45%;
            right: -590%;
        }

        .layui-form-switch i {
            background-color: #fff;
        }

        .layui-form-switch {
            background-color: #d2d2d2;
        }

        .layui-form-onswitch {
            background-color: #5FB878;
        }

        .wolive_head p{
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp:2;
            -webkit-box-orient: vertical;
        }
        .wolive_head p:first-child{
            -webkit-line-clamp:1; !important;
        }
        .wolive_head .wolive_price{
            color: red;
        }

        .search {
            height: 1rem;
            position: relative;
            background-color: #fff;
        }

        .search-input {
            position: absolute;
            top: 0.2rem;
            left: 0.25rem;
            width: 75%;
            height: 0.6rem;
            line-height: 0.6rem;
            background-color: #F2F5F7;
            border: 0;
            padding-left: 0.7rem;
            border-radius: 0.3rem;
        }

        .search-icon {
            left: 0.5rem;
            height: 0.3rem;
            width: 0.3rem;
            top: 0.35rem;
        }

        .add-icon {
            right: 0.9rem;
            height: 0.6rem;
            width: 0.6rem;
            top: 0.2rem;
        }

        .edit-icon {
            right: 0.2rem;
            height: 0.6rem;
            width: 0.6rem;
            top: 0.2rem;
        }

        .search-icon,.add-icon,.edit-icon {
            z-index: 3;
            position: absolute;
        }

        .list{
            max-height: 400px;
            overflow: auto;
        }

        .list-item {
            height: 1rem;
            line-height: 1rem;
            padding: 0 0.5rem 0 0.25rem;
            background-color: #fff;
            color: #353535;
            border-bottom: 0.01rem solid #DDDDDD;
            position: relative;
            font-size: 15px;
        }

        .list-item span {
            color: #999999;
            margin-left: 0.05rem;
        }

        .list-item .right-icon {
            position: absolute;
            height: 0.24rem;
            width: 0.12rem;
            top: 0.38rem;
            right: 0.15rem;
            display: block;
        }

        .black-list {
            background-color: #F7F7F7;
            padding-top: 0.15rem;
            height: 100%;
            overflow: hidden;
        }

        .black-list .list-item {
            border-bottom: 0;
        }

        .bg,.clearAll {
            position: fixed;
            height: 100%;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.3);
            top: 0;
            left: 0;
            z-index: 99995;
            display: none;
        }

        .add-group {
            display: none;
            height: 3.4rem;
            width: 6rem;
            position: fixed;
            top: 3.9rem;
            left: 0;
            right: 0;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 0.15rem;
            z-index: 99999;
        }

        .add-group-title {
            height: 1.2rem;
            line-height: 1.2rem;
            text-align: center;
            font-weight: bold;
            font-size: 14px;
        }

        .add-group-body {
            height: 1.3rem;
            width: 6rem;
            padding: 0 0.2rem;
        }

        .add-group-input {
            height: 0.8rem;
            width: 5.6rem;
            border-radius: 0.4rem;
            border: 1px solid #DDDDDD;
            padding: 0.35rem;
            font-size: 15px;
        }

        .add-group-btn {
            height: 0.9rem;
            width: 6rem;
            position: relative;
        }

        .add-group-cancel,.add-group-submit,.clear-submit {
            width: 3rem;
            height: 0.9rem;
            line-height: 0.9rem;
            text-align: center;
            font-size: 14px;
            position: absolute;
            bottom: 0;
        }

        .add-group-cancel {
            color: #555555;
            background-color: #F5F5F5;
            border-bottom-left-radius: 0.15rem;
            left: 0;
        }

        .add-group-submit,.clear-submit {
            background-color: #2E9FFF;
            color: #fff;
            border-bottom-right-radius: 0.15rem;
            right: 0;
        }

        .list-item input[type='checkbox'] {
            width: 0.32rem;
            height: 0.32rem;
            border-radius: 50%;
            margin-right: 0.2rem;
            background-color: #fff;
            background: url("/assets/images/mobile/select.png") no-repeat center;
            background-size: 0.32rem 0.32rem;
            font-size: 12px;
            display: none;
            position: relative;
            top: 0.04rem;
            -webkit-appearance:none;
            outline: none;
        }

        .list-item input[type=checkbox]:checked{
            background: url("/assets/images/mobile/select-active.png") no-repeat center;
            background-size: 0.32rem 0.32rem;
        }

        .edit-btn {
            display: none;
            height: 1.1rem;
            position: absolute;
            bottom: 1.1rem;
            left: 0;
            right: 0;
            width: 100%;
            z-index: 100;
        }

        .edit-del-btn,.edit-cancel-btn {
            position: absolute;
            bottom: 0;
            width: 50%;
            height: 1.1rem;
            line-height: 1.1rem;
            display: inline-block;
            text-align: center;
            font-size: 14px;
        }

        .edit-cancel-btn {
            left: 0;
            border: 0.01rem solid #EBEBEB;
            background-color: #fff;
            border-right: 0;
            color: #999999;
        }

        .edit-del-btn {
            right: 0;
            background-color: #FF5C5C;
            color: #fff;
        }

        input[type=search]::-webkit-search-cancel-button{
            -webkit-appearance: none;/*此处只是去掉默认的小×*/
        }

        .clear-btn {
            position: fixed;
            top: 8rem;
            right: 0.5rem;
            z-index: 200;
            height: 0.87rem;
            width: 0.87rem;
        }
    </style>
</head>
<body>
<audio id="chat-message-audio">
    <source id="chat-message-audio-source" src="<?php echo $voice_address; ?>" type="audio/mpeg" />
</audio>
<!-- <>wolive主容器 -->
<div class="wechat__panel clearfix">
    <div class="wc__home-wrapper flexbox flex__direction-column">
        <!-- //顶部 -->
        <div class="wc__headerBar fixed">
            <div class="inner flexbox">
                <h2 class="barTit barTitLg flex1 auto-play">AI智能客服系统</em></h2>
            </div>
        </div>
        <!-- //4个tabBar滑动切换 -->
        <div class="wc__swiper-tabBar flex1">
            <div class="swiper-container" style="height: 100%">
                <div class="swiper-wrapper">
                    <!--<img class="clear-btn" src="/assets/images/index/clear.png">-->
                    <!-- //1、）wolive主页-->
                    <div class="swiper-slide" data-history="index">
                        <div class="wc__scrolling-panel">
                            <!-- //聊天记录信息 -->
                            <div class="wc__recordChat-list" id="J__recordChatList">
                                <ul class="clearfix">

                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- //2、通讯录-->
                    <div class="swiper-slide"  data-history="book">
                        <div class="wc__scrolling-panel">
                            <div class="wc__recordChat-list" id="J__addrFriendList">
                                <div class="msg"></div>
                                <ul class="clearfix">


                                </ul>
                            </div>
                        </div>

                    </div>
                    <!-- 3、客户分组 -->
                    <div class="swiper-slide" data-history="group" style="background-color: #fff;height: 100%">
                        <div class="wc__scrolling-panel">
                            <div class="wc__group-list" id="J__groupList">
                                <div class="search">
                                    <form action="" id="searchForm" onsubmit="return false">
                                        <input class="search-input" type="search" placeholder="搜索">
                                    </form>
                                    <img class="search-icon" src="/assets/images/mobile/search.png" alt="">
                                    <img class="add-icon" src="/assets/images/mobile/add.png" alt="">
                                    <img class="edit-icon" src="/assets/images/mobile/edit.png" alt="">
                                </div>
                                <div class="list">
                                    <div class='list-item' id="0">全部用户<span></span><img class='right-icon' src='/assets/images/mobile/icon-jiantou-r.png' alt=''></div>
                                </div>
                                <div class="black-list">
                                    <div class='list-item' id="-1">黑名单<span></span><img class='right-icon' src='/assets/images/mobile/icon-jiantou-r.png' alt=''></div>
                                </div>
                                <div class="edit-btn">
                                    <div class="edit-cancel-btn">取消</div>
                                    <div class="edit-del-btn">删除</div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- //5、我-->
                    <div class="swiper-slide"  data-history="my">
                        <div class="wc__scrolling-panel">
                            <div class="wc__ucenter-list" id="J__ucenterList">
                                <ul class="clearfix">
                                    <li>
                                        <div class="item flexbox flex-alignc wc__material-cell person-info" style="background: #1E9FFF">
                                            <img class="uimg" src="<?php echo $mine['avatar']; ?>" />
                                            <span class="txt username flex1">
                                                    <em style="color: #fff"><?php echo $mine['nick_name']; ?></em><i style="color: #fff">登录名：<?php echo $mine['user_name']; ?></i>
                                            </span>
                                        </div>
                                    </li>

                                    <li class="auto-play">
                                        <div class="item flexbox flex-alignc wc__material-cell">
                                            <img style="height: 0.363rem;width: 0.363rem;margin-right: 0.217rem" src="/assets/images/mobile/tip.png" alt="">
                                            <span class="txt flex1">提示音</span>
                                            <div class="txt layui-form switch" style="width: 0.798rem">
                                                <?php if($voice == 'open'): ?>
                                                <input type="checkbox" lay-skin="switch" lay-filter="voice" checked>
                                                <?php else: ?>
                                                <input type="checkbox" lay-skin="switch" lay-filter="voice">
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                    </li>
                                    <li style="border-top: 1px solid #ebeff0">
                                        <div class="item flexbox flex-alignc wc__material-cell">
                                            <img style="height: 0.363rem;width: 0.363rem;margin-right: 0.217rem" src="/assets/images/mobile/share.png" alt="">
                                            <span class="txt flex1">智能分配</span>
                                            <div class="txt layui-form switch" style="width: 0.798rem">
                                                <?php if($method == 'auto'): ?>
                                                <input type="checkbox" lay-skin="switch" lay-filter="method" checked>
                                                <?php else: ?>
                                                <input type="checkbox" lay-skin="switch" lay-filter="method">
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="item flexbox flex-alignc wc__material-cell quit" routeUrl="<?php echo url('admin/login/logout',['business_id'=>$seo['id']]); ?>">
                                            <span class="txt">退出</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- //底部tabbar -->
        <div class="wechat__tabBar">
            <div class="bottomfixed wc__borT">
                <ul class="flexbox flex-alignc wechat-pagination">

                </ul>
            </div>
        </div>

        <!-- 添加分组 -->
        <div class="bg">
            <div class="add-group">
                <div class="add-group-title">添加分组</div>
                <div class="add-group-body"><input class="add-group-input" type="text" placeholder="请输入分组名，最多12个字"></div>
                <div class="add-group-btn">
                    <div class="add-group-cancel">取消</div>
                    <div class="add-group-submit">确定</div>
                </div>
            </div>
        </div>

        <!-- 删除记录 -->
        <div class="clearAll">
            <div class="add-group">
                <div class="add-group-title"></div>
                <div class="add-group-body" style="text-align:center;font-size:16px;">确认清空当前会话列表？</div>
                <div class="add-group-btn">
                    <div class="add-group-cancel">取消</div>
                    <div class="clear-submit">确定</div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- 左右滑屏切换.Start -->
<script type="text/javascript">
    var chatSwiper = new Swiper('.swiper-container',{
        pagination: '.wechat-pagination',
        paginationClickable: true,
        history: 'admin',
        paginationBulletRender: function (chatSwiper, index, className) {
            switch (index) {
                case <?php echo $i=0; ?>:
                    name='<img class="wechat-img" src="/assets/images/mobile/talk.png" alt=""><img class="wechat-active-img" src="/assets/images/mobile/talk-active.png" alt=""><span class="wechat-text">会话</span>';
                    break;
                case <?php echo ++$i; ?>:
            name='<img class="wechat-img" src="/assets/images/mobile/receive.png" alt=""><img class="wechat-active-img" src="/assets/images/mobile/receive-active.png" alt=""><span class="wechat-text">待认领</span>';
            break;
        case <?php echo ++$i; ?>:
            name='<img class="wechat-img" src="/assets/images/mobile/group.png" alt=""><img class="wechat-active-img" src="/assets/images/mobile/group-active.png" alt=""><span class="wechat-text">客户分组</span>';
            break;

            case <?php echo ++$i; ?>:
                name='<img class="wechat-img" src="/assets/images/mobile/person.png" alt=""><img class="wechat-active-img" src="/assets/images/mobile/person-active.png" alt=""><span class="wechat-text">我</span>';
                break;
            default: name='';
            }
            return '<li class="flex1 ' + className + '">' + name + '</li>';
        }
        });

</script>
<!-- 左右滑屏切换 end -->

<script type="text/javascript">
    /** __公共函数 */
    $(function(){
        // 禁止长按弹出系统菜单
        $(".wechat__panel").on("contextmenu", function(e){
            e.preventDefault();
        });
    });

    /** __自定函数 */
    $(function(){
    	var audio = document.getElementById("chat-message-audio");
    	layer.confirm('客服工作台加载成功', {
		  btn: ['确定'] //按钮
		}, function(index){
			audio.play();
			layer.close(index);
		});
        //***1、wolive-------------------------
        // 聊天记录页面（长按操作）
        $("#J__recordChatList").on("longTap", "li", function(e){
            var that = $(this);
            wcPop({
                skin: 'androidSheet',
                shadeClose: true,
                btns: [
                    {
                        text: '删除该聊天',
                        style: 'line-height:50px;',
                        onTap() {
                            $.ajax({
                                url:ROOT_URL+"/admin/set/deletes",
                                type: "post",
                                data: {
                                    visiter_id: that.attr('visiter_id')
                                },
                                dataType: 'json',
                                success: function(res) {
                                    that.fadeOut("fast", function(){
                                        that.remove();
                                        count_unread_message();
                                    });
                                }
                            });
                            wcPop.close();
                        }
                    }
                ]
            });
        });
        // 跳转链接
        $(".wechat__panel").on("click", "*[routeUrl]", function(e){
            var routeurl = $(this).attr('routeUrl');
            if(!routeurl) return;
            $("#"+$(this).attr('id')+" .img .wc__badge").remove();
            count_unread_message();
            window.location.href = routeurl;
        });

        // 访客认领
        $(".wechat__panel").on("click", "*[accept]", function(e){
            var visiter_id = $(this).attr('accept');
            if(!visiter_id) return;
            var that = $(this);
            $.ajax({
                url:ROOT_URL+"/admin/set/get",
                type: "post",
                data: {
                    visiter_id: visiter_id
                },
                dataType: 'json',
                success: function(res) {
                    if (res.code == 0) {
                        $('#'+that.attr('id')+' .desc').html('<i style="color:darkgreen">认领成功</i>');
                        that.fadeOut("slow", function(){
                            that.remove();
                            count_unaccept();
                        });
                    }
                    getchat();
                }
            });

        });

        // 对话列表
        function getchat() {
            $.ajax({
                url:ROOT_URL+"/admin/set/getchats",
                success: function (res) {
                    if (res.code == 0) {
                        $('.clear-btn').show();
                        var sdata = $.cookie('cu_com');
                        if (sdata) {
                            var json = $.parseJSON(sdata);
                            var debug = json.visiter_id;
                        } else {
                            var debug = "";
                        }
                        var data = res.data;
                        var a = '';
                        $('#J__recordChatList > ul').empty();
                        var all_list = '';
                        $.each(data, function (k, item) {
                            let count = item.count
                            if(count > 99) {
                                count = '99+'
                            }
                            item.visiter_name=item.visiter_name?item.visiter_name:'游客'+item.visiter_id;
                            var uname=item.name?item.name:item.visiter_name;
                            var unread_str = count ? '<em class="wc__badge">'+count+'</em>' : '';
                            var _tpl = [
                                '<li class="flexbox wc__material-cell '+item.state+'" visiter_id="'+item.visiter_id+'" id="visiter-'+item.visiter_id+'" routeUrl="'+ item.mobile_route_url +'">\
                                <div class="img"><img src="'+item.avatar+'"/>'+unread_str+'</div>\
                                    <div class="info flex1">\
                                    <h2 class="title">'+uname+'</h2>\
                                    <p class="desc clamp1">'+item.content+'</p>\
                                </div>\
                                <label class="time">'+item.timestamp+'</label>\
                            </li>'
                            ].join("");
                            all_list += _tpl;
                        });
                        $('#J__recordChatList > ul').append(all_list);
                        count_unread_message();
                    }else {
                        $('.clear-btn').hide();
                    }
                }
            });
        }

        $('#searchForm').on('keypress',function(e) {
            var keycode = e.keyCode;
            var searchName = $(this).find('input').val();
            if(keycode=='13') {
                if(searchName.length > 0) {
                    window.location.href = ROOT_URL + '/mobile/admin/user?id=' + searchName;
                    $('.search-input').val('');
                }else {
                    layer.msg('搜索内容不得为空');
                }
            }
        });

        function getgroup(page,name) {
            $.ajax({
                url:ROOT_URL+"/admin/custom/group",
                data: {
                    page: page
                },
                success: function (res) {
                    if (res.code == 0) {
                        let list = res.data.data;
                        $('.list > .list-item:first').find('span').text('('+res.allcount+')')
                        $('.black-list > .list-item:first').find('span').text('('+res.blackcount+')')
                        let last = $('.list > .list-item:last').attr("id");
                        if(list.length > 0) {
                            let item = list[list.length - 1];
                            if(name != undefined) {
                                if(name == item.group_name) {
                                    let group = "<div class='list-item' id='"+item.id+"'><input class='checkbox' name='group' value='"+item.id+"' type='checkbox'>"+item.group_name+"<span>("+item.count+")</span><img class='right-icon' src='/assets/images/mobile/icon-jiantou-r.png' alt=''></div>"
                                    $('#J__groupList > .list').append(group);
                                    $('.add-group-input').val('');
                                    $('.bg').toggle();
                                    $('.add-group').toggle();
                                }else {
                                    getgroup(page+1,name);
                                }
                            }else {
                                let index = -1;
                                for(let i = 0; i <list.length;i++) {
                                    if(last == list[i]) {
                                        index = i;
                                    }
                                }
                                if(index == -1) {
                                    let group = "";
                                    $.each(list, function (k, item) {
                                        group += "<div class='list-item' id='"+item.id+"'><input class='checkbox' name='group' value='"+item.id+"' type='checkbox'>"+item.group_name+"<span>("+item.count+")</span><img class='right-icon' src='/assets/images/mobile/icon-jiantou-r.png' alt=''></div>"
                                    });
                                    $('#J__groupList > .list').append(group);
                                }
                                if(list.length == 10) {
                                    getgroup(page+1);
                                }
                            }

                        }
                    }
                }
            });
        }


        // 获取排队列表
        function getwait() {

            $.ajax({
                url:ROOT_URL+"/admin/set/getwait",
                dataType: 'json',
                success: function (res) {
                    if (res.code == 0) {
                        var all_list = '';
                        $("#J__addrFriendList > ul").empty();
                        $.each(res.data, function (k, item) {
                            item.visiter_name=item.visiter_name?item.visiter_name:'游客'+item.visiter_id;
                            var uname=item.name?item.name:item.visiter_name;
                            var _tpl = [
                                '<li class="flexbox wc__material-cell '+item.state+'" id="accept-visiter-'+item.visiter_id+'" accept="'+item.visiter_id+'">\
                                <div class="img"><img src="'+item.avatar+'"/></div>\
                                    <div class="info flex1">\
                                    <h2 class="title">'+uname+'</h2>\
                                    <p class="desc clamp1">点击认领</p>\
                                </div>\
                                <label class="time">'+item.timestamp+'</label>\
                            </li>'
                            ].join("");
                            all_list += _tpl;
                        });
                        $("#J__addrFriendList > ul").append(all_list);
                        count_unaccept();
                    }
                }

            });
        }

        $(document).on("click", ".add-icon", function(){
            $('.bg').toggle();
            $('.add-group').toggle();
        });

        $(document).on("click", ".clear-btn", function(){
            $('.clearAll').toggle();
            $('.add-group').toggle();
        });


        $(document).on("click", ".edit-icon", function(){
            $('.checkbox').toggle();
            $('.edit-btn').toggle();
        });

        $(document).on("click", ".edit-cancel-btn", function(){
            $('.checkbox').toggle();
            $('.edit-btn').toggle();
        });

        $(document).on("click", ".list-item", function(){
            let id = $(this).attr("id");
            if(id == 0) {
                window.location.href = ROOT_URL + '/mobile/admin/user?id=' + id;
            }else {
                if($('.checkbox').css('display')=='none') {
                    window.location.href = ROOT_URL + '/mobile/admin/user?id=' + id;
                }
            }
        });

        $(document).on("click", ".edit-del-btn", function(){
            let group_id = [];
            var obj = document.getElementsByName("group");
            for(var i=0;i<obj.length;i++){
                if(obj[i].checked)
                    group_id.push(obj[i].value);
            }
            $.ajax({
                url:ROOT_URL+"/admin/custom/delGroups",
                type: "post",
                data: {
                    id: group_id
                },
                dataType: 'json',
                success: function(res) {
                    if (res.code == 0) {
                        $('.checkbox').toggle();
                        $('.edit-btn').toggle();
                        for(let i = 0;i < group_id.length;i++) {
                            num = '#'+group_id[i];
                            $(num).remove();
                        }
                    }
                }
            });
        });

        $(document).on("click", ".add-group-cancel", function(){
            $('.add-group-input').val('');
            $('.bg').hide();
            $('.clearAll').hide();
            $('.add-group').hide();
        });

        $(document).on("click", ".add-group-submit", function(){
            let group_name =  $('.add-group-input').val();
            $.ajax({
                url:ROOT_URL+"/admin/custom/editgroup",
                type:'post',
                data: {
                    group_name: group_name
                },
                success: function (res) {
                    if (res.code == 0) {
                        let length = $('.list > .list-item').length;
                        let index = parseInt(length/10)+1;
                        getgroup(index,group_name);
                    }
                }
            });
        });

        $(document).on("click", ".clear-submit", function(){
            $.ajax({
                url:ROOT_URL+"/admin/set/clear",
                type: "post",
                data: {
                    id: config.service_id
                },
                success: function (res) {
                    if (res.code ==0) {
                        $('.clearAll').hide();
                        $('.add-group').hide();
                        $('.clear-btn').hide();
                        $('#J__recordChatList .clearfix').empty();
                    }
                }
            });
        });
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
        /* var voice = function() {
            var audio = document.createElement("audio");
            audio.src = "<?php echo $voice_address; ?>";
            audio.play();
        }; */
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

        function count_unread_message() {
            var total_unread_count = 0;
            $.each($("#J__recordChatList .wc__badge"), function(i, n){
                total_unread_count += parseInt($(n).html());
            });
            if (total_unread_count) {
                if (!$(".wechat__tabBar .layui-icon-reply-fill .wc__badge").length) {
                    $(".wechat__tabBar .layui-icon-reply-fill").html('<em class="wc__badge">0</em>');
                }
                $(".wechat__tabBar .layui-icon-reply-fill .wc__badge").html(total_unread_count);
            } else {
                $(".wechat__tabBar .layui-icon-reply-fill .wc__badge").remove();
            }
        }

        function count_unaccept() {
            var total_unaccept_count = $("#J__addrFriendList ul li").length;
            if (total_unaccept_count) {
                if (!$(".wechat__tabBar .layui-icon-group .wc__badge").length) {
                    $(".wechat__tabBar .layui-icon-group").html('<em class="wc__badge">0</em>');
                }
                $(".wechat__tabBar .layui-icon-group .wc__badge").html(total_unaccept_count);
                $("#J__addrFriendList .msg").empty();
            } else {
                $(".wechat__tabBar .layui-icon-group .wc__badge").remove();
                $("#J__addrFriendList .msg").html('<div class="nothing">无数据<div>');
            }
        }

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


            var channel = pusher.subscribe("kefu" + config.service_id);
            // 发送一个推送
            channel.bind("callbackpusher",function(data){
                $.post("<?php echo url('admin/set/callback','',true,true); ?>",data,function(res){

                })
            });

            channel.bind('getswitch',function(data){
                console.log(data);
                getchat();
            });

            channel.bind("cu-event", function (data) {
                if(config.voice_state=='open'){
                    audio.play();
                }
                if (!$("#visiter-"+data.message.visiter_id+" .desc").length) {
                    getchat();
                    return;
                }
                var str = data.message.content;
                str.replace(/<img [^>]*src=['"]([^'"]+)[^>]*>/gi, function (match, capture) {

                    var pos = capture.lastIndexOf("/");
                    var value = capture.substring(pos + 1);

                    if (value.indexOf("emo") == 0) {
                        str = '[表情]';
                    } else {
                        str = '[图片]';
                    }
                });

                str = str.replace(/<div><a[^<>]+>.+?<\/a><\/div>/, '[文件]');

                str = str.replace(/<img src=['"]([^'"]+)[^>]*>/gi, '[图片]');

                $("#visiter-"+data.message.visiter_id+" .desc").html(str);
                $("#visiter-"+data.message.visiter_id+" .time").html('刚刚');

                if (!$("#visiter-"+data.message.visiter_id+" .img .wc__badge").length) {
                    $("#visiter-"+data.message.visiter_id+" .img").append('<em class="wc__badge">0</em>');
                }
                var $wc__badge = $("#visiter-"+data.message.visiter_id+" .img .wc__badge");
                var unread_count = parseInt($wc__badge.html()) + 1;
                if (unread_count > 99) {
                    unread_count = "99+";
                }
                $wc__badge.html(unread_count);
                count_unread_message();
            });


            // 通知 游客离线
            channel.bind("logout", function (data) {
                getchat();
            });

            channel.bind("geton", function (data) {
                getchat();
            });

            // 认领后获取访客信息
            var channelme = pusher.subscribe("ud" + config.service_id);
            channelme.bind("on_notice", function (data) {
                getwait();
                getchat();

            });
            // 公共频道

            var channelall = pusher.subscribe("all" + config.business_id);
            channelall.bind("on_notice", function (data) {
                //console.log(data);
                //layer.msg(data.message);
                getwait();
            });


            pusher.connection.bind('state_change', function (states) {
                // states = {previous: 'oldState', current: 'newState'}
                if (states.current == 'unavailable' || states.current == "disconnected" || states.current == "failed") {
                    // pusher.disconnect();
                    pusher.unsubscribe("kefu" + config.service_id);
                    pusher.unsubscribe("all" + config.business_id);
                    pusher.unsubscribe("ud" + config.service_id);
                    wolive_connect();
                }

            });

            pusher.connection.bind('connected', function () {
                getchat();
                getgroup(1);
                getwait();
            });
        }


        wolive_connect();

        var uploadVoice=function(){

            $("#voiceform").ajaxSubmit({
                url: '<?php echo url("admin/manager/uploadvoice"); ?>',
                type: "post",
                dataType:'json',
                success: function (res) {
                    if(res.code == 0){
                        layer.msg(res.msg,{icon:1});
                    }else{
                        layer.msg(res.msg,{icon:2});
                    }

                }
            });

        }

        var getswitchmethod =function(res){
            $.ajax({
                url:ROOT_URL+'/admin/set/getswitchmodel',
                type:'post',
                dataType:'json',
                data:{type:res},
                success:function(res){
                }
            });
        }

        var changeMethod=function(data){


            var checkStatus = data.elem.checked;
            if(checkStatus){
                //智能
                getswitchmethod('auto');
            }else{
                //认领
                getswitchmethod('claim');
            }



        }

        var getvideoswitch =function(res){

            $.ajax({
                url:ROOT_URL+'/admin/set/videoswitch',
                type:'post',
                dataType:'json',
                data:{type:res},
                success:function(res){

                }
            })
        }

        var changeVideo=function(data){

            var checkStatus = data.elem.checked;
            if(checkStatus){
                // open
                getvideoswitch('open');
            }else{
                //close
                getvideoswitch('close');
            }

        }


        var getaudioswitch=function(res){

            $.ajax({
                url:ROOT_URL+'/admin/set/audioswitch',
                type:'post',
                dataType:'json',
                data:{type:res},
                success:function(res){
                    config.voice_state=res;
                }
            });
        }

        var changeAudio=function(data){

            var checkStatus = data.elem.checked;
            if(checkStatus){
                // open
                getaudioswitch('open');
            }else{
                //close
                getaudioswitch('close');
            }
        }


        var getswitchvoice =function(res){

            $.ajax({
                url:ROOT_URL+'/admin/set/voiceswitch',
                type:'post',
                dataType:'json',
                data:{type:res},
                success:function(res){

                }
            })

        }


        var changeVoice=function(data){

            var checkStatus = data.elem.checked;
            if(checkStatus){
                // open
                getswitchvoice('open');
            }else{
                //close
                getswitchvoice('close');
            }
        }

        layui.use('form', function(){
            var form = layui.form;
            form.on('switch(method)',changeMethod);
            form.on('switch(video)',changeVideo);
            form.on('switch(audio)',changeAudio);
            form.on('switch(voice)',changeVoice);
        });



    });
</script>

</body>
</html>