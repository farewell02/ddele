<?php 
namespace Admin\Model;
use Think\Model\RelationModel;
class AuserModel extends RelationModel
{	
	protected $_link = array(
		'Arole'=>array(
			'mapping_type'=>self::MANY_TO_MANY,
			'relation_table'=>'auser_role',
			'foreign_key' =>'uid',
			'relation_foreign_key'=>'rid',
			'mapping_fields'=>'id,name',
			'mapping_name'=>'role',
		)
	);
// 	array(
// array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
// array(验证字段2,验证规则,错误提示,[验证条件,附加规则,验证时间]),
// ......
// );
	public function validata($data=''){
		$rule = array(
				array('username','','帐号名称已经存在！',1,'unique',3), 
				array('name','require','用户名不能为空',1,'regex',3), 
				array('userpass','/^\w{6,12}$/','密码必须是6-12位的shuzi、字母、下划线',1,'regex',3), 
				array('userrepass','userpass','两次密码不一致',1,'confirm',3), // 验证确认密码是否和密码一致
			);
		$rules = array(
				array('userpass','md5',3,'function'),
				array('time','getTime',3,'callback'),
			);

		if($this->validate($rule)->create($data) && $this->auto($rules)->create($data)){
			return true;
		}else{
			return false;
		}
	}
	public function validatasave($data=''){
		$rule = array(
				array('name','require','用户名不能为空',1,'regex',2),
				array('username','','帐号名称已经存在！',1,'unique',2),
			);
		if($this->validate($rule)->create($data)){
			return true;
		}else{
			return false;
		}
	}
	
	public function getTime($time){
			return $time=date('Y-m-d H-i-s');
		}

}