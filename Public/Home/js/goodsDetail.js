$(function(){
	var page = Math.ceil($('.smphotoUl li').length/5),
	initPage = 0;

	//点击小图上的右按钮进行切换
	$('.rightBtn').click(function(){
		initPage++;
		if(initPage>=page){
			initPage = 0;
		}
		console.log(-initPage*380);
		$('.smphotoUl').animate({
			left:-initPage*380
		})
	})

	//点击小图上的左按钮进行切换
	$('.leftBtn').click(function(){

		initPage--;
		if(initPage<0){
			initPage = page-1;
		}
		$('.smphotoUl').animate({
			left:-initPage*380
		})
	})

	//鼠标移上小图切换大图的src
	$('.smphotoUl li').mouseover(function(){
		//切换中图的图片
		$('#bigImgBox .mdImg img').attr('src',$(this).children('img').attr('src'));

		//切换大图的图片/*******************************************************/
		// $('#bigImgBox .mdImg img').attr('src',$(this).children('img').attr('src'));
	})

	//放大镜效果
	$('#bigImgBox').mouseover(function(event){
		// console.log({'clientx':event.clientX,'pagex':event.pageX});
		$('.zoomBox').show();
		if(event.pageX-$('#bigImgBox').width()-$('#bigImgBox').offset().left>0){
			$('.lgImg').hide();
		}else{
			$('.lgImg').show();
		}
		
		var offsetLeft = $(this).offset().left,
			offsetTop  = $(this).offset().top,
			width      = $(this).width(),
			height     = $(this).height();
			zoomWidth  = $('.zoomBox').width();
			zoomHeight = $('.zoomBox').height();
			percent    = 2;
		$('#bigImgBox').mousemove(function(event){
			var mouseX = event.pageX - offsetLeft,
				mouseY = event.pageY - offsetTop,
				zoomX  = Math.min(width-zoomWidth,Math.max(mouseX - zoomWidth/2,0)),
				zoomY  = Math.min(height-zoomHeight,Math.max(mouseY - zoomHeight/2,0));
				// console.log(mouseY - zoomHeight/2,event.clientY,offsetTop);
			$('.zoomBox').css('left',zoomX).css('top',zoomY);
			$('.lgImg img').css('left',-(zoomX)*2).css('top',-zoomY*2);
		})

	}).mouseout(function(event){
		$('.zoomBox').hide();
		$('.lgImg').hide();
	})


	//商品数量的添加和减少
	$('.addBtn').click(function(){
		var number = parseInt($(this).siblings('input').val());
		$(this).siblings('input').get(0).value= number+1;
		console.log(number)
	})

	$('.minuBtn').click(function(){
		var number = parseInt($(this).siblings('input').val());
		if(number - 1 !=0){
			$(this).siblings('input').get(0).value= number-1;
		}
	})

	$('.package li').click(function(){
		$(this).siblings().removeClass('clicked').end().addClass('clicked');
	})


	//选项卡切换按钮
	$('.threeBox li').eq(0).addClass('click');
	$('.threeBox li').click(function(){
		$(this).siblings().removeClass('click').end().addClass('click');
	})


	//商品详情，商品评论，商品问答顶部选项卡
	$('.threeBox li').click(function(){
		var indexOfli = $('.threeBox li').index($(this));
		$('.threeBox li').removeClass('click');
		$(this).addClass('click');
		$('.largeContainer>div').hide().eq(indexOfli).show();
	})


	//全部评论，好评，中评，差评切换
	$('.commentCat li').click(function(){

		var indexLi = $('.commentCat li').index($(this));
		console.log(indexLi);
		$('.commentCat li').removeClass('on').eq(indexLi).addClass('on');
		$('.criticism').hide().eq(indexLi).show();
	})
})