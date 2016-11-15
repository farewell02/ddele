<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="cn">
<head>
	<meta charset="UTF-8">
	<title>购物车-当当网</title>
	 <script src="/Public/home/cart/js/jquery_1.8.js"></script>
    <script src="/Public/home/cart/js/jquery_cookie.js"></script>
    <link href="/Public/home/cart/css/shopping_cart_new.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="/Public/home/cart/css/size_color.css"/>
    <link rel="stylesheet" href="/Public/home/cart/css/style.css"/>
</head>
<body style="padding-bottom:82px">
<link href="/Public/home/cart/css/header.css" rel="stylesheet" type="text/css">
<script charset="utf-8" type="text/javascript">var width = 0; narrow = 1;</script>
<script src="/Public/home/cart/js/pagetop2015_0827.js" charset="utf-8" type="text/javascript"></script>
<script src="/Public/home/cart/js/dd.menu-aim.js" charset="utf-8" type="text/javascript"></script>

<div id="hd">
<div id="tools">
<div class="tools">
    <div class="ddnewhead_operate" dd_name="顶链接">
        <ul class="ddnewhead_operate_nav">
        <li class="ddnewhead_cart"><a href="javascript:AddToShoppingCart(0);" name="购物车" dd_name="购物车"><i class="icon_card"></i>购物车<b id="cart_items_count"></b></a></li>
        <li><a target="_blank" href="#" name="我的订单" dd_name="我的订单" rel="nofollow">我的订单<b id="unpaid_num" style="color:#ff2832;font:bold 12px Arial;"></b></a></li>
	<li><a target="_blank" href="#" name="mydd_7" dd_name="原创征文">原创征文</a></li>
        <li class="dang_erweima">
          <a target="_blank" href="#" onmouseover="showgaoji('a_phonechannel','__ddnav_sjdd');" onmouseout="hideotherchannel('a_phonechannel','__ddnav_sjdd');" class="menu_btn"><i class="icon_tel"></i>手机当当</a>
          <div class="tel_pop" style="display: none;" id="__ddnav_sjdd" onmouseover="showgaoji('a_phonechannel','__ddnav_sjdd');" onmouseout="hideotherchannel('a_phonechannel','__ddnav_sjdd');">
                <a target="_blank" href="#" class="title"><i class="icon_tel"></i>手机当当</a><i class="title_shadow"></i>
                <div class="tel_pop_box clearfix">
                    <div class="tel_pop_box_li"><a href="#" dd_name="手机二维码" target="_blank"><span>当当购物客户端</span><img src="/Public/home/cart/picture/go_erweima.png"><span class="text">下载购物APP<br>手机端1元秒</span></a></div>
                    <div class="tel_pop_box_li"><a href="#" dd_name="手机二维码" target="_blank"><span>当当读书客户端</span><img src="/Public/home/cart/picture/du_erweima.png"><span class="text">万本电子书<br>免费读</span></a></div>
                </div>
          </div>
        </li>
        <li class="my_dd"><a class="menu_btn" target="_blank" href="#" name="我的当当" dd_name="我的当当" id="a_myddchannel" onmouseover="showgaoji('a_myddchannel','__ddnav_mydd')" onmouseout="hideotherchannel('a_myddchannel','__ddnav_mydd');">我的当当</a>
            <ul class="ddnewhead_gcard_list" id="__ddnav_mydd" onmouseover="showgaoji('a_myddchannel','__ddnav_mydd')" onmouseout="hideotherchannel('a_myddchannel','__ddnav_mydd');">
                <li><a target="_blank" href="#" name="mydd_7" dd_name="新_我的订单">我的订单</a></li>
               <li><a target="_blank" href="#" name="mydd_8" dd_name="新_购物车" rel="nofollow">购物车</a></li>
                <li><a target="_blank" href="#" name="mydd_4" dd_name="我的积分" rel="nofollow">积分抵现</a></li>
                <li><a target="_blank" href="#" name="mydd_1" dd_name="我的收藏" rel="nofollow">我的收藏</a></li>
                <li><a target="_blank" href="#" name="mydd_5" dd_name="我的余额" rel="nofollow">我的余额</a></li>
                <li><a target="_blank" href="#" name="mydd_4" dd_name="我的评论" rel="nofollow">我的评论</a></li>
                <li><a target="_blank" href="#" name="mydd_2" dd_name="礼券/礼品卡" rel="nofollow">礼券/礼品卡</a></li>
		<li><a target="_blank" href="#" name="mydd_6" dd_name="电子书架">电子书架</a></li>
            </ul>
        </li>
        <li><a class="menu_btn" href="javascript:void(0);" style="cursor:default;" name="qycg" dd_name="企业采购" id="a_qycgchannel" onmouseover="showgaoji('a_qycgchannel','__ddnav_qycg');" onmouseout="hideotherchannel('a_qycgchannel','__ddnav_qycg');">企业采购</a>
            <ul class="ddnewhead_gcard_list" id="__ddnav_qycg" onmouseover="showgaoji('a_qycgchannel','__ddnav_qycg');" onmouseout="hideotherchannel('a_qycgchannel','__ddnav_qycg');">
                <li><a target="_blank" href="#" name="qycg_1" dd_name="大宗采购">大宗采购</a></li>
                <li><a target="_blank" href="#" name="qycg_2" dd_name="礼品卡采购">礼品卡采购</a></li>
                <li><a target="_blank" href="#" name="gqycg_3" dd_name="礼品卡激活" rel="nofollow">礼品卡激活</a></li>
                <li><a target="_blank" href="#" name="qycg_4" dd_name="礼品卡使用">礼品卡使用</a></li>
            </ul>
        </li>
        <li class="hover "><a class="menu_btn" href="javascript:void(0);" style="cursor:default;" name="ddkf_0" dd_name="客户服务" id="a_bzzxchannel" onmouseover="showgaoji('a_bzzxchannel','__ddnav_bzzx');" onmouseout="hideotherchannel('a_bzzxchannel','__ddnav_bzzx');">客户服务</a>
            <ul class="ddnewhead_gcard_list" id="__ddnav_bzzx" onmouseover="showgaoji('a_bzzxchannel','__ddnav_bzzx');" onmouseout="hideotherchannel('a_bzzxchannel','__ddnav_bzzx');">
                <li><a target="_blank" href="#" name="ddkf_2" dd_name="帮助中心">帮助中心</a></li>
		<li><a target="_blank" href="#" name="ddkf_3" dd_name="自助退换货">自助退换货</a></li>
                <li><a target="_blank" href="#" name="ddkf_4" dd_name="联系客服">联系客服</a></li>
                <li><a target="_blank" href="#" name="tsjy_1" dd_name="我要投诉" rel="nofollow">我要投诉</a></li>
                <li><a target="_blank" href="#" name="tsjy_2" dd_name="意见建议" rel="nofollow">意见建议</a></li>
               <li><a target="_blank" href="#" name="tsjy_2" dd_name="自助发票" rel="nofollow">自助发票</a></li>
            </ul>
        </li>
        </ul>
        <div class="ddnewhead_welcome" display="none;">
            <span id="nickname"><span class="hi hi_none">欢迎光临当当，请</span><a href="#" class="login_link">登录</a><a href="#">免费注册</a></span>
            <div class="tel_pop" style="display:none" id="__ddnav_sjdd"  onmouseover="showgaoji('a_phonechannel','__ddnav_sjdd');" onmouseout="hideotherchannel('a_phonechannel','__ddnav_sjdd');">
                <a target="_blank" href="#" class="title"><i class="icon_tel"></i>手机当当</a><i class="title_shadow"></i>
                <ul class="tel_pop_box">
                    <li><a href="#" dd_name="手机二维码"><span>当当手机客户端</span><img src="/Public/home/cart/picture/erweima2.png"><span class="text">随手查订单<br>随时享优惠</span></a></li>
                </ul>
            </div>
        </div>
        <div class="new_head_znx" id="znx_content" style="display:none;"></div>
    </div>
