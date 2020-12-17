<?php


namespace app\api\validate;


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

        $result = $this->check($param);
        if (!$result) {
            $error = $this->error;
            throw new Exception($error);
        } else {
            return true;
        }
    }
}