$(function(){
	var searchurl = '/ddEle/index.php/Home/index/goodsList'
	var img=[];
	//点击收缩按钮
	$('#catBox').delegate('.catBtnMinus','click',function(){
		$(this).removeClass('catBtnMinus').addClass('catBtn');
		$(this).next().slideUp();
	})

	//点击下拉按钮
	$('#catBox').delegate('.catBtn','click',function(){
		$(this).removeClass('catBtn').addClass('catBtnMinus');
		$(this).next().slideDown();
	})

	//鼠标悬浮下拉和上拉按钮
	$('#catBox').delegate('.catBtn,.catBtnMinus','hover',function(){
		$(this).css({'curosr':'pointer'});
		
	})

	//鼠标移上排序则显示相应的排序
	// alert($('.sortMenu>li.on').index($('.sortMenu>li')));
	// $('.sortMenu>li').mouseover(function(){
	// 	var selectedIndex = $('.sortMenu>li.on').index($('.sortMenu>li')),
	// 		cIndex = $('.sortMenu>li').index($(this));
	// 	console.log(selectedIndex);

	// 	if(cIndex!=selectedIndex){
	// 		$(this).addClass('on');
	// 	}
	// 	// $('.sortMenu>li').removeClass('on');
	// 	// $(this).addClass('on');
	// }).mouseout(function(){
	// 	var selectedIndex = $('.sortMenu>li.on').index($('.sortMenu>li')),
	// 		cIndex = $('.sortMenu>li').index($(this));
	// 	console.log(selectedIndex);
	// 	if(cIndex!=selectedIndex){
	// 		$(this).removeClass('on');
	// 	}
	// })
	$('.sortMenu>li').click(function(){
		var order = '',
			field = '',
			path  = $(this).closest('.sortBox').data('path'),
			bid   = $(this).get(0).id;      //向后台传送点击的元素，然后从服务器返回 
			if($(this).closest('.sortBox').data('brandid').length==0){
				brandid = '' ;
			}else{
				brandid = '/brandid/'+$(this).closest('.sortBox').data('brandid');
			}

		//判断是否已经点击了该元素
		if($(this).hasClass('clicked')){

			//如果原来是升序
			if($(this).children('span').hasClass('upicon')){

				//则发送降序的语句
				order = 'desc';
				// alert('desc');
			}else{

				// alert('asc');

				//则发送升序的语句
				order = 'asc';
			}

			field = $(this).get(0).id;
			// alert(searchurl+'/path/'+path+'/'+field+'/'+order+brandid);
			location.href=searchurl+'/path/'+path+'/'+field+'/'+order+'/'+'clicked'+'/'+bid+brandid;
			
		}else if($(this).get(0).id=='default'){

			location.href=searchurl+'/path/'+path+brandid;
		}else{

			//如果原来是未点击的元素
			if($(this).children('span').hasClass('upicon')){
				order = 'asc';
			}else{
				order = 'desc';
			}
			field = $(this).get(0).id;
			location.href=searchurl+'/path/'+path+'/'+field+'/'+order+'/'+'clicked'+'/'+bid+brandid;
		}
	})

	//收货地城市下拉框
	$('.selectBox').mouseover(function(){
		$(this).children('.provinceDetail').show();
	})
	$('.provinceDetail,.selectBox').mouseout(function(){
		$('.provinceDetail').hide();
	})


	//获取商品的垂直高度
	$('#goodsListUl').css('height',Math.ceil($('#goodsListUl li').length/4)*380);
	
	//让商品列表图片不抖动,转换为absolute定位
	$('#goodsListUl li').each(function(){
		img.push({left:$(this).position().left,top:$(this).position().top});
	})

	$.each(img,function(i){
		$('#goodsListUl li').eq(i).css('position','absolute');
		$('#goodsListUl li').eq(i).css('left',img[i].left).css('top',img[i].top);
	})



})
