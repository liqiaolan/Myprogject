window.addEventListener('load',function(){
    $('.newNav li:first-child').each(function(index,obj){
        $(this).on('mouseover',function(){
            $(this).children('.newNavmask').css({
                opacity:1, transform:"scale(2) rotateX(360deg)",
                transition:"all 0.6s ease",
            })
        })
        $(this).on('mouseleave',function(){
            $(this).children('.newNavmask').css({
                opacity:0, transform:"scale(0.5) rotateX(0deg)",
                transition:"all 0.6s ease",
            })
        })
    })



})