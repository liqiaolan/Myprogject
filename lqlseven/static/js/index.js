$(function(){
    //banner图
    $('.bannerCon>li>p').hover(function(){
        $(this).css({
            transform:'translateX(20px)',
            transition:"all 0.8s ease",
        })
    },function(){
        $(this).css({
            transform:'translateX(-20px)',
            transition:"all 0.8s ease",
        })
    })
    //轮播
    var t=setInterval(move,3600);
    var num=0;
    lis=$('.bannerCon>li');
    function move(){
        num++;
        if(num==lis.length){
            num=0;
        }
        lis.css({
            opacity:0,
            transition:"0.5s",
        })
        $(lis[num]).css({
            opacity:1,
            transition:"0.5s",
        })
    }
})