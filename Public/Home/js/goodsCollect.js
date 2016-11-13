$(function(){


	  /************************公共的左部按钮的js******************************************************/


	  //用于摸态框显示
	
	  //左侧下拉菜单
	  $('#nav h3').click(function (){

		   	 $(this).next('ul').slideToggle(500);

		   	 //更换向下向上箭头的样式
			 if($(this).children('a').hasClass('slide_down')){
			 	$(this).children('a').removeClass('slide_down').addClass('slide_up');
			 }else{
			 	$(this).children('a').removeClass('slide_up').addClass('slide_down');
			 }
	   })

	  //点击下拉菜单菜单中中的相应的ul 则选中样式被赋予
	  $('#nav ul li').bind('click',function(event){
	  		var ev 	   = window.event || event,
	  			target = ev.srcElement || ev.target;

	  	    //更换a链接的样式
	  		$('#nav ul li a').removeClass('on')
	       	$(this).children('a').addClass('on');

	       	 //如果点击的是收藏商品按钮和收货地址的按钮则让指定的div显示
	       	if($(target).hasClass('collectGoodsA')){
	       		$('.rightFlag').hide();
	       		$('.collectGoodsBox').show();
	       	}
	  	   	
	  	   	//如果点击的是收货地址管理那么则让指定的div显示
	  	   	if($(target).hasClass('buyaddressA')){
	       		$('.rightFlag').hide();
	       		$('.buyaddressBox').show();
	       	}
	  })

	 
	  
	  /***************************商品收藏页的js*********************************/
	  var collectUrl = 'http://localhost/ddEle/index.php/Home/Index/ajaxshow',
	  	  deleteUrl  =  'http://localhost/ddEle/index.php/Home/Index/delCollectGoods',
	  	  btnFlag = []; //判断点击的是哪个元素
	  /**
	   * [modal 摸态框loading函数]
	   * @param  {[type]} flag [description]
	   * @return {[type]}      [description]
	   */
	  function modal(flag){
	  	if(flag){
	  		$('.mask').show();
	  		$('.loadingBox').show();
	  	}else{
	  		$('.mask').hide();
	  		$('.loadingBox').hide();
	  	}
	  }

  	  modal(false);
  	  function showMenu(flag){
  	    var height = document.documentElement.clientHeight;
  	    var top =   document.body.scrollTop || document.documentElement.scrollTop;
	  	var width  = document.documentElement.clientWidth;
	  	console.log(top);
		$('#locListDiv').css('left',(width/2-150));
		$('#locListDiv').css('top',((height+top)/2-60));
  	  	if(flag){
  	  		$('#div_shield').show();
  	  		$('#locListDiv').show();
  	  	}else{
  	  		$('#div_shield').hide();
  	  		$('#locListDiv').hide();
  	  	}
  	  	

  	  }
  	  /**
  	   * [getGoodsList 获得商品列表的ajax函数]
  	   * @param  {[type]} url  [description]
  	   * @param  {[type]} page [description]
  	   * @return {[type]}      [description]
  	   */
	  function getGoodsList(url,data){
	  	 $.ajax({
	  	 	url:url,
	  	 	data:data,
	  	 	type:'get',
	  	 	dataType:'json',
	  	 	success:function(data){
	  	 		modal(false);

	  	 		//成功
	  	 		if(data.code=='0'){
	  	 			$('.myfavo_list').html(data.data);
	  	 		}else{

	  	 		}

	  	 	},
	  	 	beforeSend:function(){
	  	 		modal(true);
	  	 	}
	  	 })
	  }

	  //商品收藏页收藏操作之全选
	  var flag = true;
	  $('.selectAll').click(function(event){
	  	  if(flag){
	  	  	$('.chosen').prop('checked',true);
	  	  	flag = false;
	  	  }else{
	  	  	$('.chosen').prop('checked',false);
	  	  	flag=true;
	  	  }
	  	  if($('.chosen:checked').length>0){
	  	  	 $('.collectMenuBox .btn').removeClass('btnNone');
	  	  }else{
	  	  	$('.collectMenuBox .btn').addClass('btnNone');
	  	  } 
	  })

	 //事件委托  点击批量删除的时候触发
	 $('.collectGoodsBox').delegate('.batchDel','click',function(){

	 	//判断按钮是否可以点击
	 	if($(this).hasClass('btnNone')){
	 		return false;
	 	}else{
	 		//可以点击
	 		showMenu(true);
	 		btnFlag.length = 0;
	 		btnFlag.push($(this));
	 	}
	 }).delegate('.del','click',function(){

	 		//点击单个删除按钮 初始化并存储标志
	 		btnFlag.length = 0;
	 		btnFlag.push($(this));
	 		showMenu(true);

	 }).delegate('.btn_no','click',function(){
	 		//取消按钮
	 		showMenu(false);
	 }).delegate('.chosen','click',function(){
	 	//单选框
	 	//判断是否有选中的元素
	 	if($('.chosen:checked').length>0){
	 		$('.collectMenuBox .btn').removeClass('btnNone');
	 	}else{
	 		$('.collectMenuBox .btn').addClass('btnNone');
	 	}
	 }).delegate('.btn_yes','click',function(){
	 	console.log('点了确认按钮');
	 	 //判断点击的是哪个元素
	 	 //如果点击的是单个删除按钮
	 	 if(btnFlag[0].hasClass('del')){
	 	 	console.log('是单个del');
	 	 	//判断是不是已经选中了该行的元素
	 	 	if(btnFlag[0].closest('li').find('#CheckAll').prop('checked')){
	 	 		// getGoodsList(deleteUrl,{id:btnFlag[0].data('id')});
	 	 		$.ajax({
			  	 	url:deleteUrl,
			  	 	data:{id:btnFlag[0].data('id')},
			  	 	type:'get',
			  	 	dataType:'json',
			  	 	success:function(data){
			  	 		modal(false);
			  	 		showMenu(false);
			  	 		if(data.code==0){
			  	 			$('.myfavo_list').html(data.data);
			  	 			$('.goodscollectpage').html(data.page);
			  	 		}else{
			  	 			alert('删除失败!');
			  	 		}
			  	 	},

			  	 	beforeSend:function(){
			  	 		modal(true);
			  	 	}
	  		   })
	 	 	}else{
	 	 		showMenu(false);
	 	 		alert('你没有选中该行元素，无法删除');
	 	 	}
	 	 }else{
	 	 	
	 	 	//如果是批量删除按钮
	 	 	if($('.chosen:checked').length>0){
	 	 		var idArr = [];
	 	 		$('.chosen:checked').each(function(i){
	 	 			idArr.push($(this).data('id'));
	 	 		})

	 	 		//向服务器请求删除数据
	 	 		$.ajax({
			  	 	url:deleteUrl,
			  	 	data:{id:idArr},
			  	 	type:'get',
			  	 	dataType:'json',
			  	 	success:function(data){
			  	 		modal(false);
			  	 		showMenu(false);
			  	 		if(data.code==0){
			  	 			$('.myfavo_list').html(data.data);
			  	 			$('.goodscollectpage').html(data.page);
			  	 		}else{
			  	 			alert('删除失败!');
			  	 		}
			  	 	},

			  	 	beforeSend:function(){
			  	 		modal(true);
			  	 	}
	  		   })
	 	 	}else{

	 	 	}
	 	 }
	 })


    /***************************收货地址的js*********************************/
    var url = 'http://localhost/ddEle/index.php/Home/Index/city';
    //获得市
	function getCitys(url){
		$.ajax({
				url:url,
				data:{'parent_id':$('#province').children(':selected').val()},
				dataType:'json',
				type:'post',
				async:false,
				success:function(data){
					var html = '';
					$.each(data.city,function(i){
						html += '<option value="'+data.city[i].id+'">'+data.city[i].name+'</option>';
					})

					//输出省列表
					$('#city').html(html);
				}
		})
	}

	//获得县
	function getCounty(url){
		$.ajax({
				url:url,
				data:{'parent_id':$('#city').children(':selected').val()},
				dataType:'json',
				type:'post',
				async:false,
				success:function(data){
					var html = '';
					$.each(data.city,function(i){
						html += '<option value="'+data.city[i].id+'">'+data.city[i].name+'</option>';
					})

					//输出省列表
					$('#county').html(html);
				}
		})
	}

    //验证所有的信息
    $('.checkInput').blur(function(){
    		console.log($('.hint:hidden').length);

    	//验证手机号码是否正确
    	if($(this).attr('id')=='ship_phone'){
    		if(!(check(/^1[34578]\d{9}$/ig,$(this).val()))){
    			$(this).next('.hint').show();
    		}else{
    			$(this).next('.hint').hide();
    		}
    	}

    	//验证邮政编码
    	if($(this).attr('id')=='ship_zip'){
    		if(!check(/^[1-9][0-9]{5}$/,$(this).val())){
    			$(this).next('.hint').show();
    		}else{
    			$(this).next('.hint').hide();
    		}
    	}

    	//验证收货人
    	if($(this).attr('id')=='ship_man'){
    		if(check(/\w+/,$(this).val()) || check(/^[\u4e00-\u9fa5]+$/,$(this).val())){
    			$(this).next('.hint').hide();
    		}else{
    			$(this).next('.hint').show();
    		}
    	}


    	//验证街道地址
    	if($(this).attr('id')=='addr_detail'){
    		if(!check(/^[\u4e00-\u9fa5]+[0-9a-zA-Z]*.*?$/ig,$(this).val())){
    			$(this).next('.hint').show();
    		}else{
    			$(this).next('.hint').hide();
    		}
    	}
    })

    //验证邮政编码的函数
	function check(reg,value){ 
	    if(!reg.test(value)){ 
	        return false; 
	    }else{
	    	return true;
	    }
	}

	//点击保存按钮判断有没有填写完整数据
	$('#myaddress').submit(function(){
		$('.checkInput').trigger('blur');
		if($('.hint:hidden').length == 5){
			return true;
		}else{
			return false;
		}
	})

	//点击更新按钮
	$('.button_update').click(function(){

		//清空上次的hash跳转到下面的修改处
		location.hash = '';
		location.href = location.href+'myaddress_container';
		location.assign(location.href);

		//取得点击修改那个用户的所有信息并更新
		$('#ship_phone').val($(this).data('phone'));
		$('#ship_man').val($(this).data('name'));
		$('#addr_detail').val($(this).data('road'));
		$('#ship_zip').val($(this).data('postid'));
		$('#province').val($(this).data('proid'));
		getCitys(url);
		$('#city').val($(this).data('cityid'));
		getCounty(url);
		$('#county').val($(this).data('countyid'));

		//接着保持设为默认收货地址和用户原来的状态相同
		if($(this).data('default')==0){
			$('#default_flg').prop('checked',false);
		}else{
			$('#default_flg').prop('checked',true);
		}

		//更新隐藏域
		$('input[name="issave"]').val(1);
		$('input[name="addid"]').val($(this).data('addrid'));
	})




	//鼠标移上删除和修改按钮加上样式
	$('.button_delete').hover(function(){
		$(this).css({
			background:'#5279DE',
			color:'yellow'
		})
	},function(){
		$(this).css({
			background:'#0088CC',
			color:'white'
		})
	})

})