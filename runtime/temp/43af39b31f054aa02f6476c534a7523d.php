<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"/www/wwwroot/www.kefu.com/public/../application/mobile/view/admin/user.html";i:1715055252;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户列表</title>
    <meta charset="UTF-8" />
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
	<script src="/assets/libs/vue/vue.js?v=AI_KF" type="text/javascript"></script>
    <script type="text/javascript" src="/assets/libs/layer/layer.js?v=AI_KF"></script>
    <script type="text/javascript" src="/assets/libs/layui/layui.js?v=AI_KF"></script>
    <style>
        .list-item input[type='checkbox'] {
            width: 0.32rem;
            height: 0.32rem;
            border-radius: 50%;
            margin-right: 0.2rem;
            background-color: #fff;
            background: url("/assets/images/mobile/select.png") no-repeat center;
            background-size: 0.32rem 0.32rem;
            font-size: 12px;
            display: inline-block;
            position: relative;
            top: 0.39rem;
            -webkit-appearance:none;
            outline: none;
        }

        .list-item input[type=checkbox]:checked{
            background: url("/assets/images/mobile/select-active.png") no-repeat center;
            background-size: 0.32rem 0.32rem;
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

        .list-item {
            height: 1.1rem;
            line-height: 1.1rem;
            padding: 0 0.5rem 0 0.25rem;
            background-color: #fff;
            color: #353535;
            border-bottom: 0.01rem solid #DDDDDD;
            display: flex;
            font-size: 15px;
        }

        .avatar {
        	height: 0.75rem;
        	width: 0.75rem;
        	display: block;
        	margin: 0.175rem;
        	margin-right: 0.25rem;
        	border-radius: 50%;
        }

        .nickname {
        	width: 70%;
        	overflow: hidden;
        	text-overflow: ellipsis;
        	white-space: nowrap;
        }

        .edit-btn {
            height: 1.1rem;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            width: 100%;
            z-index: 100;
        }

        .edit-del-btn,.edit-cancel-btn,.edit-submit-btn {
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

        .edit-submit-btn {
            right: 0;
            background-color: #2E9FFF;
            color: #fff;
        }

        .just {
        	width: 92%
        }
    </style>
</head>
<body>
    <div id="user">
	    <div class="wc__headerBar fixed">
	        <div class="inner flexbox">
			<i class="layui-icon" style="position: absolute;left:10px;font-size: 20px;z-index: 999;height: 1rem;line-height: 1rem;color: #fff" onclick="back()">&#xe603;</i>
    		<span id="customer"
          style="position:absolute;left:0;font-size: 16px;width: 100%;text-align: center;height: 1rem;line-height: 1rem;color: #fff">{{title}}</span><span
        id="status"></span>
	        </div>
	    </div>
        <div class="search" v-if="!choose_mode">
            <form action="" id="searchForm" @submit.prevent>
                <input class="search-input" v-model="keyword" @keypress="searchKeyword" type="search" :class="{just: id == 0}" placeholder="搜索">
            </form>
            <img class="search-icon" src="/assets/images/mobile/search.png" alt="">
            <img class="add-icon" @click="add" v-if="id != 0" src="/assets/images/mobile/add.png" alt="">
            <img class="edit-icon" v-if="id != 0" @click="edit_mode = !edit_mode" src="/assets/images/mobile/edit.png" alt="">
        </div>
        <div class="list">
            <div class='list-item' @click="toTalk(item.mobile_route_url)" v-for="item in list" v-if="item.within == false">
            	<input v-if="edit_mode || choose_mode"  v-model='item.choose' class='checkbox' name='group' :value='item.id' type='checkbox'>
            	<img class="avatar" :src="item.avatar" alt="">	
            	<div class="nickname">{{item.visiter_name}}</div>
            </div>
        </div>
        <div v-if="edit_mode" class="edit-btn">
            <div @click="edit_mode = !edit_mode" class="edit-cancel-btn">取消</div>
            <div v-if="id > -1" @click='del' class="edit-del-btn">删除</div>
            <div v-else  @click='del' class="edit-del-btn">移出黑名单</div>
        </div>
        <div v-if="choose_mode" class="edit-btn">
            <div @click="cancel" class="edit-cancel-btn">取消</div>
            <div @click='submit' class="edit-submit-btn">保存</div>
        </div>
    </div>
</body>
<script>
    var user = new Vue({
        el: '#user',
        data() {
            let that  = this;
            return {
                list: [],
                keyword: '',
                edit_mode: false,
                choose_mode: false,
                id: 0
            };
        },

        methods: {
            toTalk(url) {
                let that = this;
                if(!that.choose_mode && !that.edit_mode) {
                    window.location.href = url;
                }
            },

            // 请求用户数据
            getList(group_id,page){
                let that  = this;
                that.keyword = '';
                that.group_id = group_id;
                that.list = [];
                $.ajax({
                    url: ROOT_URL + '/admin/custom/visiter',
                    type: 'get',
                    data: {
                        group_id: group_id,
                        page: page
                    },
                    success: function (res) {
                        if (res.code == 0 ) {
                            that.list = res.data;
                            for(let i = 0;i < that.list.length;i++){
                                that.list[i].within = false;
                            }
                        }                
                    }
                });
            },

            submit() {
                let that = this;
                let vid = [];
                for(let i = 0;i < that.list.length;i++){
                    if(that.list[i].choose) {
                        vid.push(that.list[i].vid)
                    }
                }
                $.ajax({
                    url: ROOT_URL + '/admin/custom/mvisitergroup',
                    type: 'post',
                    data: {
                        group_id: that.id,
                        vid: vid
                    },
                    success: function (res) {
                        if (res.code == 0 ) {
                            that.choose_mode = !that.choose_mode;
                            that.getList(that.id,1);
                        }                
                    }
                });
            },

            add() {
            	let that = this;
            	that.title = '选择客户';
            	let title = '<?php echo $group['group_name']; ?>';
            	that.choose_mode = !that.choose_mode;
            	that.list = [];
                $.ajax({
                    url: ROOT_URL + '/admin/custom/visiter',
                    type: 'get',
                    data: {
                        group_id: 0,
                        page: 1
                    },
                    success: function (res) {
                        if (res.code == 0 ) {
                            that.list = res.data;
                            for(let i = 0;i < that.list.length;i++){
                                that.list[i].within = false;
                            	if(title != '') {
	                            	if(that.list[i].group_name_array.indexOf(title) > -1) {
	                            		that.list[i].within = true;
	                            	}                            		
                            	}
                            }
                        }                
                    }
                });
            },
            cancel() {
            	let that  = this;
            	that.choose_mode = !that.choose_mode;
	        	that.title = '<?php echo $group['group_name']; ?>';
	        	if(that.id == 0) {
	        		that.title = '全部用户'
	        	}else if(that.id == -1) {
	        		that.title = '黑名单'
	        	}
	        	that.getList(that.id,1);       	
            },
            del() {
            	let that = this;
				let vid = [];
				for(let i = 0;i < that.list.length;i++){
                	if(that.list[i].choose) {
                		vid.push(that.list[i].vid)
                	}
                }
                $.ajax({
                    url: ROOT_URL + '/admin/custom/removeGroup',
                    type: 'post',
                    data: {
                        group_id: that.id,
                        vid: vid
                    },
                    success: function (res) {
                        if (res.code == 0 ) {
                        	that.edit_mode = !that.edit_mode
            				that.getList(that.id,1);
                        }                
                    }
                });          	
            },
            searchKeyword(event) { 
                    let that = this;
                  if (event.keyCode == 13) {
                      event.preventDefault();
                      that.search(that.keyword)
                  } 
            },

            search(keyword) {
                let that = this;
                if(keyword.length > 0) {
                    that.title = '搜索结果';
                    $.ajax({
                        url: ROOT_URL + '/admin/custom/search',
                        type: 'get',
                        data: {
                            group_id: that.id,
                            page: 1,
                            nickname: keyword
                        },
                        success: function (res) {
                            if (res.code == 0) {
                                that.list = res.data.data;
                                for(let i = 0;i < that.list.length;i++){
                                    that.list[i].within = false;
                                }
                            }                
                        },
                        error:function(res) {
                            layer.close(layer.msg());
                        }
                    });
                }else {
                    layer.msg('搜索内容不得为空');
                }
            },
        },
        created() {
            let that  = this;
            if('<?php echo $id; ?>' > -2) {              
                that.id = <?php echo $id; ?>;
                that.title = '<?php echo $group['group_name']; ?>';
                if(that.id == 0) {
                    that.title = '全部用户'
                }else if(that.id == -1) {
                    that.title = '黑名单'
                }
                that.getList(that.id,1);
            }else {
                that.search('<?php echo $id; ?>');
            }
        }
    })

    var back = function () {
        history.go(-1);
    }
</script>
</html>