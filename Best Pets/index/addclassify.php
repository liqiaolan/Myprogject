<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../js/jquery-3.2.1.js"></script>
    <script src="../js/upload.js"></script>
    <title>添加分类</title>
    <style>
        *{
            margin:0;
            padding:0;
            font-size:16px;
            color:#7E7E7E;
            font-family:微软雅黑;
            margin-left:20px;
            margin-top:10px;
        }
        input[type=text]{
            border-radius:2px;
            border:1px solid #ccc;
            line-height:30px;
            padding-left:5px;
        }
        input[type=submit]{
            width:80px;
            height:30px;
            border-radius:2px;
            border:none;
            color:dimgrey;
        }
        div{
            margin-top:0;
            margin-left:0;
        }
    </style>
</head>
<body>
    <form action="../php/addclassify.php" method="POST" enctype="multipart/form-data">
      所属分类  <select name="pid" id="">
            <option value="0">
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
        <br><br>
       分类名称 <input type="text" name="cname">
        <br><br>
        <div class="parent">

        </div>
        <input type="hidden" name="classifyimg">
        <br>
        <input type="submit" value="添加分类">
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
</script>
</html>