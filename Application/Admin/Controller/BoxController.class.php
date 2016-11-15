<?php

namespace Admin\Controller;
use Think\Controller;
class BoxController extends Controller {

    public function orders() {//成员详情
        $sql = "1=1";

        
        // $keyword = trim(strip_tags(htmlspecialchars(strtolower(urldecode(iconv("gb2312","UTF-8",$_GET['keyword']))))));
        $keyword = $_GET['keyword'];
        
        if (!empty($keyword)) {
            $sql .= " AND username like '%" . $keyword . "%'";
        }
        $count = D('Auser')->where($sql)->count();    //计算总数
        $Page = new \Think\PageAjax($count, 3);
//          
        $lists = D('Auser')->where($sql)->page($_GET['p'],'3')->order('id ASC')->relation(true)->select();
         $this->assign("count", $count);
        $this->assign("page", $Page->show());
        $this->assign("lists", $lists);
        $this->assign("keyword", $keyword);
        $this->display('Box/orders');
    }


    public function role() {//成员详情
        $sql = "1=1";        
        // $keyword = trim(strip_tags(htmlspecialchars(strtolower(urldecode(iconv("gb2312","UTF-8",$_GET['keyword']))))));
        $keyword = $_GET['keyword'];
        if (!empty($keyword)) {
            $sql .= " AND name like '%" . $keyword . "%'";
        }
        $count = D('Arole')->where($sql)->count();    //计算总数
        $Page = new \Think\PageAjax($count, 2);
//          
        $lists = D('Arole')->where($sql)->page($_GET['p'],'2')->order('id ASC')->relation(true)->select();
        // var_dump($lists);
        // exit;
        // $this->assign("count", $count);
        $this->assign("page", $Page->show());
        $this->assign("lists", $lists);
        $this->assign("keyword", $keyword);
        $this->display('Box/role');
    }

    public function node() {//成员详情
        $sql = "1=1";        
        // $keyword = trim(strip_tags(htmlspecialchars(strtolower(urldecode(iconv("gb2312","UTF-8",$_GET['keyword']))))));
        $keyword = $_GET['keyword'];
        if (!empty($keyword)) {
            $sql .= " AND name like '%" . $keyword . "%'";
        }
        $count = D('Anode')->where($sql)->count();    //计算总数
        $Page = new \Think\PageAjax($count, 8);
//          
        $lists = D('Anode')->where($sql)->page($_GET['p'],'8')->order('id ASC')->select();
        // var_dump($lists);
        // exit;
        // $this->assign("count", $count);
        $this->assign("page", $Page->show());
        $this->assign("lists", $lists);
        $this->assign("keyword", $keyword);
        $this->display('Box/node');
    }


    public function category(){
         $sql = "1=1";        
        $keyword = $_GET['keyword'];
        if (!empty($keyword)) {
            $sql .= " AND name like '%" . $keyword . "%'";
        }
        $count = D('Category')->where($sql)->count();    //计算总数
        $Page = new \Think\PageAjax($count, 8);         
        // $list = D('Category')->where($sql)->page($_GET['p'],'8')->order('id ASC')->select();
        //对数组进行排序处理
        $lists = D('Category')->getArr($sql);
        $num = ($_GET['p']-1)*8;
        $list = array_slice($lists,$num,8);
        // var_dump($lists);
        // exit;
        // $this->assign("count", $count);
        $this->assign('p',$_GET['p']);
        $this->assign("page", $Page->show());
        $this->assign("list", $list);
        $this->assign("keyword", $keyword);
        $this->display('Box/category');
    }

}


