$(function(){
    $('.articles>li:last-child').on('click','span',function(){
       $(this).siblings().css({color:"#777",})
        $(this).css({color:"#ea6f5a"});
    })

    //排序
    $('.asc').on('click',function () {
        $('.Con').html("");
        $.ajax({
            url:'index.php?m=index&f=myarticle&a=asc',
            dataType:'json',
            success:function (e) {
                if(e.length>0){
                    for(var i=0;i<e.length;i++){
                       $(`<li>
                    <div class="leavemessage">
                        <div class="ltitle">
                            <a href="">${e[i].contitle}</a>
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
                        <div class="lmore"><a href="index.php?m=index&f=content&a=init&conid=${e[i].conid}">阅读文章</a></div>
                        </div>
                        <div class="lfooter">
                            <a href="">
                                <span>作者:&nbsp;&nbsp;${e[i].uname}</span>
                            </a>
                            <a href="">
                                <span class="iconfont icon-liulan"></span>
                                ${e[i].hnum}
                            </a>
                            <a href="">
                                <span class="iconfont icon-dianzan"></span>
                                ${e[i].glikeNum}
                            </a>
                            <a href="">
                                <span class="iconfont icon-shoucangC"></span>
                                ${e[i].storeNum}
                            </a>
                            <a href="">
                                <span class="iconfont icon-huifu"></span>
                                ${e[i].mnum}
                            </a>
                        </div>
                    </div>
                </li>
`).appendTo('.Con');
                    }
                }else{

                }
            }
        })
    })

    $('.desc').on('click',function () {
        $('.Con').html("");
        $.ajax({
            url:'index.php?m=index&f=myarticle&a=desc',
            dataType:'json',
            success:function (e) {
                console.log(e)
                if(e.length>0){
                    for(var i=0;i<e.length;i++){
                        $(`<li>
                    <div class="leavemessage">
                        <div class="ltitle">
                            <a href="">${e[i].contitle}</a>
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
                        <div class="lmore"><a href="index.php?m=index&f=content&a=init&conid=${e[i].conid}">阅读文章</a></div>
                        </div>
                        <div class="lfooter">
                            <a href="">
                                <span>作者:&nbsp;&nbsp;${e[i].uname}</span>
                            </a>
                            <a href="">
                                <span class="iconfont icon-liulan"></span>
                                ${e[i].hnum}
                            </a>
                            <a href="">
                                <span class="iconfont icon-dianzan"></span>
                                ${e[i].glikeNum}
                            </a>
                            <a href="">
                                <span class="iconfont icon-shoucangC"></span>
                                ${e[i].storeNum}
                            </a>
                            <a href="">
                                <span class="iconfont icon-huifu"></span>
                                ${e[i].mnum}
                            </a>
                        </div>
                    </div>
                </li>
`).appendTo('.Con');
                    }
                }else{

                }
            }
        })
    })
})