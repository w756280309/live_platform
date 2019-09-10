<?php
namespace app\index\controller;
require_once __DIR__ . "/../../common/lib/Sms.php";
use Aliyun\DySDKLite\Sms\Sms;

class Index
{
    public function index()
    {
        print_r($_GET);
        echo  '1'.PHP_EOL;
    }

    public function singwa()
    {
        phpinfo();
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }

    public function sms(){
        //ini_set("display_errors", "on"); // 显示错误提示，仅用于测试时排查问题
// error_reporting(E_ALL); // 显示所有错误提示，仅用于测试时排查问题
        //set_time_limit(0); // 防止脚本超时，仅用于测试使用，生产环境请按实际情况设置
        //header("Content-Type: text/plain; charset=utf-8"); // 输出为utf-8的文本格式，仅用于测试
        print_r('1111'.PHP_EOL);
        print_r(Sms::sendSms(15994787767,'6666'));

    }

    public function login(){

    }
}
