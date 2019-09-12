<?php
/**
 * Created by PhpStorm.
 * User: v_wyjyjwang
 * Date: 2019/9/11
 * Time: 11:22
 */
namespace app\common\lib\redis;
class Predis{
    //redis的单例模式 静态公有方法来生成对象实例，调用私有构造函数
    public $redis = null;
    private static $_instance = null;

    public static function getInstance(){
        if(empty(self::$_instance)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function __construct(){
        $this->redis = new \Redis();
        $result = $this->redis->connect(config('redis.host'),config('redis.port'),config('time_out'));
        if($result === false){
            throw new \Exception('redis connect error');
        }
    }

    public function set($key,$value,$time){
        if(!$key){
            return '';
        }
        if(is_array($value)){
            $value = json_encode($value);
        }
        if(!$time){
            return $this->redis->set($key,$value);
        }
        return $this->redis->setex($key,$time,$value);
    }

    public function get($key){
        if(!$key){
            return '';
        }

        return $this->redis->get($key);
    }
}