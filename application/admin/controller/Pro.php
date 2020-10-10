<?php

namespace app\admin\controller;

use app\common\controller\Backend;



use app\admin\library\Auth;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use think\Db;
use think\Exception;
use think\exception\PDOException;
use think\exception\ValidateException;
/**
 * 
 *
 * @icon fa fa-circle-o
 */
class Pro extends Backend
{
    
    // protected $noNeedLogin = ['login'];
    protected $noNeedRight = ['number'];
    /**
     * Pro模型对象
     * @var \app\admin\model\Pro
     */
    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = new \app\admin\model\Pro;
        $this->view->assign("topstatusList", $this->model->getTopstatusList());
        $this->view->assign("statusList", $this->model->getStatusList());
        $this->view->assign("yijia1statusList", $this->model->getYijia1statusList());
        $this->view->assign("yijia2statusList", $this->model->getYijia2statusList());
        $this->view->assign("yijia3statusList", $this->model->getYijia3statusList());
        $this->view->assign("yijia4statusList", $this->model->getYijia4statusList());
        $this->view->assign("yijia5statusList", $this->model->getYijia5statusList());
        $this->view->assign("yijia6statusList", $this->model->getYijia6statusList());
    }
    
    /**
     * 默认生成的控制器所继承的父类中有index/add/edit/del/multi五个基础方法、destroy/restore/recyclebin三个回收站方法
     * 因此在当前控制器中可不用编写增删改查的代码,除非需要自己控制这部分逻辑
     * 需要将application/admin/library/traits/Backend.php中对应的方法复制到当前控制器,然后进行修改
     */
    

    /**
     * 查看
     */
    public function index()
    {
        //当前是否为关联查询
        $this->relationSearch = false;
        //设置过滤方法
        $this->request->filter(['strip_tags']);
        if ($this->request->isAjax())
        {
            //如果发送的来源是Selectpage，则转发到Selectpage
            if ($this->request->request('keyField'))
            {
                return $this->selectpage();
            }
            list($where, $sort, $order, $offset, $limit) = $this->buildparams();
            $total = $this->model
                    
                    ->where($where)
                    ->order($sort, $order)
                    ->count();

            $list = $this->model
                    
                    ->where($where)
                    ->order($sort, $order)
                    ->limit($offset, $limit)
                    ->select();

            foreach ($list as $row) {
                $row->visible(['id','title','topstatus','number_url','status','createtime']);
                
            }
            $list = collection($list)->toArray();
            $result = array("total" => $total, "rows" => $list);

            return json($result);
        }
        return $this->view->fetch();
    }





    /**
     * 添加
     */
    public function add()
    {
        if ($this->request->isPost()) {
            $params = $this->request->post("row/a");
            if ($params) {
                $params = $this->preExcludeFields($params);

                if ($this->dataLimit && $this->dataLimitFieldAutoFill) {
                    $params[$this->dataLimitField] = $this->auth->id;
                }
                $result = false;
                Db::startTrans();
                try {
                    //是否采用模型验证
                    if ($this->modelValidate) {
                        $name = str_replace("\\model\\", "\\validate\\", get_class($this->model));
                        $validate = is_bool($this->modelValidate) ? ($this->modelSceneValidate ? $name . '.add' : $name) : $this->modelValidate;
                        $this->model->validateFailException(true)->validate($validate);
                    }
                    $result = $this->model->allowField(true)->save($params);
                    Db::commit();
                } catch (ValidateException $e) {
                    Db::rollback();
                    $this->error($e->getMessage());
                } catch (PDOException $e) {
                    Db::rollback();
                    $this->error($e->getMessage());
                } catch (Exception $e) {
                    Db::rollback();
                    $this->error($e->getMessage());
                }
                if ($result !== false) {
                    $this->success();
                } else {
                    $this->error(__('No rows were inserted'));
                }
            }
            $this->error(__('Parameter %s can not be empty', ''));
        }
        return $this->view->fetch();
    }

    /**
     * 编辑
     */
    public function edit($ids = null)
    {
        $row = $this->model->get($ids);
        if (!$row) {
            $this->error(__('No Results were found'));
        }
        $adminIds = $this->getDataLimitAdminIds();
        if (is_array($adminIds)) {
            if (!in_array($row[$this->dataLimitField], $adminIds)) {
                $this->error(__('You have no permission'));
            }
        }
        if ($this->request->isPost()) {
            $params = $this->request->post("row/a");
            if ($params) {
                $params = $this->preExcludeFields($params);
                $result = false;
                Db::startTrans();
                try {
                    //是否采用模型验证
                    if ($this->modelValidate) {
                        $name = str_replace("\\model\\", "\\validate\\", get_class($this->model));
                        $validate = is_bool($this->modelValidate) ? ($this->modelSceneValidate ? $name . '.edit' : $name) : $this->modelValidate;
                        $row->validateFailException(true)->validate($validate);
                    }

                        //如果有开奖号码，（如果是待开奖）就把那个订单的开奖号改为开奖 
                    // dump($params);
                    for ($i=1; $i <=6 ; $i++) { 
                        if(!empty($params['kaijiang'.$i])){
                            $order = Db::name('order_ticket')->where('ticket',$params['kaijiang'.$i])->find();
                            $user =  Db::name('pro_order')->where('order_no',$order['order_no'])->find();
                            if($user['order_status']==1){
                                $res = Db::name('pro_order')->where('order_no',$order['order_no'])->update(['order_status'=>2]);
                            }
                        }
                    }
                    // dump($params);
                    // echo ;
                    // exit();
                    $params['number_url'] = '/admin/pro/number?id='.$ids;
                    // dump($params);
                    // exit();
                    $result = $row->allowField(true)->save($params);
                    Db::commit();
                } catch (ValidateException $e) {
                    Db::rollback();
                    $this->error($e->getMessage());
                } catch (PDOException $e) {
                    Db::rollback();
                    $this->error($e->getMessage());
                } catch (Exception $e) {
                    Db::rollback();
                    $this->error($e->getMessage());
                }
                if ($result !== false) {
                    $this->success();
                } else {
                    $this->error(__('No rows were updated'));
                }
            }
            $this->error(__('Parameter %s can not be empty', ''));
        }
        $this->view->assign("row", $row);
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


    public function number(){
        // $this->view->assign("row", $row);
        $param = $this->request->param();
        // $params =  $this->request->params();
        if($this->request->isPost()){
            // if(!empty($param['number']) && !empty($param['id'])){
            if(!empty($param['number'])){
                $order = Db::name('order_ticket')->where('ticket',$param['number'])->find();//查询订单
                $user =  Db::name('pro_order')->where('order_no',$order['order_no'])->find();//找到那个订单用户
                //修改用户的抽奖订单
                if($user['order_status']==1){
                    $res = Db::name('pro_order')->where('order_no',$order['order_no'])->update(['order_status'=>2]);
                }
                //更新商品的抽奖号
                 $res = Db::name('pro')->where('id',$order['proid'])->update(['kaijiang'.$order['duan']=>$param['number']]);
                 if($res){
                    return $param['number'];
                 }
            }
            return 'error';

        }

        $kj='';
        if(!empty($param['id'])){
            $pro = Db::name('pro')->where('id',$param['id'])->find();
            
            if(!empty($param['duan'])){
                //查看这个是否已经开过奖
                // $ykj1 = Db::name('pro_order')->where('proid',$param['id'])->where('duan',$param['duan'])->where('order_status','>',1)->find();
                // if($ykj1){
                //     $ykj = $ykj1['order_no'];//找到了订单
                //     $pro 
                // }
                $ykj = $pro['kaijiang'.$param['duan']];
                if(empty($ykj)){
                  $all = $this->allnumber($param['id'],$param['duan']);
                }else{
                     $all = Db::name('order_ticket')->where('ticket',$ykj)->select();//已经开奖就传一个开了奖的
                }
                $this->view->assign('duan',$param['duan']);


               $kaijiang = Db::name('kaijiang')->where('proid',$param['id'])->select();
                // dump($kaijiang);
                
                foreach ($kaijiang as $key => $val) {
                    //可能一个id里面有多个档位的中奖号
                   $now = Db::name('order_ticket')->where('ticket',$val['number'])->find(); 
                   // dump($now);
                   if($now['duan']==$param['duan']){
                    $kj= $val['number'];
                   }

                }

            
            }else{
                 // $all = $this->allnumber($param['id']);//没选段位就不给数
                $all =  array();
                $this->view->assign('duan',0);
            }

            shuffle($all);

            $this->view->assign('pro',$pro);//商品的信息
            $this->view->assign('all',$all);
            $this->view->assign('id',$param['id']);

         

            if(empty($ykj)){$ykj="";}//没有开过奖就为空
            $this->view->assign('ykj',$ykj);
            $this->view->assign('kj',$kj);
            return $this->view->fetch();
        }


        
    }


}
