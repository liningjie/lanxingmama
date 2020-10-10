<?php

namespace app\admin\model;

use think\Model;
use traits\model\SoftDelete;

class Wxuser extends Model
{

    use SoftDelete;

    

    // 表名
    protected $name = 'wxuser';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';
    protected $deleteTime = 'deletetime';

    // 追加属性
    protected $append = [
        'sex_text'
    ];
    

    
    public function getSexList()
    {
        return ['0' => __('Sex 0'), '1' => __('Sex 1'), '2' => __('Sex 2')];
    }


    public function getSexTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['sex']) ? $data['sex'] : '');
        $list = $this->getSexList();
        return isset($list[$value]) ? $list[$value] : '';
    }




}
