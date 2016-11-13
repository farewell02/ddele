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
	}