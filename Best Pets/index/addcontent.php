<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
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
    </style>
</head>
<body>
<form action="../php/addcontent.php" method="post">

    内容分类:  <select  name='pid'  >
        <option   value="0">
            一级分类
        </option>

        <?php
        include '../php/db.php';
        include '../libs/classify.php';
        $obj=new trees();
        $obj->tree(0,$db,"classify",0,"-&nbsp;");
        echo $obj->str;
        ?>

    </select>
    <br><br>标题 <input type="text" name="ttitle">
    <br><br>简介:
    <br><br>
    <textarea name="tcon" id="" cols="30" rows="10"></textarea><br><br>
    <br><br>
    <script id="editor" type="text/plain" style="width:100%;height:500px;" name="tcontent"></script>
    <?php
    $sql="select * from otherclassify";
    $result=$db->query($sql);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    while($row=$result->fetch()){?>
        <?php echo $row['oname']?>  <input type="radio" name="oid"
                                           value="<?php echo $row['oid']?>">
    <?php  }
    ?>

    <br><br>
    <div class="parent">

    </div>
    <input type="hidden" name="timg">
    <br><br>
    <input type="submit" value="添加内容">
</form>
</body>
<script>
    let upload=new Upload();
    upload.createView({
        parent:document.querySelector('.parent'),
    })
    upload.up('../php/upload.php',function(e){
        var hidden=document.querySelector("input[type=hidden]");
        hidden.value=e;
    })
    var ue = UE.getEditor('editor');
</script>
</html>