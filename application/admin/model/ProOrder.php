<?php

namespace app\admin\model;

use think\Model;
use traits\model\SoftDelete;

class ProOrder extends Model
{

    use SoftDelete;

    

    // 表名
    protected $name = 'pro_order';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';
    protected $deleteTime = 'deletetime';

    // 追加属性
    protected $append = [
        'order_status_text'
    ];
    

    
    public function getOrderStatusList()
    {
        return ['0' => __('Order_status 0'), '1' => __('Order_status 1'), '2' => __('Order_status 2'), '3' => __('Order_status 3')];
    }


    public function getOrderStatusTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['order_status']) ? $data['order_status'] : '');
        $list = $this->getOrderStatusList();
        return isset($list[$value]) ? $list[$value] : '';
    }




}