</div>
</div>
<div id="header_end"></div>
<!--CreateDate  2016-09-28 11:30:01--></div>
<form action="#" id="bootpagetopSearch" name="bootpagetopSearch" method="GET"></form>
		<div class="shoppingcart_wrapper" id="ad_cpt_11850"></div>
<div class="logo_line">
    <div class="w960">
        <div class="shopping_procedure"><span class="current">我的购物车</span><span>填写订单</span><span>完成订单</span></div>
        <div class="logo"><a href="#"><img src="/Public/home/cart/picture/dd_logo.jpg" alt=""></a></div>
    </div>
</div>

<div class="w960" id="showTip">


	<!-- 结算时 商品SPU限购提示窗口 start-->
	<div id="spuPromoLimitDiv" class="pop" style="left:50%; top:50%; margin:-200px 0 0 -253px; position: fixed; z-index: 1004; display: none;">
		<a class="close"></a>
		<div class="pop_title">商品限购</div>
		<div class="popup_limit"></div>
		<div class="btn_bar limit_bar">
			<a class="btn_red">确定</a><a class="pop_btn">取消</a>
		</div>
	</div>
	<!-- 结算时 商品SPU限购提示窗口 end-->
	

	<div id="giftDiv" class="pop_tip gift_select" style="left:50%; top:50%; margin:-200px 0 0 -302px; position: fixed; z-index: 1001; display: none;">
		<div class="head_title">
			<div class="title_name">您购物车中以下商品可选为赠品</div>
			<div class="close"></div>
		</div>
		<div class="products_sort" id="giftArea">
			
		</div>
		<a href="javascript:void(0)" class="btn_b fn-back-cart">返回购物车选赠品</a><a id="gift_checkout" href="#" class="btn_b">继续结算，土豪任性不要了</a>
	</div>
	<div class="login_tip"  style = "display: none;" >
		<span class="icon"></span>
	</div>
	<div id="remove_pop" class="login_tip"  style = "display: none;" >
		<span class="icon"></span>
	</div>
	<div id="clear_pop" class="login_tip"  style = "display: none;" >
		<span class="icon"></span>
	</div>
