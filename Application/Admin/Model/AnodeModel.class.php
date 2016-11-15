<?php 
	namespace Admin\Model;
	use Think\Model;
	class AnodeModel extends Model{
		
		public function validata($data=''){
			$rule = array(
				  array('name','require','节点名不能为空'), //新增或修改时判断username格式
				  array('mname','require','控制器名不能为空'), //新增或修改时判断username格式
				  array('aname','require','操作名不能为空'), //新增或修改时判断username格
				);
			if($this->validate($rule)->create($data)){
				return true;
			}else{
				return false;
			}
		}
	}