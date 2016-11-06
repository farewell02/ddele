$(function(){

	
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
     	// console.log(index);
     	$(this).parent().find('.briefItem').show().eq(index).hide().end().end().find('.DetailItem').hide().eq(index).show();
     	console.log($(this).parent().find('.briefItem').show().eq(index).hide().end().end().find('.DetailItem').hide().eq(index).show());
     })

})