</div>
<div class="w960" id="cart">
    <ul class="shopping_title" id="j_carttitle">
        <li class="f1"><a id="j_selectall" href="javascript:void(0)" class="checknow fn-checkall" dd_name="全选">选中</a>全选</li>
        <li class="f2">商品信息</li>
        <li class="f3">单价（元）</li>
        <li class="f4">数量</li>
        <li class="f4">金额（元）</li>
        <li class="f5">操作</li>
    </ul>
    <div class="fn-shops" id = "J_cartContent">
		<!--购物车主体-->
		<div class="fn-shop">
		<table class="shop_title" cellspacing="0" cellpadding="0" border="0">
			<tbody>
				<tr>
					<td>
						<a href="javascript:void(0)" dd_name="选中店铺" class="checknow fn-shop-checkall check_on">选中</a>
					</td>
					<td>
						<span class="shop_icon store_o"></span>
					</td>
					<td>
						<a href="http://shop.dangdang.com/16821" target="_blank">情趣生活店</a></td>
					<td>
						<a data-item="16821" href="javascript:;" class="cse fn-imip"><img src="/Public/home/cart/images/icon_cse.gif"></a>
					</td>
					<td>
						
					</td>
				</tr>
			</tbody>
		</table>
<!-- 开始遍历购物车的数据 -->
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="shopping_list">
			<table width="100%" cellspacing="0" cellpadding="0" border="0">
				<tbody data-stock="226" data-offline="false" data-productid="1390681271" data-timestamp="1479130684000" data-orderforspupormo="0">
					<tr id="tr_404162868" class="bb_none">
						<td class="row1">
							<a href="javascript:void(0)" data-item="404162868" class="fn-product-check checknow check_on">选中</a>
						</td>
						<td class="row_img">
							<a href="http://product.dangdang.com/1390681271.html" target="_blank" dd_name="查看详情">
								<img onmouseout="$(this).parent().next().hide()" onmouseover="$(this).parent().next().show()" src="/Public/Upload/<?php echo ($vo["sec"]); ?>" width="80" height="80"><!--第一次的小图-->
							</a>
							<div style="display: none;" class="img_big">
								<a href="" dd_name="查看详情" target="_blank"><img src="/Public/Upload/<?php echo ($vo["sec"]); ?>"></a><span class="arrow"></span><!--第二次的大图-->
							</div>
						</td>
						<td class="row_name">
							<div class="name"><!--该出传入spuid方便跳转页面-->
								<a href="" title="<?php echo ($vo["name"]); ?>" target="_blank" dd_name="查看详情" style="word-break:break-all;  word-wrap:break-word;"><?php echo ($vo["name"]); ?>
								</a><!--商品名字-->
							</div>
							<div class="swatchsize">
								<a dd_name="修改分色分码" href="javascript:;" class="btn fn-switchsize">规格</a><em><?php echo ($vo["rule"]); ?></em><!--商品属性-->
							</div>
						</td>
						<td class="row3">
							<span>¥<?php echo ($vo["price"]); ?></span><!--商品价格-->
							<div class="low_price fn-up" style="display:none;">优惠价格<em></em>
								<div class="low_pop" style="display:none"><ul><li>· 限时抢促销优惠0.10元</li></ul></div>
							</div>
						</td>
						<td data-minbuy="0" class="fn-count-tip row3 ">
							<span class="amount fn-updatecount " data-value="1">
								<a dd_name="减少数量" href="javascript:void(0)">-</a>
									<input data-value="1" value="<?php echo ($vo["number"]); ?>" type="text">
								<a dd_name="增加数量" href="javascript:void(0)">+</a>
							</span>
						</td>
						<td class="row4">
							<span class="red">¥39.80</span><!--该出价格计算得到-->
						</td>
						<td class="row5 ">
							<span><a href="javascript:void(0)" data-item="404162868" class="fn-add-wish" dd_name="加入收藏按钮">加入收藏</a>
							</span>
							<span><a href="javascript:void(0)" data-item="404162868" class="fn-remove-product" dd_name="删除普通品" data-id="<?php echo ($vo["id"]); ?>">删除</a><!--删除数据传入id-->
							</span>
						</td>
					</tr>
				</tbody>
				<tfoot>
					<tr class="total">
						<td class="row1">&nbsp;</td>
						<td class="row_img">店铺合计</td>
						<td colspan="2" class="intro"></td>
						<td colspan="3" class="row4"><span class="red big ooline alignright">¥39.80</span></td><!--价格上面计算得到-->
					</tr>
				</tfoot>
			</table>
		</div>
		</div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?><!--购物车遍历结束-->
    <!-- 购物车部分结束 -->

   <!--  <div class="shoppingcart_loading" id = "J_cartLoading" display="none">
    <img height="30" width="30" src="/Public/home/cart/picture/loading.gif">
    </div> -->
