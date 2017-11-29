<?php
  class user extends main{
      //查看用户
      public function showuser(){
          //添加分页
          include LIBS_PATH.'/pages.class.php';
          $pageobj=new pages();
          $dbobj=new db('user');
          $result=$dbobj->select();
          //求总数
          $pageobj->total=count($result);
          $pageobj->nums=8;
          $this->smartyObj->assign('pages',$pageobj->show());
          //求限制条件
          $result1=$dbobj->select("select user.*,role.rname from user,role where user.urid=role.rid limit ".$pageobj->limit);
          $this->smartyObj->assign('lists',$result1);
          $this->smartyObj->display('admin/usermanage.html');
      }
      //添加用户
      public  function  adduser(){
          $dbobj=new db('role');
          $result=$dbobj->select();
          $this->smartyObj->assign('lists',$result);
          $this->smartyObj->display('admin/adduser.html');
      }
      public function adduserCheck(){
          $uname=$_POST['uname'];
          $upass=$_POST['upass'];
          $upassA=$_POST['upassA'];
          $unicheng=isset($_POST['unicheng'])?$_POST['unicheng']:'';
          $uphoto=isset($_POST['uphoto'])?$_POST['uphoto']:'';
          $uphone=isset($_POST['uphone'])?$_POST['uphone']:'';
          $ulevel=P('rid');
          if(!(preg_match('/^[a-zA-Z0-9]\w{5,11}$/',$upass)||preg_match('/^[a-zA-Z0-9]\w{5,11}$/',$upassA))){
              echo '<script>alert("用户名或者密码不符合规则");location.href="index.php?m=admin&f=user&a=adduser"</script>';
              exit;
          }
          $upass=md5(P('upass'));
          $upassA=md5(P('upassA'));
          if(!($upass==$upassA)){
              echo '<script>alert("两次密码不一致");location.href="index.php?m=admin&f=user&a=adduser"</script>';
              exit;
          }
          $dbObj=new db('user');
          $arr=array(
              "uname"=>"'$uname'",
              "upass"=>"'$upass'",
              "unicheng"=>"'$unicheng'",
              "uphoto"=>"'$uphoto'",
              "uphone"=>"'$uphone'",
              "ulevel"=>"$ulevel",
          );
          if($dbObj->insert($arr)){
              echo '<script>alert("添加成功");location.href="index.php?m=admin&f=user&a=adduser"</script>';
              exit;
          }
      }
      //修改用户
      public  function  edituser(){
          $dbobj=new db('role');
          $result=$dbobj->select();
          $this->smartyObj->assign('lists',$result);
          $uid = G('uid');
          $dbobj = new db('user');
          $result1 = $dbobj->where('uid='. $uid)->selectfind();
          $_SESSION['upass']=$result1['upass'];
          $_SESSION['uphone']=$result1['uphone'];
          $_SESSION['uphoto']=$result1['uphoto'];
          $ulevel=$result1['ulevel'];
          $dbobj->setTable('role');
          $rid=$dbobj->where('rid='.$ulevel)->select()[0]['rid'];
          $this->smartyObj->assign('result', $result1);
          $this->smartyObj->assign('rid', $rid);
          $this->smartyObj->display('admin/edituser.html');
      }
      public function edituserCheck(){
          $uname=$_POST['uname'];
          $upass=$_POST['upass'];
          $upassA=$_POST['upassA'];
          $unicheng=isset($_POST['unicheng'])?$_POST['unicheng']:'';
          $uphone=isset($_POST['uphone'])?$_POST['uphone']:'';
          $ulevel=P('ulevel');
          $uid=P('uid');
          $uphoto=isset($_POST['uphoto'])?$_POST['uphoto']:'';
          if($uphoto==''){
              $uphoto=$_SESSION['uphoto'];
              unset($_SESSION['uphoto']);
          }else{
              $uphoto=$uphoto;
              unset($_SESSION['uphoto']);
          }
          //判断密码是否修改
          if($upass==$_SESSION['upass']){
              $upass=$_SESSION['upass'];
              unset($_SESSION['upass']);
          }else{
              unset($_SESSION['upass']);
              if (!(preg_match('/^[a-zA-Z0-9]\w{5,11}$/', $upass) || preg_match('/^[a-zA-Z0-9]\w{5,11}$/', $upassA))) {
                  echo '<script>alert("密码不符合规则");</script>';
              }
              $apass = md5($upass);
              $apassA = md5($upassA);
          }
          if (!($upass == $upassA)) {
              echo '<script>alert("两次密码不一致");location.href="index.php?m=admin&f=user&a=showuser"</script>';
          }
          $dbobj = new db('user');
          $result = $dbobj->where("uid=" . $uid)->update("uname='" . $uname . "', upass='" . $upass . "',ulevel=" . $ulevel.",uphoto='".$uphoto."', uphone='" . $uphone . "', unicheng='" . $unicheng . "'" );
          if ($result>0) {
              $this->smartyObj->assign('title','修改成功');
              $this->smartyObj->display('admin/alert.html');
              header('refresh:0.5,url=index.php?m=admin&f=user&a=showuser');
          } elseif($result==0) {
              $this->smartyObj->assign('title','未更新');
              $this->smartyObj->display('admin/alert.html');
              header('refresh:1,url=index.php?m=admin&f=user&a=showuser');
          }else{
              $this->smartyObj->assign('title','修改失败');
              $this->smartyObj->display('admin/alert.html');
              header('refresh:1,url=index.php?m=admin&f=user&a=showuser');
          }
      }
      //删除用户
      public  function  deluser(){
          if(empty($_POST)){
              $this->smartyObj->assign('title','请选择您要删除的数据');
              $this->smartyObj->display('admin/alert.html');
              header('refresh:1,url=index.php?m=admin&f=user&a=showuser');
              exit;
          }else{
              $_POST['all']=isset($_POST['all'])?'all':'false';
              if ($_POST['all'] == 'all') {
                  $dbobj = new db('user');
                  $lists = $_POST['uid'];
                  $dels = implode(',', $lists);
                  $sql = "delete from user where (uid in ($dels))";
                  if ($dbobj->exec($sql)) {
                      $this->smartyObj->assign('title','全部删除');
                      $this->smartyObj->display('admin/alert.html');
                      header('refresh:1,url=index.php?m=admin&f=user&a=showuser');
                      exit;
                  }
                  exit;
              } elseif($_POST['all'] == 'false') {
                  $lists = $_POST['uid'];
                  $dels = implode(',', $lists);
                  echo $dels;
                  $dbobj = new db('user');
                  $sql = "delete from user where (uid in ($dels))";
                  if ($dbobj->exec($sql)) {
                      $this->smartyObj->assign('title','删除成功');
                      $this->smartyObj->display('admin/alert.html');
                      header('refresh:0.5,url=index.php?m=admin&f=user&a=showuser');
                      exit;
                  }
              }
          }
      }
      //用户的角色管理
      public function userrole(){
          $this->smartyObj->display('admin/userrole.html');
      }
      //ajax实现用户角色的显示
      public function  showuserrole(){
          $dbobj=new db('role');
          $result=$dbobj->select();
          $arr = array();
          $arr['rows'] = $result;
          $arr['results'] = count($result);
          echo json_encode($arr);
      }
      public  function addrole(){
          $lid=$_SESSION['alevel'];
          $dbobj=new db('level');
          $result=$dbobj->where('lid='.$lid.' and find_in_set("1",adminpermiss) and find_in_set("3",adminpermiss) ')->select();
          if(count($result)>0){
              $type = G('type');
              $rname = sql(P('rname'));
              $connum = P('connum');
              $attentions=P('attentions');
              $glnum=P('glnum');
              $conpermiss=P('conpermiss');
              $rid=P('rid');
              $dbobj->setTable('role');
              //添加
              if($type=='edit'){
                  if($dbobj->where('rid='.$rid)->update("rname='".$rname."',connum=".$connum.",attentions=".$attentions.",glnum=".$glnum.",conpermiss=".$conpermiss)){
                      echo 'edit';
                  }
              }elseif($type=='add'){
                  $arr = array(
                      "rname" => "'$rname'",
                      "connum" => "$connum",
                      "attentions" => "$attentions",
                      "glnum" => "$glnum",
                      "conpermiss" => "$conpermiss",

                  );
                  $result = $dbobj->insert($arr);
                  if ($result > 0) {
                      echo $dbobj->db->insert_id;
                  }
              }
          }else{
              $this->smartyObj->display('admin/nopermiss.html');
          }

      }
      //删除用户角色
      public  function deluserrole(){
          $lid=$_SESSION['alevel'];
          $dbobj=new db('level');
          $result= $dbobj->where('lid='.$lid.' and find_in_set("2",adminpermiss)')->select();
          if(count($result)>0){
              $rids=$_POST['rids'];
              $dbobj->setTable('role');
              if($dbobj->where('rid in'.$rids)->delete()){
                  echo 'delete';
              }
          }else{
              echo "no";
          }

      }

      //删除的时候限制权限
      public function delpermiss(){
          $this->smartyObj->display('admin/nopermiss.html');
      }

  }