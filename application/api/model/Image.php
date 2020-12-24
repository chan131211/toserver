<?php

namespace app\api\model;


class Image extends BaseModel
{
    //隐藏字段
    protected $hidden = ['id', 'from', 'delete_time', 'update_time'];

    /**
     * 自动获取处理完的url
     * @param $value
     * @param $data
     * @return string
     */
    protected function getUrlAttr($value, $data)
    {
        return $this->prefixImgUrl($value,$data);
    }
}
