<?php
session_start();
error_reporting(0);
if($_GET['act']=='logout'){
	unset($_SESSION);
	header("location: ./login.php");
	exit;
}
$tips='';
if($_POST['username'] && $_POST['password']){
	include('../data/beipy.inc.php');
	$admin_name = htmlspecialchars($_POST['username']);
	$admin_pass = md5ff(htmlspecialchars($_POST['password']));
	if($admin_name==$aik['admin_name']  && $admin_pass==$aik['admin_pass']){
		$_SESSION['admin_aik'] = 'http://beipy.com/';
		header("location: ./index.php");
		echo '<script>window.location.href="./index.php";</script>';
		exit;
	}else{
		$tips = '账号或密码错误！';
	}
}
function md5ff($str=1){
	return md5($str.'ff371');
}
?>
<!--
 * 热搜视频会员系统
 * 网站：http://www.2020web.cn
 * 编写：热搜视频
 * 时间：2019年08月01日
 * 合作事宜请联系站长，谢绝一切形式的盗站行为！
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>热搜视频会员系统后台管理登录</title>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<style>
		body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,code,form,fieldset,legend,select,input,textarea,button,p,blockquote,th,td {margin:10; padding:10; outline:none;}
		body {
		 font-size:16px; 
		 font-family: "微软雅黑";
		 color:#555555; 
		 position: relative;
		 background-image: url(images/a.jpg);
		 background-position: center top;
	    background-repeat: no-repeat;
	    background-attachment: fixed;
	    -webkit-background-size: cover;
	    -moz-background-size: cover;
	    -o-background-size: cover;
	    background-size: cover;
		}
		a{ color:#555555; text-decoration:none}
		a:hover{color:#F00;text-decoration:underline}
		img{border:0;vertical-align:top;}
		h3{font-size:14px;}
		ul,ol,li{list-style:none;line-height:180%;}
		table{border-collapse:collapse; border-spacing:0;}
		input,button,select {color:#555555; font:150% arial; vertical-align:middle; overflow:visible;}
		select {height:20px; line-height:20px;}
		.cl{clear:both; height:0px; overflow:hidden;}
		.cl5{clear:both; height:5px; overflow:hidden;}
		.in{ background-color:#FFC}
		input{ outline:none;}
		.tablecss{background:#D6E0EF;margin:0px auto;word-break:break-all;}
		.tablecss tr{background:#ffffff;}
		.tablecss td{ padding:5px 5px; font-size:12px;*border:0px;}
		.tablecss textarea{font-family:Courier New;padding:1px 3px 1px 3px;}
		.tablecss input{padding:1px 2px 1px 2px;}
		.tablecss tr.header td{ padding:5px 7px 5px 7px; background-color:#fff; color:#63b8ff;border-bottom:1px solid #E6E6E6;}
		.tablecss tr.header td a{ color:#FFF;}
		#footer{ text-align:center; clear:both; padding:10px auto; margin:20px; overflow:hidden; height:40px; line-height:18px;color:#63b8ff}
		#footer a{color:#03C}
		.inp:focus{
    		border-color:#63b8ff;
		}
		.inp{margin:0 auto;height:35px; width:250px; font-size:15px;line-height:25px;border-radius:20px;text-indent:1em;border:none;border:1px solid #fff;background: #f0f0f0; }
		.inp-htn{height:35px; width:150px;background:#63b8ff;color:#fff;border:none;border-radius:18px;}
		.inp-htn:focus{
			background:#61b3ff;
		}
		.logo-box{
			width: 100%;
			height: 40px;
			color: #FFFFFF;
			line-height: 40px;
			margin-top:20px;
		}
		.logo-box a{
			color: #FFFFFF;
			
		}
		.logo-box ul{
			list-style: none;
			float: right;
			height: 40px;
			overflow: hidden;
			line-height: 40px;
			margin-right:50px;
		}
		.logo-box ul li{
			float: left;
			line-height: 40px;
			margin: 0 8px;
		}
		.logo-box ul li a{
			padding: 5px 12px;
			border-radius: 20px;
		}
		.logo-box ul li a:hover{
			background: #63b8ff;
			color: #fff;
			text-decoration:none
		}
		.logo-img{
			margin-left: 50px;
			display: inline-block;
			width: 133px;
			height: 50px;
			background:url(images/z-logo.png)no-repeat ;
		}
</style>
<meta name="robots" content="noindex, nofollow" />
<script type="text/javascript">
function ck(){
    if(document.getElementById('username').value==''){
		alert('请输入用户名！');
		document.getElementById('username').focus();
		return false;
	}else if(document.getElementById('password').value==''){
		alert('请输入密码！');
		document.getElementById('password').focus();
		return false;
	}else{
		return true;
	}
}
</script>

</head>
<body>
	<div class="logo-box">
	<a href="#" class="logo-img"></a>
	<ul>
		<li><a href="/">返回首页</a></li>
		<li><a href="http://sansuib.com" target="_blank">官网</a></li>
	</ul>
</div>
<div class="mt2"></div>

<form name="loginform" method="post" action="" onsubmit="return ck();" style="padding:0;">
	<table border="0" cellspacing="1" cellpadding="0" width="400" class="tablecss" style="margin-top:250px; overflow:hidden;border-radius: 10px;">
<tr class="header">
			<td colspan="4" align="center" style=" height:50px; font-size:18px; font-weight:bold;    background-color: #ecf1fc;">热搜视频会员系统登陆</td>
</tr>
		<tr style="height:100px;" align="center">
		  <td align="center" valign="middle">
		  	<input name="username" type="text" class="inp" id="username" value="" size="30" maxlength="32" placeholder="管理名称" autocomplete="off">
		  	<br/>
		  	
		  </td>
		</tr>
		<tr>
		  <td align="center" valign="middle">
		  	<input name="password" type="password" class="inp" placeholder="管理密码" id="password" value="" size="30" maxlength="64">
		  	<br/>
		  </td>
		</tr>
		<tr>
		  <td align="center" valign="middle">
		  	<p style="width:236px;text-align:left;color:#8d8d8d;" >
		  		
			  	<span class="gray tips">默认名称：admin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 默认密码：admin</span>
		  	</p>
		  </td>
		</tr>
		<tr>
			<input name="act" type="hidden" value="go" /><input type="hidden" name="token" value="<?php echo md5(time())?>"/>   
		  <td align="center" colspan="4"><div class="cl5"></div><input type="submit" name="go" class="inp-htn" value="登 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;录">
<div class="cl5"></div>

<div style="height:0px; color:#ff5000; text-align:center; line-height:15px;"><?php echo $tips?></div>

<?php include('foot.php'); ?>
          </td>
		</tr>
	</table>
<div class="mt2"></div>
</form>
<div class="mt"></div> 
<div class="cl10"></div>

</body>
</html>