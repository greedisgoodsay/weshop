<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="/adminStatic/css/shop.css" type="text/css" rel="stylesheet" />
<link href="/adminStatic/skin/default/skin.css" rel="stylesheet" type="text/css" id="skin" />
<link href="/adminStatic/css/Sellerber.css" type="text/css"  rel="stylesheet" />
<link href="/adminStatic/css/bkg_ui.css" type="text/css"  rel="stylesheet" />
<link href="/adminStatic/font/css/font-awesome.min.css"  rel="stylesheet" type="text/css" />
<script src="/adminStatic/js/jquery-1.9.1.min.js" type="text/javascript" ></script>
<script src="/adminStatic/js/layer/layer.js" type="text/javascript"></script>
<script src="/adminStatic/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/adminStatic/js/Sellerber.js" type="text/javascript"></script>
<script src="/adminStatic/js/shopFrame.js" type="text/javascript"></script>
<script type="text/javascript" src="/adminStatic/js/jquery.cookie.js"></script>
<title>用户登录</title>
</head>

<body class="login_style login-layout">
 <div class="loginbody">
  <div class="login-container">
   <div class="login_logo"><img src="/adminStatic/images/logo.png" /></div>
    <div class="position-relative">
     <div id="login_add" class="login-box widget-box no-border visible">
      <div class="widget-main">
      <h4 class="header blue lighter bigger"><i class="fa fa-coffee green"></i>&nbsp;&nbsp;&nbsp;管理员登录</h4>
      <div class="clearfix">
       <div class="login_icon"><img src="/adminStatic/images/login_bg.png" /></div>
       <div class="add_login_cont Reg_log_style ">
        <form class="" id="">
         <ul class="r_f">
          <li class="frame_style form_error"><label class="user_icon"></label><input name="username" data-name="用户名" type="text" id="username"><i>用户名</i></li>
          <li class="frame_style form_error"><label class="password_icon"></label><input name="userpwd" data-name="密码" type="password" id="userpwd"><i>密码</i></li>
          <li class="frame_style form_error">
          <label class="Codes_icon"></label><input name="Codes_text" type="text"  data-name="验证码" id="Codes_text" class="Codes_text"><i>验证码</i>
          <div class="Codes_region"></div>
          </li> 
         
         </ul>       
        </form>
       </div>
       <div class="login_Click_Actions">          
          <button type="button" class="button_width  btn btn-sm btn-primary" id="login_btn"><i class="fa fa-key"></i>&nbsp;&nbsp;登录</button>
          <p><label class="inline"><input type="checkbox" class="ace"><span class="lbl">保存密码</span></label></p>
       </div>
      </div>
      <div class="social-or-login center"><span class="">通知</span></div>
      <div class="margin-top color center">本网站系统不再对IE8以下浏览器提供支持，请见谅。</div>
      </div>
     </div>
   </div>
   </div>
   </div>
</body>
</html>
<script type="text/javascript">
$('#login_btn').on('click', function(){
	     var num=0;
		 var str="";
     $("input[type$='text'],input[type$='password']").each(function(n){
          if($(this).val()=="")
          {
               
			   layer.alert(str+=""+$(this).attr("data-name")+"不能为空！\r\n",{
                title: '提示框',				
				icon:0,								
          }); 
		    num++;
            return false;            
          } 
		 });
		  if(num>0){  return false;}	 	
          else{
			  layer.alert('登陆成功！',{
               title: '提示框',				
			   icon:1,		
			  });
	          location.href="shops_index.html";
			   layer.close(index);	
		  }		  		     								
	});
  $(document).ready(function(){
	 $("input[type='text'],input[type='password']").blur(function(){
        var $el = $(this);
        var $parent = $el.parent();
        $parent.attr('class','frame_style').removeClass(' form_error');
        if($el.val()==''){
            $parent.attr('class','frame_style').addClass(' form_error');
        }
    });
	$("input[type='text'],input[type='password']").focus(function(){		
		var $el = $(this);
        var $parent = $el.parent();
        $parent.attr('class','frame_style').removeClass(' form_errors');
        if($el.val()==''){
            $parent.attr('class','frame_style').addClass(' form_errors');
        } else{
			 $parent.attr('class','frame_style').removeClass(' form_errors');
		}
	});
 })
</script>
