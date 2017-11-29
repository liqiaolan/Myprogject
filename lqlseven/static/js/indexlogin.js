$(function(){
    //登录的验证码
    $('.sendphone').on('click',function(){
        var uphone=$('input[name=uphone]').val();
        $.ajax({
            url:'index.php?m=index&f=login&a=uphonecode',
            type:'post',
            data:{uphone:uphone},
            success:function(data){
                alert(data);
            }
        })
    })
})