<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       
        <title>登录 - 当当网</title>
        <link href="/ddEle/Public/home/css/login-1.css" rel="stylesheet" type="text/css" />
        <link href="/ddEle/Public/home/css/pop_cheat.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src='/ddEle/Public/home/js/jquery-1.8.3.min.js'></script>
    </head>
    <body>
        <div class="head">
			<a href="http://www.dangdang.com">
				<img src="/ddEle/Public/home/picture/logo_login.png" />
			</a>
			<ul class="clearfix">
				<li class="n1">
					<a href="javascript:void(0);">货到付款</a>
				</li>
				<li class="n2">
					<a href="javascript:void(0);">正品保障</a>
				</li>
				<li class="n3">
					<a href="javascript:void(0);">上门退款</a>
				</li>
			</ul>
		</div>
       	<div class="wrap clearfix">
       		<div id="J_cheatProofTop" class="new_tip" style="display:block;">由于近期网络邮箱信息泄露事件频发，建议您勿设置与邮箱密码相同的登录和支付密码，<a href="http://blog.dangdang.com/?p=22276">谨防诈骗</a>！</div>
			<div class="pic">
				<a id="aBgPicUrlReferTo" target="_blank" dd_name="登录广告图" style="display:block;outline:none;blr:expression(this.onFocus=this.blur());"
           			href="http://a.dangdang.com/api/data/cpx/link/38930001/1">
           			<img id="J_loginTopAdIE8" style="display:none;" onerror="this.src='/ddEle/Public/home/picture/1.gif';document.getElementById('aBgPicUrlReferTo').setAttribute('href','http://cosmetic.dangdang.com/20151130_45pn');"></img>

					<img id="J_loginTopAd" src="/ddEle/Public/home/picture/1.gif"
					    onerror="this.onerror=null;this.src='http://img60.ddimg.cn/upload_img/00418/lisiyi/480-384-11-30.jpg';document.getElementById('aBgPicUrlReferTo').setAttribute('href','http://cosmetic.dangdang.com/20151130_45pn');"  style="background: url(/ddEle/Public/home/images/loading1.gif) no-repeat 50% 50%;"/>
				</a>
			</div>
            <!-- 登录框开始 -->
            <div>
                <div class="box-a" id="box-right" style="width:311px;height:380px;float:right;">
                    <form action="" method="post">
                        <div class="box-b" id="user-top">
                           <span></span>
                           <input type="text" style="width:277px;height:29px;border:none;" name="username" id="input-user" placeholder="邮箱/昵称/手机号码" onfocus="focus_username()" />
                        </div>
                        <p class="tips" id="user_mindstyle">
                        <span id="liDivErrorMessage" style="display:none">请输入邮箱/昵称/手机号码</span>
                        </p>
                         <div class="box-c" id="pass-top">
                           <span></span>
                           <input type="text" style="width:277px;height:29px;border:none;" name="password" id="input-user" placeholder="密码" />
                        </div>
                        <p class="tips" id="pass_mindstyle">
                        <span id="liDivErrorMessage" style="display:block">请填写长度为6-20个字符的密码</span>
                        </p>
                    </form>
                </div>
                
            </div>
			<div id="J_loginDiv"></div>
		</div>
		<div style="display:none" class="hidden">
		    <input type="hidden" id="returnurl" value="http://3c.dangdang.com/"/>
		    <input type="hidden" id="J_cookie_email" value=""/>
		</div>
        
        <!--页尾 开始 -->

