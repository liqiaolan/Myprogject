window.addEventListener('load',function(){
    $('.perBox>div').hover(function(){
        $(this).css({
            background:'#6495ED',
            color:'#fff',
            transition: '0.3s ease',
        })
    },function(){
        $(this).css({
            background:'#fff',
            color:'#999',
            transition: '0.3s ease',
        })
    })
})