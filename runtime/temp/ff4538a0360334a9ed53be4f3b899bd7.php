<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"/var/www/html/www.kefu.com/public/../application/service/view/services/add.html";i:1715055254;}*/ ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/static/component/pear/css/pear.css" />
</head>
<body>
    <form class="layui-form" action="">
        <div class="mainBox">
            <div class="main-container">
                <div class="layui-form-item">
                    <label class="layui-form-label">用户名</label>
                    <div class="layui-input-block">
                        <input type="text" name="user_name" value="" lay-verify="required" placeholder="请输入客服用户名" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">客服昵称</label>
                    <div class="layui-input-block">
                        <input type="text" name="nick_name" value="" lay-verify="required"  placeholder="请输入客服昵称" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">登录密码</label>
                    <div class="layui-input-block">
                        <input type="password" name="password" value="" lay-verify="required"  placeholder="请输入登录密码" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">确认密码</label>
                    <div class="layui-input-block">
                        <input type="password" name="password2" value="" lay-verify="required"  placeholder="请确认登录密码" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">所属分组</label>
                    <div class="layui-input-block">
                        <select name="groupid" lay-verify="required">
                            <option value="">请选择客服分组</option>
                            <?php foreach($group as $v): ?>
                            <option value="<?php echo $v['id']; ?>"><?php echo (isset($v['groupname']) && ($v['groupname'] !== '')?$v['groupname']:''); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">openid</label>
                    <div class="layui-input-block">
                        <input type="text" name="open_id" value="" placeholder="请输入客服openid" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">手机号</label>
                    <div class="layui-input-block">
                        <input type="text" name="phone" value="" placeholder="请输入客服手机号" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">邮箱</label>
                    <div class="layui-input-block">
                        <input type="text" name="email" value="" placeholder="请输入客服邮箱" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <input type="hidden" name="avatar" value="/assets/images/admin/avatar-admin2.png" id="kefu_avatar"/>
                    <label class="layui-form-label">客服头像</label>
                    <div class="layui-input-block">
                        <img src="/assets/images/admin/avatar-admin2.png" width="50px" height="50px" id="avatar">
                        <a href="javascript:;" style="margin-left: 20px;color:#01AAED" id="upload_avatar">重新上传</a>
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
layui.use(['form','jquery','upload'],function(){
    let form = layui.form;
    let $ = layui.jquery;
    var upload = layui.upload;

    //执行实例
    var uploadInst = upload.render({
        elem: '#upload_avatar' //绑定元素
        ,url: '/service/services/upload_avatar' //上传接口
        ,done: function(res){
            if(res.code === 1){
                $('#kefu_avatar').val(res.data);
                $('#avatar').attr('src',res.data);
            }
        }
        ,error: function(){
            layer.msg('上传失败',{icon:2,time:1500})
        }
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