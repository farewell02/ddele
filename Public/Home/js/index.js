$(function(){
	var timer = null;
		page = 0;
	timer = setInterval(function(){
		var length = $('.switchBtn a').length;
		page++;
		if(page >= length){
			page = 0;
		}
		console.log(page);
		changeSwitchBtn(page);
		changeBg(page);
	},2000);
	function changeSwitchBtn(page){
		$('.switchBtn a').css({'background':'url(http://localhost/ddEle/Public/Home/img/home_sprite2_1017.png) -65px -542px no-repeat'}).eq(page).css({'background':'url(http://localhost/ddEle/Public/Home/img/home_sprite2_1017.png) -81px -542px no-repeat'})
	}
	function changeBg(page){
		$('#broadCast>div ul').hide().eq(page).show();
	}
	$('.switchBtn a').mouseover(function(){
		if(timer){
			clearInterval(timer);
		}
		page = $('.switchBtn a').index($(this));
		changeSwitchBtn(page);
		changeBg(page);
	}).mouseout(function(){
		if(timer){
			clearInterval(timer);
		}
		timer = setInterval(function(){
		var length = $('.switchBtn a').length;
		page++;
		if(page >= length){
			page = 0;
		}
		console.log(page);
		changeSwitchBtn(page);
		changeBg(page);
		},2000);
	})
	//鼠标移上去时分类改变
	$('.cat_box li').mouseover(function(){
		var indexOfli = $('.cat_box li').index($(this));
		$('.middleNav').each(function(){
			$(this).hide();
		}).eq(indexOfli).show();
	})

	//首页顶部大轮播图
	 $('#slider').nivoSlider({
            controlNav:true,
            effect:'fold',
            directionNav:false
     });

	 //首页顶部右下角轮播图
     $('#showImg').nivoSlider({
     		directionNav:false,
            effect:'sliceUpLeft'
     });

     //楼层展示最右侧商品排名
     $('.briefItem').mouseover(function(){
     	var index = $(this).parent().find('.briefItem').index($(this));
     	$(this).parent().find('.briefItem').show().eq(index).hide().end().end().find('.DetailItem').hide().eq(index).show();
     })

     //
     $('.rgFloorTop li').mouseover(function(){
     	var index = $(this).parent().find('li').index($(this));
     	$('.rgFloorTop li').removeClass('on').eq(index).addClass('on').closest('.rightFloor').find('.rgFloorRank').hide().eq(index).show();
     })


     //鼠标悬停移动箭头,移出立即停止动画，并运动到目标点
     $('.floor_floor li').mouseover(function(){
     	var index = $('.floor_floor li').index($(this));
     	$('.floorContent').hide().eq(index).show();
     	$(this).parent().next().animate({
     		left:index*180+90
     	},'slow')
     }).mouseout(function(){
     	$('.arrow').finish();
     })
})