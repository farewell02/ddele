<?php 
namespace Admin\Controller;
use Think\Controller;
// 公共控制器
class AdminController extends Controller
{
	public function _initialize(){
		if(empty($_SESSION['admin_user'])){
			$this->redirect('Login/index');
			exit;
		}

		$mname = CONTROLLER_NAME;
		$aname = ACTION_NAME;
		$nodelist =$_SESSION['admin_user']['nodelist'];
		if($_SESSION['admin_user'][0]['username'] != 'admin'){
			// var_dump($nodelist);
			if(isset($_SESSION['admin_user']['nodelist'][$mname]) && in_array($aname, $_SESSION['admin_user']['nodelist'][$mname])){
			}else{
				$this->error('对不起没有操作权限');
				exit;
			}
		}
	}
	// public function _empty()
	// {
	// 	$this->display();
	// }
	
}