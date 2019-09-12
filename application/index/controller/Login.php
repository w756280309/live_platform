<?php
namespace app\index\controller;
require_once __DIR__ . "/../../common/lib/Sms.php";
use Aliyun\DySDKLite\Sms\Sms;
use app\common\lib\redis\Predis;
use app\common\lib\Util;
use app\common\lib\Redis;
class login{

    public function send(){
        //$phoneNumber = request()->get('phone_num',0,'intval');
        $phoneNumber = (int)$_GET['phone_num'];
        if(empty($phoneNumber)){
            return Util::show(config('code.error'),'error','手机号为空！');
        }
        $code = (string)mt_rand(1000,9999);
        try{
            $sendInfo = Sms::sendSms($phoneNumber,$code);
        }catch (\Exception $e){
            return Util::show(config('code.error'),'error','阿里短信异常');
        }

        if($sendInfo->Code === 'OK'){
            //redis
            $redis = new \Swoole\Coroutine\Redis();
            $redis->connect(config('redis.host'),config('redis.port'));
            $redis->set(Redis::smsKey($phoneNumber),$code , config('redis.out_time'));
            return Util::show(config('code.success'),'success','成功！');
        }else{
            return Util::show(config('code.error'),'error','失败！');
        }
    }

    public function index(){
        //获取手机号码  验证码
        $phoneNumber = (int)$_GET['phone_num'];
        $code = (int)$_GET['code'];
        if(empty($phoneNumber) || empty($code)){
            return Util::show(config('code.error'),'手机号或者验证码为空！');
        }
        //去redis中获取验证码进行验证是否一致
        $redisCode = Predis::getInstance()->get(Redis::smsKey($phoneNumber));

    }

}