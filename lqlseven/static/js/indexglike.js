$(function () {
    //侧边栏换一批
    var flag=true;
    $('.rauthorcon>span:last-child').on('click',function(){
        if(flag){
            $('.icon-huanyipi').css({
                transform:"rotateZ(360deg)",
                transition:"1s",
            })
            flag=false;
        }else{
            $('.icon-huanyipi').css({
                transform:"rotateZ(0deg)",
                transition:"1s",
            })
            flag=true;
        }
        var authorstart=$(this).attr('authorstart');
        var authnum=$(this).attr('authnum');
        var authornum=$(this).attr('authornum');
        authorstart=parseInt(authorstart)+parseInt(authornum);
        console.log(authorstart);
         if(authorstart>authnum-1){
             authorstart=0;
         }
        $.ajax({
            url:'index.php?m=index&f=givelike&a=author',
            data:{
                authorstart,authornum
            },
            dataType:'json',
            type:'post',
            success:function (e) {
                console.log(e);
                for(let i=0;i<e.length;i++){
                    $(`<ul class="authorL">
                      <li>
                          <a href="index.php?m=index&f=index&a=author&uid=${e[i].uid}"}><img src="${e[i].img}/007.jpg  " alt="图片加载错误"></a>
                      </li>
                      <li>
                          <p>${e[i].uname}</p>
                          <div class="acontent">
                              <p>关注<span>${e[i].attents}</span></p>
                              <p>粉丝<span>${e[i].fans}</span></p>
                              <p>文章<span>${e[i].cons}</span></p>
                          </div>
                      </li>
                  </ul>`).prependTo('.authorlist');
                }
                //设置属性
                $('.TJauthor').attr('authorstart',authorstart);
            }
        })

    })

    //加载更多
    var pages=0;
    $('.moreajax').on('click',move);
    function move() {
        pages++;
        var pagenum=4;
        var start=pagenum*pages;
        $.ajax({
            url:'index.php?m=index&f=givelike&a=ajaxindex',
            type:'post',
            dataType:'json',
            data:{
                pagenum,start
            },
            success:function (e) {
                if(e.length>0){
                    for(var i=0;i<e.length;i++){
                        $(` <div class="leavemessage" conid="${e[i].conid}">
                  <div class="ltitle">
                      <a href="index.php?m=index&f=content&a=init&conid={$v['conid']}">${e[i].uname}</a>
                      <div class="ltime">
                          <div class="ltimeti">${e[i].condate}</div>
                      </div>
                  </div>
                  <div class="lcon">
                      <a href="index.php?m=index&f=content&a=init&conid=${e[i].conid}" style="display: block;">
                          <div class="limg" style="background-image:url(${e[i].conthumb})"></div>
                      </a>

                      <div class="lcontent">
                      ${e[i].content.replace(/<\/?[^>]*>/g,'').slice(0,150)}
                      </div>
                      <div class="lmore"><a href="index.php?m=index&f=content&a=init&conid=${e[i].conid}">阅读全文</a></div>
                  </div>
                  <div class="lfooter">
                      <a href="index.php?m=index&f=author&a=authorList&uid=${e[i].uid}">
                          <span>作者:&nbsp;&nbsp;${e[i].uname}</span>
                      </a>
                      <a href="javascript:;">
                          <span class="iconfont icon-liulan"></span>
                          ${e[i].hnum}
                      </a>
                      <a href="javascript:;">
                          <span class="iconfont icon-dianzan "></span>
                          ${e[i].glikeNum}
                      </a>
                      <a href="javascript:;">
                          <span class="iconfont icon-shoucangC"></span>
                           ${e[i].storeNum}
                      </a>
                      <a href="javascript:;">
                          <span class="iconfont icon-huifu"></span>
                          ${e[i].mnum}
                      </a>
                  </div>
              </div>
                    `).appendTo('.recommend');
                    }
                }else{
                $('<h2 style="font-size:18px;color:#555;padding-left:10px;">暂无数据,小编为你努力加载...</h2>').appendTo('.recommend');
                $('.moreajax').off('click',move);
                }

            }
        })
    }

})