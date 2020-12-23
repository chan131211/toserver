<?php

namespace app\api\model;

use think\Model;

class BannerItem extends Model
{
    //隐藏字段
    protected $hidden = ['id', 'img_id', 'banner_id', 'delete_time', 'update_time'];

    /**
     * 关联image表
     * @return \think\model\relation\BelongsTo
     */
    public function img()
    {
        return $this->belongsTo('Image','img_id','id');
    }
}
