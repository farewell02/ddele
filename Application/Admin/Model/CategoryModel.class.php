<?php 
namespace Admin\Model;
use Think\Model;

class CategoryModel extends Model{


	//处理数据 合成规律数组
	public function getArr($sql='1=1',$id=0){
		if($sql!='1=1'){
			$list = $this->where($sql)->select();
			return $list;
		}else{
		$list = $this->select();
		//处理分类信息
		$list = $this->doArr($list,"——",$id,0);
		return $list;
		}
	}

	public function doArr($cate,$html="——",$pid=0, $level=0){
		$arr = array();
		foreach($cate as $v){
			if($v['pid']==$pid){
				$v['html']= str_repeat($html, $level);
				$v['level'] = $level;
				$arr[] = $v;
				$arr = array_merge($arr,$this->doArr($cate,$html,$v['id'],$level+1));
			}
		}
		return $arr;
	}
	//编辑时候用的自动验证
	public function validatasave($data=''){
		$rule = array(
				array('name','require','分类名不能为空'),
			);
		if($this->validate($rule)->create($data)){
			return true;
		}else{
			return false;
		}
	}
	public function validatason($data=''){
		$rule = array(
				array('name','require','子分类不能为空'),
			);
		$rules = array(
				array('path','getPath',1,'callback'),
			);
		if($this->validate($rule)->create($data) && $this->auto($rules)->create($data)){
			return true;
		}else{
			return false;
		}

	}

	public function validataadd($data=''){
		$rule = array(
				array('name','require','一级分类名不能为空'),
			);
		$rules = array(
				array('path','getPath',1,'callback'),
				array('pid','0'),
			);
		if($this->validate($rule)->create($data) && $this->auto($rules)->create($data)){
			return true;
		}else{
			return false;
		}
	}
	public function getPath(){
		$arr = I('post.arr');
		$list = $this->field('id,path')->find($arr['pid']);
		if($list){
			return $list['path'].$list['id'].',';
		}else{
			return '0,';
		}
	}
	//获取分类树
	public function getHomeCate($id=0, $field=true){
        //获取所有分类信息
        $list = $this->field($field)->select();
        //处理分类信息
        $list =  $this->getTreeCate($list, $id, 'child');
        //如果 存在id
        if (is_numeric($id) && $id > 0) {
            $arr = $this->field($field)->find($id);
            $arr['child'] = $list;
            return $arr;
        }
       // V($list);
        //返回
        return $list;
    }

     private function getTreeCate($cate,$pid=0,$name="child"){
          $arr = array();
          //遍历
          foreach($cate as $v){
            if($v['pid'] == $pid){
                $v[$name] = $this->getTreeCate($cate,$v['id']);
                $arr[] = $v;
            }
          }
          return $arr;
    }

}
