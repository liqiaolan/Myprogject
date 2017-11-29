$(function () {
   $('.Box').on('click','.guanzhuBox',function () {
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
           that=$(this);
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
    $('.Box').on('mouseenter','.guanzhuBox',function () {
        if($(this).children('.guanzhu').text()=="已关注") {
            $(this).children('.guanzhu').text('取消关注');
        }
    })
    $('.Box').on('mouseleave','.guanzhuBox',function () {
        if($(this).children('.guanzhu').text()!="关注") {
            $(this).children('.guanzhu').text('已关注');

        }
    })
    //点击按需加载
    var pages=0;
    $('.more').on('click',moreclick);
    function moreclick(){
        pages++;
        var pagenum=5;
        var start=parseInt(pages)*parseInt(pagenum);
        // if(start>)
        $.ajax({
            url:'index.php?m=index&f=attention&a=ajaxadd',
            data:{
                pagenum,start
            },
            dataType:'json',
            type:'post',
            success:function (e) {
             if(e.length>0){
                 for(var i=0;i<e.length;i++){
                     $(`<ul class="authorL">
                   <li>
                       <a href="index.php?m=index&f=author&a=authorList&uid={$v['uid']}"><img src=" ${e[i].uphoto}" alt="图片加载错误"></a>
                   </li>
                   <li>
                       <p style="font-size:16px;font-weight:bold;">${e[i].uname}</p>
                       <div class="acontent">
                           <p>关注<span>${e[i].attentnum}</span></p>
                           <p>粉丝<span>${e[i].fans}</span></p>
                           <p>文章<span>${e[i].connum}</span></p>
                       </div>
                   </li>
                   <li  style="background:#ea6f5a;" class="guanzhuBox" uid1="{$uid1}" uid2="{$v['uid']}">
                           <span class="guanzhu" style="font-size:18px;letter-spacing: 1px;
                           color: #fff;">关注</span>
                       <span class="iconfont icon-guanzhu1"></span>
                   </li>
               </ul>`).appendTo('.Box');
                 }
             }else if(e.length==0){
                  $(`<ul class="authorL">
<h2 style="font-size:18px;color:#555;">暂无数据,努力更新中...</h2></ul>`).appendTo('.Box');
                  $('.more').off('click',moreclick);
             }
            }
        })
     }
})
