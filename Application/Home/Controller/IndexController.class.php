<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

	//首页展示
    public function index(){
      layout('layout/layout');
      $this -> display();
    }

    //商品列表展示
    public function goodsList(){
    	layout('layout/layout');
    	$this -> display();
    }

    //详情页面展示
    public function goodsDetail(){
    	layout('layout/layout');
    	$this -> display();
    }

    //商品收藏展示
    public function goodsCollect(){
        layout('layout/layout');
        $this -> display();
    }
}