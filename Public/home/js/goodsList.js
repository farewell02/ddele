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

	// $('.firstCatUl>li').mouseenter(function(){
	// 	$(this).css('background','#FCF0E8');
	// })
})
