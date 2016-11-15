<?php 
namespace Admin\Controller;

//分类 控制器
class CategoryController extends AdminController{
	

	//结果列表
	public function index(){
		
		$this->display();
	
	}

	//删除
	public function delete(){

		if(!IS_AJAX){
				$this->error('非法操作');
				exit;
			}
		//实例化
		$category = D('Category');
		$id = I('post.id/d');
		$map['id'] = array('eq',$id);
		$map['path']=array('like','%'.$id.'%');
		$map['_logic'] = 'or';
		// //拼装删除条件
		// $map['id'] = array('eq',I('id'));
		// $map['path'] = array('like','%'.I('id').'%');
		// $map['_logic'] = 'or';
		if($category->where($map)->delete()>0){
			$data['code']=1;
			$data['mess']='删除成功';
		}else{
			$data['code']=0;
			$data['mess']='删除失败';
		}
		$this->ajaxReturn($data);
	}

	//加载修改页面c 
		public function edit(){

			if(!IS_AJAX){
				$this->error('非法操作');
				exit;
			}
			$id = I('post.id/d');
			$data = D('Category')->where(array('id'=>array('eq',I('id'))))->find();
			$this->ajaxReturn($data);
			
		}

		public function save(){
			if(!IS_AJAX){
				$this->error('非法操作');
				exit;
			}
			$arr = I('post.arr');
			$cate = D('Category');
			if(!$cate->validatasave($arr)){
				return $this -> ajaxReturn(['code'=>'0','mess'=>$cate-> getError()]); 
			}
			if($cate->save()===false){
				return $this->ajaxReturn(['code'=>'0','mess'=>'保存失败']);
			}else{
				$data['code']=1;
				$data['mess']='保存成功';
				return $this->ajaxReturn($data);
			}
			
		}

	public function addson(){
		if(!IS_AJAX){
				$this->error('非法操作');
				exit;
		}
		$arr = I('post.arr');
		$cate = D('Category');
		if(!$cate->validatason($arr)){
			return $this -> ajaxReturn(['code'=>'0','mess'=>$cate-> getError()]); 
		}
		if($cate->add()===false){
			return $this->ajaxReturn(['code'=>'0','mess'=>'添加子分类失败']);
		}else{
			$data['code']=1;
			$data['mess']='添加子分类成功';
			return $this->ajaxReturn($data); 
		}

	}

	//加载添加页面
	//执行添加信息
	public function doadd(){
		if(!IS_AJAX){
				$this->error('非法操作');
				exit;
		}
		$arr = I('post.arr');
		$cate = D('Category');
		if(!$cate->validataadd($arr)){
			return $this -> ajaxReturn(['code'=>'0','mess'=>$cate-> getError()]); 
		}
		if($cate->add()===false){
			return $this->ajaxReturn(['code'=>'0','mess'=>'添加一级分类失败']);
		}else{
			$data['code']=1;
			$data['mess']='添加一级分类成功';
			return $this->ajaxReturn($data); 
		}
	}
	
	/**
	 * 分类树显示
	*/
	public function treeList(){
		//实例化
		$category = D('Category');
		//获取分类信息
		$list = $category->getHomeCate();
		//V($list);
		$this->assign('list',$list);
		$this->display();
	}

}