<style type="text/css">
    .public_footer_box { width:100%; margin:0 auto; font:12px "\5b8b\4f53",Arial,Helvetica,sans-serif; clear:both;}
    .public_footer{ margin:0 auto; width:950px; padding:32px 5px 0;font:12px; color:#666; overflow:hidden;}
    .public_footer a{ color:#666!important; text-decoration:none; font-size:12px;}
    .public_footer a:hover{ color:#f60!important; text-decoration:underline;}

    .public_footer .sep{ display:inline-block; padding:0 18px;}
    .public_footer .footer_copyright{ padding-left:168px; margin:0 auto; width:792px; }
    .public_footer .footer_copyright span { float:left; display:inline}
    .public_footer .footer_copyright span{ padding-top:10px;}
    .public_footer .footer_copyright a { padding-right:4px;}
    .public_footer .footer_icon { margin:10px 0 0 335px;width:300px;height:57px;}
    .public_footer .validator,.public_footer .knet {float:left;display:inline;padding:0 5px;width:135px;height:47px;}

</style>

<div class="public_footer_box">
    <div class="public_footer">
        <div class="footer_copyright"><span>Copyright (C) 当当网 2004-2016, All Rights Reserved</span><span class="sep">|</span><span><a href="http://www.miibeian.gov.cn/" target="_blank">京ICP证041189号</a></span><span><a href="http://static.dangdang.com//music/topic/847_10762.shtml" target="_blank">音像制品经营许可证 京音网8号</a></span><div class="clear"></div></div>
        <div class="footer_icon">
            <div class="validator"><a href="http://www.hd315.gov.cn/beian/view.asp?bianhao=010202001051000098" target="_blank" class="footer_img"><img src="/ddEle/Public/home/picture/validate.gif" /></a></div>
            <div class="knet">

                <!-- 可信网站LOGO安装开始 -->
                
                  <script type="text/JavaScript">
                    function CNNIC_change(eleId)
                    {
                        var str= document.getElementById(eleId).href;
                        var str1 =str.substring(0,(str.length-6));
                        str1+=CNNIC_RndNum(6);
                        document.getElementById(eleId).href=str1;
                    }
                       
                    function CNNIC_RndNum(k)
                    {
                        var rnd="";
                        for (var i=0;i < k;i++)
                            rnd+=Math.floor(Math.random()*10);
                        return rnd;
                    }
                </script>
                

                <a href="https://ss.knet.cn/verifyseal.dll?sn=2010091900100002234&pa=2510871" tabindex="-1" id="urlknet" target="_blank">
                    <img width="128" height="47"  alt="&#x53EF;&#x4FE1;&#x7F51;&#x7AD9;" name="CNNIC_seal" border="true"
                         src="/ddEle/Public/home/picture/knetseallogo.png" oncontextmenu="return false;" onclick="CNNIC_change('urlknet')"  />
                </a>

                <!-- 可信网站LOGO安装结束 -->
            </div>
            <div class="clear"></div>
        </div>

    </div>
</div>
<!-- <script type="text/javascript" src="/ddEle/Public/home/js/check_browse.js"></script>
<script  type="text/javascript">login_session.browsePageOperate();</script>
<script type="text/javascript" src="/ddEle/Public/home/js/js_tracker.js"></script> -->
<!--页尾 end -->        <!-- 防诈骗弹窗 开始 -->
		<!-- <div class="masks" id="J_loginMask" style="display:inline-block;;">
			<iframe class="masks_bg"></iframe>
		  	<div class="pop_cheat">
		    	<h3>安全提醒</h3>
		    	<div class="pop_cheat_info clearfix">
		    	    <div id='component_2713728'></div><div  >
    <span class="right">当当平台及销售商<b>不会以任何理由，要求您点击任何网址链接进行退款或支付操作。</b>当当客服电话400-106-6666，0527-80878888。</span> 
</div> --><!-- 
				</div>
				<div class="btn"><a id="J_loginMaskClose" href="javascript:void(0);">知道了</a></div>
		  	</div>
		</div> -->
		<!-- 防诈骗弹窗 结束 -->
       
    </body>
    <script>
        $(document).ready(function(){
            $('#input-user').focus(function(){focus_username()});
            $("#input-user").change(function(){check_user_change()});
            $("body").click(function(){check_password_change()});
        })
    </script>
</html>