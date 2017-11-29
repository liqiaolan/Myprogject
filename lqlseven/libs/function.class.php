<?php
function P($params){
     return $_POST[$params];
}
function G($params){
      return $_GET[$params];
}
function sql($params){
    return  addslashes(htmlspecialchars($params));
}
//无限极分类的方法
function tree($pid,&$arr){
    //传入两个参数  pid  $arr
    //为了保证递归时候数组下标的统一  定义一个i
    $i=0;
    $dbobj=new db('category');
    //组合好的数据库
    $db=$dbobj->db;
    $sql="select * from category where pid=".$pid;
    $result=$db->query($sql);
    while($row=$result->fetch_assoc()){
        $arr[$i]=array(
            "id"=>$row['cid'],
            "text"=>"{$row["cname"]}",
        );
        //进行递归
        tree($row['cid'],$arr[$i]['children']);
        $i++;
    }

}