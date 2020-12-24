<?php


namespace app\api\controller\v1;


use app\api\validate\IDCollection;
use app\api\model\Theme as ThemeModel;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\ThemeException;

class Theme
{
    /**
     * 获取theme的信息
     * @url  /theme?ids=1,2,3.....
     * @param string $ids
     * @return bool|false|\PDOStatement|string|\think\Collection
     * @throws ThemeException
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getSimpleList($ids = '')
    {
        (new IDCollection())->goCheck();
        $ids = explode(',', $ids);
        $result = ThemeModel::with('topicImg,headImg')->select($ids);
        if (!$result) {
            throw new ThemeException();
        }
        return $result;
    }

    /**
     * 获取theme详情
     * @url  /theme/:id
     * @param $id
     * @return bool|false|\PDOStatement|string|\think\Collection
     * @throws ThemeException
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getComplexOne($id)
    {
        (new IDMustBePositiveInt())->goCheck();
//        $result = ThemeModel::with('products')->find($id);
//        if (!$result) {
//            throw new ThemeException();
//        }
//        return $result;
        $theme = ThemeModel::getThemeWithProducts($id);
        if (!$theme) {
            throw new ThemeException();
        }
        return $theme;
    }
}