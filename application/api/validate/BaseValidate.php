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

    /**
     * 自定义验证id必须是正整数
     * @param string $value 验证的值
     * @param string $data
     * @param string $rule  验证规则
     * @param string $field 验证字段描述信息
     * @return bool|string
     */
    protected function isPositiveInteger($value, $data ='', $rule = '', $field = '')
    {
        if (is_numeric($value) && is_int($value + 0) && ($value + 0) > 0) {
            return true;
        } else {
            return false;
        }
    }
}