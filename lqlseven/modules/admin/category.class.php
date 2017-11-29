<?php
defined('COME') or exit;
   class category extends main{
       //查看分类
       public function showcategory(){
           $this->smartyObj->display('admin/category.html');
       }
       //查看分类
       public  function showcatcheck(){
           $dbobj=new db('category');
           $result=$dbobj->select();
           $arr=array();
           $arr['total']=count($result);
           $arr['rows']=array(array(
               "cname"=>'一级分类',
               "id"=>0,
           ));
           foreach ($result as $v){
               $v['id']=$v['cid'];
               $v['name']=$v['cname'];
               $v['_parentId']=$v['pid'];
               $arr['rows'][]=$v;
           };
           $arr['footer']=array(array(
               "cname"=>"Total Persons:","persons"=>7,"iconCls"=>"icon-sum",
           ));
           echo json_encode($arr);

       }

       //添加分类  展示页面
       public function addcategory(){
           $this->smartyObj->display('admin/addcategory.html');
       }
       //ajax对分类获取
       public function categoryshow(){
          $arr=array();
          tree(0,$arr);
          echo json_encode($arr);
       }

       //对添加进行验证
       public function  addCatcheck(){
           $pid=P('pid')=="一级分类"?0:P('pid');
           $cname=P('cname');
           $cinfo=sql(P('cinfo'));
           if(empty($cname)>0){
               echo "<script>alert('分类名不能为空');location.href='index.php?m=admin&f=category&a=addcategory'</script>";
           }
           $arr=array(
               "cname"=>"'$cname'",
               "cinfo"=>"'$cinfo'",
               "pid"=>$pid,
           );
           $dbobj=new db('category');
           if($dbobj->insert($arr)>0){
               echo "<script>alert('添加成功');location.href='index.php?m=admin&f=category&a=addcategory'</script>";
           }
       }

       //修改分类
       public function editcat(){
           $cid=$_POST['obj']['cid'];
           $arr=$_POST['arr'];
           $dbobj=new db('category');
           $str='';
           for($i=0;$i<count($arr);$i++){
               $str.=$arr[$i].',';
           }
           $str=substr($str,0,-1);
           if($dbobj->where('cid='.$cid)->update($str)>=0){
               echo 'ok';
           }

       }
       //删除
       public  function delcategory(){
           $cid=$_POST['cid'];
           $dbobj=new db('category');
           if($dbobj->where('cid='.$cid)->delete()>0){
               echo 'ok';
           }

       }
   }