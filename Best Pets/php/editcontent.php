<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" charset="utf-8" src="../utf8-php/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="../utf8-php/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="../utf8-php/lang/zh-cn/zh-cn.js"></script>
    <script src="../js/upload.js"></script>
    <title>Document</title>
    <style>
        textarea{
            padding:5px 8px;
        }
        *{
            font-size:16px;
            color:#7E7E7E;
            font-family:微软雅黑;
        }
        img{
            width:50px;
            height:50px;
        }
    </style>
</head>
<body>
<form action="editcontentTJ.php" method="post">

    所属分类:  <select  name='pid'  >
        <option   value="0">
            一级分类
        </option>

        <?php
        include 'db.php';
        include '../libs/classify.php';
        $tid=$_GET['tid'];
        $sql="select * from  contentnav where tid=".$tid;
        $result=$db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row=$result->fetch();
        $pid=$row['pid'];
        $timg=$row['timg'];
        //
        $sql1="select * from classify where pid=".$pid;
        $result1=$db->query($sql1);
        var_dump($result1);
        $result1->setFetchMode(PDO::FETCH_ASSOC);
        $row1=$result1->fetch();
        $cid=$row1['cid'];
        $obj=new trees();
        $obj->tree(0,$db,"classify",0,"-&nbsp;",$cid);
        echo $obj->str;
        ?>
    </select><br><br>
    标题 <input type="text" name="ttitle" value="<?php echo $row['ttitle']?>">
    <br><br>简介:
    <br><br>
    <textarea name="tcon" id="tcon" cols="30" rows="10" value="<?php echo $row['tcon']?>"></textarea><br><br>
    内容：
    <br><br>
    <script id="editor" type="text/plain" style="width:100%;height:500px;" name="tcontent"></script>

    <input type="hidden" name="tid" value="<?php echo $row['tid']?>" class="tid">
    <div class="parent">
        <img src="<?php echo $timg;?>" alt="">
    </div>
    <input type="hidden" name="timg" class="timg">
    <br>
    <input type="submit" value="提交修改">
</form>
</body>
<script>
    let upload=new Upload();
    upload.createView({
        parent:document.querySelector('.parent'),
    })
    upload.up('upload.php',function(e){
        var hidden=document.querySelector(".timg");
        hidden.value=e;
    })
    var ue = UE.getEditor('editor');
</script>
</html>