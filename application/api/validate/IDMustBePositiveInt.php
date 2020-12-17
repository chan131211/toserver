<?php


namespace app\api\validate;

class IDMustBePositiveInt extends BaseValidate
{
    protected $rule = [
        'id' => 'require|isPositiveInteger'
    ];

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
            return $field.'必须是正整数';
        }
    }
}