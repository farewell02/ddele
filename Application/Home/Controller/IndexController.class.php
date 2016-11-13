<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    public function checkUser(){
        session_start();

        //**存放用户信息用于测试**
        session('home.id',1);
        if(empty(session('home.id'))){
            $this -> error('请先登录之后再进行操作!',U('login/index'));
        }
    }

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

    //****************商品收藏展示和收货地址管理显示****************************
    public function goodsCollect($show='goodsCollect'){

        //检查用户是否登录
        $this -> checkUser(); 
        // dump($_SESSION);
        // exit;
        $uid = session('home.id');
        $addressModel = M('buyaddress'); //实例化地址模型类
        $cityModel    = D('city');       //实例化城市模型类
        $userModel    = M('user');       //实例化用户模型类
        $collectModel = M('goodscollect');   //实例化商品收藏模型类
        $listRows = 2;                     //每页显示的个数
        // $collectModel = M('comment');   //实例化商品模型类

        //商品收藏显示
        if($show == 'goodsCollect'){

            //总的收藏商品数量
            $totalRec = $data = $collectModel -> alias('gc')->join('__GOODSDETAIL__ gdd on gdd.skuid=gc.skuid')->join('__SPU_SKU__ pk on pk.skuid=gdd.skuid')->join('__GOODSIMG__ gimg on gimg.spuid = pk.spuid')->where('gimg.ismain=1 and gc.uid='.$uid)->count();

            //分页样式的输出
            $page = new \Think\Page($totalRec,$listRows);
            $pagelist = $page -> show();
            $limit = $_GET['p'] > ceil($totalRec/$listRows) ? ceil($totalRec/$listRows) :$_GET['p'] ;

            //查询出该用户所有的收藏商品的信息（商品用主图显示ismian=1）
            $data = $collectModel ->alias('gc')->field('gc.id gcid,imgurl,goodsname,price,ctime,pk.spuid,pk.skuid')->join('__GOODSDETAIL__ gdd on gdd.skuid=gc.skuid')->join('__SPU_SKU__ pk on pk.skuid=gdd.skuid')->join('__GOODSIMG__ gimg on gimg.spuid = pk.spuid')->where('gimg.ismain=1 and gc.uid='.$uid)->page($limit,$listRows)->select();

            if($data){

                 //查询该商品的所有评论
                foreach($data as $key => $value){

                    //查询每个sku下的评论数量
                    $commentNumber = $collectModel -> alias('gc') -> join('__COMMENT__ cm on cm.skuid=gc.skuid') -> where(['gc.skuid'=>['eq',$value['skuid']]]) -> count();

                    $value['ctime'] = date('Y-m-d',$value['ctime']);
                    $data[$key] = array_merge($value,['comment'=>$commentNumber]);
                }
            }

            $this -> assign('show',$show);
            $this -> assign('goodsCollect',$data);
            $this -> assign('page',$pagelist);
            layout('layout/layout');
            $this -> display();
        }else{

            //收货地址显示
            //规范化操作避免表前缀的更改  
            $counts = $addressModel -> alias('addr')->join('INNER JOIN __USER__ as u on u.id = addr.uid')->field('u.name,addr.*')->count();
            $page = new \Think\Page($counts,5);
            $data = $addressModel -> alias('addr')->join('INNER JOIN __USER__ as u on u.id = addr.uid')->field('addr.*')->page($_GET['p'],5)->select();
            $data = $cityModel->generateCity($data);
            $pagelist = $page -> show();
            layout('layout/layout');
            $this -> assign('show',$show);
            $this -> assign('addressData',$data);
            $this -> assign('page', $pagelist);
            $this -> display();
        }
        
    }

    /**
     * [ajaxshow 用于商品收藏的ajax显示]
     * @return [type] [description]
     */
    public function ajaxshow(){

        // //检查用户是否登录
        $this -> checkUser();
        $uid = session('home.id');
        // if(IS_AJAX){
             $collectModel = M('goodscollect');   //实例化商品收藏模型类
             $listRows = 2; 

             //判断order条件
             $priceOrder = isset($_GET['price']) ? '' : 'gdd.price desc';
             $ctimeOrder = isset($_GET['ctime']) ? 'gc.ctime desc' : '';
             if(empty($priceOrder)&&empty($ctimeOrder)){
                $order = '';
             }else if(empty($priceOrder) && !empty($ctimeOrder)){
                $order = $ctimeOrder;
             }else if(empty($ctimeOrder) && !empty($priceOrder)){
                 $order = $priceOrder;
             }else{
                $order = [ $priceOrder, $ctimeOrder];
             }


            //商品收藏ajax显示
            //总的收藏商品数量
            $totalRec = $data = $collectModel -> alias('gc')->join('__GOODSDETAIL__ gdd on gdd.skuid=gc.skuid')->join('__SPU_SKU__ pk on pk.skuid=gdd.skuid')->join('__GOODSIMG__ gimg on gimg.spuid = pk.spuid')->where('gimg.ismain=1 and gc.uid='.$uid)->count();

            //分页样式的输出
            $page = new \Think\Page($totalRec,$listRows);
            $pagelist = $page -> show();
            $limit = $_GET['p'] > ceil($totalRec/$listRows) ? ceil($totalRec/$listRows) :$_GET['p'] ;

            //查询出该用户所有的收藏商品的信息（商品用主图显示ismian=1）
            $data = $collectModel -> alias('gc')->field('gc.id gcid,imgurl,goodsname,price,ctime,pk.spuid,pk.skuid')->join('__GOODSDETAIL__ gdd on gdd.skuid=gc.skuid')->join('__SPU_SKU__ pk on pk.skuid=gdd.skuid')->join('__GOODSIMG__ gimg on gimg.spuid = pk.spuid')->where('gimg.ismain=1 and gc.uid='.$uid)->order($order)->page($limit,$listRows)->select();

            if($data){

                 //查询该商品的所有评论
                foreach($data as $key => $value){

                    //查询每个sku下的评论数量
                    $commentNumber = $collectModel -> alias('gc') -> join('__COMMENT__ cm on cm.skuid=gc.skuid') -> where(['gc.skuid'=>['eq',$value['skuid']]]) -> count();

                    $value['ctime'] = date('Y-m-d',$value['ctime']);
                    $data[$key] = array_merge($value,['comment'=>$commentNumber]);
                }
            }
        return [$data,$pagelist];
}
    /**
     * [htmlGoods 用于生成Html代码的函数]
     * @param  [type] $data [数据]
     * @return [type]       [string]
     */
    public function htmlGoods($data){
        $html = '';
        foreach($data as $key => $value){
            $html.='<li>
                        <!--商品详细信息-->
                       <div class="r1">
                        <input class="chosen" name="CheckAll" id="CheckAll" value="1236855336" type="checkbox" data-id="'.$value['gcid'].'">

                        <!--商品图片-->
                        <div class="things">
                            <a title="三星/Samsung Galaxy A7 4G手机 (A7000/A7009) 电信版_电信版-白色" class="pic" href="http://product.dangdang.com/1236855336.html?ref=customer-0-B" target="_blank"><img class="lazyload" alt="" original="http://img36.ddimg.cn/24/22/1236855336-1_t.jpg" src="http://img36.ddimg.cn/24/22/1236855336-1_t.jpg"></a>
                        </div>
                        <div class="details">
                            <p>
                                <!--商品名-->
                                <span class="icon icon_shop"></span>
                                <a class="title">'.$value['goodsname'].'
                                </a>
                            </p>

                            <!--已有多少人评论-->
                             <p class="gray">
                                <span class="space">已有
                                    <a target="_blank" href="http://product.dangdang.com/1236855336.html#comment">'.$value['comment'].'</a>人评论
                                </span>
                             </p>
                             
                             <!--收藏时间-->
                             <p class="gray">收藏时间：'.$value['ctime'].'</p> 
                        </div>     
                    </div><!--商品详细信息结束-->
                    

                    <!--商品价格-->
                    <div class="r2 center">
                        <p><span class="price">'.$value['price'].'&nbsp;(36折)</span></p>
                        <!-- <p>比放入时降低了<span class="price red">¥50.00</span></p> -->
                    </div>

                    <!--商品库存-->
                    <div class="r3 center">
                        <p>现货</p><p><span class="tag tag_ylyx">余量有限</span></p>
                    </div>

                    <!--操作-->
                    <div>
                         <p>
                            <a id="go_cart" class="btn btn_buy" href="javascript:void(0);" dd_name="加入购物车">加入购物车</a>
                            <a class="del" data-id="'.$value['gcid'].'" href="javascript:void(0)">删除</a>
                         </p> 
                    </div>                    
                </li>';
        }
        return $html;
    }

    /**
     * [delCollectGoods 删除指定的收藏商品函数]
     * @return [type] [description]
     */
    public function delCollectGoods(){
        if(IS_AJAX){
           $collectModel = M('goodscollect');   //实例化商品收藏模型类

            if($collectModel->where(['id'=>['in',I('get.id')]])->delete()){
                $data = $this -> ajaxshow();
                $html = $this -> htmlGoods($data[0]);
                $this -> ajaxReturn(['data'=>$html,'code'=>'0','mess'=>'请求成功','page'=>$data[1]]);
            }else{
                 $this -> ajaxReturn(['data'=>'','code'=>'1','mess'=>'请求失败','page'=>$data[1]]);
            }
        }else{

            //回到首页
             $this -> redirect('index/index'); 
        }
        
    }
