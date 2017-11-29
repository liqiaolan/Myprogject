$(function () {
    //选项卡
    $('aside>ul').on('click','li',function(){
        var index=$(this).index();
        // console.log(index);
        $(this).css({
            background:"#f0f0f0",
        })
        $(this).siblings().css({
            background:"#fff",
        })
        $('.content>div').css({
            display:'none',
        }).eq(index).css({
            display:'block',
        })
    })
    //点击固定定位的上滑
    $('.storeFix').on('click',function(){
        pageYOffset=0;
    })
    //全选的功能
    var checkAll = $('#checkAll');
    var checkboxs =$('input[type=checkbox]:not("#checkAll")');
    checkAll.on('click',function(){
        for(var i=0;i<checkboxs.length;i++){
            var checkbox=checkboxs[i];
            // checkbox.checked=$(this)[0].checked;   为DOM属性
            checkbox.checked=this.checked;
        }
    })
    checkboxs.on('click',function () {
        var isCheckedAll = true;
        for (var i = 0; i < checkboxs.length; i++) {
            if (!checkboxs[i].checked) {
                isCheckedAll = false;
                break;
            }
        }
        checkAll[0].checked = isCheckedAll;
    })

    //已完成订单和未完成订单
    $('.myorderTop').on('click','li',function () {
        let index=$(this).index();
        $(this).css({
            background: '#ea6f5a',
            color:'#fff',
        })
        $(this).siblings().css({
            background: '#fff',
            color:'#ea6f5a',
        })
        if(index==0){
            $('.orderfinish').css({
                display:'block',
            })
            $('.orderunfinish').css({
                display:'none',
           })
        }else{
            $('.orderfinish').css({
                display:'none',
        })
            $('.orderunfinish').css({
                display:'block',
        })
        }
    })

    //价钱的自动结算
        checkboxs.on('click',function () {
            let price=0.00;
            if(this.checked=true){
                var priceOne=$(this).parent().siblings('.price').html()
            }
            $('.allprice').html((priceOne)+(parseFloat(price)));
        })
    
   /*各个模块的实现*/
   //个人基本资料   修改头像
   $('#file').on('change',function () {
      //获取文件信息
       var  obj=this.files[0];
       //创建能够解析文件的信息
       var files = new FileReader();
       var formobj=new FormData();
       formobj.append('file',obj);
       var ajax=window.XMLHttpRequest?new XMLHttpRequest():
           ActiveXObject('Microsoft.XMLHTTP');
       //加载
       ajax.onload = function () {
           var url=ajax.response;
           if(url!=''){
               $.ajax({
                   url:'index.php?m=index&f=personalCenter&a=imgCheck',
                   data:{
                       uphoto:url
                   },
                   type:'post',
                   success:function (e) {
                       if(e=='ok'){
                           $('.photo .headimg').css("background-image","url("+url+")");
                           $('.notice1').slideDown('40',function () {
                               setTimeout(function () {
                                   $('.notice1').slideUp('40');
                               },500);
                           })
                       }
                   }
               })
           }


       }
       ajax.open('post','index.php?m=index&f=personalCenter&a=editimg',true);
       ajax.send(formobj);
       files.readAsDataURL(obj);
       //利用filereader对象中对象readAsDataUrl()将获得的文件解析成地址的方式
   })
    //修改个人信息
    $('.edit').on('click','button[type=button]',function () {
         var unicheng=$('input[name=unicheng]').val();
         var upass=$('input[name=upass]').val();
         var upassA=$('input[name=upassA]').val();
         var uphone=$('input[name=uphone]').val();
         var uinfo=$('textarea[name=uinfo]').val();
         $.ajax({
             url:'index.php?m=index&f=personalCenter&a=basic',
             type:'post',
             data:{
               unicheng,upass,upassA,uphone,uinfo  
             },
             success:function (e) {
                 if(e=='ok'){
                     $('.notice2').html('修改成功').css({
                         "color":"#09bb07",
                         "border":"1px solid #09bb07",
                     }).slideDown('40',function () {
                         setTimeout(function () {
                             $('.notice2').slideUp('40');
                         },800)
                     })
                 }else{
                     $('.notice2').html(e).css({
                         "color":"#e41635",
                         "border":"1px solid #e41635",
                     }).slideDown('40',function () {
                         setTimeout(function () {
                             $('.notice2').slideUp('40');
                         },800)
                     })
                 }
             }
         })
    })
    //我的关注
    $('aside>ul').on('click','li:nth-child(3)',function () {
        $.ajax({
            url:'index.php?m=index&f=personalCenter&a=attention',
            dataType:'json',
            success:function (e) {
                $(".attentionNum span").html(e.length);
                for(let i=0;i<e.length;i++){
                 $(`<div class="attentioncon"><div class="img" style="background-image:url('${e[i].uphoto}');"></div>
                    <div class="attentionN">
                        <p>${e[i].uname}</p>
                        <div class="acontent">
                        <p>关注<span>${e[i].attention}</span></p>
                        <p>粉丝<span>${e[i].fans}</span></p>
                        <p>文章<span>${e[i].connum}</span></p>
                        </div>
                        </div>
                        <a  style="background:#b1b0b0;width:118px;height:38px;border-radius: 30px;line-height: 38px;cursor: pointer;text-align: center" class="guanzhuBox" uid1="${e[i].uid1}" uid2="${e[i].uid2}">
                        <span class="guanzhu" style="font-size:18px;letter-spacing: 1px;
                    color: #fff;">已关注</span>
                    <span class="iconfont icon-guanzhu1" style="color:#fff;font-size:18px;"></span>
                        </a>
                        </div>
                        <hr  size="1" noshade color="#f0f0f0">`).appendTo('.attention');
                }
            }
        })
    })
    //我的关注
    $('.attention').on('click','.guanzhuBox',function () {
        var that=this;
        if($(this).children('.guanzhu').text()=="关注"){
                var uid1=$(this).attr('uid1');
                var uid2=$(this).attr('uid2');
                if(uid1=='false'){
                    location.href="index.php?m=index&f=login&a=init";
                }else{
                    $.ajax({
                        url:'index.php?m=index&f=content&a=guanzhu',
                        data:{
                            uid1,uid2,
                        },
                        type:'post',
                        success:function (e) {
                            if(e=='ok'){
                                $(that).css({
                                    "background":'#b1b0b0',
                                })
                                $(that).children('.guanzhu').text('已关注');
                            }
                        }
                    })
                }
            }else if($(this).children('.guanzhu').text()=="取消关注"){
                that=this;
                var uid1=$(this).attr('uid1');
                var uid2=$(this).attr('uid2');
                if(uid1=='false'){
                    location.href="index.php?m=index&f=login&a=init";
                }else{
                    $.ajax({
                        url:'index.php?m=index&f=content&a=guanzhudel',
                        data:{
                            uid1,uid2,
                        },
                        type:'post',
                        success:function (e) {
                            if(e=='ok'){
                                $(that).css({
                                    "background":'#ea6f5a',
                                })
                                $(that).children('.guanzhu').text('关注');
                            }
                        }
                    })
                }
            }

    })


    //已经关注后鼠标移入取消关注
    $('.attention').on('mouseenter','.guanzhuBox',function () {
        if($(this).children('.guanzhu').text()=="已关注") {
            $(this).children('.guanzhu').text('取消关注');
        }
    })
    $('.attention').on('mouseleave','.guanzhuBox',function () {
        if($(this).children('.guanzhu').text()!="关注") {
            $(this).children('.guanzhu').text('已关注');

        }
    })
    //我的收藏
    $('aside>ul').on('click','li:nth-child(2)',function () {
       $.ajax({
           url:'index.php?m=index&f=personalCenter&a=store',
           dataType:'json',
           success:function (e) {
              for(let i=0;i<e.length;i++){
                 $('.store .storeTitle').after(
                     $(`  <div class="leavemessage">
                        <div class="ltitle">
                            <a href="">${e[i].contitle}</a>
                            <div class="ltime">
                                <div class="ltimeti">${e[i].condate}</div>
                            </div>
                        </div>
                        <div class="lcon">
                            <a href="index.php?m=index&f=content&a=init&conid=${e[i].conid}" style="display: block;">
                                <div class="limg" style="background-image:url('${e[i].conthumb}')"></div>
                            </a>

                            <div class="lcontent">
                            ${e[i].content.replace(/<\/?[^>]*>/g,'').slice(0,170)}
                            </div>
                        <div class="lmore"><a href="index.php?m=index&f=content&a=init&conid=${e[i].conid}">阅读文章</a></div>
                        </div>
                        <div class="lfooter">
                            <a href="index.php?m=index&f=author&a=authorList&uid=${e[i].uid}">
                                <span>作者:&nbsp;&nbsp;${e[i].uname}</span>
                            </a>
                            <a href="javascript:;">
                                <span class="iconfont icon-liulan"></span>
                                ${e[i].hits}
                            </a>
                            <a href="javascript:;">
                                <span class="iconfont icon-dianzan"></span>
                                ${e[i].glikeNum}
                            </a>
                           <a href="javascript:;">
                                <span class="iconfont icon-shoucangC"></span>
                                ${e[i].storeNum}
                            </a>
                            <a href="javascript:;">
                                <span class="iconfont icon-huifu"></span>
                                ${e[i].messageNum}
                            </a>
                        </div>
                    </div>`));
              }
           }
       })
    })
})