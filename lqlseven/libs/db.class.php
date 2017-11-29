<?php
//   echo phpinfo();
defined('COME') or exit('非法入侵');
//组合sql语句   host ,user ,password, database,port
class db{
    //将需要的定义为属性
    private $host;
    private $user;
    private $password;
    private $database;
    private $port;
    public $db;
    //通过属性来定义组合sql语句
    function __construct($table){
        //构造函数中传入表
        //将传入的$table定义为属性
        $this->table=$table;
        //获取config文件中返回数组的信息
//           $config=require APP_PATH.'/config.class.php';

        global $config;   //转化为全局变量
        //require和include的区别   required错误脚本中止  include错误的时候脚本不终止
        //获取config数组中的信息
        $this->host=$config['database']['host'];
        $this->user=$config['database']['user'];
        $this->password=$config['database']['password'];
        $this->database=$config['database']['database'];
        $this->port=$config['database']['port'];
        //组合sql语句的各个元素来自于配置文件config中
        $this->db=new mysqli($this->host,$this->user,$this->password,$this->database,$this->port);
        if(mysqli_connect_error()){
            echo '数据库连接错误';
            exit;
//               mysqli_connect_errno();  数据库连接错误的信息
        }
        $this->db->query('set names utf8');
        //定义where  order by   limit
        $this->opts['field']='*';
        $this->opts['where']=$this->opts['order']=$this->opts['limit']='';

    }
    //设置表可变
    public function setTable($tablename){
        $this->table=$tablename;
    }
    //多个查询语句
    public function select($sql=''){
        if(empty($sql)){
            $sql="select ".$this->opts['field']." from ".$this->table." ".$this->opts['where']." ".
                $this->opts['order']." ".$this->opts['limit'];
        }else{
            $sql=$sql;
        }
        $result=$this->db->query($sql);
        $arr=array();
        while($row=$result->fetch_assoc()){
            $arr[]=$row;
        }
        return $arr;
//           $row=$result->fetch_all();
//           var_dump($row);

    }

    //查询单个语句
    public function selectfind(){
        if(empty($sql)){
            $sql="select ".$this->opts['field']." from ".$this->table." ".$this->opts['where']." ".
                $this->opts['order']." ".$this->opts['limit'];
        }else{
            $sql=$sql;
        }
        $result=$this->db->query($sql);
        $row=$result->fetch_assoc();
        return $row;
    }

    //插入insert
    public function insert($arr){
        $attr='';
        $val='';
        //foreach方法  $k是属性   $v是值
        foreach($arr as $k=>$v){
            $attr.=$k.',';
            $val.=$v.',';
        }
        $attr=substr($attr,0,-1);
        $val=substr($val,0,-1);
        $sql="insert into ".$this->table." (".$attr.")"."values"."(".$val.")";
        $this->db->query($sql);
        return $this->db->affected_rows;

    }
    //删除
    public function delete(){
        //delete from 表名  where id=2;
        $sql="delete from ".$this->table." ".$this->opts['where'];
        $result=$this->db->query($sql);
        return $this->db->affected_rows;
    }
    //改
    public  function update($sql){
        //update 表名 set name=dd,age=dd where id=1;
        $sql="update ".$this->table." set ".$sql." ".$this->opts['where'];
        $result=$this->db->query($sql);
        return $this->db->affected_rows;

    }

    //自定义语句
    public function exec($sql){
        $result=$this->db->query($sql);
        return $result;

    }

    //链式调用
    public function field($field){
        $this->opts['field']=$field;
        return $this;
    }
    public function where($where){
        $this->opts['where']='where '.$where;
        return $this;
    }
    public function order($order){
        $this->opts['order']='order by '.$order;
        return $this;
    }
    public function limit($limit){
        $this->opts['limit']='limit '.$limit;
        return $this;
    }



}
?>