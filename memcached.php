<?php
class AdminModel
{
    public $m='';
    public function __construct()
    {
        //创建实例
        $this->m = new Memcached();
        $this->m->addServer('localhost', 11211);
    }
    /*
        * memcached增加模板
        */
    public function mem_add($key,$value){
//        $m=$this->mem_connect();
        //添加
        $msg=$this->m->set($key,$value);
        return $msg;
    }

    /*
    * memcached获取模板
    */
    public function mem_get($key){
        //查找
        $msg=$this->m->get($key);
        if(!$msg){
            return false;
        }
        //有则反序列输出
//        $msg=unserialize($msg);
        return $msg;
    }

    /*
     * 获取  使用序列化来存储数据   key使用sql查询语句
     */
    public function select_msg($key,$sql){

        //先查询数据缓存是否有该数据
        $msg=$this->mem_get($key);
        //没有则查询数据库
        if(!$msg){
//            var_dump('跑数据库');
            $list=M()->query($sql);
            if(!$list){
                output_error('查询失败！');
            }
            //把查询出来的结果序列化存进memcache中
            $data=serialize($list);
            //存失败也不影响 ，把获取的值返回去
            $re=$this->mem_add($key,$data);
            //返回数据库查找的值
            return $list;
        }
//        var_dump('不跑数据库');
        //有则反序列输出
        $msg=unserialize($msg);
        return $msg;
    }
}
<?php
/**
 * 后台添加商品类
 */

class AddGoods
{
    /**
     * 获取品牌列表
     */
    public function get_brand(){
        //创建实例
        $mem=new AdminModel();
        //定义查询语句
        $sql='select brand_id,brand_name from jiajudashi_goods_brand';
        $key=md5($sql);
        $list=$mem->select_msg($key,$sql);
        //        $list=$mem->mem_get($sql);
        var_dump($list);
    }
}