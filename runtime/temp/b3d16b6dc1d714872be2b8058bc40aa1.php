<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"/www/wwwroot/www.kefu.com/public/../application/backend/view/busines/edit.html";i:1715055248;}*/ ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/static/component/pear/css/pear.css" />
</head>
<body>
    <form class="layui-form" action="">
        <div class="mainBox">
            <input type="hidden" name="id" value="<?php echo $business['id']; ?>"/>
            <div class="main-container">
                <div class="layui-form-item">
                    <label class="layui-form-label">有效期</label>
                    <div class="layui-input-block">
                        <input type="text" name="expire_time" lay-verify="required" placeholder="请选择有效期" autocomplete="off" value="<?php if($business['expire_time'] != 0): ?><?php echo date('Y-m-d H:i:s',$business['expire_time']); else: ?>0<?php endif; ?>" class="layui-input" id="valid_time">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">坐席数量</label>
                    <div class="layui-input-block">
                        <input type="number" name="max_count" value="<?php echo $business['max_count']; ?>" lay-verify="required"  placeholder="请输入坐席数量" class="layui-input" autocomplete="off">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">登录密码</label>
                    <div class="layui-input-block">
                        <input type="password" name="password" value=""  placeholder="输入则为重置密码" class="layui-input" autocomplete="off">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">默认语言</label>
                    <div class="layui-input-block">
                        <select name="lang">
                            <option value="">请选择默认语言</option>
                            <?php $_6639c097136de=config('lang'); if(is_array($_6639c097136de) || $_6639c097136de instanceof \think\Collection || $_6639c097136de instanceof \think\Paginator): if( count($_6639c097136de)==0 ) : echo "" ;else: foreach($_6639c097136de as $key=>$vo): ?>
                            <option value="<?php echo $key; ?>" <?php if($business['lang'] == $key): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom">
        <div class="button-container">
            <button type="submit" class="layui-btn layui-btn-normal layui-btn-sm" lay-submit="" lay-filter="save">
                <i class="layui-icon layui-icon-ok"></i>
                提交
            </button>
            <button type="reset" class="layui-btn layui-btn-primary layui-btn-sm">
                <i class="layui-icon layui-icon-refresh"></i>
                重置
            </button>
        </div>
    </div>
</form>
<script src="/static/component/layui/layui.js"></script>
<script src="/static/component/pear/pear.js"></script>
<script>
layui.use(['form','jquery','laydate'],function(){
    let form = layui.form;
    let $ = layui.jquery;
    let laydate = layui.laydate;

    laydate.render({
        elem: "#valid_time",
        type: 'datetime'
    });

    form.on('submit(save)', function(data){
        $.ajax({
            data:JSON.stringify(data.field),
            dataType:'json',
            contentType:'application/json',
            type:'post',
            success:function(res){
                if (res.code==1) {
                    layer.msg(res.msg, {
                        icon: 1
                    });
                    setTimeout(function() {
                        var index = parent.layer.getFrameIndex(window.name); //获取窗口索引
                        parent.layer.close(index);
                        parent.layui.table.reload("dataTable");
                    }, 2000)
                }else {
                    layer.msg(res.msg,{icon:2,time:1500})
                }
            }
        });
        return false;
    });
})
</script>
</body>
</html>