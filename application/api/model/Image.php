<?php

namespace app\api\model;

use think\Model;

class Image extends Model
{
    //隐藏字段
    protected $hidden = ['id', 'from', 'delete_time', 'update_time'];

    /**
     * 自动获取图片的url并拼接url
     * @param $value
     * @return string
     */
    public function getUrlAttr($value, $data)
    {
        if ($data['from'] == 1) {
            return config('setting.img_prefix').$value;
        }else {
           return $value;
        }
    }
}