/******************************收货地址分割线*************************************************/
    /*添加收货地址的操作*/
    public function addAddress(){

        //检查用户是否登录
        $this -> checkUser(); 
        $prefix = C('DB_PREFIX');
        $addressModel = D('BuyAddress');

         $_POST['default_flg'] = isset($_POST['default_flg']) ? $_POST['default_flg'] : '0';
       
             
        //自动验证数据是否正确
        if($data = $addressModel -> create()){

            //添加数据
            if(I('post.issave')==0){

                  //若是默认收货地址,则将其他地址设为0；
                  if(I('post.default_flg') == 1){
                      $addressModel -> execute('update '.$prefix.'buyaddress set isdefault = 0 where uid='.session('home.id'));
                  }

                 //添加数据
                 $_POST['uid'] = session('home.id');
                 $addressModel -> uid  = session('home.id');

                 if($addressModel -> add()){
                     $this -> success('添加收货地址成功!',U('goodsCollect',['show'=>'address']));
                 }else{
                     $this -> error($addressModel->getError(),U('goodsCollect',['show'=>'address'])); 
                 }
            }else{

                //更新数据
                 $_POST['id'] =   $_POST['addid'];
                 unset($_POST['addid']);
                 $data['id'] = $_POST['id'];

                //判断这位用户是不是原来设置了默认的收货地址  
                if($addressModel->checkAddrIsDefault($_POST['id'])){

                    if($addressModel -> save($data)){
                        $this -> success('修改收货地址成功!',U('goodsCollect',['show'=>'address'])); 
                    }else{
                        $this -> error('修改收货地址失败!',U('goodsCollect',['show'=>'address'])); 
                    }
                }else{
        
                    //如果这个用户之前不是默认的收货地址,则将这个用户设为默认收货地址,并清除其他收货地址的状态
                    if(I('post.default_flg')==1){
                        $addressModel -> execute('update '.$prefix.'buyaddress set isdefault = 0 where uid='.session('home.id'));
                    }

                    if($addressModel -> save($data)){
                        $this -> success('修改收货地址成功!',U('goodsCollect',['show'=>'address'])); 
                    }else{
                        $this -> error('修改收货地址失败!',U('goodsCollect',['show'=>'address'])); 
                    }

                }
              
            }  
        }else{
            $this -> error($addressModel->getError(),U('goodsCollect',['show'=>'address']));
        }
        
    }

    /**
     * [delAddres 删除收货地址]
     * @return [type] [description]
     */
    public function delAddres(){
        session_start();
        //检查用户是否登录
        $this -> checkUser();

        $addressModel = M('buyaddress'); //实例化地址模型类
        if($addressModel -> delete(I('get.id'))){
            $this -> success('删除收货地址成功!',U('goodsCollect',['show'=>'address']));
        }else{
            $this -> success('删除收货地址失败',U('goodsCollect',['show'=>'address']));
        }
    }


    /**
     * [chAddres 更改收货地址]
     * @return [type] [description]
     */
    public function chAddres(){
        session_start();

        //检查用户是否登录
        $this -> checkUser();

        $addressModel = M('buyaddress'); //实例化地址模型类

        //若设置收货地址,则将其他地址设为0；
        $addressModel -> execute('update '.$prefix.'buyaddress set isdefault = 0 where uid='.session('home.id'));

        $_GET['isDefault'] = 1;
        if($addressModel -> save($_GET)){
            $this -> success('设置默认收货地址成功!',U('goodsCollect',['show'=>'address']));
        }else{
            $this -> success('设置默认收货地址失败!',U('goodsCollect',['show'=>'address']));
        }

    }

    /**
     * [city 用于收货地址的操作]
     * @return [type] [description]
     */
     public function city(){

        //检查用户是否登录
        $this -> checkUser();
        $cityModel = M('city');
        $data = $cityModel ->field(['id','name','code'])->where(['parent_id'=>I('post.parent_id')])->select();

        if($data){
            $this -> ajaxReturn(['city'=>$data]);
        }
    }
    //****************************商品收藏页面的控制器*************************
    
    // public function 

 
}