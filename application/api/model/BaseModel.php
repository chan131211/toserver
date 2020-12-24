<?php


namespace app\api\model;


use think\Model;

class BaseModel extends Model
{
    /**
     * 获取url并处理url
     * @param $value
     * @return string
     */
    protected function prefixImgUrl($value, $data)
    {
        // 1:本地 2:公网
        if ($data['from'] == 1) {
            return config('setting.img_prefix').$value;
        }else {
            return $value;
        }
    }


}