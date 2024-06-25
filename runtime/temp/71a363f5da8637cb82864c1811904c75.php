<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"/var/www/html/www.kefu.com/public/../application/service/view/index/service.html";i:1715055254;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>客服列表</title>
    <script>
        ROOT_URL = '<?php echo request()->root(); ?>';
    </script>
    <link rel="stylesheet" href="/assets/libs/layui/css/layui.css?v=AI_KF">
    <script type="text/javascript" src="/assets/libs/jquery/jquery.min.js?v=AI_KF"></script>
    <script src="/assets/libs/layer/layer.js?v=AI_KF" type="text/javascript"></script>
    <style>
        .layim-msgbox li {
            padding: 0 24px;
            height: 80px;
        }

        .layim-msgbox .layim-msgbox-tips {
            margin: 0;
            padding: 10px 0;
            border: none;
            text-align: center;
            color: #999;
        }

        .layim-msgbox .layim-msgbox-system {
            padding: 0 10px 10px 10px;
        }

        .layim-msgbox li p span {
            padding-left: 5px;
            color: #999;
        }

        .layim-msgbox li p em {
            font-style: normal;
            color: #FF5722;
        }

        .layim-msgbox-avatar {
            margin-top: 17px;
            height: 46px;
            width: 46px;
            float: left;
            margin-right: 16px;
        }

        .layim-msgbox-user {
            height: 80px;
            line-height: 80px;
            display: inline-block;
            color: #555555;
            width: 50%;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .layim-msgbox-content {
            margin-top: 3px;
        }

        .layim-msgbox .layui-btn-small {
            padding: 0 15px;
            margin-left: 5px;
        }

        .layim-msgbox-btn {
            float: right;
            margin-top: 24px;
            height: 32px;
            line-height: 32px;
            width: 66px;
            border-radius: 16px;
            background-color: #1E9FFF;
            color: #fff;
            text-align: center;
            cursor: pointer;
        }

        .layim-msgbox-btn.layui-btn-disabled {
            background-color: #dddddd;
        }

        .icon_gray {
            -webkit-filter: grayscale(100%);
            -ms-filter: grayscale(100%);
            filter: grayscale(100%);
            filter: gray;
        }
    </style>
</head>
<body>

<ul class="layim-msgbox" id="LAY_view">

    <?php if($service): foreach($service as $se): ?>
      
         <li>

            <?php if($se['state'] == 'offline'): ?>
            <a>
                <img src="<?php echo $se['avatar']; ?>" class="layui-circle layim-msgbox-avatar icon_gray">
            </a>
             <span class="layim-msgbox-user">
                <a><?php echo $se['nick_name']; ?></a>
            </span>
            <button class="layui-btn layim-msgbox-btn layui-btn-disabled" id='se<?php echo $se['service_id']; ?>'>转接</button>
            <?php else: ?>
            <a>
                <img src="<?php echo $se['avatar']; ?>" class="layui-circle layim-msgbox-avatar">
            </a>
             <span class="layim-msgbox-user">
                <a><?php echo $se['nick_name']; ?></a>
            </span>
            <button class="layui-btn layim-msgbox-btn" id='se<?php echo $se['service_id']; ?>' onclick='changese(<?php echo $se['service_id']; ?>)'>转接</button>
            <?php endif; ?>
           
        </li>
       <?php endforeach; else: ?>
       <div class="layui-flow-more">
            <li class="layim-msgbox-tips">暂无其他客服</li>
        </div>

    <?php endif; ?>

</ul>

<script src="/assets/libs/layui/layui.js?v=AI_KF"></script>
<script>
  
    var changese = function(id){
  
       var initdata={
          id:id,
          visiter_id:'<?php echo $visiter_id; ?>',
          name:'<?php echo $name; ?>'
       };
  
       $.ajax({
          url:ROOT_URL+'/service/index/getswitch',
          type:'post',
          data:initdata,
          dataType:'json',
          success:function(res){
              if(res.code == 0){
                  layer.msg('转接成功',{end:function(){
                      $("#se"+id).addClass('layui-btn-disabled');
                      parent.getchat();
                      layer.close();
                   }});
  
              }
          }
       });
  
       
    }
  
  </script>
</body>
</html>
