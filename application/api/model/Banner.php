<?php


namespace app\api\model;

use think\Model;

class Banner extends Model
{
    //隐藏字段
    protected $hidden = ['delete_time', 'update_time'];

    /**
     * 关联banner_item表
     * @return \think\model\relation\HasMany
     */
    public function items()
    {
        return $this->hasMany('BannerItem','banner_id','id');
    }

    /**
     * 通过id获取banner详情
     * @param $id
     * @return array|bool|false|\PDOStatement|string|Model|null
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public static function getBannerByID($id)
    {
        $banner = self::with(['items', 'items.img'])->find($id);
        return $banner;
    }

}