$(function(){
	//对登录 ，注册点击进行设置
//	$('.classify').on('click',{foo:'.classify>li'},function(event){
////		console.log(event.target);  每一个li
////		console.log(event.data.foo)   .classify>li
//    let ele=event.target;
//    $(ele).css({background:'#6495ed'});
//
//	})
    $('.classify>li:first-child').on('click',function(){
    	 $(this).css({background:'#6495ed'});
    	 $('.classify>li:last-child').css({background:'#a5c1f4'});
    	 $('.message1').css({display:'block'});
    	 $('.message2').css({display:'none'});
    })
    
    $('.classify>li:last-child').on('click',function(){
    	 $(this).css({background:'#6495ed'});
    	 $('.classify>li:first-child').css({background:'#a5c1f4'});
    	  $('.message2').css({display:'block'});
    	 $('.message1').css({display:'none'});
    })
	
	
	
	//对remember进行设置
	var flag=true;	
		$('.label').on('click',function(){
		  if(flag){
		        flag=false;
				$('input[type=checkbox]').css({
					transform:'scale(0.5,0.5) skew(-30deg)',
					transition:'all ease .5s',
					opacity:'0',
				})
				$('.icon-duihao1').css({
					opacity:'1',
					transition:'all 0.1s .5s',
				})
			}else{
				flag=true;
					$('input[type=checkbox]').css({
				transform:'scale(1,1) skew(0deg)',
				transition:'all ease .5s',
				opacity:'1',
				})
				$('.icon-duihao1').css({
					opacity:'0',
					transition:'all 0.1s',
				})
				}
	    })

         //点击login的时候的效果
        let ch=innerHeight;
        let cw=innerWidth;
       $('.login').on('click',function(){
         	$('.logreg').css({width:innerWidth+'px',height:innerHeight+'px',
         	display:'block',});
         })
   
    $('.icon-close').on('click',function(){
    	 $('.logreg').css({display:'none'});
    })

	// 对注册进行验证
	$('.message2').validate({
		rules:{
            uname:{
            	required:true,
                minlength:3,
                maxlength:8,
				remote:{
            		url:"../php/checkregister.php",
					type:"get",
                    // dataType:'json',
                    data: {                     //要传递的数据
                        uname: function() {
                            return $("#unameB").val();
                        }
                    }
				}
            },
			upassword:{
            	required:true,
				minlength:6,
				maxlength:10,
				equalTo:"#upasswordaB",
			},
			upassworda:{
            	required:true,
				minlength:6,
				maxlength:10,
                equalTo:"#upasswordB",
			}
		},
        messages:{
			uname:{
				required:'Username required',
				minlength:'No less than three',
	            maxlength:'No more than eight',
				remote:'Username exits'
			},
			upassword:{
				required:'Password required',
				minlength:'No less than six',
				maxlength:'No more than ten',
			},
			upassworda:{
                required:'Passwordagain required',
				minlength:'No learn than six',
	            maxlength:'No more than ten',
			}
		}
	})


	//登录的时候用户名是否存在进行判读
    $('.message1').validate({
		rules:{
            uname:{
                remote:{
                    url:"../php/checklogin.php",
                    type:"get",
                    dataType:'json',
                    data: {                     //要传递的数据
                        uname: function() {
                            return $("#unameA").val();
                        }
                    }
                }
            },
		},
		messages:{
			uname:{
				remote:'No Username',
			}
		}
	})

})
