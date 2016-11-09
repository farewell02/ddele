$(function(){

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


	$('.sortMenu>li').mouseover(function(){
		$('.sortMenu>li').removeClass('on');
		$(this).addClass('on');
	})

	//收货地城市下拉框
	$('.selectBox').mouseover(function(){
		$(this).children('.provinceDetail').show();
	})
	$('.provinceDetail').mouseout(function(){
		$(this).hide();
	})

	


})