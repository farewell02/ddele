<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>控制台 - 后台管理系统</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- basic styles -->
		<link href="/Public/assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="/Public/assets/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="/Public/assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->

		<!-- fonts -->
		<!--
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />
		-->
		<!-- ace styles -->

		<link rel="stylesheet" href="/Public/assets/css/ace.min.css" />
		<link rel="stylesheet" href="/Public/assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="/Public/assets/css/ace-skins.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="/Public/assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->

		<script src="/Public/assets/js/ace-extra.min.js"></script>
		<link rel="stylesheet" href="/Public/admin/css/pintuer.css">
    	<link rel="stylesheet" href="/Public/admin/css/admin.css">
    	<script src="/Public/admin/js/jquery.js"></script>
    	<script src="/Public/admin/js/jquery-2.1.4.js"></script> 
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		
<link rel="stylesheet" href="/Public/admin/css/pager.css">


		<!--[if lt IE 9]>
		<script src="/Public/assets/js/html5shiv.js"></script>
		<script src="/Public/assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>
<div class="header bg-main" style="margin:0">
  <div class="logo margin-big-left fadein-top">
    <h1><img src="/Public/admin/images/y.jpg" class="radius-circle rotate-hover" height="50" alt="" />后台管理中心</h1>
  </div>
  <div class="head-l"><a class="button button-little bg-green" href="" target="_blank"><span class="icon-home"></span> 前台首页</a> &nbsp;&nbsp;<a href="##" class="button button-little bg-blue"><span class="icon-wrench"></span> 清除缓存</a> &nbsp;&nbsp;<a class="button button-little bg-red" href="<?php echo U('Login/logout');?>"><span class="icon-power-off"></span> 退出登录</a> </div>
