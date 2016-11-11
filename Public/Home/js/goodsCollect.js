$(function(){


	  /************************公共的左部按钮的js******************************************************/
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
	  //商品收藏页收藏操作之全选
	  $('.selectAll').click(function(){
	  	  $('.chosen').prop('checked',true);
	  })

	 //鼠标移动上左侧按钮上的li上a链接显示下划线以及可以点击换到相应的地址
	 $('#nav ul li').hover(function(){

	 })


    /***************************收货地址的js*********************************/

    //验证所有的信息
    $('.checkInput').blur(function(){

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
    		if(check(/\w{2}/,$(this).val()) || check(/^[\u4e00-\u9fa5]+$/,$(this).val())){
    			$(this).next('.hint').hide();
    		}else{
    			$(this).next('.hint').show();
    		}
    	}


    	//验证街道地址
    	if($(this).attr('id')=='addr_detail'){
    		if(!check(/^[\u4e00-\u9fa5]+$/,$(this).val())){
    			$(this).next('.hint').show();
    		}else{
    			$(this).next('.hint').hide();
    		}
    	}
    }).focus(function(event){
    	var ev = event || window.event,
    		target = event.target || event.srcElement;
    	console.log(target);
    	$(target).next('.hint').hide();
    })

    //验证邮政编码的函数
	function check(reg,value){ 
	    if(!reg.test(value)){ 
	        return false; 
	    }else{
	    	return true;
	    }
	}

})