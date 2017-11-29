$(function () {
    //对textarea进行字数提示设置
    $('.textareaA').on('keyup',function(){
        let rest=$('.textareaA').attr("maxlength")-$('.textareaA').val().length;
        $('.crest>span').html(rest);
    })
    var conid=$('body').attr('conid');
    // ajax进行点击量的设置
    $.ajax({
        url:'index.php?m=index&f=index&a=hits',
        data:{ conid, },
        type:'post',
    })

    //对关注进行实现
    $('.guanzhuBox').on('click',function () {
        if($('.guanzhu').text()=="关注"){
            that=$(this);
            var uid1=$(this).attr('uid1');
            var uid2=$('body').attr('uid2');
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
                            that.css({
                                "background":'#b1b0b0',
                            })
                            $('.guanzhu').text('已关注');
                        }
                    }
                })
            }
            flag=false;
        }else if($('.guanzhu').text()=="取消关注"){
            that=$(this);
            var uid1=$(this).attr('uid1');
            var uid2=$('body').attr('uid2');
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
                            that.css({
                                "background":'#ea6f5a',
                            })
                            $('.guanzhu').text('关注');
                        }
                    }
                })
            }
            flag=true;
        }
    })
    //已经关注后鼠标移入取消关注
    $('.guanzhuBox').hover(function () {
        if($('.guanzhu').text()=="已关注") {
            $('.guanzhu').text('取消关注');
        }
    },function () {
        if($('.guanzhu').text()!="关注") {
            $('.guanzhu').text('已关注');

        }
    })

    //ajax显示留言
    var conid=$('body').attr('conid');
    $.ajax({
        url:'index.php?m=index&f=comment&a=showmessage',
        data:{conid},
        type:'post',
        success:function (e) {
            $(".commentBOX").prepend(e);
        }

    })
    //提示框显示
    function noticeNone() {
        $('.notice').slideUp('100',"linear");
    }
    function successNone() {
        $('.success').slideUp('100',"linear");
    }
    //评论实现
    $('button[type=button]').on('click',function () {
        if($(this).attr('indexuname')!=''){
        var mcon=$('.textareaA').val();
        if(mcon==""){
            $('.notice').slideDown('80',"linear",function () {
                setTimeout(noticeNone,1000)
            });
        }else{
            //uid1留言者  uid2被留言者  conid那篇文章  mcon留言内容  mstate留言状态    0表示留言回复时候留言者的ID
            //插入数据库
            var uid1=$('.guanzhuBox').attr('uid1');
            var uid2=$('body').attr('uid2');
            var conid=$('body').attr('conid');
            var mstate=0;
            $.ajax({
                 url:'index.php?m=index&f=comment&a=addmessage',
                data:{
                     uid1,uid2,conid,mcon,mstate
                },
                type:'post',
                success:function (e) {
                     $('<div class="clycontent"></div>').html(e).prependTo('.commentBOX');
                     $('.success').slideDown('80','linear',function () {
                         setTimeout(successNone,1000)
                     })
                     $('.textareaA').val("");
                }
            })
        }}else{
            location.href='index.php?m=index&f=login&a=init';
        }
    })


    //回复实现
    $('.con').on('click','.showhuifu',function (){
        if($(this).attr('indexuname')!=''){
            /*让显示框显示在可见范围之内   offset 获取匹配元素在当前视口的相对偏移。
*当弹出的输入框距离事件源的高度大于浏览器的高度加上浏览器滚动的高度时，浏览器器滚动的高度等于输入框距离事件源
*加上浏览器减去浏览区高度的一半
* */
            if($(this).parents('.clycontent').find('.Messagehid').offset().top>$(window).scrollTop()+$(window).height()){
                $(window).scrollTop($(this).parents('.clycontent').find('.Messagehid').offset().top-$(window).height()/2);
            }
            $(this).parents('.clycontent').find('.Messagehid').animate({height:'150px'},200,'linear');
            //显示留言还是回复   留言清空textarea  回复写入 @名字:
            var text=$(this).attr('huifu');
            if(text){
                $(this).parents('.clycontent').find('.textareaB').val('@'+text+":");
            }else{
                $(this).parents('.clycontent').find('.textareaB').val("");
            }
        }else{
           location.href='index.php?m=index&f=login&a=init';
        }

    })
    //点击添加回复
    $('.commentBOX').on('click','.addhuifu',function (){
        if($(this).attr('indexuname')!='') {
            //ajax传输的值
            var uid1 = $('.guanzhuBox').attr('uid1');      //回复者
            if ($(this).attr('uid2')) {
                var uid2 = $(this).attr('uid2');          //被回复者
            } else {
                var uid2 = $('body').attr('uid2');          //被回复者
            }
            var mstate = $(this).parents('.clycontent').attr('mid');  //回复状态   留言人的uid
            var conid = $('body').attr('conid');      //文章的id
            //点击提交
            var that = this;
            var text = $(this).parents('.huifu').find('#showhuifu').attr('huifu');
            text = "@" + text + ':';
            var mcon = $(this).parents('.clycontent').find('.textareaB').val();  //文章内容
            //设置提交内容不能为空
            if (!mcon) {
                $('.notice').slideDown('80', "linear", function () {
                    setTimeout(noticeNone, 1000)
                });
            } else if (mcon == text) {
                $('.notice').slideDown('80', "linear", function () {
                    setTimeout(noticeNone, 1000)
                });
            } else {
                $.ajax({
                    url: 'index.php?m=index&f=comment&a=addhuifu',
                    data: {
                        uid1, uid2, conid, mcon, mstate
                    },
                    type: 'post',
                    success: function (e) {
                        var box = $(that).parents('.huifu');
                        $(e).prependTo(box);
                        $('.success').slideDown('80', 'linear', function () {
                            setTimeout(successNone, 1000);
                        })
                        $(that).parents('.Messagehid').find('.textareaB').val('');
                        $(that).parents('.Messagehid').css({"height": 0, "overflow": "hidden"});
                    }
                })
            }
        }else{
            location.href='index.php?m=index&f=login&a=init';
        }
    })
    //取消实现
    $('.commentBOX').on('click',".cancelhuifu",function () {
        $(this).parents('.clycontent').find('.Messagehid').animate({height:0},200,'linear');
    })
    //举报的实现
    $('.con .commentBOX #mstatus').on('click',function () {
        console.log($(this))
    })
    $('.con .commentBOX #mstatus').hover(function () {
        console.log($(this));
           $(this).css({"opacity":'1'});
    },function () {
        $(this).css({"opacity":'0'});
    })


    //分页的实现
    $('.commentBOX').on('click','.prevmessage',function () {
         //ajax请求
        $.ajax({
             url:$(this).attr('url'),
            success:function (e) {
                $(".commentBOX").html(e);
            }
        })
    })
    $('.commentBOX').on('click','.nextmessage',function () {
        //ajax请求
        $.ajax({
            url:$(this).attr('url'),
            success:function (e) {
                $(".commentBOX").html(e);
            }
        })
    })


    //点赞的实现
    if($('.icon-dianzan').attr('glikeflag')==1){
        $('.icon-dianzan').css({
            "color":'#e41635',
        })
    }else if($('.icon-dianzan').attr('glikeflag')==0){
        $('.icon-dianzan').css({
            "color":'#888',
        })
    }
    $('.icon-dianzan').on('click',function () {
        //点赞
        var flag=$(this).attr('glikeflag');

        var that=this;
            //判断用户是否登录
            if($(this).attr('indexuname')!=''){
                var conid=$('body').attr('conid');
                var uid=$(this).parent().attr('uid1');
                var text=$(this).next().text();
                if(flag==true){
                    if(parseInt(text)-1<0){
                        $(this).next().text(0);
                    }else{
                        $(this).next().text(parseInt(text)-1);
                    }
                    $.ajax({
                        url:"index.php?m=index&f=content&a=delglike",
                        type:'post',
                        data:{
                            uid,conid
                        },
                        success:function (e) {
                            if(e=='ok'){
                            flag=0;
                            $(that).attr('glikeflag','0');
                                $(that).css({
                                    "color":'#888',
                                })
                            }
                        }
                    })
                }else if(flag==false){
                    $(this).next().text(parseInt(text)+1);
                    $.ajax({
                        url:'index.php?m=index&f=content&a=addglike',
                        type:'post',
                        data:{
                            uid,conid
                        },
                        success:function (e) {
                            console.log(e)
                            if(e=='ok'){
                                $(that).attr('glikeflag','1');
                                flag=1;
                                $(that).css({
                                    "color":'#e41635',
                                })
                            }

                        }
                    })
                }
            }else{
                location.href="index.php?m=index&f=login&a=init";
            }
        })

    //收藏的实现
    if($('.icon-shoucangC').attr('storeflag')==1){
        $('.icon-shoucangC').css({
            "color":'#e41635',
        })
    }else if($('.icon-shoucangC').attr('storeflag')==0){
        $('.icon-shoucangC').css({
            "color":'#888',
        })
    }
    $('.icon-shoucangC').on('click',function () {
        //点赞
        var flag1=$(this).attr('storeflag');

        var that=this;
        //判断用户是否登录
        if($(this).attr('indexuname')!=''){
            var conid=$('body').attr('conid');
            var uid=$(this).parent().attr('uid1');
            var text=$(this).next().text();
            if(flag1==true){
                if(parseInt(text)-1<0){
                    $(this).next().text(0);
                }else{
                    $(this).next().text(parseInt(text)-1);
                }
                $.ajax({
                    url:"index.php?m=index&f=content&a=delstore",
                    type:'post',
                    data:{
                        uid,conid
                    },
                    success:function (e) {
                        if(e=='ok'){
                            flag1=0;
                            $(that).attr('storeflag','0');
                            $(that).css({
                                "color":'#888',
                            })
                        }
                    }
                })
            }else if(flag1==false){
                $(this).next().text(parseInt(text)+1);
                $.ajax({
                    url:'index.php?m=index&f=content&a=addstore',
                    type:'post',
                    data:{
                        uid,conid
                    },
                    success:function (e) {
                        console.log(e);
                        if(e=='ok'){
                            $(that).attr('storeflag','1');
                            flag1=1;
                            $(that).css({
                                "color":'#e41635',
                            })
                        }

                    }
                })
            }
        }else{
            location.href="index.php?m=index&f=login&a=init";
        }
    })
})
