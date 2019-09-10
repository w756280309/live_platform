<?php
/**
 * Created by PhpStorm.
 * User: v_wyjyjwang
 * Date: 2019/9/10
 * Time: 15:06
 */
namespace app\common\lib;
class Util{
    /**
     * 进行json状态输出。
     * @author  v_wyjyjwang
     * @param $status
     * @param string $message
     * @param array $data
     * @return false|string
     */
    public static function show($status, $message = '',$data = []){
        $result = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];

        return json_encode($result);
    }
}