</div>
<div class="w960" id="weipinboxarea" style = "display: none"><div class="login_tip"><span class="icon"></span>购物车中有<a id="weipinhui" href="#" class="icon_eve weipin">尾品汇</a><a id="zuizhidang" href="#" class="icon_eve zhidang">z值当</a>商品，请在<span class="time" id="J_limitedMinute"></span><span class="time" id="J_limitedSecond"></span>内结算.<a herf="javascript:;" class="more fn-vnewz-tips">了解限时结算&gt;&gt;</a></div></div>
<div id="hide_div" style="height:0px;visibility:hidden;"></div>
<div style="position:static;bottom:-20px;z-index: 101;width:100%;left:0px;">
  <div class="shopping_total" id = "J_totalMoneyBlock">
    <div class="shopping_total_right">
        <a class="total_btn fn-checkout" href="javascript:;" id="checkout_btn" dd_name="结算">结&nbsp;&nbsp;算</a>
        <div class="subtotal">
            <p><span class="cartsum">总计(不含运费)：</span><span id="payAmount" class="price"></span></p>

            <p><span class="cartsum">已节省：</span><span id="totalFavor"></span></p>
        </div>
        <div class="pop_del pop_ebook fn-ck" id="ck_tip" style="display:none">
			<h1>电子书重复购买提示</h1>
			<p></p>
			<a id="ck_link" href="#" class="pop_btn">朕知道了</a>
		</div>
    </div>
    <div class="shopping_total_left" id="J_leftBar">
        <a id="j_selectall2" href="javascript:void(0)" class="checknow fn-checkall" dd_name="全选">选中</a>全选
        <a id="j_removeproducts" href="javascript:void(0)" class="fn-batch-remove" dd_name="批量删除按钮">批量删除</a>
        <span>已选择0件商品</span>
        <div id = "J_batchRemoveProductBox" style = "display: none;z-index:-1;left:0px;" class="pop_del"><p>您确定要批量删除商品吗？</p><a href="javascript:;" class="pop_btn fn-confirm-batchremovebox">确定</a><a href="javascript:;" class="pop_btn fn-close-batchremovebox">取消</a></div>
        <div id = "J_batchAddWishBox" style = "display: none;z-index:-1;left:85px;" class="pop_del col "><p>您确定要批量移入收藏吗？</p><a href="javascript:;" class="pop_btn fn-confirm-batchaddwish">确定</a><a href="javascript:;" class="pop_btn fn-close-batchwishbox">取消</a></div>
    </div>
  </div>
</div>
<div id = "J_errorBox" style = "display: none;z-index:102" class="pop_del col">
    <p></p>
    <a class="pop_btn fn-close-removebox" href="javascript:;">确定</a>
