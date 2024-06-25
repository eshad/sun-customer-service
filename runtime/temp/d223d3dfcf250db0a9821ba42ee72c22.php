<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"/www/wwwroot/www.kefu.com/public/../application/service/view/setting/sentence_add.html";i:1636595640;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/static/component/pear/css/pear.css"/>
</head>
<body>
<form class="layui-form" action="">
    <div class="mainBox">
        <div class="main-container">
            <div class="layui-form-item">
                <label class="layui-form-label">选择语言</label>
                <div class="layui-input-block">
                    <select name="lang" lay-verify="required">
                        <?php $_6638d3bdb46f3=config('lang'); if(is_array($_6638d3bdb46f3) || $_6638d3bdb46f3 instanceof \think\Collection || $_6638d3bdb46f3 instanceof \think\Paginator): if( count($_6638d3bdb46f3)==0 ) : echo "" ;else: foreach($_6638d3bdb46f3 as $key=>$vo): ?>
                        <option value="<?php echo $key; ?>"><?php echo $vo; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">状态</label>
                <div class="layui-input-block">
                    <select name="state" lay-verify="required">
                        <option value="using">启用</option>
                        <option value="unuse">禁用</option>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">问候语</label>
                <div class="layui-input-block">
                    <textarea class="editormd-markdown-textarea" name="content" id="a_editormd" style="height: 260px;" lay-verify="required"></textarea>
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
<script type="text/javascript" src="/assets/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/assets/ueditor/ueditor.all.js"></script>
<script type="text/javascript">
    var editorOption = {
        UEDITOR_HOME_URL: "/assets/ueditor/",
        UEDITOR_ROOT_URL: "/assets/ueditor/",
        serverUrl: "<?php echo url('/service/upload/ueditor',['action'=>'config','service_id'=>$_SESSION['Msg']['service_id'],'admin_id'=>0]); ?>",
        lang: "zh-cn",
        toolbars: [["source","undo", "redo", "|", "bold", "italic", "underline", "fontborder", "strikethrough", "superscript", "subscript", "removeformat", "formatmatch", "autotypeset", "blockquote", "pasteplain", "|", "forecolor", "backcolor",  "selectall", "cleardoc", "|","lineheight", "|", "customstyle", "paragraph", "fontfamily", "fontsize", "|",  "link", "unlink","|", "simpleupload", "insertimage", "emotion","insertvideo"]],
        initialContent: "",
        pageBreakTag: "_ueditor_page_break_tag_",
        initialFrameWidth: "100%",
        initialFrameHeight: "260",
        initialStyle: "body{font-size:14px}",
        autoFloatEnabled: false,
        allowDivTransToP: true,
        autoHeightEnabled: false,
        charset: "utf-8",
    };
    var DomUe=UE.getEditor("a_editormd",editorOption)
</script>
<script>
    layui.use(['form', 'jquery'], function () {
        let form = layui.form;
        let $ = layui.jquery;

        form.on('submit(save)', function (data) {
            $.ajax({
                data: JSON.stringify(data.field),
                dataType: 'json',
                contentType: 'application/json',
                type: 'post',
                success: function (res) {
                    if (res.code === 1) {
                        layer.msg(res.msg, {
                            icon: 1
                        });
                        setTimeout(function () {
                            var index = parent.layer.getFrameIndex(window.name); //获取窗口索引
                            parent.layer.close(index);
                            parent.layui.table.reload("dataTable");
                        }, 2000)
                    } else {
                        layer.msg(res.msg, {icon: 2, time: 1500})
                    }
                }
            });
            return false;
        });
    })
</script>
</body>
</html>