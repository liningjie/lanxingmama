<?php

namespace app\index\controller;

use app\common\controller\Frontend;
use think\Request;
use think\Db;
class Index extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    // protected $noNeedLogin = ['login', 'register', 'third'];
    // protected $noNeedRight = ['*'];
    // protected $layout = '';

    public function  _initialize(){
        $this->_domain = $this->request->domain();
        $this->appId = 'wx702f0fa923c92568';  //wxa3223666dc26b666
        $this->appSecret= '1251ae8827c1f1b1776dcb557118196b';  //5a4126ea551320f9ee7d6fdaa34ad278

        if(!empty(session('openid'))){
                $this->openid = session('openid');
            }
        


        // $bug=false;//true开发模式，false
        // if(!$bug){  
            
           
        // }else{
        //     $this->openid='oMK8Cwqj2GTfzGl3zOovORc8jbtk';
        //     session('openid',$this->openid);
        // }
    }

    private function zhichinum($id){
        //商品的支持人数  商品的$id
        $pro = Db::name('pro')->where('id', $id)->find();
        $order_list = Db::name('pro_order')->where('proid',$pro['id'])->where('price',$pro['price1'])->where('order_status','>',0)->select();
        $order_num = sizeof($order_list)+$pro['click'];//第一段订单数

        if($order_num>0){
            $zhichimoney=0;
            foreach ($order_list as $ord_key => $ord_val) {
                $zhichimoney=intval($ord_val['full_price'])+$zhichimoney;
               
            }  
             $zhichimoney=$zhichimoney+($pro['price1']*$pro['click']);
            $pro['zhichimoney']=$zhichimoney; //支持段1 的总金额

            $baifen = ($zhichimoney*100)/$pro['full_price1'];
            if($baifen>9){  $baifen =  round($baifen,0);}
            else{$baifen =  round($baifen,2);}
            $pro['percent'] = strval(    $baifen  );//支持金额的百分比  
            $pro['order_num'] = strval($order_num);//段1的订单数量
            // dump($order_list);
          }else{
            $pro['zhichimoney']=0;
            $pro['percent'] =0;
            $pro['order_num'] =0;
          }




        return $pro;
    }


    public function loginout(){
        session(null);
        
         // $this->me();
        $this->redirect('/index/index/me');
    }
    public function caidan(){
        // $this->view->assign('pro',$pro);
        return $this->view->fetch();
    }

    public function index()
    {  
        // $this->islogin();
        // dump($this->request->domain());
        //$this->request->request("pageNumber");
        $pro = Db::name('pro')->where('status', 1)->where('topstatus', 0)->order('createtime','ASC')->select();//->field('title,remark')
        
        //把每个商品的购买件数加入进去
        foreach ($pro as $key => $val) {
          //以当前最低的价格查询  
          // $order_list = Db::name('pro_order')->where('proid',$val['id'])->where('price',$val['price1'])->select();
          // $order_num = sizeof($order_list);//第一段订单数
          // if($order_num>0){
          //   $zhichimoney=0;
          //   foreach ($order_list as $ord_key => $ord_val) {
          //       $zhichimoney=intval($ord_val['full_price'])+$zhichimoney;
               
          //   }  
            
          //   $pro[$key]['zhichimoney']=$zhichimoney; //支持段1 的总金额
          //   $pro[$key]['percent'] = strval(    round(($zhichimoney*100)/$val['full_price1'],3)   );//支持金额的百分比  
          //   $pro[$key]['order_num'] = strval($order_num);//段1的订单数量
          //   // dump($order_list);
          // }else{
          //   $pro[$key]['zhichimoney']=0;
          //   $pro[$key]['percent'] =0;
          //   $pro[$key]['order_num'] =0;
          // }

            $pro[$key]=$this->zhichinum($val['id']);





        }
          $toppro = Db::name('pro')->where('status', 1)->where('topstatus', 1)->find();
          $toppro = $this->zhichinum($toppro['id']);

        // dump($toppro);
        $this->view->assign('toppro',$toppro);//置顶商品信息
        $this->view->assign('pro',$pro);
        return $this->view->fetch();
       
    }

    private function allnumber($id=NULL,$duan=NULL){
        //$id,$duan = 'null'
        //查询全部号码、、//传商品id   //段数
        $param = $this->request->param();
        if(!empty($param['id'])){
            if(!empty($param['duan'])){
                $number = Db::name('order_ticket')->where('proid',$param['id'])->where('duan',$param['duan'])->field('ticket')->select();//查询某个商品的id段位所有号码
            }else{
                $number = Db::name('order_ticket')->where('proid',$param['id'])->field('ticket')->select();//查询某个商品所有号码
            }
            // dump($number);
            return $number;
        }      
    }

    public function kaijiang_getuser(){
        //以某个号码 查询是那个用户
        $param = $this->request->param();
        if(!empty($param['number'])){
           $order = Db::name('order_ticket')->where('ticket',$param['number'])->find();
           $userorder = Db::name('pro_order')->where('order_no',$order['order_no'])->find();
           return $userorder;
        }
    }

    public function number(){

        $param = $this->request->param();
        if(!empty($param['id'])){
            if(!empty($param['duan'])){
                $all = $this->allnumber($param['id'],$param['duan']);
            }else{
                $all = $this->allnumber($param['id']);
            }

            shuffle($all);
            if($this->request->isPost()){
                return json_encode($all);
            }else{
                if(session('openid')=='oe7qJ093zEVGLk-uYE_wCyHMssE8'){
                    $this->view->assign('all',$all);
                    return $this->view->fetch();
                }else{
                     $this->view->assign('all',$all);
                    return $this->view->fetch();
                }
            }
            
        }
    }


    public function xqy(){
        $this->islogin();
        //商品详情页

        $id=$this->request->get('id');
        // dump($id);exit();
        // $pro = Db::name('pro')->where('status', 1)->where('id',$id)->find();
        $pro = $this->zhichinum($id);


        $prodata = Db::name('pro')->where('id', $id)->find();
        $fenshu = $prodata['number1'];
       
        // $order_num = sizeof($order_list);//第一段订单数
        $ordernum = Db::name('pro_order')->where('proid',$id)->where('order_status','>',0)->select();//查询付款的人数
        $yiyuanarr = Db::name('pro_order')->where('proid',$id)->where('order_status','>',0)->where('full_price',50)->select();
        $temparr =  array();
        foreach ($yiyuanarr as $key => $value) {
            if(!in_array($value['openid'], $temparr)){
                array_push($temparr,$value['openid']);
            }
            
        }
       
        $beitou  =$pro['order_num']-sizeof($temparr);
        if(sizeof($ordernum)>=$fenshu){
            $isover=1;//结束
        }else{
            $isover=0;//没结束
        }


        $shengyu = $fenshu-sizeof($ordernum);
        $this->view->assign('shengyu',$shengyu);
        $this->view->assign('isover',$isover);
        $this->view->assign('beitou',$beitou);
        $this->view->assign('pro',$pro);
        return $this->view->fetch();
    }

    public function xqy2(){
        // $this->islogin();
        //商品详情页

        $id=$this->request->get('id');
        // dump($id);exit();
        // $pro = Db::name('pro')->where('status', 1)->where('id',$id)->find();
        $pro = $this->zhichinum($id);


        // $pro = Db::name('pro')->where('id', $id)->find();
       
        // $order_num = sizeof($order_list);//第一段订单数

        $yiyuanarr = Db::name('pro_order')->where('proid',$id)->where('order_status','>',0)->where('full_price',50)->select();
        $temparr =  array();
        foreach ($yiyuanarr as $key => $value) {
            if(!in_array($value['openid'], $temparr)){
                array_push($temparr,$value['openid']);
            }
            
        }

        $beitou  =$pro['order_num']-sizeof($temparr);
        // $beitou =0;
        $this->view->assign('beitou',$beitou);
        $this->view->assign('pro',$pro);
        return $this->view->fetch();
    }

    private function get_pro($id, $duan = null){
        //传递商品id 和几段  返回商品duan的价格和介绍
        $pro = Db::name('pro')->where('id', $id)->find();
        if($duan == null){
            return $pro;
        }
        
    }

    public function pay(){
        //支付订单
        $param = $this->request->param();//获取get和post的值

        // file_put_contents('pay.txt',  json_encode($param));

        $order_no = $param['order'];
        // if($this->request->isPost()){
            
            if(strlen($order_no)==16){
               // $order = Db::name('pro_order')->where('order_no',$order_no)->where('openid',$this->openid)->find();
                $order = Db::name('pro_order')->where('order_no',$order_no)->find();
               if($order){
                    $temp_full_price = $order['price']*$order['number'];
                    if($temp_full_price != $order['full_price']){
                        $this->error('订单异常,请联系管理');
                    }
               }else{
                    $this->error('没有此订单'.$order_no);
               }
               
            }
            //订单没问题就开始 传输  支付
            // $this->view->assign('$order');
            $end = json_decode(file_get_contents($this->request->domain().'/pay/order.php?out_trade_no='.$order_no),true);
            file_put_contents('pay_jsapi_end.txt', json_encode($end));
            if(!empty($end['trade_state_desc'])){
                if($end['trade_state_desc']=='支付成功'){

                    $data['order_status'] = 1;
                    $data['updatetime'] = time();
                    //支付成功
                    $res=Db::name('pro_order')->where('order_no',$order_no)->update($data);
                    if($res) {
                        $this->put_ticket($order_no);//支付成功后就跳转生成号码
                        return 'ok';
                        // $this->redirect('/index/index/order');
                        //$this->order();
                    }

                }else{
                    return $end['trade_state_desc'];
                }
              
            }
        // }
       
        // return $this->view->fetch();
    }

    private function have_only_jian($id,$duan,$number){
        //商品的剩余份数减减     段  数量
        $suk='have_only'.$duan;
        $pro =  Db::name('pro')->where('id',$id)->field($suk)->find();
        if($pro[$suk]>$number){
           $res = Db::name('pro')->where('id',$id)->setDec('score',$number);//减去份数
           if($res){
            return 'ok';
           }else{
            return 'Error,Please contact Administrator QQ:496631085';
           }
        }else{
            return 'no';
        }
        
    }
    public function test(){
        $msg = $this->have_only_jian('5',1,10);
        dump($msg);
    }
    public function put_ticket($order_no){
        //支付以后 就生成票
        $ticket = Db::name('order_ticket')->where('order_no',$order_no)->count();//以免多次访问

        $order = Db::name('pro_order')->where('order_no',$order_no)->find();
        // dump($ticket);
        // dump($order);
        if($ticket<$order['number']){
            if($order){
                //生成对应的号码   商品id 3 + 7数
                //读取订单表里面当前这个id的最大数
                $order_num = Db::name('order_ticket')->where('proid',$order['proid'])->select();

                if($order_num){    //如果有这个商品买过的人就 查最大数
                    $max = Db::name('order_ticket')->where('proid',$order['proid'])->max('ticket');
                }else{
                    $max = strlen(strval($order['proid']));
                    //制造头3位+
                    switch ($max) {
                        case '1':
                            $tou_max = strval($order['proid']*100);
                            break;
                        case '2':
                            $tou_max = strval($order['proid']*10);
                            break;
                        default:
                            $tou_max = strval($order['proid']);
                            break;
                    }
                    // $wei_max='0000001';
                    $max=$tou_max.'0000000';
                }

                // dump($max);
                $ticket_data['order_no']=$order_no;
                $ticket_data['jieshao']=$order['jieshao'];
                $ticket_data['proid']=$order['proid'];
                $ticket_data['duan']=$order['duan'];
                $ticket_data['createtime']=time();
                $ticket_data['updatetime']=time();


                
                // for($i=1; $i <= $order['number']; $i++) { 
                //    // 然后再转数字在类加
                //     $new=intval($max)+$i;
                //     $res = Db::name('order_ticket')->where('order_no',$order_no)->where('duan',$order['duan'])->where('ticket',$new)->select();
                //     if($res){
                //         $this->error('生成号码出错，请联系管理员');
                //     }else{
                //         $ticket_data['ticket']=$new;//新的号码  //有空判断重复值

                //         $res_cha=Db::name('order_ticket')->insert($ticket_data);
                        

                //        //  if($this->get_pro($order['proid'])['yijia'.$order['duan'].'status']==0){
                //        //      if($res_cha){//减去份数
                //        //          $this->have_only_jian($order['proid'],$order['duan'],$order['number']);
                //        //      }
                //        // }
                        
                //     }
                    
                // }
                $stattime=time();
                $all_data = array();
                for($i=1; $i <= $order['number']; $i++) { 

                   // 然后再转数字在类加
                    $new=intval($max)+$i;
                    $ticket_data['ticket']=$new;
                    // $all_data[$i-1]=$ticket_data;

                    $res_cha=Db::name('order_ticket')->insert($ticket_data);
                    // $res = Db::name('order_ticket')->where('ticket',$new)->find();
                    // if($res){
                    //     $this->error('生成号码出错，请联系管理员');
                    // }else{
                    //     $ticket_data['ticket']=$new;//新的号码  //有空判断重复值

                    //     $res_cha=Db::name('order_ticket')->insert($ticket_data);
                   
                        
                    // }
                    
                }
                // dump($all_data);
                // $res_cha=Db::name('order_ticket')->insert($all_data);
                $endtime=time();
                $ti=$endtime - $stattime ;
                file_put_contents("ticket_time_log.txt", date('Y-m-d H:i:s')."---数:".$order['number']."---时间:".$ti.'--i:'.$i.'--max:'.$max.'--new:'.$new.PHP_EOL, FILE_APPEND);


            }
        }
    }
    private function islogin(){
        //验证是否登录过，如果没有登录就跳转
         if(empty(session('openid'))){
                $this->getUserOpenId();
            // $this->redirect('/index/index/me');
                exit();
            }
    }
    public function zfcg(){
        // $this->view->assign('full_price',$number*$pro['price'.$duan]);
        $order = $this->request->get('order');
        if(!empty($order)){
            $order1 = Db::name('pro_order')->where('order_no',$order)->find();
            $this->view->assign('order',$order1);
        }
        return $this->view->fetch();
    }

    public function submit(){
        //提交订单页面
         $param = $this->request->param();//获取get和post的值
            // 需要登录
        if(empty(session('openid'))){
                // $this->getUserOpenId();
            // $this->redirect('/index/index/me');
             $this->redirect('/index/index/getUserOpenId');
                // exit();
            }
            else{
            // dump(session('openid'));
            $this->openid = session('openid');
            $user = Db::name('wxuser')->where('openid',$this->openid)->find();
        }

        

        if(!empty($param['pay']))

        $pay = $param['pay'];
        $id = $param['id'];
        $duan = $param['duan'];
        $number = $param['number'];
        


        if($id>0){
            $pro = $this->get_pro($id);
        }else{
            $this->error('非法提交','/index');
        }
        // dump((intval(date('d'))+1).date('m').date('s').date('i').date('H').  (intval(substr(date('Y'),2,2))+6).mt_rand(1000,9999));

        if(!empty($pay) && $pay==1){
            //生成订单
          
            $tel = $this->request->post('phone');
            $ltdname = $this->request->post('ltdname');
            $name = $this->request->post('name');
            $address = $this->request->post('address');
            
            $data['address'] = $address;
            $data['ltdname'] = $ltdname;
            $data['name'] = $name;
            $data['tel'] = $tel;
            $data['proid'] = $id;
            $data['duan'] = $duan;
            $data['price'] = $pro['price'.$duan];
            $data['number'] = $number;
            $data['full_price'] = $number * $pro['price'.$duan];
            $data['jieshao'] = $pro['jieshao'.$duan];
            $data['order_status'] = 0;//待付款
            $data['createtime'] = time();
            $data['updatetime'] = time();
            $data['openid'] = $this->openid;
            // $data['address'] = $address;

            //总长16位
            $data['order_no'] = (intval(substr(date('Y'),2,2))+6).date('m').date('s').date('i').date('H'). date('d') .mt_rand(1000,9999); //shangping*6时间20190918185959
            // return jsonp($data['order_no']);

            // $changdu = ($date['order_no']);
            // return $changdu;
            // if($changdu<16){
            //     $wei = 16-$changdu;
            //     $weistr = rand(1*$wei,9*$wei);
            //     return $weistr;
            //     $data['order_no']=$data['order_no'].strval($weistr);
            // }
           
            $res = Db::name('pro_order')->insert($data);//生成未支付订单
            // dump($data);

            if($res){
                // $this->pay();
                // $this->redirect('/index/index/pay');
                echo ($data['order_no']);
                exit();
            }else{
                return ('error');
            }
            //准备跳转到 支付页面
            // dump($res);

        }
        

        
        
        $this->view->assign('user',$user);
        $this->view->assign('id',$id);
        $this->view->assign('pro',$pro);
        $this->view->assign('duan',$duan);
        $this->view->assign('jieshao',$pro['jieshao'.$duan]);
        $this->view->assign('number',$number);
        $this->view->assign('full_price',$number*$pro['price'.$duan]);
        return $this->view->fetch();
    }


    public function me(){
        if(!empty(session('openid'))){
            $this->openid = session('openid');
            $user = Db::name('wxuser')->where('openid',$this->openid)->find();

            for ($i=0; $i < 4; $i++) { 
                $status1 = Db::name('pro_order')->select();

                // foreach ($status1 as $key => $val) {
                //     if($val['order_status']==0){
                //         $status[0]=$status[0]++;
                //     }
                //     if($val['order_status']==1){
                //         $status[1]=$status[1]++;
                //     }
                //     if($val['order_status']==2){
                //         $status[2]=$status[2]++;
                //     }
                //     if($val['order_status']==3){
                //         $status[3]=$status[3]++;
                //     }
                // }
                for ($i=0; $i < 4; $i++) { 
                     $status[$i] = sizeof(Db::name('pro_order')->where('order_status',$i)->where('openid',$this->openid)->select());
                }


            }
            $this->assign('status',$status);
            $this->assign('user',$user);
        }else{
            $this->assign('status',0);
        }
        

        return $this->view->fetch();
    }

    public function haoma(){
         $param = $this->request->param();//获取get和post的值
         if(!empty($param['order'])){
            $status = Db::name('pro_order')->where('order_no',$param['order'])->where('order_status','>',0)->find();
            if($status){//已付款
                $ticket = Db::name('order_ticket')->where('order_no',$param['order'])->select();
               $order = Db::name('pro_order')->where('order_no',$param['order'])->find();

               $pro = Db::name('pro')->where('id',$order['proid'])->find();


               $order['images'] = $pro['images'];
               $this->view->assign('pro',$pro);
               $this->view->assign('order',$order);
               $this->view->assign('ticket',$ticket);
               return $this->view->fetch();
            }else{
                $this->redirect('/index/index/pay?order='.$param['order']);
            }
          
         }else{
            $this->redirect('/index/index/order');
         }
    }

    public function userdata(){
        //用户信息  需要登录
        if(empty(session('openid'))){
            $this->getUserOpenId();
            exit();
        }else{
        // dump(session('openid'));
            $this->openid = session('openid');
        }

        if($this->request->isGet()){
            $user = Db::name('wxuser')->where('openid',$this->openid)->find();
            $this->assign('user',$user);
            return $this->view->fetch();
        }
        $tel = $this->request->post('phone');
        $name = $this->request->post('name');
        $address = $this->request->post('address');
        $ltdname = $this->request->post('ltdname');


        if(strlen($tel)>6 && strlen($name)>1){
            $data['tel'] = $tel;
            $data['name'] = $name;
            $data['address'] = $address;
            $data['ltdname'] = $ltdname;

            $date['updatetime'] = time();
            $res = Db::name('wxuser')->where('openid',$this->openid)->update($data);
            if($res){
                return ('ok');
            }else{
                return ('已经保存修改');
            }
        }else{
            return ('error');
        }


        
    }

    public function order(){
        //显示个人订单

          // 需要登录
        if(empty(session('openid'))){
                $this->getUserOpenId();
                exit();
            }
            else{
            // dump(session('openid'));
            $this->openid = session('openid');
        }

        // $param = $this->request->param();
        // if($this->request->isPost()){
        //     if(!empty($param['status'])){
        //         $order = Db::name('pro_order')->where('openid',$this->openid)->where('order_status',$param['status'])->select();
        //     }
        // }else{
            $order = Db::name('pro_order')->where('openid',$this->openid)->order('createtime desc')->select();
        // }

        
        //获取商品的标题
        foreach ($order as $key => $val) {
            $order[$key]['title']= $this->get_pro($val['proid'])['title'];
            $order[$key]['images']= $this->get_pro($val['proid'])['images'];

        }

        $this->view->assign('order',$order);
        return $this->view->fetch();
    }

    public function news()
    {
        $newslist = [];
        return jsonp(['newslist' => $newslist, 'new' => count($newslist), 'url' => 'http://xiaohe520.club']);
    }

    public function login(){
        $this->getUserOpenId();
    }

    public function getUserOpenId(){
        if(!empty($_SERVER['HTTP_REFERER']))
        file_put_contents('tiaozhuan.txt', $_SERVER['HTTP_REFERER'].'\r\n',FILE_APPEND);
        // exit($_GET);
        //2.获取到网页授权的access_token        
        
        
        if(empty($this->request->get('code'))){
            $this->getBaseInfo();
            exit();
        }
        // dump($this->request->get());
        $code = $this->request->get('code');
        $url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$this->appId."&secret=".$this->appSecret."&code=".$code."&grant_type=authorization_code ";
        //3.拉取用户的openid
        $res = file_get_contents($url);

        $data = json_decode($res,true);
        if(!empty($data['access_token']) && !empty($data['openid'])){
            $this->access_token=$data['access_token'];
            $this->refresh_token=$data['refresh_token'];
            
            $url = "https://api.weixin.qq.com/sns/userinfo?access_token=".$data['access_token']."&openid=".$data['openid']."&lang=zh_CN"; 
            $userInfo = file_get_contents($url);
            $user = json_decode($userInfo,true);
            // echo $userInfo;

            $this->openid = $user['openid'];
            $this->nickname = base64_encode($user['nickname']);
            $this->headimgurl = $user['headimgurl'];
            $this->sex = $user['sex'];

            //获取都用户信息然后判断是否新用户 存表
            $user=Db::name('wxuser')->where('openid',$this->openid)->find();

                $db_data['nickname'] = $this->nickname;
                $db_data['head_url'] = $this->headimgurl;
                $db_data['openid'] = $this->openid;
                $db_data['sex'] = $this->sex;
                $db_data['updatetime']=time();

                if (sizeof($user)<1) {
                    //用户不存在，创建用户，没有详细信息
                   
                    $db_data['createtime']=time();
                    


                    $row = Db::name('wxuser')->insert($db_data);
                }else{ //修改头像地址和昵称以防用户修改

                    $row = Db::name('wxuser')->where('openid',$this->openid)->update($db_data);
                    // if($row!=null)
                        // echo "更新个人资料成功";
                }   

          

            session('openid',$this->openid);


            if(empty($user['tel']) || empty($user['name'])){ //如果手机
                
                    $this->redirect($this->_domain.'/index/index/userdata');
                 
            }else{
                 if(!empty($_SERVER['HTTP_REFERER'])){
                    $this->redirect($_SERVER['HTTP_REFERER']);
                 }
                 else{
                    $this->redirect($this->_domain.'/index/index/index');
                 }
            }
            

            

        }
    }


        //获取code
    public function getBaseInfo(){
        //1.获取到code        
        $redirect_uri=urlencode($this->_domain."/index/index/getUserOpenId");
        $url="https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$this->appId."&redirect_uri=".$redirect_uri."&response_type=code&scope=snsapi_userinfo&state=xiaohe#wechat_redirect";

       $this->redirect($url);
    }




    // public function submit(){
    //     //提交订单页面
        
    //         // 需要登录
    //     if(empty(session('openid'))){
    //             $this->getUserOpenId();
    //             exit();
    //         }
    //         else{
    //         // dump(session('openid'));
    //         $this->openid = session('openid');
    //     }

    //     $pay = $this->request->post('pay');
    //     $id = $this->request->get('id');
    //     if(empty($id))
    //     $id = $this->request->post('id');
    //     $duan = $this->request->get('duan');
    //     if(empty($duan))
    //     $duan = $this->request->post('duan');
    //     $number = intval($this->request->get('number'));
    //     if($id>0){
    //         $pro = $this->get_pro($id);
    //     }else{
    //         $this->error('非法提交','/index');
    //     }
    //     // dump((intval(date('d'))+1).date('m').date('s').date('i').date('H').  (intval(substr(date('Y'),2,2))+6).mt_rand(1000,9999));

    //     if(!empty($pay) && $pay==1){
    //         //生成订单
    //         $tel = $this->request->post('phone');
    //         $name = $this->request->post('gongsi');
    //         $data['name'] = $name;
    //         $data['tel'] = $tel;
    //         $data['proid'] = $id;
    //         $data['duan'] = $duan;
    //         $data['price'] = $pro['price'.$duan];
    //         $data['number'] = $number;
    //         $data['full_price'] = $number * $pro['price'.$duan];
    //         $data['jieshao'] = $pro['jieshao'.$duan];
    //         $data['order_status'] = 0;//待付款
    //         $data['createtime'] = time();
    //         $data['updatetime'] = time();
    //         // $data['openid'] = $this->openid;
    //         // $data['address'] = $address;

    //         //总长16位
    //         $data['order_no'] = (intval(date('d'))+1).date('m').date('s').date('i').date('H').  (intval(substr(date('Y'),2,2))+6).mt_rand(1000,9999); //shangping*6时间20190918185959
    //         $res = Db::name('pro_order')->insert($data);
    //         // dump($data);
          
            
    //         dump($res);

    //     }
        

        
        

    //     $this->view->assign('id',$id);
    //     $this->view->assign('pro',$pro);
    //     $this->view->assign('duan',$duan);
    //     $this->view->assign('number',$number);
    //     $this->view->assign('full_price',$number*$pro['price'.$duan]);
    //     return $this->view->fetch();
    // }


}
