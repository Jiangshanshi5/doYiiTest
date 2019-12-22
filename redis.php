<?php
class Redis{
    private $redis;
    private static $connections = array(); //定义一个对象池
    private static $servers = array(); //定义redis配置文件
    public static function addServer($conf){//定义添加redis配置方法
        foreach ($conf as $name => $data){
            self::$servers[$name]=$data;
        }
    }
    public static function getRedis($name,$select = 0){
        //两个参数要连接的服务器KEY,要选择的库
        if(!array_key_exists($name,self::$connections)){
            //判断连接池中是否存在
            $redis = new \Redis();
            $redis->connect(self::$servers[$name][0],self::$servers[$name][1]);
            self::$connections[$name]=$redis;
            if(isset(self::$servers[$name][2]) && self::$servers[$name][2]!=""){
                self::$connections[$name]->auth(self::$servers[$name][2]);
            }
        }
        self::$connections[$name]->select($select);
        return self::$connections[$name];
    }
}
    $redis = new Redis();  
    $redis->connect('127.0.0.1', 8080);//serverip port
    $redis->auth('mypassword');//my redis password 
    $redis ->set( "test" , "Hello World");  
    echo $redis ->get( "test");
