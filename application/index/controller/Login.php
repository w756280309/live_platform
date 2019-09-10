<?php
namespace app\index\controller;
require_once __DIR__ . "/../../common/lib/Sms.php";
use Aliyun\DySDKLite\Sms\Sms;
use app\common\lib\Util;
class login{

    public function index(){
        $phoneNumber = request()->get('phone_num',0,'intval');
        if(empty($phoneNumber)){
            return Util::show(config('code.error'),'error');
        }
        $code = (string)mt_rand(1000,9999);
        $sendInfo = Sms::sendSms($phoneNumber,$code);
        if(!empty($sendInfo)){
            print_r($sendInfo);
        }
    }

}