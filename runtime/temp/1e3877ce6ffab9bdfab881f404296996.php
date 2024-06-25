<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"/var/www/html/www.kefu.com/public/../application/admin/view/index/history.html";i:1715055248;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>history</title>
    <script>
        ROOT_URL = '<?php echo request()->root(); ?>';
    </script>
    <script type="text/javascript" src="/assets/libs/jquery/jquery.min.js?v=AI_KF"></script>
    <script src="/assets/libs/layer/layer.js?v=AI_KF" type="text/javascript"></script>
    <script src="/assets/libs/layui/layui.js?v=AI_KF" type="text/javascript"></script>
    <script src="/assets/libs/jquery/jquery.cookie.js?v=AI_KF" type="text/javascript"></script>

    <link href="/assets/libs/layui/css/layui.css?v=AI_KF" rel="stylesheet">
    <link href="/assets/css/admin/index.css?v=AI_KF" type="text/css" rel="stylesheet" />
    <link href="/assets/css/admin/index_me.css?v=AI_KF" type="text/css" rel="stylesheet" />

    <style>
        body{
            background: #ffffff;
        }
        .outer-left {
            float: left;
            width: 500px;
            position: relative;
            left: 60px;
            top: 20px;
            clear: both;
            font-size: 14px;
        }


        .outer-right {
            float: right;
            width: 500px;
            position: relative;
            right: 60px;
            clear: both;
            font-size: 14px;
        }
        .no_chats-pic {
            display: inline-block;
            width: 138px;
            height: 67px;
            background: url('/assets/images/admin/bgspirt.png') no-repeat;
            background-position: -286px;
            position: absolute;
            top: 300px;
            left: 250px;
        }

        .no_history_icon {
            display: inline-block;
            width: 90px;
            height: 67px;
            background: url('/assets/images/admin/bgspirt.png') no-repeat;
            background-position: -90px;
            position: absolute;
            top: 300px;
            left: 44%;
        }
    </style>

<body>

<div id="wrap" style="width: 100%;height:100%;overflow-y: auto;overflow-x: hidden;">
    <ul class="conversation" style="padding-top: 20px;">



    </ul>
</div>
</body>

<script>

    mindata = null;
    //获取最近历史消息
    function getdata() {

        var avatver,cha;
        var sdata = $.cookie("cu_com");
        if (sdata) {
            var jsondata = $.parseJSON(sdata);
            avatver = jsondata.avatar;
            cha =jsondata.visiter_id;
        }
        var showtime;
        var curentdata =new Date();
        var time =curentdata.toLocaleDateString();
        var cmin =curentdata.getMinutes();

        if($.cookie("allhid") != "" ){
            cid =$.cookie("allhid");
        }else{
            cid ='';
        }



        $.ajax({
            url:ROOT_URL+"/admin/set/history",
            type: "post",
            data: {
                visiter_id: "<?php echo $visiter_id; ?>",hid:cid
            },
            dataType:'json',
            success: function (res) {
                if(res.data.length >0){
                    mindata = res.data[0].cid;
                } else {
                    mindata = null;
                }
                // alert(res);
                if (res.code == 0) {

                    var se = $("#chatmsg_submit").attr("name");
                    var str = "";
                    var data = res.data;
                    var pic = $("#se_avatar").attr('src');

                    $.each(data, function (k, v) {
                        if (v.cid < mindata) {
                            mindata = v.cid;
                        }
                        if(getdata.puttime){
                            if((v.timestamp -getdata.puttime) > 60){
                                var myDate = new Date(v.timestamp*1000);
                                var puttime =myDate.toLocaleDateString();
                                if(puttime == time){
                                    showtime =myDate.getHours()+":"+myDate.getMinutes();
                                }else{
                                    showtime =myDate.getFullYear()+"-"+(myDate.getMonth()+1)+"-"+myDate.getDate()+" "+myDate.getHours()+":"+myDate.getMinutes();
                                }

                            }else{

                                showtime = "";
                            }

                        }else{

                            var myDate = new Date(v.timestamp*1000);
                            var puttime =myDate.toLocaleDateString();
                            if(puttime == time){
                                showtime =myDate.getHours()+":"+myDate.getMinutes();

                            }else{

                                showtime =myDate.getFullYear()+"-"+(myDate.getMonth()+1)+"-"+myDate.getDate()+" "+myDate.getHours()+":"+myDate.getMinutes();
                            }
                        }

                        getdata.puttime = v.timestamp;

                        if (v.direction == 'to_visiter') {

                            str += '<li class="chatmsg"><div class="showtime">'+showtime+'</div>';
                            str += '<div class="" style="position: absolute;top: 26px;right: 2px;"><img  class="my-circle cu_pic" src="' + v.avatar+ '" width="40px" height="40px"></div>';
                            str += "<div class='outer-right'><span style='color: #d2d2d2;position:  absolute;right: -56px;top: -26px;'>"+ v.name +"</span><div class='service'>";
                            str += "<pre>" + v.content + "</pre>";
                            str += "</div></div>";
                            str += "</li>";

                        } else{

                            str += '<li class="chatmsg"><div class="showtime">' +showtime+ '</div><div class="" style="position: absolute;left:3px;">';
                            str += '<p style="color: #d2d2d2;">'+v.name+'</p><img class="my-circle  se_pic" src="' + v.avatar + '" width="40px" height="40px"></div>';
                            str += "<div class='outer-left'><div class='customer'>";
                            str += "<pre>" + v.content + "</pre>";
                            str += "</div></div>";
                            str += "</li>";
                        }
                    });

                    var div = document.getElementById("wrap");
                    if($.cookie("allhid") == ""){

                        $(".conversation").append(str);

                        if(div){
                            div.scrollTop = div.scrollHeight;
                        }
                    }else{
                        $(".conversation").prepend(str);
                        if(res.data.length <= 2){

                            $("#top_div").remove();
                            $(".conversation").prepend("<div id='top_div' class='showtime'>已没有数据</div>");
                            if(div){
                                div.scrollTop =0;
                            }

                        }else{
                            if(div){
                                div.scrollTop =div.scrollHeight/3;
                            }
                        }
                    }
                    if(res.data.length >0){
                        $.cookie("allhid",mindata);

                    }
                }
            }
        });
    }



    document.getElementById("wrap").onscroll = function(){
        var t =  document.getElementById("wrap").scrollTop;
        if( t == 0 ) {

            if(mindata != ""){
                getdata("<?php echo $visiter_id; ?>");
            }
        }
    }



    function init(){

        $.cookie('allhid','');
        getdata();

    }


    window.onload = init();

</script>
</html>
