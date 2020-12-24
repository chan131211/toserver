<?php


namespace app\api\model;


class Product extends BaseModel
{
    protected $hidden = ['delete_time', 'pivot', 'from', 'category_id', 'create_time', 'update_time'];

    public function getMainImgUrlAttr($value, $data)
    {
        return $this->prefixImgUrl($value, $data);
    }
}