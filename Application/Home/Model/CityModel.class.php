<?php 
	namespace Home\Model;
	use \Think\Model;

	class CityModel extends Model{


		public function generateCity($data){
			$container = [];
       		$arr = [];

      		//处理结果数组并合并
	       foreach($data as $key => $value){
	            $province = $this->field('name,id') ->  where(['id'=>['eq',$value['province']]]) -> find();
	            $city    = $this ->field('name,id') ->  where(['id'=>['eq',$value['city']]]) -> find();
	            $county  = $this ->field('name,id') ->  where(['id'=>['eq',$value['county']]]) -> find();
	            $container= ['pname'=>$province['name'],'proId'=>$province['id'],'cname'=>$city['name'],'tname'=>$county['name'],'cityId'=>$city['id'],'countyId'=>$county['id']];
	            $arr[] = array_merge($value,$container);
	       }
	       return $arr;
		}
	}