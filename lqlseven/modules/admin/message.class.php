<?php
defined('COME') or exit;
class message extends  main{
    //用户的留言管理
    public function init(){
        //分页
        $mstatus=isset($_GET['mstatus'])?$_GET['mstatus']:'';
        $mpush=isset($_GET['mpush'])?$_GET['mpush']:'';

        include_once LIBS_PATH.'/pages.class.php';
        $pageobj=new pages();
        $dbobj=new db('message');
        $pageobj->total=count($dbobj->select());
        $pageobj->nums=6;
        $this->smartyObj->assign('pages',$pageobj->show());
        $lists=$dbobj->select("select * from message  limit ".$pageobj->limit);
        foreach($lists as &$v){
            $uid1= $v['uid1'];
            $uid2= $v['uid2'];
            $dbobj=new db('user');
            $row1=$dbobj->where("uid='{$uid1}'")->selectfind();
            $row2=$dbobj->where("uid='{$uid2}'")->selectfind();
            $v["uname1"]=$row1['uname'];
            $v["uname2"]=$row2['uname'];
            $dbobj=new db('content');
            $row3=$dbobj->field('contitle')->where("conid='{$v['conid']}'")->selectfind();
            $v['contitle']=$row3['contitle'];
        }
        $this->smartyObj->assign('lists',$lists);
        $this->smartyObj->display('admin/message.html');
    }
}