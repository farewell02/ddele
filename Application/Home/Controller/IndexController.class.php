<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
      layout('layout/layout');
      $this -> display();
    }

    public function goodsList(){
    	layout('layout/layout');
    	$this -> display();
    }
}