</div>
<div id = "J_addToWishTipHtml" style = "display: none; position: absolute;"></div>
<div id = "J_addWishBox" style = "display: none" class="pop_del col "><p>移入收藏后，将不在购物车显示，是否继续操作？</p><a href="javascript:;" class="pop_btn fn-confirm-addwish">确定</a><a href="javascript:;" class="pop_btn fn-close-wishbox">取消</a></div>
<div id = "J_removeProductBox" style = "display: none;" class="pop_del"><p>您确定要删除商品吗？</p><a href="javascript:;" class="pop_btn fn-confirm-removebox">确定</a><a href="javascript:;" class="pop_btn fn-close-removebox">取消</a></div>
<div id = "J_removeGiftBox" style = "display: none;" class="pop_del"><p>您确定要删除赠品吗？</p><a href="javascript:;" class="pop_btn fn-confirm-removegiftbox">确定</a><a href="javascript:;" class="pop_btn fn-close-removebox">取消</a></div>
<div class="w960">
    <div class="empty" id="empty" style="display:none">
        <p>您的购物车还是空的，您可以：</p>
        <a href="#" class="btn">去逛逛</a>
    </div>
    
    	<div class="shopping_ads" id="fn-recent-view" style="display:none;"></div>
    	<div class="shopping_ads" id="J_alsobuy" style="display:none;"></div>
    	<div class="shopping_ads my_tui" id="hot_ad"></div>
    	<div class="shopping_ads" id="J_weinituijian" style="display:none;"></div>
    	<div class="shopping_ads" id="fn-my-wish" style="display:none;"></div>
    
</div>

<div class="pop_del pop_ebook" style="left:460px; right:auto; top:-130px;display: none;" id="J_vnewzTipBox">
	<a href="#" class="close"></a>
	<h1>限时说明</h1>
	<p>由于尾品会和新品汇的商品库存有限，我们只能为您保留<span class="red">20分钟</span>，否则尾品会及新品汇的商品将被删除，请尽快结算。</p>
</div>


<div id="mask"></div>
<div id="sema">
    <div id="size_color_box" class="size_color_box" dd_name="购物车换分色分码弹窗">
        <div class="pic_info clearfix">
            <a href="javascript:;" class="sc_close fn-close-ss"></a>
            <div class="show_pic">
                <a class="big" title="商品名称" href="##">
                    <span class="pic"><img class="fn-img" width="350" height="350" alt="商品名称"></span>
                </a>
            </div>
            <div class="show_info">
                <div class="head" name="Title_pub">
                    <h1 class="fn-data" data-set="title"></h1>
                </div>
                <div class="buy_area">
                    <div class="clearfix" id="colorDivId">
                        <div class="show_info_left fn-data" data-set="colorname" ></div>
                        <div class="show_info_right o_h">
                            <ul class="color fn-colors" id="select_color_id">
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix m_t6" id="sizedivid">
                        <div class="show_info_left fn-data" data-set="sizename" ></div>
                        <div class="show_info_right o_h">
                            <ul class="size fn-sizes" id="select_size_id">
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix m_t8">
                        <div class="show_info_left">&nbsp;</div>
                        <div class="show_info_right c_red fn-errormsg"></div>
                    </div>
                    <div class="clearfix m_t8">
                        <div class="show_info_left">&nbsp;</div>
                        <div class="show_info_right clearfix">
                            <a id="changeSkuDivId" href="javascript:;" class="yes_id_do fn-semasubmit" dd_name="购物车换分色分码确认">确 认</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="fixedbar">
	<div class="window_suspend"><a target="_blank" href="#">问卷调查</a></div>
</div>
<script type = "text/javascript" src = "/Public/home/cart/js/slider.js"></script>
<script type = "text/javascript" src = "/Public/home/cart/js/loginwindow.js" charset="utf-8"></script>
<script src="/Public/home/cart/js/district_new.js"></script>
<script type = "text/javascript" src = "/Public/home/cart/js/abtest.js"></script>
<script type="text/javascript" src="/Public/home/cart/js/getjs.php" charset="utf-8"></script>
<script type="text/javascript" src="/Public/home/cart/js/imip.js" charset="utf-8"></script>
<script type="text/javascript" src="/Public/home/cart/js/smart.js" charset="utf-8"></script>
<script type="text/javascript" src="/Public/home/cart/js/collect.js"></script>
<link href="/Public/home/cart/css/footer_140522.css" rel="stylesheet" type="text/css" />
<div id="footer">
<div class="footer">
	<div class="footer_nav_box">
		<div class="footer_copyright"><span>Copyright (C) 当当网 2004-2014, All Rights Reserved</span><a href="#" target="_blank" class="footer_img" rel="nofollow"><img src="/Public/home/cart/picture/validate.gif"></a><span><a href="#" target="_blank" rel="nofollow">京ICP证041189号</a></span><span>出版物经营许可证&nbsp;新出发京批字第直0673号</span></div>
	</div>
</div>
</div>
    
<script src="/Public/home/cart/js/check_snbrowse.js" type="text/javascript"></script>
<script src="/Public/home/cart/js/utopia.js" type="text/javascript"></script>
<script type="text/javascript" src="/Public/home/cart/js/js_tracker.js"></script>
</body>
</html>