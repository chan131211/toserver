<?php


namespace app\api\controller\v1;


use app\api\validate\IDMustBePositiveInt;
use app\api\model\Banner as BannerModel;
use app\lib\exception\BannerMissException;


class Banner
{
    /**
     * @param $id
     * @throws \think\Exception
     */
    public function getBanner($id)
    {
        //验证id
        (new IDMustBePositiveInt())->goCheck();

        $banner = BannerModel::find($id);
        if (!$banner) {
            throw new BannerMissException();
        }
        return $banner;
    }
}