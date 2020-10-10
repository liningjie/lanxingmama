<?php

namespace app\admin\model;

use think\Model;
use traits\model\SoftDelete;

class Pro extends Model
{

    use SoftDelete;

    

    // 表名
    protected $name = 'pro';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';
    protected $deleteTime = 'deletetime';

    // 追加属性
    protected $append = [
        'topstatus_text',
        'status_text',
        'lotterytime_text',
        'yijia1status_text',
        'yijia2status_text',
        'yijia3status_text',
        'yijia4status_text',
        'yijia5status_text',
        'yijia6status_text'
    ];
    

    
    public function getTopstatusList()
    {
        return ['0' => __('Topstatus 0'), '1' => __('Topstatus 1')];
    }

    public function getStatusList()
    {
        return ['0' => __('Status 0'), '1' => __('Status 1'), '2' => __('Status 2')];
    }

    public function getYijia1statusList()
    {
        return ['0' => __('Yijia1status 0'), '1' => __('Yijia1status 1')];
    }

    public function getYijia2statusList()
    {
        return ['0' => __('Yijia2status 0'), '1' => __('Yijia2status 1')];
    }

    public function getYijia3statusList()
    {
        return ['0' => __('Yijia3status 0'), '1' => __('Yijia3status 1')];
    }

    public function getYijia4statusList()
    {
        return ['0' => __('Yijia4status 0'), '1' => __('Yijia4status 1')];
    }

    public function getYijia5statusList()
    {
        return ['0' => __('Yijia5status 0'), '1' => __('Yijia5status 1')];
    }

    public function getYijia6statusList()
    {
        return ['0' => __('Yijia6status 0'), '1' => __('Yijia6status 1')];
    }


    public function getTopstatusTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['topstatus']) ? $data['topstatus'] : '');
        $list = $this->getTopstatusList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getStatusTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['status']) ? $data['status'] : '');
        $list = $this->getStatusList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getLotterytimeTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['lotterytime']) ? $data['lotterytime'] : '');
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


    public function getYijia1statusTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['yijia1status']) ? $data['yijia1status'] : '');
        $list = $this->getYijia1statusList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getYijia2statusTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['yijia2status']) ? $data['yijia2status'] : '');
        $list = $this->getYijia2statusList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getYijia3statusTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['yijia3status']) ? $data['yijia3status'] : '');
        $list = $this->getYijia3statusList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getYijia4statusTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['yijia4status']) ? $data['yijia4status'] : '');
        $list = $this->getYijia4statusList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getYijia5statusTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['yijia5status']) ? $data['yijia5status'] : '');
        $list = $this->getYijia5statusList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getYijia6statusTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['yijia6status']) ? $data['yijia6status'] : '');
        $list = $this->getYijia6statusList();
        return isset($list[$value]) ? $list[$value] : '';
    }

    protected function setLotterytimeAttr($value)
    {
        return $value === '' ? null : ($value && !is_numeric($value) ? strtotime($value) : $value);
    }


}
