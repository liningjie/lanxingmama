<?php 

//添加开奖号码 有问题联系Q496631085
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

 ?>