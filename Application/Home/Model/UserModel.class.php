<?php 
namespace Home\Model;
use Think\Model;
class UserModel extends Model
{
	//字段映射
	protected $_map =array(
		'txt_username' => 'name',
		'txt_password' => 'pass'
		);
	//自动验证
// 	array(
// array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
// array(验证字段2,验证规则,错误提示,[验证条件,附加规则,验证时间]),
// ......
// );
	protected $_valide =array(
		array('pass','checkPass','密码长度不正确',1,'callback',3),
		array('name','checkName','邮箱/手机格式不正确',1,'callback',3)
		);

	//自动完成
	protected $_auto = array(
		array('pass','md5',3,'function')
		);
	public function checkPass($pass){
		if(mb_strlen($pass)>5 && mb_strlen($pass)<=20){
			return true;
		}else{
			return false;
		}
	}


	public function checkName($name){
		if(preg_match_all('/^1[3,4,5,7,8][0-9]{9}$/', $name)>0 || preg_match_all('/^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$/', $name)>0){
			return true;
		}else{
			return false;
		}
	}
}
