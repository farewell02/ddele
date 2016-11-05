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
})