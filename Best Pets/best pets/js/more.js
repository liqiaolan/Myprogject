window.addEventListener('load',function(){
		//对head中内容进行设置
    let welcomeCP=document.querySelector('.welcomeCP');
    let wcpp2=welcomeCP.querySelector('p:nth-child(2)');
    wcpp2.innerText="Welcome To Best Pets"
    let i=0;
    let j=0;
    let str =wcpp2.innerText;
    let str2=wcpp2.innerText;
    let str1 =wcpp2.innerText;
    let t1,t;
    t=setInterval(a,300);
    function a(){

        if(i<=str.length){
            wcpp2.innerText=str.slice(0,i++)+'_';
        }else{
            i=0;
            t1=setInterval(b,300);
            clearInterval(t);
        }
    }
    function b(){
        if(-j<=str1.length){
            wcpp2.innerText=str1.slice(0,j--)+'_';
        }else{
            j=0;
            str=str2;
            t=setInterval(a,200);
            clearInterval(t1);

        }
    }

    //点击about
    /*let cw=innerWidth;
    let ch=innerHeight;
    $('.aboutLeft>li>a').on('click',function(){
    	$('.more').css({width:cw+'px',height:ch+100+'px',display:'block',});
        $('.amore').attr({id:'$(this).text()'});
        let flag=$(this).text();
         $('.amore').data('data',flag);
        console.log($(this).text())
        console.log($('.amore').data('data'))
//      console.log(document.querySelector('.amore').id)
    })*/
    $('.aboutLeft li').on('click',function(){
    $('.more').css({display:'block',});
    var ttitle=$(this).attr("title");
    // var ajax=window.XMLHttpRequest?new XMLHttpRequest():
    //  new ActiveXObject('Microsoft.XMLHTTP');
    /*var ajax=new XMLHttpRequest();
    ajax.responseType="json";
    ajax.onload=function () {
        console.log(ajax.response);
        console.log(typeof(ajax.response));
        console.log(JSON.stringify(ajax.response));
        console.log(JSON.parse(ajax.response));
        console.log(typeof(JSON.parse(ajax.response)));
    }
    ajax.open("get","../php/showMore.php?ttitle="+ttitle,true);
    ajax.send();*/
    	$.ajax({
            url:"../php/showMore.php",
            data:{ttitle},type:"get",
            accepts:{
                json:"application/json"
            },
            dataType:"json",
            success:function (data) {
                $('.amore').html(`
                 <div class="iconfont icon-close" ></div>
                <div class="amoreImg">
                    <img src="../php/${data[0]['timg']}" alt="" />
                </div>
                <p style="font-size:32px;color:#6495ed;">Dogs have a monologue</p>
                <p style="font-size:16px;color:#999;line-height: 20px;">
                    &nbsp;&nbsp;${data[0]['tcon']}
                </p>
                `);
            }
        })
    })
    $('.more').on('click',".icon-close",function(){
        $('.more').css({display:'none'});
    })
//  function wheel(obj){
//  	obj.on('mousewheel',wheelfn);
//  	obj.on('DOMMouseScroll',wheelfn);    	
//  }
//  function wheelfn(){
//  	console.log(1)
//  }
//  wheel($('more'));
//  $('.more').on('mousewheel',function(e){
//  	e.preventDefault();
//  	console.log(2)
//  })
//  console.log($('.more'));
})
