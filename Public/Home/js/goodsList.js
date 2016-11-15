$(function(){
	var searchurl = '/ddEle/index.php/Home/index/goodsList'
	var img=[];

	//点击收缩按钮
	$('#catBox').delegate('.catBtnMinus','click',function(){
		if($(this).next().length>0){
			$(this).removeClass('catBtnMinus').addClass('catBtn');
			$(this).next().slideUp();
		}
		
		
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
	

	//先判断下面有没有子类的
	$('.firstCat').each(function(i){

		//如果没有子类
		if($(this).find('.secondCatUl').length==0){
			$(this).find('.catBtn').removeClass('catBtn').addClass('catBtnMinus');
		
		}	
	})
	$('.secondCatUl .now').closest('.firstCat').addClass('on').end().parent().slideDown().prev().removeClass('catBtn').addClass('catBtnMinus');
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

	//点击所有品牌之后跳转到该品牌下，该分类下的所有产品
	$('.defaultBrand a').click(function(){
		var path = $('.sortBox').data('path').length==0?'/':'/path/'+$('.sortBox').data('path')+'/',
			clicked = $('.sortMenu>li.on').attr('id'),
			order = $('.sortMenu>li.on').get(0).className == 'upicon' ? 'asc' : 'desc',
			brandid = $(this).parent().data('brandid'),
			cid = $('.sortBox').data('cid').length==0?'':'/cid/'+$('.sortBox').data('cid');


			//如果没有点击排序则用默认的排序 选择该分类下的所有品牌的商品
			if(clicked == 'default'){
				location.href=searchurl+path+'brandid'+'/'+brandid+cid;
			}else{

				//如果点击的是销量或者价格，则保存现在的状态发送给服务器
				location.href=searchurl+path+clicked+'/'+order+'/'+'clicked'+'/'+clicked+'/'+'brandid'+'/'+brandid+cid;
			}
	})

	//用户选中的元素点击取消之后，还原上级的状态(选中品牌之后，再点击回到该分类下的所有品牌)
	$('.user_selected .block').click(function(){
		var path = $('.sortBox').data('path').length==0?'/':'/path/'+$('.sortBox').data('path')+'/',
			clicked = $('.sortMenu>li.on').attr('id'),
			order = $('.sortMenu>li.on').get(0).className == 'upicon' ? 'asc' : 'desc',
			cid = $('.sortBox').data('cid').length==0?'':'/cid/'+$('.sortBox').data('cid');

			//如果没有点击排序则用默认的排序 选择该分类下的所有品牌的商品
			if(clicked == 'default'){
				location.href=searchurl+path+cid;
			}else{

				//如果点击的是销量或者价格，则保存现在的状态发送给服务器
				location.href=searchurl+path+clicked+'/'+order+'/'+'clicked'+'/'+clicked+cid;
			}
	})

	//点击销量排序和价格排序,默认排序的js处理函数
	$('.sortMenu>li').click(function(){
		var order = '',
			field = '',
			path  = $(this).closest('.sortBox').data('path').length==0?'/':'/path/'+$(this).closest('.sortBox').data('path')+'/',
			bid   = $(this).get(0).id,    //向后台传送点击的元素，然后从服务器返回 
			cid   = $(this).closest('.sortBox').data('cid').length==0?'':'/cid/'+$(this).closest('.sortBox').data('cid');
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
			}else{

				//则发送升序的语句
				order = 'asc';
			}

			field = $(this).get(0).id;
			location.href=searchurl+path+field+'/'+order+'/'+'clicked'+'/'+bid+brandid+cid;
			
		}else if($(this).get(0).id=='default'){

			location.href=searchurl+path+brandid+cid;
			
		}else{

			//如果原来是未点击的元素
			if($(this).children('span').hasClass('upicon')){
				order = 'asc';
			}else{
				order = 'desc';
			}
			field = $(this).get(0).id;
			location.href=searchurl+path+field+'/'+order+'/'+'clicked'+'/'+bid+brandid+cid;
			
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
