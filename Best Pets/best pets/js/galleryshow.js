window.addEventListener('load',function(){
    //关闭按钮
    $('.galleryshow').on('click','.icon-close1',function(){
        $('.galleryshow').css({display:'none'});
    })

    let total=$('.show>img').attr('total');
    let num=0;
    $('.gallerypages').html(1+'/'+total)
    function move(){
        num++;
        if(num==total){
            num=0;
        }
        $('.show').css({display:'none'});
        $('.show').eq(num).css({display:'block'});
        $('.gallerypages').html((num+1)+'/'+total)
    }
    function moveR(){
        num--;
        if(num==-1){
            num=total-1;
        }
        $('.show').css({display:'none'});
        $('.show').eq(num).css({display:'block'});
        $('.gallerypages').html((num+1)+'/'+total)
    }
  //左右按钮
    $('.icon-zuoyoujiantouicon-defuben').on('click',function(){
        move();
    })
    $('.icon-zuoyoujiantouicon-defuben1').on('click',function(){
        moveR();
    })
  //自动轮播
        let flag=true;
        let t;
               $('.setinterval').on('click',function() {
                   if (flag) {
                       flag = false;
                       $(this).css({
                           transform: 'rotateY(180deg)',
                           transition: 'all ease 1s',
                       });
                       t = setInterval(move, 2000)
                   } else if (!flag) {
                       flag = true;
                           $(this).css({
                               transform: 'rotateY(-180deg)',
                               transition: 'all ease 1s',
                           });
                           clearInterval(t, 2000)
                   }
               })

    //下载按钮
    // $('.icon-icdownloadmd').on('click',function(){
    //   let canvas=document.createElement('canvas');
    //   $('.download').href=canvas.toDataURL();
    //   $('.download').download='a.jpg';
    // })


})