$(function(){
  // var url = 'http://localhost/ddEle/index.php/Home/Index/city';
  var url = '/ddEle/index.php/Home/Index/city.html';
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
  $('.button_delete').click(function(){
  		$.ajax({
		url:'city',
		xhr:function(){
			var xhr = $.ajaxSettings.xhr();  
			xhr.onprogress = function(ev){
				console.log('progressing');
			}
			return xhr;
		},
		data:{'id':20},
		type:'post',
		async:false,
		beforeSend:function(){
			modal(true);
		},
		success:function(){
			modal(false);
			console.log('success');
		}
	})
  })
	



	/**
	 * [getProvince 得到省]
	 * @param  {[type]} url [description]
	 * @return {[type]}     [description]
	 */
	function getProvince(url,id){
		var province = id;
		$.ajax({
				url:url,
				data:{'parent_id':province},
				dataType:'json',
				type:'post',
				async:false,
				success:function(data){
					var html = '';
					$.each(data.city,function(i){
						html += '<option value="'+data.city[i].id+'">'+data.city[i].name+'</option>';
					})

					//输出省列表
					$('#province').html(html);
				}
			})
	}

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

	getProvince(url,0);
	getCitys(url);
	getCounty(url);

	//省变动
	$('#province').bind('change',function(){
		getCitys(url);
		getCounty(url);
   })

	//市变动
	$('#city').bind('change',function(){
		getCounty(url);
	})


	
})