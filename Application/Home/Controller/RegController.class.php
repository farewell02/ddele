<?php 
namespace Home\Controller;
use \Think\Controller;

/**
 * 
 */

class RegController extends Controller
{	
	
	public function index()
	{
		$this->display();
	}
	public function code(){
		$verify = new \Think\Verify();
		$verify->fontSize = 35;
		$verify->length =4;
		$verify->useNoise = false;
		$verify->useImgBg = true;
		// $verify->expire = 60;
		$verify->entry();
	}
	public function verifyCode()
	{
		if(IS_AJAX){
			$code = I('post.code');
			$verify = new \Think\Verify();
			// $verify->expire = 60;
			$arr = array();
			if($verify->check($code)){
				$arr['code'] =1;
				$arr['msg']  ='';
			}else{
				$arr['code']=0;
				$arr['msg']='图形验证码输入错误，请重新输入';
			}
			$this->ajaxReturn($arr);
		}else{
			$this->error('未知错误');
		}
	}
	//验证传来的用户是否已存在
	public function verifyUser()
	{
		if(IS_AJAX){
			$map['name']= I('post.username');
			$name = I('post.username');
			$user = D('User');
			if($user->where($map)->find()){
				if(strpos($name,'@') === false)
				{
					$data['msg'] = "该手机号码已被注册,请更换手机或使用该手机<a href='http://web.com/index.php/home/Login/index'>登录<a>";
				}else
				{
					$data['msg'] = "该邮箱已被注册,请更换邮箱或使用该邮箱<a href='http://web.com/index.php/home/Login/index'>登录<a>";
				}
				$data['code'] = 0;
			}else{
				$data['msg'] = '';
				$data['code'] = 1;
			}
			$this->ajaxReturn($data);
		}else{
			$this->error('未知错误');
		}
	}

	//插入字段验证
	public function insert()
	{
		$user = D('User');
		if(!$user->create()){
			$this->error($user->getErrpr());
		}elseif($user->add()>0){
			$this->success('注册成功');
			// $this->redirect('Login:index');
		}else{
			$this->error('注册失败');
		}
	}	











}



