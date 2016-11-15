<?php 
namespace Admin\Model;
use Think\Model\RelationModel;
class AroleModel extends RelationModel
{	
	protected $_map =array(
		'username'=>'name',
		'userremark'=>'remark',
		'userid'=>'id',
		'userstatus'=>'status'
	);

	public function validateSave($data=''){
		$rules=array(
			array('name','checkName','用户名字必须在2-8位',1,'callback',3),
			array('remark','require','说明不能为空',1,'',3),
			array('status',array(0,1),'状态必须为启用或禁止',1,'in',3),
		);
		if($this->validate($rules)->create($data)){
			return true;
		}else{
			return false;
		}
	}


	protected $_link = array(
		'Anode'=>array(
			'mapping_type'=>self::MANY_TO_MANY,
			'relation_table'=>'arole_node',
			'foreign_key' =>'rid',
			'relation_foreign_key'=>'nid',
			'mapping_name'=>'node',
			'mapping_fields'=>'mname,aname,status',
		)
	);
	public function checkName($name)
		{
			if(mb_strlen($name)>=2 && mb_strlen($name)<=8){
				return true;
			}else{
				return false;
			}

		}
}