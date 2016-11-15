<?php 

	namespace Home\Model;
	use Think\Model;

	class IndexModel extends Model{

		protected $tableName = 'goods';

		/**
		 * [sf description]
		 * @param  string  $status [要查出的条件] max(price) max(salenumber)
		 * @param  integer $catid  [顶级分类id]
		 * @return [type]          [该顶级分裂下的符合条件的数据]
		 */
		public function getspuInfo($status='max(price)',$alias='price',$catid=1){
		   $field =substr($status,strpos($status,'(')+1,strpos($status,')')-strlen($status));
		   $sql = 'select spuid ,'. $status.' '.$alias.' from category cat inner join goods gd on gd.catid=cat.id inner join spu_sku pk on pk.spuid= gd.id inner join goodsdetail gdd on gdd.skuid = pk.skuid where cat.path like "0,'.$catid.'%" group by pk.spuid';
		   $result = $this -> query($sql);
		   $product = [];
		   foreach($result as $key => $value){
	   			  $product[]= $this->query('select * from category cat inner join goods gd on gd.catid=cat.id inner join spu_sku pk on pk.spuid= gd.id inner join goodsdetail gdd on gdd.skuid = pk.skuid left join goodsimg gimg on gimg.spuid=pk.spuid and gimg.ismain=1 where pk.spuid='.$value['spuid'].' and gdd.'.$field.'='.$value[$alias])[0];
	  		}
		   return $product;
		}

		/*得到该分类下的所有的sku产品*/
		public function getAllspu($catid=1,$order=''){
			$sql = 'select * from category cat inner join goods gd on gd.catid=cat.id inner join spu_sku pk on pk.spuid= gd.id inner join goodsdetail gdd on gdd.skuid = pk.skuid left join goodsimg gimg on gimg.spuid=pk.spuid and gimg.ismain=1 where cat.path like "0,'.$catid.'%"'.' '.$order;
			return $this -> query($sql);
		} 


		public function searchGoods($path='0,1%',$brand='',$spu='',$order='',$limit="",$count=false){

			   //path是必须的
			   if(!empty($path)){
			   		if(strpos($path,'%')){
					  $where = 'WHERE path LIKE "'.$path.'"';
				   }else{
				   	  $where = 'WHERE path = "'.$path.'"';
				   }

			   }else{

			   		//如果Path是空的
			  		$where = '';
			   }
			   
			   if(!empty($brand)){
			   		if(empty($path)){
			   			$where.= 'WHERE gdb.brandid ='.$brand;
			   		}else{
			   			$where.= ' AND gdb.brandid ='.$brand;
			   		}
				  
			   }

			   if(!empty($spu)){
			   		if(empty($path)){
			   			if(empty($brand)){
			   				$where.='WHERE pk.spuid='.$spu;
			   			}else{
			   				$where.=' AND pk.spuid='.$spu;
			   			}
			   		}else{
			   			$where.= ' AND pk.spuid='.$spu;
			   		}   	  
			   }

			   //判断有无排序
			   if(empty($order)){
				   $order = '';
			   }else{
			       $order = ' ORDER BY '.$order ;// 'order by '.‘ price desc’;
			   }

			   if(!empty($limit)){
			   	   $limit = 'LIMIT '.$limit;
			   }else{
			   	   $limit = '';
			   }

			   $sql = 'select cat.id catid,gd.name spuname,cat.catname,cat.path,gd.id spuid,gdd.skuid skuid,gdd.price,gdd.status,gdd.goodsname skusname,gdd.salenumber,gimg.imgurl,gimg.ismain,bd.id,bd.brandname,bd.logo,bd.url brandurl,bd.id bdid from category cat inner join goods gd on gd.catid=cat.id inner join spu_sku pk on pk.spuid= gd.id inner join goodsdetail gdd on gdd.skuid = pk.skuid and gdd.status=1 left join goodsimg gimg on gimg.spuid=pk.spuid and gimg.ismain=1 inner join goods_brand gdb on gdb.goodsid = gd.id inner join brand bd on bd.id=gdb.brandid '.$where.' group by pk.spuid '.$order.' '.$limit;

			   $sqlcount = 'select count(*) as counts from category cat inner join goods gd on gd.catid=cat.id inner join spu_sku pk on pk.spuid= gd.id inner join goodsdetail gdd on gdd.skuid = pk.skuid gdd.status=1 left join goodsimg gimg on gimg.spuid=pk.spuid and gimg.ismain=1 inner join goods_brand gdb on gdb.goodsid = gd.id inner join brand bd on bd.id=gdb.brandid '.$where.' group by pk.spuid '.$order.' '.$limit;

			   if($count){
			   		$counts = $this -> query($sql);
			   		$counts = count($counts);
			   		// $sum = 0;
			   		// foreach($counts as $key => $value){
			   		// 	$sum+=$value['counts'];
			   		// }
			   	   return $counts;

			   }else{
     			   return $this -> query($sql);
			   }
			   
		  }
	}