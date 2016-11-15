<?php
namespace Home\Controller;
use \Think\Controller;
class CartController extends Controller{
	public function index(){
	//获取购物车所需要的所有的数据
		$list = M('Cart')
			->alias('c')
			->where('gimg.isMain=1')
			->field('c.*,gimg.imgUrl as url,gimg.spuId')
			->join('__SPU_SKU__ spk on spk.skuId=c.skuId')
			->join('__GOODSIMG__ gimg on gimg.spuId = spk.spuId')
			->select();
		$this->assign('list',$list);
		$this->display();
	}
	public function insert(){
			
		//接口插入购物车

			$skuId=I('skuId');
			// $skuId=1;
			$list = M('Goodsdetail')
			->alias('g')
			->where('g.skuId ='.$skuId)
			->field('g.goodsName as gname,g.price as gprice,pro.name as pname,val.name as value')
			->join('__GOODS_SKU__ gds on gds.skuId = g.skuId')
			->join('__PROPERTY__ pro on pro.id = gds.proId')
			->join('__PROVAL__ val on gds.proValId=val.id')
			->select();
			foreach ($list as $val) {
				$data['rule'].=$val['pname'].':'.$val['value'].'  ';
				$data['price']=$val['gprice'];
				$data['name'] = $val['gname'];
			}
			$data['addedTime']=time();
			$data['skuId']=$skuId;
			$data['uid']=$_SESSION['home']['id'];
			// $data['uid']=1;
			$arr=M('Cart')->where(array('skuId'=>array('eq',$skuId)))->select();
			if($arr){
					$temp['number'] = $arr[0]['number'] + 1;
					$temp['addedTime']=time();
					if(M('Cart')->data($temp)->where(array('skuId'=>array('eq',$skuId)))->save()===false){
						$return['code']=0;
						$return['mess']='添加失败';
						return	$this->ajaxReturn($return);
					}else{
						$return['code']=1;
						$return['mess']='添加成功';
						return	$this->ajaxReturn($return);

					}
			}else{
					$data['number']=1;
					if(M('Cart')->data($data)->add()){
						$return['code']=1;
						$return['mess']='添加成功';
						return	$this->ajaxReturn($return);
					}else{
						$return['code']=0;
						$return['mess']='添加失败';
						return	$this->ajaxReturn($return);
					}
			}
		}
	
	



}

