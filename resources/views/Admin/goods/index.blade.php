<!DOCTYPE html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>商品列表页面</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="stylesheet" href="/adminStatic/css/font.css">
        <link rel="stylesheet" href="/adminStatic/css/xadmin.css">
        <script src="/adminStatic/lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="/adminStatic/js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="/adminStatic/js/xadmin.js"></script>
        <!--[if lt IE 9]>
          <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
          <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="x-nav">
          <span class="layui-breadcrumb">
            <a href="">首页</a>
            <a href="">演示</a>
            <a>
              <cite>导航元素</cite></a>
          </span>
          <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
            <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
        </div>
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body ">
                            <form class="layui-form layui-col-space5" method="post" action="/goods/index">
                                @csrf
                                <div class="layui-inline layui-show-xs-block">
                                    <input type="text" name="keyword"  placeholder="请输入..." autocomplete="off" class="layui-input" value="{{$wheres}}">
                                </div>
                                <div class="layui-inline layui-show-xs-block">
                                    <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                                </div>
                            </form>
                        </div>
                        <div class="layui-card-header">
                            <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
                            <button class="layui-btn" onclick="xadmin.open('添加商品','/goods/goodsInsert',800,600)"><i class="layui-icon"></i>添加</button>
                        </div>
                        <div class="layui-card-body layui-table-body layui-table-main">
                            <table class="layui-table layui-form">
                                <thead>
                                  <tr>
                                    <th>
                                      <input type="checkbox" lay-filter="checkall" name="" lay-skin="primary">
                                    </th>
                                    <th>ID</th>
                                    <th>货号</th>
                                    <th>分类</th>
                                    <th>品牌</th>
                                    <th>商品名称</th>
                                    <th>图片</th>
                                    <th>库存</th>
                                    <th>是否上架</th>
                                    <th>操作</th></tr>
                                </thead>
                                <tbody>
                                @foreach($goodsList as $k=>$v)
                                  <tr>
                                    <td>
                                      <input type="checkbox" name="id" value="{{$v->goods_id}}"   lay-skin="primary">
                                    </td>
                                    <td>{{$v->goods_id}}</td>
                                    <td>{{$v->goods_sn}}</td>
                                    <td>{{$v->cat_name}}</td>
                                    <td>{{$v->brand_name}}</td>
                                    <td>{{$v->goods_name}}</td>
                                    <td><img src="{{asset('storage'.$v->goods_img)}}" alt=""></td>
                                    <td>{{$v->goods_number}}</td>
                                    <td class="td-status">
                                      <?php if( $v->is_on_sale == 1 ){ ?>
                                        <span code="1" class="layui-btn layui-btn-normal layui-btn-mini" onclick="member_stop(this, {{$v->goods_id}})">已上架</span>
                                      <?php }else if( $v->is_on_sale == 2 ){ ?>
                                        <span code="2" class="layui-btn layui-btn-normal layui-btn-mini" onclick="member_stop(this, {{$v->goods_id}})">已下架</span>
                                      <?php } ?>
                                    </td>
                                    <td>
                                        <a title="编辑"  onclick="xadmin.open('编辑','/goods/goodsInfo?goods_id={{$v->goods_id}}}',600,400)" href="javascript:;">
                                            <i class="layui-icon">&#xe642;</i>
                                        </a>
                                        <a title="删除" onclick="member_del(this,'{{$v->goods_id}}')" href="javascript:;">
                                            <i class="layui-icon">&#xe640;</i>
                                        </a>
                                    </td>
                                  </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="layui-card-body ">
                            <div class="page">
                                <div>
                                    {{ $goodsList->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
      layui.use(['laydate','form'], function(){
        var laydate = layui.laydate;
        var  form = layui.form;

        // 监听全选
        form.on('checkbox(checkall)', function(data){

          if(data.elem.checked){
            $('tbody input').prop('checked',true);
          }else{
            $('tbody input').prop('checked',false);
          }
          form.render('checkbox');
        });
        
        //执行一个laydate实例
        laydate.render({
          elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
          elem: '#end' //指定元素
        });



      });

       /*商品-是否上架*/
      function member_stop(obj,id){

          var code = $(obj).attr('code');
          if( code == 1 ){
              a = '下架';
          }else{
              a = '上架';
          }

          layer.confirm('确认要'+a+'吗？',function(index){

              if( code == '1' ){
                  $.ajax({
                      url:'goodsUpdSale',
                      type:'get',
                      data:{id:id,code:1},
                      dataType: 'json',
                      success:function (msg) {
                          console.log(msg);
                          if( msg.code == '1' ){
                              $(obj).find('i').html('&#xe62f;');
                              $(obj).attr('code','2');
                              $(obj).parents("tr").find(".td-status").find('span').html('已下架');
                              layer.msg('已下架!',{time:1000});
                          }else{
                              layer.msg('操作失败',{icon: 5,time:1000});
                          }
                      }
                  })
              }else{
                  $.ajax({
                      url:'goodsUpdSale',
                      type:'get',
                      data:{id:id,code:2},
                      dataType: 'json',
                      success:function (msg) {
                          console.log(msg);
                          if( msg.code == '1' ){
                              $(obj).find('i').html('&#xe610;');
                              $(obj).attr('code','1');
                              $(obj).parents("tr").find(".td-status").find('span').html('已上架');
                              layer.msg('已上架!',{time:1000});
                          }else{
                              layer.msg('操作失败',{icon: 5,time:1000});
                          }
                      }
                  })
              }

          });
      }

      /*商品-删除*/
      function member_del(obj,id){
          layer.confirm('确认要删除吗？',function(index){
              $.ajax({
                  url:'goodsDelOne',
                  type:'get',
                  data:{id:id},
                  dataType: 'json',
                  success:function (msg) {
                      if( msg.code == 1 ){
                          layer.msg('删除成功', {icon: 1});
                          $(obj).parents("tr").remove();
                      }else{
                          layer.msg('删除失败', {icon: 2});
                      }
                  }
              })
          });
      }

      /*商品-批删*/
      function delAll (argument) {
        var ids = [];

        // 获取选中的id 
        $('tbody input').each(function(index, el) {
            if($(this).prop('checked')){
               ids.push($(this).val())
            }
        });

        layer.confirm('确认要删除吗？'+ids.toString(),function(index){
            $.ajax({
                url:'goodsDelAll',
                type:'get',
                data:{ids:ids},
                dataType: 'json',
                success:function (msg) {
                    if( msg.code == 1 ){
                        layer.msg('删除成功', {icon: 1});
                        $(".layui-form-checked").not('.header').parents('tr').remove();
                    }else{
                        layer.msg('删除失败', {icon: 2});
                    }
                }
            })
        });
      }
    </script>
</html>
<script>
    $('.page-link').click(function(){

        var where = $("input[name='keyword']").val();

        var href = $(this).attr('href');

        var newHref = href+'&keyword='+where;

        $(this).attr('href',newHref);

    })
</script>