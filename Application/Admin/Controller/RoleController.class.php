<?php 
namespace Admin\Controller;

class RoleController extends AdminController{
	private $arole = null; //数据库操作类
	private $anode = null; //节点表数据库对象
	private $arole_node = null; //角色——权限表数据库对象
	private $auser_role = null; //用户--角色表数据库对象

	//初始化操作
	public function _initialize(){
		parent::_initialize();
		$this->arole = D('Arole');
		$this->anode = D('Anode');
		$this->arole_node = D("Arole_node");
		$this->auser_role = D("Auser_role");
	}

	//列表详情
	public function index(){
		$this->display();                                
	}
	public function delete(){
		if(!IS_AJAX){
			$this->error('非法操作');
			exit;
		}
		$id = I('post.id/d');
		// var_dump($id);
		// exit;
        
		$a = $this->arole->delete($id);
		$b = $this->auser_role->where(array('rid'=>array('eq',$id)))->delete();
		$c = $this->arole_node->where(array('rid'=>array('eq',$id)))->delete();
		if($a>0){
			$data['code']=1;
		}else{
			$data['code']=0;
		}
		//重新计算当前页数
		$count1 = D('Arole')->where(array('id'=>array('lt',$id)))->count();    //计算总数
		$count2 = D('Arole')->count();
		if($count1 ==0){
			$data['p']=1;
		}elseif($count1%2==0 && $count2>$count1){
			$data['p']=ceil($count1/2)+1;
		}else{
			$data['p']=ceil($count1/2);
		}
        $this->ajaxReturn($data);
	}

		//加载编辑页面数据 
	public function edit(){
		if(IS_AJAX){
			//查出数据
		$data = $this->arole->where(array('id'=>array('eq',I('id'))))->find();
		$this->ajaxReturn($data);
		}else{
			$this->error('非法操作');
			exit;
		}
	}

	//执行修改操作
	public function save(){
		if(!IS_AJAX){
			$this->error('非法操作');
			exit;
		}
		$data = array();
		$data['id'] = I('post.id');
		$data['status'] = I('post.status');
		$data['name'] = I('post.name');
		$data['remark'] = I('post.remark');
		$arole = D('Arole');
		$role = M('Arole');
		if(!$arole->validateSave($data)){
			return $this -> ajaxReturn(['code'=>'0','mess'=>$arole-> getError()]); 
		}
		if($role->save($data)===false){
			return $this->ajaxReturn(['code'=>'0','mess'=>'保存失败']);
		}else{
			$count1 = D('Arole')->where(array('id'=>array('lt',$data['id'])))->count();    //计算总数
			$count2 = D('Arole')->count();
			if($count1 ==0){
				$arr['p']=1;
			}elseif($count1%2==0 && $count2>$count1){
				$arr['p']=ceil($count1/2)+1;
			}else{
				$arr['p']=ceil($count1/2);
			}
			$arr['code']=1;
			return $this->ajaxReturn($arr);
		}
		
	}

	//为角色分配权限
	public function nodelist(){
		if(!IS_AJAX){
			$this->error('非法操作');
			exit;
		}
		//查找该角色信息
		$list = $this->arole_node->field('nid')->where(array('rid'=>array('eq',I('id'))))->select();
		//查找所有的节点
		// echo $this->arole_node->getLastSql(true);
		// var_dump($list);
		// exit;
		$data=array();
		foreach ($list as $val) {
			$data['nid'][]=$val['nid'];
		}
		$nodes = $this->anode->field('id,name')->where(array('status'=>array('eq','1')))->select();
		// foreach ($nodes as $key => $value) {
		// 	# code...
		// }
		$data['auth']=$nodes;
		$data['rid'] = I('post.id');
		$this->ajaxReturn($data);

	}

	//为角色添加权限
	public function savenode(){
		if(!IS_AJAX){
			$this->error('非法操作');
			exit;
		}
		$arr = I('post.arr');
		if(empty($arr)){
			$data['mess']='提交失败,必须选择一个节点！';
			$data['code'] = 0;
			$this->ajaxReturn($data);
			exit;
		}

		$rid = I('post.id');

		//删除该 角色的 所有信息--避免重复添加
		$this->arole_node->where(array('rid'=>array('eq',$rid)))->delete();

		//开启事物循环添加 必须继承think的db类
		$nodelist = M('Arole_node');
		$nodelist->startTrans();
		foreach($arr as $v){
			$da['nid'] = $v;
			$da['rid'] = $rid;
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
		$count1 = D('Arole')->where(array('id'=>array('lt',$rid)))->count();    //计算总数
			$count2 = D('Arole')->count();
			if($count1 ==0){
				$data['p']=1;
			}elseif($count1%2==0 && $count2>$count1){
				$data['p']=ceil($count1/2)+1;
			}else{
				$data['p']=ceil($count1/2);
			}
		return $this-> ajaxReturn($data);
		
	}

	//执行添加操作
	public function doadd(){
		if(!IS_AJAX){
			$this->error('非法操作');
			exit;
		}
		$arr = I('post.arr');
		if(!$this->arole->validateSave($arr)){
			$data['code']=0;
			$data['mess']=$this->arole->getError();
			return $this->ajaxReturn($data);
		}
		if($this->arole->add()){
			$data['code']=1;
			$data['mess']='角色添加成功';
			$count = D('Arole')->count();
			$data['p'] = ceil($count/2);
			return $this->ajaxReturn($data);
		}
		
	}

}


	


	


	