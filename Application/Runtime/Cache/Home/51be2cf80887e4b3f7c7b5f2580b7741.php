<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="cn">
<head>
	<meta charset="UTF-8">
	<title>新用户注册 - 当当网</title>
	<link type="text/css" href="/Public/home/css/register_150706.css" rel="stylesheet" />
	<link href="/Public/home/css/unite_header_1129.css" rel="stylesheet" type="text/css">
</head>
<body>	

<script src="/Public/home/js/top.js" type="text/javascript"></script>
<div class="ddnewhead_wrap">
    <div class="ddnewhead_content ddnewhead_content2">
        <div class="ddnewhead_operate" id="__ddnav_menu">
          <ul class="ddnewhead_operate_nav">
                        <li class="ddnewhead_cart"><a  name="t_1" href="javascript:AddToShoppingCart(0);">购物车<span id="cart_items_count" class="cart_num"></span></a></li>
            <li class="ddnewhead_separate"></li>
            <li><a  name="t_2" href="http://order.dangdang.com/myallorders.aspx" target="_blank">我的订单</a></li>
            <li class="ddnewhead_separate"></li>
            <li class="ddnewhead_mydd"><a  name="t_3" href="http://my.dangdang.com/myhome/homepage.aspx" target="_blank" class="menu_btn" id="a_myddchannel" onmouseover="showgaoji('a_myddchannel','__ddnav_mydd')" onmouseout="hideotherchannel('a_myddchannel','__ddnav_mydd');">我的当当</a>
                <div  class="ddnewhead_mydd_panel" onmouseover="showgaoji('a_myddchannel','__ddnav_mydd')" onmouseout="hideotherchannel('a_myddchannel','__ddnav_mydd');" id="__ddnav_mydd" >
                    <ul class="ddnewhead_mydd_list" >
                        <li><a  name="t_3_1" href="http://order.dangdang.com/myallorders.aspx" target="_blank">我的订单</a></li>
                        <li><a  name="t_3_2" href="http://account.dangdang.com/payhistory/mycoupons.aspx" target="_blank">购物礼券</a></li>
                        <li><a  name="t_3_3" href="http://my.dangdang.com/memberpoints/index.aspx" target="_blank">我的积分</a></li>
                        <li><a  name="t_3_4" href="http://customer.dangdang.com/wishlist/cust_wish_list.aspx" target="_blank">我的收藏</a></li>
                        <li><a  name="t_3_5" href="http://comm.dangdang.com/review/reviewbuy.php" target="_blank">我的评论</a></li>
                        <li><a  name="t_3_6" href="http://e.dangdang.com/ebook/listUserEbooks.do" target="_blank">数字商品</a></li>
                    </ul>
                </div>
            </li> 
            <li class="ddnewhead_separate"></li>
            <li class="ddnewhead_gcard"><a  name="t_4" href="http://giftcard.dangdang.com" class="menu_btn"  id="a_lipchannel" onmouseover="showgaoji('a_lipchannel','__ddnav_card');" onmouseout="hideotherchannel('a_lipchannel','__ddnav_card');" target="_blank">礼品卡</a>
                <div  class="ddnewhead_gcard_panel" onmouseover="showgaoji('a_lipchannel','__ddnav_card')" onmouseout="hideotherchannel('a_lipchannel','__ddnav_card');" id="__ddnav_card">
                <ul class="ddnewhead_gcard_list">
                    <li><a  name="t_4_1" href="http://giftcard.dangdang.com" target="_blank">购买</a></li>
                    <li><a  name="t_4_2" href="http://account.dangdang.com/payhistory/mymoney.aspx" target="_blank">激活</a></li>
                </ul>
                </div>
            </li>
            <li class="ddnewhead_separate"></li>
            <li><a name="ddheadmobile" href="http://static.dangdang.com/topic/744/200778.shtml" target="_blank">手机当当</a></li>
            <li class="ddnewhead_separate"></li>
            <li><a name="t_5" href="http://misc.dangdang.com/giftcardCompany/company.aspx" target="_blank">企业销售</a></li>
            <li class="ddnewhead_separate"></li>
            <li class="help"><a name="t_6" href="http://support.dangdang.com/helpcenter/" target="_blank">帮助</a></li>
          </ul>
          <p id="nickname"><span>欢迎光临当当网，请</span><a href="https://login.dangdang.com/Signin.aspx" name="zt_denglu" target="_blank" class="login_link">登录</a><a href="https://login.dangdang.com/Register.aspx" name="zt_zhuce" target="_self" class="login_link">免费注册</a></p>
    </div>
              <div class="ddnewhead_logo"><a href="http://www.dangdang.com" title="返回首页" name="ddnav_logo"><img src="/Public/home/picture/ddnewhead_logo.gif" alt="当当网"/></a></div>
      <div class="clear"></div>
    </div>
     <div class="ddnewcarthead_bottom"></div>
