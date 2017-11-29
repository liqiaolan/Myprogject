<?php
defined('COME') or exit;
  class admin extends main
  {
      //管理员管理
      public function adminmanage()
      {
          include LIBS_PATH."/pages.class.php";
          $pagesobj=new pages();
          $dbobj = new db('admin');
          $lists = $dbobj->select();
          //求总数
          $pagesobj->total=count($lists);
          $pagesobj->nums=5;
          $this->smartyObj->assign('pages', $pagesobj->show());
          //求limit限制条件
          $result=$dbobj->select("select admin.*,level.lname from admin,level where admin.alevel=level.lid limit ".$pagesobj->limit);
          $this->smartyObj->assign('lists', $result);
          //查找管理员的级别
          $this->smartyObj->display('admin/adminmanage.html');
      }

      //添加管理员
      public function addadmin()
      {
          //对添加的权限进行设置
          $dbobj=new db('level');
          $lid=$_SESSION['alevel'];
          $result=$dbobj->where("lid=".$lid.' and find_in_set("1",adminpermiss)')->select();
          if(count($result)>0){
          $dbobj=new db('level');
          $result=$dbobj->select();
          $this->smartyObj->assign('data',$result);
          $this->smartyObj->display('admin/addadmin.html');
          }else{
              $this->smartyObj->display('admin/nopermiss.html');
          }
      }

      public function addadminCheck()
      {

              $aname = sql(P('aname'));
              $apass = P('apass');
              $apassA = P('apassA');
              $alevel = P('lid');
              $imgpath=P('imgpath');
              $lid=P('lid');
              if (!(preg_match('/^[\x{4e00}-x{9fa5} a-z A-Z]\w{5,11}$/u', $aname)||preg_match('/^[a-zA-Z0-9]\w{5,11}$/', $apass) || preg_match('/^[a-zA-Z0-9]\w{5,11}$/', $apass))) {
                  echo '<script>alert("添加的名字或者密码不符合规则");location.href="index.php?m=admin&f=admin&a=addadmin"</script>';
              }
              $apass = md5($apass);
              $apassA = md5($apassA);
              if (!($apass == $apassA)) {
                  echo '<script>alert("两次密码不一致");location.href="index.php?m=admin&f=admin&a=addadmin"</script>';
              }
              $dbobj = new db('admin');
              $arr = array(
                  "aname" => "'$aname'",
                  "apass" => "'$apass'",
                  "alevel" => "$lid",
                  "aphoto"=>"'$imgpath'",
              );
              $result = $dbobj->insert($arr);
              if ($result > 0) {
                  echo "<script>alert('插入成功');location.href='index.php?m=admin&f=admin&a=addadmin'</script>";
              } else {
                  echo "<script>alert('插入失败');'</script>";
              }


      }

      //修改管理员
      public function editadmin()
      {
          //判断修改的权限
          $dbobj=new db('level');
          $lid=$_SESSION['alevel'];
          $result=$dbobj->where('lid='.$lid.' and find_in_set("3",adminpermiss)')->select();
          if(count($result)>0){
              $dbobj=new db('level');
              $result=$dbobj->select();
              $this->smartyObj->assign('data',$result);
              $aid = G('aid');
              $dbobj = new db('admin');
              $result1 = $dbobj->where('aid='. $aid)->selectfind();
              $_SESSION['apass']=$result1['apass'];
              $_SESSION['imgpath']=$result1['aphoto'];
              $alevel=$result1['alevel'];
              $dbobj->setTable('level');
              $lid=$dbobj->where('lid='.$alevel)->select()[0]['lid'];
              $this->smartyObj->assign('result', $result1);
              $this->smartyObj->assign('lid', $lid);
              $this->smartyObj->display('admin/editadmin.html');
          }else{
              $this->smartyObj->display('admin/nopermiss.html');
          }

      }

      public function editadminCheck()
      {
          $apass = P('apass');
          $aname = sql(P('aname'));
          $apassA = P('apassA');
          $alevel = P('lid');
          $aid = P('aid');
          $imgpath = P('imgpath');
          if($imgpath==''){
              $imgpath=$_SESSION['imgpath'];
              unset($_SESSION['imgpath']);
          }else{
              $imgpath=$imgpath;
              unset($_SESSION['imgpath']);
          }
          //判断密码是否修改
          if($apass==$_SESSION['apass']){
              $apass=$_SESSION['apass'];
              unset($_SESSION['apass']);
          }else{
              unset($_SESSION['apass']);
              if (!(preg_match('/^[a-zA-Z0-9]\w{5,11}$/', $apass) || preg_match('/^[a-zA-Z0-9]\w{5,11}$/', $apassA))) {
                  echo '<script>alert("密码不符合规则");location.href="index.php?m=admin&f=index&a=adminmanage"</script>';
              }
              $apass = md5($apass);
              $apassA = md5($apassA);
          }

          if (!($apass == $apassA)) {
              echo '<script>alert("两次密码不一致");location.href="index.php?m=admin&f=index&a=addadmin"</script>';
          }
          $dbobj = new db('admin');
          $result = $dbobj->where("aid=" . $aid)->update("aname='" . $aname . "', apass='" . $apass . "',alevel=" . $alevel.",aphoto='{$imgpath}'" );
          var_dump($result);
          if ($result>=0) {
              echo "<script>alert('修改成功');location.href='index.php?m=admin&f=admin&a=adminmanage'</script>";
          } else {
              echo "<script>alert('修改失败');</script>";
          }
      }

      public function del(){
          //判断权限
          $dbobj=new db('level');
          $lid=$_SESSION['alevel'];
          $result=$dbobj->where('lid='.$lid.' and find_in_set("2",adminpermiss)')->select();
          if(count($result)>0){
              $aid = $_GET['aid'];
              $dbobj = new db('admin');
              $sql = "delete from admin where aid={$aid}";
              if ($dbobj->exec($sql)) {
                  echo "<script>alert('删除成功');location.href='index.php?m=admin&f=admin&a=adminmanage'</script>";
                  exit;
              }
          }else{
              $this->smartyObj->display('admin/nopermiss.html');
          }


      }
      //头像上传
      public function Upload(){
          include LIBS_PATH.'/upload.php';
          $uploadobj=new Upload();
          $uploadobj->move();
      }
      //管理员级别管理
      public function alevel()
      {
          include LIBS_PATH."/pages.class.php";
          $pagesobj=new pages();
          $dbobj = new db('level');
          $lists = $dbobj->select();
          //求总数
          $pagesobj->total=count($lists);
          $this->smartyObj->assign('pages', $pagesobj->show());
          //求limit限制条件
          $result=$dbobj->limit($pagesobj->limit)->select();
          $this->smartyObj->assign('lists', $result);
          $this->smartyObj->display('admin/alevel.html');
      }

      public function showalevel()
      {
          include LIBS_PATH."/pages.class.php";
          $pagesobj=new pages();
          $dbobj = new db('level');
          $s=$_GET["pages"]*$pagesobj->nums;
          $result=$dbobj->limit("{$s}, $pagesobj->nums")->select();
          $arr = array();
          $arr['rows'] = $result;
          $arr['results'] = count($result);
          echo json_encode($arr);
      }

      public function addalevel(){
          $dbobj=new db('level');
          $lid=$_SESSION['alevel'];
          $result=$dbobj->where('lid='.$lid.' and find_in_set("1",gradepermiss) and find_in_set("3",gradepermiss)')->select();
          if(count($result)>0){
              $type=G('type');
              $dbobj = new db('level');
              $lname = sql(P('lname'));
              $lid=sql(P('lid'));
              $conpermiss = sql(P('conpermiss'));
              $mespermiss = sql(P('mespermiss'));
              $adminpermiss = sql(P('adminpermiss'));
              $gradepermiss = sql(P('gradepermiss'));
              if($type=='edit'){
                  $lname = sql(P('lname'));
                  if($dbobj->where('lid='.$lid)->update("lname='{$lname}',conpermiss='{$conpermiss}',mespermiss='{$mespermiss}',adminpermiss='{$adminpermiss}',gradepermiss='{$gradepermiss}'")>0){
                      echo 'edit';
                  }

              }elseif ($type=='add'){
                  if ($dbobj->insert(array('lname' => "'$lname'",'conpermiss' => "'$conpermiss'",'mespermiss' => "'$mespermiss'",'adminpermiss' => "'$adminpermiss'",'gradepermiss' => "'$gradepermiss'"))>0) {
                      echo $dbobj->db->insert_id;
                  }
              }
          }else{
              $this->smartyObj->display('admin/nopermiss.html');
          }


      }
      public function delalevel(){
         //权限
          $dbobj=new db('level');
          $lid=$_SESSION['alevel'];
          $result=$dbobj->where('lid='.$lid.' and find_in_set("2",gradepermiss)')->select();
          if(count($result)>0){
              $data=$_POST['lids'];
              $dbobj=new db('level');
              if($dbobj->where('lid in '.$data)->delete()){
                  echo 'delete';
              }
          }else{
              echo 'no';
          }


      }
      //商家账户
      public function account(){
          $this->smartyObj->display('admin/account.html');
      }

  }