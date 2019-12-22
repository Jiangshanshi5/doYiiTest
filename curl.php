<?php 
    /**
     * 本文件主要用于CURL的使用复习
     * 目标：将curl整合为可继承的class类，便于以后工作中的使用，无需再次上网查找。
     * 姜珊 2019/12/21
     */
    /**
     * 创建一个入口方法
     * $type:curl传输类型：GET/POST
     * $url:目标网址
     */
class linkCurl{
    function __construct(){
        
    }
    
    public function linkUrlByPHP($type,$url,$data=""){
        $ret = array();
        switch ($type){
            case "get":
                $ret = $this->geturl($url);
                break;
            case "post":
                $ret = $this->posturl($url,$data);
                break;
            case "put":
                $ret = $this->puturl($url,$data);
                break;
            case "del":
                $ret = $this->delurl($url,$data);
                break;
            case "del":
                $ret = $this->delurl($url,$data);
                break;
            case "patch":
                $ret = $this->patchurl($url,$data);
                break;
            default:
                $ret['status'] = -1;
                $ret['message'] = "未定义的传输类型";
                json_decode($ret,true);
                break;
        }
        return $ret;
        
    }
    
    protected function geturl($url){
        $headerArray =array("Content-type:application/json;","Accept:application/json");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_HTTPHEADER,$headerArray);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
    
    
    protected function posturl($url,$data){
        $data  = json_encode($data);
        $headerArray =array("Content-type:application/json;charset='utf-8'","Accept:application/json");
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,FALSE);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl,CURLOPT_HTTPHEADER,$headerArray);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }
    
    
    protected function puturl($url,$data){
        $data = json_encode($data);
        $ch = curl_init(); //初始化CURL句柄
        curl_setopt($ch, CURLOPT_URL, $url); //设置请求的URL
        curl_setopt ($ch, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); //设为TRUE把curl_exec()结果转化为字串，而不是直接输出
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"PUT"); //设置请求方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);//设置提交的字符串
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
    
    protected function delurl($url,$data){
        $data  = json_encode($data);
        $ch = curl_init();
        curl_setopt ($ch,CURLOPT_URL,$put_url);
        curl_setopt ($ch, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
    
    protected function patchurl($url,$data){
        $data  = json_encode($data);
        $ch = curl_init();
        curl_setopt ($ch,CURLOPT_URL,$url);
        curl_setopt ($ch, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);     //20170611修改接口，用/id的方式传递，直接写在url中了
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
}
/**
 * 调用class方法
 * @var linkCurl $curl
 */
$type = "get";
$data = array();
$url = "http://localhost/learn%20box/return.php";
$curl = new linkCurl();
echo  $curl->linkUrlByPHP($type,$url,$data);
?>