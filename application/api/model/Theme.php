<?php


namespace app\api\model;


class Theme extends BaseModel
{
    //隐藏字段
    protected $hidden = ['topic_img_id', 'delete_time', 'head_img_id', 'update_time'];

    /**
     * 关联image表
     * @return \think\model\relation\BelongsTo
     */
    public function topicImg()
    {
        return $this->belongsTo('Image','topic_img_id','id');
    }

    /**
     * 关联image表
     * @return \think\model\relation\BelongsTo
     */
    public function headImg()
    {
        return $this->belongsTo('Image','head_img_id', 'id');
    }

    /**
     * 关联product表
     * @return \think\model\relation\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany('product','theme_product','product_id','theme_id');
    }

    public static function getThemeWithProducts($id)
    {
        $theme = self::with('products,topicImg,headImg')->find($id);
        return $theme;
    }
}