</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>

				<div class="sidebar" id="sidebar">
					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
					</script>

					<div class="sidebar-shortcuts" id="sidebar-shortcuts">
						<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
							<button class="btn btn-success">
								<i class="icon-signal"></i>
							</button>

							<button class="btn btn-info">
								<i class="icon-pencil"></i>
							</button>

							<button class="btn btn-warning">
								<i class="icon-group"></i>
							</button>

							<button class="btn btn-danger">
								<i class="icon-cogs"></i>
							</button>
						</div>

						<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
							<span class="btn btn-success"></span>

							<span class="btn btn-info"></span>

							<span class="btn btn-warning"></span>

							<span class="btn btn-danger"></span>
						</div>
					</div><!-- #sidebar-shortcuts -->

					<ul class="nav nav-list">
						<li <?php if((CONTROLLER_NAME) == "Index"): ?>class="active"<?php endif; ?>>
							<a href="<?php echo U('Index/index');?>">
								<i class="icon-dashboard"></i>
								<span class="menu-text"> 控制台 </span>
							</a>
						</li>
						
						<li>
							<?php if($_SESSION['node']['user'] == '1' ): ?><a href="#" class="dropdown-toggle">
								<i class="icon-list"></i>
								<span class="menu-text"> 用户管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu" <?php if((CONTROLLER_NAME) == "User"): ?>style="display:block"<?php endif; ?>>
								<li <?php if((CONTROLLER_NAME== 'User') and (ACTION_NAME== 'index')): ?>class="active"<?php endif; ?>>
								<?php if($_SESSION['node']['user_index'] == '1' ): ?><a href="<?php echo U('User/index');?>">
										<i class="icon-double-angle-right"></i>
										用户列表
									</a><?php endif; ?>
								</li>
								<!-- 第一次操作结束 -->
							</ul><?php endif; ?>
						</li>
							

						<li>
							<?php if($_SESSION['node']['role'] == '1' ): ?><a href="#" class="dropdown-toggle">
								<i class="icon-list"></i>
								<span class="menu-text"> 角色管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu" <?php if((CONTROLLER_NAME) == "Role"): ?>style="display:block"<?php endif; ?>>
								<li <?php if((CONTROLLER_NAME== 'Role') and (ACTION_NAME== 'index')): ?>class="active"<?php endif; ?>>
								<?php if($_SESSION['node']['role_index'] == '1' ): ?><a href="<?php echo U('Role/index');?>">
										<i class="icon-double-angle-right"></i>
										角色列表
									</a><?php endif; ?>
								</li>
							</ul><?php endif; ?>
						</li>
						<!-- 第二次修改结束 -->
						<li>
							<?php if($_SESSION['node']['node'] == '1' ): ?><a href="#" class="dropdown-toggle">
								<i class="icon-list"></i>
								<span class="menu-text"> 节点管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu" <?php if((CONTROLLER_NAME) == "Node"): ?>style="display:block"<?php endif; ?>>
								<li <?php if((CONTROLLER_NAME== 'Node') and (ACTION_NAME== 'index')): ?>class="active"<?php endif; ?>>
								<?php if($_SESSION['node']['node_index'] == '1' ): ?><a href="<?php echo U('Node/index');?>">
										<i class="icon-double-angle-right"></i>
										节点列表
									</a><?php endif; ?>
								</li>
							</ul><?php endif; ?>
						</li>
						<!-- 第三次修改完成 -->
						<!-- 第四次修改开始 -->
						<li>
							<?php if($_SESSION['node']['category'] == '1' ): ?><a href="#" class="dropdown-toggle">
								<i class="icon-list"></i>
								<span class="menu-text"> 分类管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu" <?php if((CONTROLLER_NAME) == "Category"): ?>style="display:block"<?php endif; ?>>
								<li <?php if((CONTROLLER_NAME== 'Category') and (ACTION_NAME== 'index')): ?>class="active"<?php endif; ?>>
								<?php if($_SESSION['node']['category_index'] == '1' ): ?><a href="<?php echo U('Category/index');?>">
										<i class="icon-double-angle-right"></i>
										分类列表
									</a><?php endif; ?>
								</li>

								<li <?php if((CONTROLLER_NAME== 'Category') and (ACTION_NAME== 'treeList')): ?>class="active"<?php endif; ?>>
								<?php if($_SESSION['node']['category_treeList'] == '1' ): ?><a href="<?php echo U('Category/treeList');?>">
										<i class="icon-double-angle-right"></i>
										分类树列表
									</a><?php endif; ?>
								</li>
							</ul><?php endif; ?>
						</li>


					</ul><!-- /.nav-list -->

					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
					</div>

					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>
				</div>

				<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							
	<li>
		<i class="icon-home home-icon"></i>
		<a href="#">首页</a>
	</li>
	<li class="active">分类管理</li>

						</ul><!-- .breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="keyword" autocomplete="off" />
									<i class="icon-search nav-search-icon"></i>
									<input class="btn btn-primary btn-xs" value="搜索" style="border-radius:3px; height:28px; margin-top:-4px; padding-right:24px;" type="button" onclick="getPage(1)">
								</span>
							</form>
						</div><!-- #nav-search -->
					</div>

					<div class="page-content">
						<div class="page-header">
							
	<h1>
		分类管理
		<small>
			<i class="icon-double-angle-right"></i>
			 分类列表
		</small>
	</h1>
     <!-- 编辑摸态框开始 -->
    <div class="modal fade modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span class="sr-only">Close</span></button>
            <h4 class="modal-title text-primary" id="myModalLabel">编辑分类名</h4>
          </div>
          <div class="modal-body">
                <form class="form-horizontal" role="form">
                  <div class="form-group has-feedback">
                    <label for="inputName" class="col-sm-2 control-label text-info" >分类名</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="inputName" placeholder="请填写分类名" name="name">
                      <input type="hidden" value="" name="id">
                      <span class="glyphicon form-control-feedback"></span>
                    </div>
                    <div class="col-sm-4"></div><!--放置提示信息-->
                  </div>
                </form>  
          </div><!--model-body结束部分-->
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            <button type="button" class="btn btn-primary" id="sb">提交</button>
          </div>
        </div>
      </div>
    </div><!--编辑摸态框结束-->
    <!-- 添加子分类摸态框开始 -->
    <div class="modal fade modal-sm" id="myModal_1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span class="sr-only">Close</span></button>
            <h4 class="modal-title text-primary" id="myModalLabel">添加子分类</h4>
          </div>
          <div class="modal-body">
                <form class="form-horizontal" role="form">
                  <div class="form-group has-feedback">
                    <label for="inputName1" class="col-sm-2 control-label text-info" >子分类名</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="inputName1" placeholder="请填写子分类名" name="name">
                      <input type="hidden" value="" name="id">
                      <span class="glyphicon form-control-feedback"></span>
                    </div>
                    <div class="col-sm-4"></div><!--放置提示信息-->
                  </div>
                </form>  
          </div><!--model-body结束部分-->
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            <button type="button" class="btn btn-primary" id="sub">提交</button>
          </div>
        </div>
      </div>
    </div><!--添加子分类摸态框结束-->
      <!-- 添加一级分类摸态框开始 -->
    <div class="modal fade modal-sm" id="myModal_2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span class="sr-only">Close</span></button>
            <h4 class="modal-title text-primary" id="myModalLabel">添加一级分类</h4>
          </div>
          <div class="modal-body">
                <form class="form-horizontal" role="form">
                  <div class="form-group has-feedback">
                    <label for="inputName2" class="col-sm-2 control-label text-info" >一级类名</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="inputName2" placeholder="请填写一级分类名" name="name">
                      <input type="hidden" value="" name="id">
                      <span class="glyphicon form-control-feedback"></span>
                    </div>
                    <div class="col-sm-4"></div><!--放置提示信息-->
                  </div>
                </form>  
          </div><!--model-body结束部分-->
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            <button type="button" class="btn btn-primary" id="subb">提交</button>
          </div>
        </div>
      </div>
    </div><!--添加一级分类摸态框结束-->

						</div><!-- /.page-header -->
						
	<div class="content" id="ajax_lists"></div>
		<script type="text/javascript">
			//无刷新分页
            var url_ajax = "/index.php/Admin/Box/category";
            $(function() {
            	function auto(){
                $("#ajax_lists").delegate(".pager a", "click", function() {
                    page = $(this).attr("data-page");
                    getPage(page);
                })
                }
                auto();
                getPage(1);

            })
            function getPage(page) {
                 $("#ajax_lists").html("<div class='loading'><img src='/Public/admin/images/loading.gif' alt='loading'></div>");
                var keyword = $("#keyword").val();
                $.get(url_ajax, {keyword: keyword, p: page}, function(data) {
                    $('#ajax_lists').html(data);
                })
                }

            //无刷新删除
            $("#ajax_lists").delegate('.del','click',function(ev){
                var ev = ev || event;
                ev.preventDefault();
                if(confirm('确定要删除该分类及其所属分类?')){
                    $.ajax({
                        type:'post',
                        dataType:'json',
                        async:false,
                        url:'http://web.com/index.php/Admin/Category/delete.html',
                        data:{'id':$(this).data('id')},
                        success:function(data){
                            if(data.code==1){
                                // getPage(data.p);
                                $('.pager a').trigger('click');
                                alert(data.mess);
                                return;
                            }else{
                                alert(data.mess);
                                return;
                            }
                        }
                    })
                }else{
                    return;
                }
            }) 
            //无刷新编辑  
            //点击编辑开启摸态框并且获取数据  
             $('#ajax_lists').delegate('.edit','click',function(ev){
                        var ev = ev || event;
                        ev.preventDefault();
                        $('#myModal').modal('show');
                        index = $(this).data('id');
                        $.ajax({
                            type:'post',
                            dataType:'json',
                            async:false,
                            data:{'id':index},
                            url:'http://web.com/index.php/Admin/Category/edit.html',
                            success:function(data){
                                $('#myModal input').eq(0).val(data.name).end().eq(1).val(data.id);
                            }
                        })
                })
             //编辑点击摸态框的提交按钮获取数据进行提交ajax数据  
                $('#sb').click(function(ev){
                    var ev = ev || event;
                    ev.preventDefault();
                    var arr ={};
                    arr.id = $('#myModal input').eq(1).val();
                    arr.name = $('#myModal input').eq(0).val();
                    $.ajax({
                        type:'post',
                        dataType:'json',
                        url:'http://web.com/index.php/Admin/Category/save.html',
                        async:false,
                        data:{"arr":arr},
                        success:function(data){
                            if(data.code==1){
                                alert(data.mess);
                                $('#myModal').modal('hide');
                                // getPage(page);
                                $('.pager a').trigger('click');
                                return;
                            }else{
                                alert(data.mess);
                                return;
                            }
                        }
                    })
                })
                //添加子分类部分的摸态框
                 $('#ajax_lists').delegate('.addson','click',function(ev){
                        var ev = ev || event;
                        ev.preventDefault();
                        $('#myModal_1').modal('show');
                        index = $(this).data('id');
                       $('#myModal_1 input:eq(1)').val(index);
                })
                  //添加子分类摸态框消失初始化值
                $('#myModal_1').on('hidden.bs.modal', function (e) {
                    $('#myModal_1 form').get(0).reset();
                })
                 //提交添加的子分类数据
                $('#sub').click(function(ev){
                    var ev = ev || event;
                    ev.preventDefault();
                    var arr = {};
                    arr.name=$('#myModal_1 input').eq(0).val();
                    arr.pid=$('#myModal_1 input').eq(1).val();
                    $.ajax({
                        type:'post',
                        dataType:'json',
                        url:'http://web.com/index.php/Admin/Category/addson.html',
                        data:{'arr':arr},
                        async:false,
                        success:function(data){
                            if(data.code==1){
                                alert(data.mess);
                                 $('#myModal_1').modal('hide');
                                // getPage(page);
                                $('.pager a').trigger('click');
                                return;
                            }else{
                                alert(data.mess);
                                return;
                            }
                        }
                    })

                })
                //编辑点击摸态框的提交按钮获取数据进行提交ajax数据  
                $('#sb').click(function(ev){
                    var ev = ev || event;
                    ev.preventDefault();
                    var arr ={};
                    arr.id = $('#myModal input').eq(1).val();
                    arr.name = $('#myModal input').eq(0).val();
                    $.ajax({
                        type:'post',
                        dataType:'json',
                        url:'http://web.com/index.php/Admin/Category/save.html',
                        async:false,
                        data:{"arr":arr},
                        success:function(data){
                            if(data.code==1){
                                alert(data.mess);
                                $('#myModal').modal('hide');
                                // getPage(page);
                                $('.pager a').trigger('click');
                                return;
                            }else{
                                alert(data.mess);
                                return;
                            }
                        }
                    })
                })
                //添加一级分类部分的摸态框
                 $('#ajax_lists').delegate('.add','click',function(ev){
                        var ev = ev || event;
                        ev.preventDefault();
                        $('#myModal_2').modal('show');
                        index = $(this).data('id');
                       $('#myModal_2 input:eq(1)').val(index);
                })
                  //添加一级分类摸态框消失初始化值
                $('#myModal_2').on('hidden.bs.modal', function (e) {
                    $('#myModal_2 form').get(0).reset();
                })
                 //提交添加的一级分类数据
                $('#subb').click(function(ev){
                    var ev = ev || event;
                    ev.preventDefault();
                    var arr = {};
                    arr.name=$('#myModal_2 input').eq(0).val();
                    arr.pid=$('#myModal_2 input').eq(1).val();
                    $.ajax({
                        type:'post',
                        dataType:'json',
                        url:'http://web.com/index.php/Admin/Category/doadd.html',
                        data:{'arr':arr},
                        async:false,
                        success:function(data){
                            if(data.code==1){
                                alert(data.mess);
                                 $('#myModal_2').modal('hide');
                                // getPage(page);
                                $('.pager a').trigger('click');
                                return;
                            }else{
                                alert(data.mess);
                                return;
                            }
                        }
                    })

                })
		</script>

					</div><!-- /.page-content -->
				</div><!-- /.main-content -->

				<div class="ace-settings-container" id="ace-settings-container">
					<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
						<i class="icon-cog bigger-150"></i>
					</div>

					<div class="ace-settings-box" id="ace-settings-box">
						<div>
							<div class="pull-left">
								<select id="skin-colorpicker" class="hide">
									<option data-skin="default" value="#438EB9">#438EB9</option>
									<option data-skin="skin-1" value="#222A2D">#222A2D</option>
									<option data-skin="skin-2" value="#C6487E">#C6487E</option>
									<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
								</select>
							</div>
							<span>&nbsp; 选择皮肤</span>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
							<label class="lbl" for="ace-settings-navbar"> 固定导航条</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
							<label class="lbl" for="ace-settings-sidebar"> 固定滑动条</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
							<label class="lbl" for="ace-settings-breadcrumbs">固定面包屑</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
							<label class="lbl" for="ace-settings-rtl">切换到左边</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
							<label class="lbl" for="ace-settings-add-container">
								切换窄屏
								<b></b>
							</label>
						</div>
					</div>
				</div><!-- /#ace-settings-container -->
			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<!--
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		-->
		<!-- <![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='/Public/assets/js/jquery-2.0.3.min.js'>"+"<"+"script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='/Public/assets/js/jquery.mobile.custom.min.js'>"+"<"+"script>");
		</script>
		<script src="/Public/assets/js/bootstrap.min.js"></script>
		<script src="/Public/assets/js/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="/Public/assets/js/excanvas.min.js"></script>
		<![endif]-->

		<script src="/Public/assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="/Public/assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="/Public/assets/js/jquery.slimscroll.min.js"></script>
		<script src="/Public/assets/js/jquery.easy-pie-chart.min.js"></script>
		<script src="/Public/assets/js/jquery.sparkline.min.js"></script>
		<script src="/Public/assets/js/flot/jquery.flot.min.js"></script>
		<script src="/Public/assets/js/flot/jquery.flot.pie.min.js"></script>
		<script src="/Public/assets/js/flot/jquery.flot.resize.min.js"></script>

		<!-- ace scripts -->

		<script src="/Public/assets/js/ace-elements.min.js"></script>
		<script src="/Public/assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->

		<script type="text/javascript">
			jQuery(function($) {
				$('.easy-pie-chart.percentage').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
					var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
					var size = parseInt($(this).data('size')) || 50;
					$(this).easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: parseInt(size/10),
						animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
						size: size
					});
				})
			
				$('.sparkline').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
					$(this).sparkline('html', {tagValuesAttribute:'data-values', type: 'bar', barColor: barColor , chartRangeMin:$(this).data('min') || 0} );
				});
			
			
			
			
			  var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
			  var data = [
				{ label: "social networks",  data: 38.7, color: "#68BC31"},
				{ label: "search engines",  data: 24.5, color: "#2091CF"},
				{ label: "ad campaigns",  data: 8.2, color: "#AF4E96"},
				{ label: "direct traffic",  data: 18.6, color: "#DA5430"},
				{ label: "other",  data: 10, color: "#FEE074"}
			  ]
			  function drawPieChart(placeholder, data, position) {
			 	  $.plot(placeholder, data, {
					series: {
						pie: {
							show: true,
							tilt:0.8,
							highlight: {
								opacity: 0.25
							},
							stroke: {
								color: '#fff',
								width: 2
							},
							startAngle: 2
						}
					},
					legend: {
						show: true,
						position: position || "ne", 
						labelBoxBorderColor: null,
						margin:[-30,15]
					}
					,
					grid: {
						hoverable: true,
						clickable: true
					}
				 })
			 }
			 drawPieChart(placeholder, data);
			
			 /**
			 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			 so that's not needed actually.
			 */
			 placeholder.data('chart', data);
			 placeholder.data('draw', drawPieChart);
			
			
			
			  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			  var previousPoint = null;
			
			  placeholder.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.series['percent']+'%';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}
				
			 });
			
			
			
			
			
			
				var d1 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d1.push([i, Math.sin(i)]);
				}
			
				var d2 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d2.push([i, Math.cos(i)]);
				}
			
				var d3 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.2) {
					d3.push([i, Math.tan(i)]);
				}
				
			
				var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
				$.plot("#sales-charts", [
					{ label: "Domains", data: d1 },
					{ label: "Hosting", data: d2 },
					{ label: "Services", data: d3 }
				], {
					hoverable: true,
					shadowSize: 0,
					series: {
						lines: { show: true },
						points: { show: true }
					},
					xaxis: {
						tickLength: 0
					},
					yaxis: {
						ticks: 10,
						min: -2,
						max: 2,
						tickDecimals: 3
					},
					grid: {
						backgroundColor: { colors: [ "#fff", "#fff" ] },
						borderWidth: 1,
						borderColor:'#555'
					}
				});
			
			
				$('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('.tab-content')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			
			
				$('.dialogs,.comments').slimScroll({
					height: '300px'
			    });
				
				
				//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
				//so disable dragging when clicking on label
				var agent = navigator.userAgent.toLowerCase();
				if("ontouchstart" in document && /applewebkit/.test(agent) && /android/.test(agent))
				  $('#tasks').on('touchstart', function(e){
					var li = $(e.target).closest('#tasks li');
					if(li.length == 0)return;
					var label = li.find('label.inline').get(0);
					if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
				});
			
				$('#tasks').sortable({
					opacity:0.8,
					revert:true,
					forceHelperSize:true,
					placeholder: 'draggable-placeholder',
					forcePlaceholderSize:true,
					tolerance:'pointer',
					stop: function( event, ui ) {//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
						$(ui.item).css('z-index', 'auto');
					}
					}
				);
				$('#tasks').disableSelection();
				$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
					if(this.checked) $(this).closest('li').addClass('selected');
					else $(this).closest('li').removeClass('selected');
				});
				
			
			})
		</script>
	<div style="display:none">
		<!--
		<script src='http://v7.cnzz.com/stat.php?id=155540&web_id=155540' language='JavaScript' charset='gb2312'></script>
		-->
		</div>
</body>
</html>