</div>
    <form action="http://search.dangdang.com/search.aspx" id="bootpagetopSearch" name="bootpagetopSearch" method="GET"></form>
  <script type="text/javascript">initHeaderOperate();</script>         
   <form id="register_form" method="post" action="<?php echo U('Reg:insert');?>">
            <div id="bd">
				<!--默认-->
				<div class="shadow_box">
					<div class="register_box">
						<div class="head">
							<span class="dd_more"><a href="http://www.dangdang.com" class="home">当当首页</a><a href="http://help.dangdang.com/details/page2">注册帮助</a></span>
							<a href="javascript:void(0);" class="head_a head_a1">新用户注册</a>
							<a href="register_company.php?returnurl=http://www.dangdang.com/" class="head_a">企业用户注册</a>
						</div>
						<div class="body">
							<div id="J_cheatProofTop" class="new_tip" style="display:none;">贴心提示：请勿设置与邮箱密码相同的账户登录密码或支付密码，防止不法分子窃取您的当当账户信息，<a href="http://blog.dangdang.com/?p=22276">谨防诈骗</a>！</div>
							<table cellpadding="0" cellspacing="0" border="0" width="100%">
								<tr>
									<td class="t">邮箱／手机号码</td>
									<td class="z_index2">
										<input name="txt_username" id="txt_username" autocomplete="off" MaxLength="40" 
											tabindex="1" value="" placeholder="请输入您的邮箱或手机号码"
											type="text" class="text" /><span id="spn_username_ok" class="icon_yes" style="display: none;"></span>
										<span id="J_tipUsername" class="cue warn"></span>
									</td>
								</tr>
								<tr>
									<td class="t">登录密码</td>
									<td>
										<input name="txt_password" id="txt_password" onpaste="return false;" tabindex="2" type="password" class="text" MaxLength="20" />
										<span id="spn_password_ok" class="icon_yes" style="display: none;"></span>
										<span id="J_tipPassword" class="cue warn"></span>										
										<span id="J_tipUpperCaseBox" class="prompt" style="display: none;"><span class="icon"></span>键盘大写锁定已打开，请注意大小写!</span>
										<span id="spnPwdStrongTips">
											<span id="spnPwdStrong1" class="cue warn j_pwdStrong" style="display: none;">
												<span class="msg_level"><span class="s1"></span><span></span><span></span></span>密码过于简单
											</span>										 
											<span id="spnPwdStrong2" class="cue warn j_pwdStrong" style="display: none;">
												<span class="msg_level"><span class="s1"></span><span class="s2"></span><span></span></span>试试字母、符号、数字的组合更安全
											</span>
											<span id="spnPwdStrong3" class="cue warn j_pwdStrong" style="display: none;">
												<span class="msg_level"><span class="s1"></span><span class="s2"></span><span class="s3"></span></span>密码设置安全，放心使用
											</span>
										</span>
									</td>
								</tr>
								<tr>
									<td class="t">确认密码</td>
									<td>
										<input id="txt_repassword" name="txt_repassword" onpaste="return false" tabindex="3" type="password" class="text" MaxLength="20"/><span id="spn_repassword_ok" class="icon_wrong" style="display: none;"></span>
										<span id="J_tipSurePassword" class="cue"></span>
									</td>
								</tr>								
								<tr>
									<!-- 图形验证码 -->
									<td class="t j-vcode">验证码</td>
									<td class="j-vcode">
										<input class="text pin" type="text" id="txt_vcode" name="txt_vcode" autocomplete="off" placeholder="请输入验证码" MaxLength="4" tabindex="5"/>
										<a class="code_pic" id="vcodeImgWrap" name="change_code_img" href="javascript:void(0);" >
											<img id="imgVcode" title="点击更换验证码" alt="点击更换验证码" width="84" height="37">
										</a>
										<a id="vcodeImgBtn" name="change_code_link" class="code_picww" href="javascript:void(0);" >换张图</a>
										<span id="spn_vcode_ok" class="icon_yes pin_i" style="display: none;"></span>
										<span id="J_tipVcode" class="cue"></span>
										<!--<span class="icon_wrong pin_i"></span>-->
									</td>
								</tr>															
								<tr>
									<td class="t">&nbsp;</td>
									<td class="clause">
										<span class="float_l">
											<input id="chb_agreement" name="chb_agreement" onmouseover="this.style.cursor='pointer';this.style.cursor='hand';" tabindex="7" type="checkbox" checked="checked"/>我已阅读并同意
											<a target="_blank" href="http://help.dangdang.com/details/page12" tabindex="8">《当当交易条款》</a>和
											<a target="_blank" href="http://help.dangdang.com/details/page42" tabindex="9">《当当社区条款》</a>
										</span>
										<span id="J_tipAgreement" class="cue"></span>
									</td>
								</tr>
								<tr>
									<td class="t">&nbsp;</td>
									<td><a id="J_submitRegister" href="javascript:void(0);" class="btn_login" tabindex="10">立即注册</a><a id="J_submitRegisterUnclick" style="display: none;" class="btn_login">注册中...</a></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
        </form>
       
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
        <div class="footer_copyright"><span>Copyright (C) 当当网 2004-2012, All Rights Reserved</span><span class="sep">|</span><span><a href="http://www.miibeian.gov.cn/" target="_blank">京ICP证041189号</a></span><span><a href="http://static.dangdang.com//music/topic/847_10762.shtml" target="_blank">音像制品经营许可证 京音网8号</a></span><div class="clear"></div></div>
        <div class="footer_icon">
            <div class="validator"><a href="http://www.hd315.gov.cn/beian/view.asp?bianhao=010202001051000098" target="_blank" class="footer_img"><img src="/Public/home/picture/validate.gif" /></a></div>
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
                         src="/Public/home/picture/knetseallogo.png" oncontextmenu="return false;" onclick="CNNIC_change('urlknet')"  />
                </a>

                <!-- 可信网站LOGO安装结束 -->
            </div>
            <div class="clear"></div>
        </div> 
    </div>
</div>
<script type="text/javascript" src="/Public/home/js/check_browse.js"></script>
<script  type="text/javascript">login_session.browsePageOperate();</script>
<script type="text/javascript" src="/Public/home/js/js_tracker.js"></script>
<!--页尾 end -->        
		<script type="text/javascript" src="/Public/home/js/jquery-1.8.0.min.js"></script>
        <script type="text/javascript" src="/Public/home/js/register.js"></script>
</body>
</html>