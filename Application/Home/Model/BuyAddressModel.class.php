<?php 

	namespace Home\Model;
	use \Think\Model;

	class BuyAddressModel extends Model{
		protected $tableName = 'buyaddress';
		protected $fields = ['id','uid','province','city','county','road','postcode','isdefault','phone','name'];
		protected $_map = ['ship_man'=>'name','addr_detail'=>'road','ship_zip'=>'postcode','ship_phone'=>'phone','default_flg'=>'isdefault'];
		protected $_validate = [			
								  ['road','/^[\x{4e00}-\x{9fa5}]+[0-9a-zA-Z]*.*?$/u','街道地址不能为空',1],
								  ['phone','/^1[34578]\d{9}$/i','手机号不正确',1],
								  ['postcode','/^[1-9][0-9]{5}$/','邮政编码不正确',1]
							   ];


		public function checkAddrIsDefault($id){
			$data = $this -> where(['id'=>['eq',$id]]) -> find();
			if($data){
				if($data['isdefault']==1){
					return true;
				}
			}else{
				return false;
			}
		}
	}
