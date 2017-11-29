<?php
defined('COME') or exit;
   class index extends  main{
       public   function init(){
           if(isset($_SESSION['adminaname'])){
               $this->smartyObj->assign('aphoto',$_SESSION['aphoto']);
               $this->smartyObj->assign('adminname',$_SESSION['adminaname']);
               $this->smartyObj->display('admin/index.html');
           }else if(!isset($_SESSION['adminaname'])){
               //判断cookie中是否存在值，存在的话记住密码直接勾选
               //将值分配过去
                $this->smartyObj->assign('cookieaname',isset($_COOKIE["aname"])?$_COOKIE["aname"]:'');
                $this->smartyObj->assign('cookieapass',isset($_COOKIE["apass"])?$_COOKIE["apass"]:'');
                $this->smartyObj->display('admin/login.html');
           }



       }


       //用户的文章管理
       public function  articles(){
           $this->smartyObj->display('admin/articles.html');
       }
       public function  showarticles(){
           $uname=P('uname');
           $contitle=P('contitle');
           $dbobj=new db('user');
           $uid=$dbobj->where("uname='{$uname}'")->selectfind()['uid'];
           $dbobj->setTable('content');
           $result=$dbobj->where("uid=".$uid." and contitle='{$contitle}'")->select();
           if($result){
               echo json_encode($result);
           }else{
               echo '1';
           }

       }
       public function addarticlesCheck(){
           var_dump($_POST);
       }
       public function editarticles(){
           $this->smartyObj->display('admin/editarticles.html');
       }
       public function editarticleCheck(){
           var_dump($_POST);
       }
       public  function articlesdel(){
           $dbobj=new db('content');
           $lists=$dbobj->select();
           $dbobj->setTable('user');
           foreach($lists as &$v){
               $uid=$v['uid'];
              $row= $dbobj->where('uid='.$uid)->selectfind();
              $v['uname']=$row['uname'];
           }
           $this->smartyObj->assign('lists',$lists);
           $this->smartyObj->display('admin/articlesdel.html');
       }
       public function articlesdelCheck(){
           if(empty($_POST)){
               echo '<script>alert("请选择您要删除的数据");location.href="index.php?m=admin&f=index&a=articlesdel"</script>';
               exit;
           }
           if(!isset($_GET['conid'])){
               if($_POST['conids'][0]=='on') {
                   $dbobj = new db('content');
                   $sql = "delete from content";
                   if ($dbobj->exec($sql)) {
                       echo "<script>alert('全部删除');location.href='index.php?m=admin&f=index&a=articlesdel'</script>";
                   }
                   exit;
               }else{
                       $lists = $_POST['conids'];
                       $dels = implode(',', $lists);
                       $dbobj = new db('content');
                       $sql = "delete from content where (conid in ($dels))";
                       if ($dbobj->exec($sql)) {
                           echo "<script>alert('删除成功');location.href='index.php?m=admin&f=index&a=articlesdel'</script>";
                       }
                   exit;
                   }

           };
          if(empty($_POST)){
            $conid=G('conid');
            $dbobj=new db('content');
            if($dbobj->where('conid='.$conid)->delete()){
                echo "<script>alert('删除成功');location.href='index.php?m=admin&f=index&a=articlesdel'</script>";
            }
            exit;
           }
       }
       //用户的订单管理
       public function userorder(){
           $this->smartyObj->display('admin/userorder.html');
       }
       //用户的支付管理
       public function userpay(){
           $this->smartyObj->display('admin/userpay.html');
       }
       //用户的访问管理
       public  function   access(){
           $this->smartyObj->display('admin/access.html');
       }


       //分类管理
       public function category(){
           include_once LIBS_PATH.'/classify.php';
           $dbobj=new db('category');
           $db=$dbobj->db;
           $obj=new trees();
           $obj->show(0,$db,'category',0,'');
           $objUl=$obj->ul;
           $this->smartyObj->assign('objShow',$objUl);
           $this->smartyObj->display('admin/category.html');
       }
       public function addcategory(){
           include_once LIBS_PATH.'/classify.php';
           $dbobj=new db('category');
           $db=$dbobj->db;
           $obj=new trees();
           $obj->tree(0,$db,"category",0,"-&nbsp;",0);
           $objString=$obj->str;
           $this->smartyObj->assign('objAdd',$objString);
           $this->smartyObj->display('admin/addcategory.html');
       }
       public function addcategoryCheck(){
           $dbobj=new db('category');
           $pid=P('pid');
           $cname=P('cname');
           $arr=array(
               "cname"=>"'$cname'",
               "pid"=>"$pid",
           );
           $dbobj->insert($arr);
           echo "<script>location.href='index.php?m=admin&f=index&a=addcategory'</script>";
       }
       public function editcategory(){
            include_once LIBS_PATH.'/classify.php';
            $dbobj=new db('category');
            $db=$dbobj->db;
            $cid=$_GET['cid'];
             $obj=new trees();
             $obj->tree(0,$db,'category',0,'-&nbsp;',$cid);
            $sql="select * from category where cid=".$_GET["cid"];
            $result=$db->query($sql);
            $row=$result->fetch_assoc();
           $this->smartyObj->assign('cid',$cid);
           $this->smartyObj->assign('cname',$row['cname']);
           $this->smartyObj->assign('objEdit',$row);
           $this->smartyObj->display('admin/editcategory.html');

       }
       public function delcategory(){
           include_once LIBS_PATH.'/classify.php';
           $dbobj=new db('category');
           $db=$dbobj->db;
           $cid=$_GET['cid'];
           $obj=new trees();
           echo $cid;
           $obj->del($cid,$db,'category');
       }

       //商家账户管理
       public function  account(){
           $this->smartyObj->display('admin/account.html');
       }
       //推荐位管理
       public function recommend(){
           $dbobj=new db('recommend');
           $lists=$dbobj->select();
           $this->smartyObj->assign('lists',$lists);
           $this->smartyObj->display('admin/recommend.html');
       }
       //推荐位添加
       public function addRecommend(){
          $rname=P('rname');
          $dbObj=new db('recommend');
          $arr=array(
              "rname"=>"'$rname'",
          );
         $result= $dbObj->insert($arr);
         if($result){
             echo "<script>alert('添加成功');location.href='index.php?m=admin&f=index&a=recommend'</script>";
         }

       }
       //推荐位编辑
       public function editRecommend(){
           if(empty($_POST)){
               echo "<script>alert('请选择你要修改的数据');location.href='index.php?m=admin&f=index&a=recommend'</script>";
           }else{
               if($_POST['rid'][0]=='on'){
                   $rid=$_POST['rid'];
                   $edits=$rid[1];
                   $dbobj=new db('recommend');
                   $result=$dbobj->where('rid='.$edits)->selectfind();
                   $this->smartyObj->assign('result',$result);
                   $this->smartyObj->display('admin/editrecommend.html');
                   exit;

               }elseif (count($rid=$_POST['rid'])>1){
                   //  php中数组的长度  count($aid)   sizeof($arr)
                   $edits=$rid[0];
                   $dbobj=new db('recommend');
                   $result=$dbobj->where('rid='.$edits)->selectfind();
                   $this->smartyObj->assign('result',$result);
                   $this->smartyObj->display('admin/editrecommend.html');
                   exit;

               }else{
                   $rid=$_POST['rid'];
                   $edits=implode(',',$rid);
                   $dbobj=new db('recommend');
                   $result=$dbobj->where('rid='.$edits)->selectfind();
                   $this->smartyObj->assign('result',$result);
                   $this->smartyObj->display('admin/editrecommend.html');
                   exit;
               };
           }
       }
       public function  editRecommendCheck(){
           $rname=$_POST['rname'];
           $rid=$_POST['rid'];
           $dbobj=new db('recommend');
           if($dbobj->where('rid='.$rid)->update("rname='{$rname}'")){
               echo "<script>alert('修改成功');location.href='index.php?m=admin&f=index&a=recommend'</script>";
           }
       }
       public function delrecommend(){
           if(empty($_POST)){
               echo "<script>alert('请选择你要删除的数据');location.href='index.php?m=admin&f=index&a=recommend'</script>";
           }else{
              if($_POST['rid'][0]=='on'){
                  $dbobj=new db('recommend');
                  if($dbobj->exec("delete from recommend")){
                      echo "<script>alert('全部删除');location.href='index.php?m=admin&f=index&a=recommend'</script>";
                      exit;
                  }
//echo<<<EOT
//<script>
//         var con=confirm('是否全部删除');
//         if(con==true){.$dbobj."=new db('recommend');
//         $dbobj->exec('delete from recommend')"
//           location.href='index.php?m=admin&f=index&a=recommend';}
//         if(con==false){
//             location.href='index.php?m=admin&f=index&a=recommend';
//         }</script>
//EOT;

                 exit;
              }else{
                 $lists=$_POST['rid'];
                 $dels=implode(',',$lists);
                 $dbobj=new db('recommend');
                 $sql="delete from recommend where (rid in ($dels))";
                 if($dbobj->exec($sql)){
                     echo "<script>alert('删除成功');location.href='index.php?m=admin&f=index&a=recommend'</script>";
                     exit;
                 }
              }
           }

       }
   }
?>