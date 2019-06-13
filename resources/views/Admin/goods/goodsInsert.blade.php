<!DOCTYPE html>
<html class="x-admin-sm">
    
    <head>
        <meta charset="UTF-8">
        <title>欢迎页面-X-admin2.2</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="stylesheet" href="/adminStatic/css/font.css">
        <link rel="stylesheet" href="/adminStatic/css/xadmin.css">
        <script type="text/javascript" src="/adminStatic/lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="/adminStatic/js/xadmin.js"></script>
        <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
        <!--[if lt IE 9]>
            <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
            <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]--></head>
    
    <body>
        <div class="layui-fluid">
            <div class="layui-row">
                <form class="layui-form" id="form-data">
                    <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                            <span class="x-red">*</span>商品名称</label>
                        <div class="layui-input-inline">
                            <input type="text" name="goods_name" required="" lay-verify="required" autocomplete="off" class="layui-input"></div>
                    </div>
                    <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                            <span class="x-red">*</span>分类</label>
                        <div class="layui-input-inline">
                            <select name="cat_id" id="">
                                <option value="0">顶级分类</option>
                                @foreach( $catList as $k => $v )
                                    <option value="{{$v->cat_id}}">{{$v->cat_name}}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="layui-form-item">
                        <label for="phone" class="layui-form-label">
                            <span class="x-red">*</span>品牌</label>
                        <div class="layui-input-inline">
                            <select name="brand_id" id="">
                                @foreach( $brandList as $k => $v )
                                    <option value="{{$v->brand_id}}">{{$v->brand_name}}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="layui-form-item">
                        <label for="phone" class="layui-form-label">
                            <span class="x-red">*</span>选择图片</label>
                        <div class="layui-input-inline">
                            <input type="file" name="goods_img" required="" lay-verify="required" autocomplete="off">
                        </div>
                    <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                            <span class="x-red">*</span>库存</label>
                        <div class="layui-input-inline">
                            <input type="text" name="goods_number" required="" lay-verify="required" autocomplete="off" class="layui-input"></div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_email" class="layui-form-label">
                            <span class="x-red">*</span>警告库存量</label>
                        <div class="layui-input-inline">
                            <input type="text" name="warn_number" required="" lay-verify="required" autocomplete="off" class="layui-input"></div>
                    </div>
                    <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                            <span class="x-red">*</span>重量(Kg)</label>
                        <div class="layui-input-inline">
                            <input type="text" name="goods_weight" required="" lay-verify="required" autocomplete="off" class="layui-input"></div>
                    </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                            <span class="x-red">*</span>售价(￥)</label>
                        <div class="layui-input-inline">
                            <input type="text" name="goods_price" required="" lay-verify="required" autocomplete="off" class="layui-input"></div>
                    </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label for="desc" class="layui-form-label">简单描述</label>
                        <div class="layui-input-block">
                            <input type="text" name="goods_brief" required="" lay-verify="required" autocomplete="off" class="layui-input">
                        </div>
                    </div>
        <div class="layui-form-item layui-form-text">
            <label for="desc" class="layui-form-label">详细描述</label>
            <div class="layui-input-block">
                <textarea placeholder="请输入内容" name="goods_desc" class="layui-textarea"></textarea>
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label for="desc" class="layui-form-label">是否上架</label>
            <div class="layui-input-block">
                <input type="radio" name="is_on_sale" value="1" checked="checked">是
                <input type="radio" name="is_on_sale" value="2">否
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label for="desc" class="layui-form-label">是否推荐</label>
            <div class="layui-input-block">
                <input type="radio" name="is_best" value="1" checked="checked">是
                <input type="radio" name="is_best" value="2">否
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label for="desc" class="layui-form-label">是否新品</label>
            <div class="layui-input-block">
                <input type="radio" name="is_new" value="1" checked="checked">是
                <input type="radio" name="is_new" value="2">否
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label for="desc" class="layui-form-label">是否热销</label>
            <div class="layui-input-block">
                <input type="radio" name="is_hot" value="1" checked="checked">是
                <input type="radio" name="is_hot" value="2">否
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label for="desc" class="layui-form-label">是否活动</label>
            <div class="layui-input-block">
                <input type="radio" name="is_promote" value="1" checked="checked">是
                <input type="radio" name="is_promote" value="2">否
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label for="desc" class="layui-form-label">活动价(￥)</label>
            <div class="layui-input-block">
                <input type="text" name="promote_price" required="" lay-verify="required" autocomplete="off" class="layui-input" >
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label for="desc" class="layui-form-label">活动时间</label>
            <div class="layui-input-block">
                开始时间<input type="date" name="promote_start_date[]"><input type="time" name="promote_start_date[]">
                结束时间<input type="date" name="promote_end_date[]"><input type="time" name="promote_end_date[]">
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label for="desc" class="layui-form-label">排序</label>
            <div class="layui-input-block">
                <input type="text" name="scort" required="" lay-verify="required" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label"></label>
            <button class="layui-btn" lay-filter="add" lay-submit="">增加</button></div>
        </form>
        </div>
        </div>
        <script>layui.use(['form', 'layer'],
            function() {
                $ = layui.jquery;
                var form = layui.form,
                layer = layui.layer;

                //自定义验证规则
                // form.verify({
                //     nikename: function(value) {
                //         if (value.length < 5) {
                //             return '昵称至少得5个字符啊';
                //         }
                //     },
                //     pass: [/(.+){6,12}$/, '密码必须6到12位'],
                //     repass: function(value) {
                //         if ($('#L_pass').val() != $('#L_repass').val()) {
                //             return '两次密码不一致';
                //         }
                //     }
                // });

                //监听提交
                form.on('submit(add)',
                function(data) {
                    // var formData = new FormData(data);
                    console.log(data);
                    return false;
                    layer.alert("增加成功", {
                        icon: 6
                    },
                    function() {
                        // 获得frame索引
                        var index = parent.layer.getFrameIndex(window.name);
                        //关闭当前frame
                        parent.layer.close(index);
                    });
                    return false;
                });

            });</script>
        <script>var _hmt = _hmt || []; (function() {
                var hm = document.createElement("script");
                hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
                var s = document.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(hm, s);
            })();</script>
    </body>

</html>