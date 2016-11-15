<?php 
namespace Admin\Controller;
class UserController extends AdminController
{	
	private $auser = null;
	private $arole = null;
	private $auser_role = null;
	//初始化操作
	public function _initialize(){
		parent::_initialize();
		$this->auser = D('Auser');
		$this->arole = D('Arole');
		$this->auser_role = D('Auser_role');
	}
	public function index(){
		// $list = $this->auser->relation(true)->page($_GET['p'],'1')->select();
		// // echo '<pre>';
		// // print_r($list);
		// // echo '</pre>';
		// // exit;
		// $this->assign('list',$list);
		// $count = $this->auser->count();
		// $page = new \Think\Page($count,1);
		// $show = $page->show();
		// $this->assign('page',$show);
		$this->display();
		

	}
	public function delete(){
		$id = I('post.id/d');
		// var_dump($id);
		// exit;
        
		$a = $this->auser->delete($id);
		$b = $this->auser_role->where(array('uid'=>array('eq',$id)))->delete();
		if($a>0){
			$data['code']=1;
		}else{
			$data['code']=0;
		}
		//重新计算当前页数
		$count1 = D('Auser')->where(array('id'=>array('lt',$id)))->count();    //计算总数
		$count2 = D('Auser')->count();
		if($count1 ==0){
			$data['p']=1;
		}elseif($count1%3==0 && $count2>$count1){
			$data['p']=ceil($count1/3)+1;
		}else{
			$data['p']=ceil($count1/3);
		}
        $this->ajaxReturn($data);
	}

	//修改
	public function edit(){

		if(!IS_AJAX){
			$this->error('非法操作');
			exit;
		}
		$data =$this->auser->field('id,username,name')->where(array('id'=>array('eq',I('id'))))->find();
		$this->ajaxReturn($data);
	}
	public function save(){
		if(!IS_AJAX){
			$this->error('非法操作');
			exit;
		}
		$arr = I('post.arr');
		if(!$this->auser->validatasave($arr)){
			$data['code']=0;
			$data['mess']=$this->auser->getError();
			return $this->ajaxReturn($data);
		}
		if($this->auser->save() === false){
			$data['code']=0;
			$data['mess']='保存失败';
			return $this->ajaxReturn($data);
		}else{
			$count1 = D('Auser')->where(array('id'=>array('lt',$arr['id'])))->count();    //计算总数
			$count2 = D('Auser')->count();
			if($count1 ==0){
				$data['p']=1;
			}elseif($count1%3==0 && $count2>$count1){
				$data['p']=ceil($count1/3)+1;
			}else{
				$data['p']=ceil($count1/3);
			}
			$data['code']=1;
			$data['mess']='修改成功';
			return $this->ajaxReturn($data);
		}		
	}
	public function rolelist(){
		if(!IS_AJAX){
			$this->error('非法操作');
			exit;
		}
		//查找该用户信息
		$list = $this->auser_role->field('rid')->where(array('uid'=>array('eq',I('id'))))->select();

		$data=array();
		foreach ($list as $val) {
			$data['rid'][]=$val['rid'];
		}
		$roles = $this->arole->field('id,name')->where(array('status'=>array('eq','1')))->select();
		$data['roles']=$roles;
		$data['uid'] = I('post.id');
		$this->ajaxReturn($data);
	}
	public function saverole(){
		if(!IS_AJAX){
			$this->error('非法操作');
			exit;
		}
		$arr = I('post.arr');
		if(empty($arr)){
			$data['mess']='提交失败,必须选择一个角色！';
			$data['code'] = 0;
			$this->ajaxReturn($data);
			exit;
		}

		$uid = I('post.id');
		//删除该 角色的 所有信息--避免重复添加
		$this->auser_role->where(array('uid'=>array('eq',$uid)))->delete();
		//开启事物循环添加 必须继承think的db类
		$nodelist = M('Auser_role');
		$nodelist->startTrans();
		foreach($arr as $v){
			$da['rid'] = $v;
			$da['uid'] = $uid;
			//执行添加
			if($nodelist->data($da)->add()===false){
				$nodelist->rollback();
				$data['mess']='提交失败';
				$data['code'] = 0;
				return $this->ajaxReturn($data);
			}			
		}
		$nodelist->commit();
		$data['mess']='提交成功';
		$data['code'] = 1;
		$count1 = D('Auser')->where(array('id'=>array('lt',$uid)))->count();    //计算总数
			$count2 = D('Auser')->count();
			if($count1 ==0){
				$data['p']=1;
			}elseif($count1%3==0 && $count2>$count1){
				$data['p']=ceil($count1/3)+1;
			}else{
				$data['p']=ceil($count1/3);
			}
		return $this-> ajaxReturn($data);
	}

	
	public function doadd(){
		if(!IS_AJAX){
			$this->error('非法操作');
			exit;
		}
		$arr = I('post.arr');

		if(!$this->auser->validata($arr)){
			$data['code']=0;
			$data['mess']=$this->auser->getError();
			return $this->ajaxReturn($data);
		}

		if($this->auser->add()){
			$data['code']=1;
			$data['mess']='角色添加成功';
			$count = D('Auser')->count();
			$data['p'] = ceil($count/3);
			return $this->ajaxReturn($data);
		}else{
			$data['code']=0;
			$data['mess']='角色添加失败';
			return $this->ajaxReturn($data);
		}
	}

}