<?php 
	namespace Admin\Controller;
	
	class NodeController extends AdminController{
		private $node = null; //数据库操作类

		//初始化操作
		public function _initialize(){
			parent::_initialize();
			$this->node = D('Anode');
		}

		//列表详情
		public function index(){
		
			$this->display();
		}

		//删除操作
		public function delete(){
			if(!IS_AJAX){
				$this->error('非法操作');
				exit;
			}
			$id = I('post.id/d');

			$a = $this->node->delete($id);
			$b = M('Arole_node')->where(array('nid'=>array('eq',$id)))->delete();
			if($a>0){
				$data['mess']="删除成功";
				$data['code']=1;
			}else{
				$data['mess']="删除失败";
				$data['code']=0;
			}
			//重新计算当前页数
			$count1 = D('Anode')->where(array('id'=>array('lt',$id)))->count();    //计算总数
			$count2 = D('Anode')->count();
			if($count1 ==0){
				$data['p']=1;
			}elseif($count1%8==0 && $count2>$count1){
				$data['p']=ceil($count1/8)+1;
			}else{
				$data['p']=ceil($count1/8);
			}
			$this->ajaxReturn($data);
		}

		//加载修改页面c 
		public function edit(){

			if(!IS_AJAX){
				$this->error('非法操作');
				exit;
			}
			$data = $this->node->where(array('id'=>array('eq',I('id'))))->find();
			$this->ajaxReturn($data);
			
		}
			//执行修改操作
		public function save(){
			if(!IS_AJAX){
				$this->error('非法操作');
				exit;
			}
			$arr = I('post.arr');
			$anode = D('Anode');
			$node = M('Anode');
			if(!$anode->validata($arr)){
				return $this -> ajaxReturn(['code'=>'0','mess'=>$anode-> getError()]); 
			}
			if($anode->save()===false){
				return $this->ajaxReturn(['code'=>'0','mess'=>'保存失败']);
			}else{
				$count1 = D('Anode')->where(array('id'=>array('lt',$arr['id'])))->count();    //计算总数
				$count2 = D('Anode')->count();
				if($count1 ==0){
					$data['p']=1;
				}elseif($count1%8==0 && $count2>$count1){
					$data['p']=ceil($count1/8)+1;
				}else{
					$data['p']=ceil($count1/8);
				}
				$data['code']=1;
				$data['mess']='保存成功';
				return $this->ajaxReturn($data);
			}
			
		}
			//执行添加操作
		public function doadd(){
			if(!IS_AJAX){
				$this->error('非法操作');
				exit;
			}
			$arr = I('post.arr');

			if(!$this->node->validata($arr)){
				$data['code']=0;
				$data['mess']=$this->node->getError();
				return $this->ajaxReturn($data);
			}

			if($this->node->add()){
				$data['code']=1;
				$data['mess']='节点添加成功';
				$count = D('Anode')->count();
				$data['p'] = ceil($count/8);
				return $this->ajaxReturn($data);
			}else{
				$data['code']=0;
				$data['mess']='节点添加失败';
				return $this->ajaxReturn($data);
			}
		}

		
	}

 ?>