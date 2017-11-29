$(function(){
    jQuery.validator.addMethod("isMobile", function(value, element) {
        var length = value.length;
        var mobile = /^(13[0-9]{9})|(18[0-9]{9})|(14[0-9]{9})|(17[0-9]{9})|(15[0-9]{9})$/;
        return this.optional(element) || (length == 11 && mobile.test(value));
    }, "请正确填写您的手机号码");

   $('form').validate({
       rules:{
           uname:{
               required:true,
               minlength:2,
               maxlength:10,
               remote:{
                       url:'index.php?m=index&f=register&a=uname',
                       type:"post",
                       // dataType:'json',
                       // data: {                     //要传递的数据
                       //     uname: function() {
                       //         return $("#uname").val();
                       //     }
                       // }
               },

           },
           upass:{
               required:true,
               minlength:6,
               maxlength:12,
               equalTo:'#upassA',
           },
           upassA:{
               required:true,
               minlength:6,
               maxlength:12,
               equalTo:'#upass',
           },
           uphone:{
               required:true,
               minlength:11,
               isMobile:true,
           },
           uphonecode:{
               required:true,
           },
           ucode:{
               required:true,
           }
       },
       messages:{
           uname:{
               required:'用户名必填',
               minlength:'不少于2位',
               maxlength:'不多于10位',
               remote:'用户名存在',
           },
           upass:{
               required:'密码必填',
               minlength:'不少于6位',
               maxlength:'不多于12位',
               equalTo:'密码不一致',
           },
           upassA:{
               required:'密码必填',
               minlength:'不少于6位',
               maxlength:'不多于12位',
               equalTo:'密码不一致',
           },
           uphone:{
               required:'电话必填',
               minlength:'不少于11位',
               isMobile:'手机格式不符',
           },
           uphonecode:{
               required:'电话验证码必填'
           },
           ucode:{
               required:'必填'
           }
       }
   })

    //对手机验证码进行验证
    $('.sendphone').on('click',function(){
        var uphone=$('input[name=uphone]').val();
        $.ajax({
            url:'index.php?m=index&f=register&a=uphonecode',
            //dataType如果不指定MIME会自动识别
            dataType:'json',
            type:'post',
            data:{uphone:uphone},
            success:function(data){
                alert(data);
            }

        })
    })
})