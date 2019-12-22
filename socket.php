<?php 
    /**
     * 本文件主要用于socket使用
     * 目标：将socket通讯整合为可继承的class类，便于以后工作中的使用，无需再次上网查找。
     * 姜珊 2019/12/21
     */
     /**
     * 创建一个入口方法
     * 前提条件：linux服务器运行环境
     */
class socketSend{
    function __construct(){
        
    }
    function socket($ip,$port){
        $socket = socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
        socket_bind($socket,$ip,$port);
        socket_listen($socket);
        //产生一个连接
        $sock = socket_accept($socket);//其实是一个循环等待的过程
        $res = socket_read($sock,2048);//读取指定长度的数据，2048是数据长度
        echo $res;
        socket_write($sock,'发送给对话的另一个人的内容');
    }
    
    public function client($ip,$port){
        $socket = socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
        socket_connect($socket,$ip,$port);
        $msg = '发送给对话的另一个人的内容';
        socket_write($socket,$msg);
        $res = socket_read($socket,2048);//读取指定长度的数据，2048是数据长度
        echo $res;
    }
    
}
?>