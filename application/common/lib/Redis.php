<?php
/**
 * Created by PhpStorm.
 * User: v_wyjyjwang
 * Date: 2019/9/10
 * Time: 15:55
 */
namespace app\common\lib;
class Redis{
    public static $pre = 'sms_';

    public static function smsKey($phone){
        return self::$pre . $phone;
    }
}