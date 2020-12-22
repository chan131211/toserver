<?php


namespace app\api\validate;


use app\lib\exception\ParameteException;
use think\Exception;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    /**
     * 自定义验证方法
     * @return bool
     * @throws Exception
     */
    public function goCheck()
    {
        //获取参数
        $request = Request::instance();
        $param = $request->param();

        //验证参数
        $result = $this->batch()->check($param);
        if (!$result) {
            throw new ParameteException(['msg' => $this->error]);
        } else {
            return true;
        }
    }
}