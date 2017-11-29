class Upload{
    constructor(){
        //定义大小和类型
        this.size=1024*1024*10;
        this.type='image/jpeg;image/png;image/gif';
        this.selectBtnStyle="width:150px;height:40px;background:red;" +
            "border-radius:5px;";
        this.upBtnStyle="width:150px;height:40px;background:green;" +
            "border-radius:5px;clear:both;";
        this.selectBtnCon='选择文件';
        this.upBtnCon='点击上传';
        this.listStyle="width:90px;height:90px;border:1px solid #ccc;" +
            "float:left;";
        this.progressStyle="width:0%;height:5px;background:blue;" +
            "left:0;bottom:0;";
        this.errorStyle="width:20px;height:20px;border:1px solid #777;" +
            "right:5px;top:5px;text-align:center;line-height:20px;display:none;";
        this.noticeStyle="width:100px;height:30px;background:#77c;" +
            "top:0;right:0;left:0;bottom:0;margin:auto; color:red;" +
            "line-height:30px;text-align:center; display:none;";
        this.data=[];
        this.templist=[];
    }
    //首先创建视图   里边传的是对象
    createView(params){
        //传入三个参数  父元素，file按钮，上传按钮，预览图片等
        //创建的时候调用方法createSelect
        this.createSelect(params.parent,params.selectBtn,
            ()=>{
            this.createP(params.selectP);
              this.createUp(params.upBtn);
               this.change();
        })
    }
     createSelect(parent,selectBtn,callback){
        //判断是否传入了父元素，如果没有报错
         this.parent=parent;
        if(!parent){
            console.error('父元素必须传入');
            return;
        }
        //判断是否传入file的选择器
        if(selectBtn){
            this.selectBtn=selectBtn;
            //存在的话file就等于selectBtn
            return false;
        }
        //不存在的话动态创建
         //创建一个修饰file的div
         let file=document.createElement('input');
         file.type='file';
         file.style.cssText='width:100%;height:100%;z-index:2;left:0;top:0;opacity:0';
         file.style.position='absolute';
         file.multiple='multiplt';

         let fileDiv=document.createElement('div');
         fileDiv.style.cssText=this.selectBtnStyle;
         fileDiv.innerHTML=this.selectBtnCon;
         fileDiv.style.position='relative';
         fileDiv.style.textAlign='center';
         fileDiv.appendChild(file);
         this.parent.appendChild(fileDiv);
         fileDiv.style.lineHeight=fileDiv.offsetHeight+'px';
         fileDiv.style.color='#fff';
         this.selectBtn=file;

         //执行回调函数
         callback();

    }
    createP(selectP){

        //创建预览的窗口
        if(selectP){
            this.selectP=selectP;
            return false;
        }
        let divP=document.createElement('div');
        divP.style.cssText="width:500px;height:auto;";
        this.parent.appendChild(divP);
        this.selectP=divP;
    }
    createUp(upBtn){

        //判断是否传入upBtn按钮
        if(upBtn){
            this.upBtn=upBtn;
            return false;
        }
        //如果没有传入，则动态创建
        let up=document.createElement('input');
        up.type='button';
        up.style.cssText='width:100%;height:100%;' +
            'left:0;top:0;opacity:0;';
        up.style.position='absolute';

        let upDiv=document.createElement('div');
        upDiv.style.cssText=this.upBtnStyle;
        upDiv.style.position='relative';
        upDiv.innerHTML=this.upBtnCon;
        upDiv.style.textAlign='center';
        upDiv.style.color='#fff';
        upDiv.appendChild(up);
        this.parent.appendChild(upDiv);
        upDiv.style.lineHeight=upDiv.offsetHeight+'px';
        this.upBtn=up;
    }
    change(){
         let that=this;
         this.selectBtn.onchange=function(){
            //获取文件信息
            that.data=this.files;
            //将data转化为数组类型
            // this.data=Array.from(this.data);
            //或者是使用Array.prototype.slice.call(this.data);
            that.data=Array.prototype.slice.call(that.data);
            that.check(that.data);
        }
    }
    check(data){
        let that=this;
        //动态创建预览的div
        //使用temp存储每一个放回的obj信息
        let temp=[];
        for(let i=0;i<data.length;i++){
            //用来获取list返回的对象
            temp[i]=data[i];
            var obj=this.list(data[i]);
            //使用obj.error.index存储i
             obj.error.index=i;
             that.templist[i]=obj;

            //因为事件是异步的，执行事件的时候for循环已经结束
            //解决该问题 A.使用属性缓存   B，闭包【！可以表示（）】

            !function(obj){
            obj.list.onmouseenter=function(){
                obj.error.style.display='block';
                }
            obj.list.onmouseleave=function(){
                obj.error.style.display='none';
                }
            }(obj)

            //对error进行点击
            obj.error.onclick=function(){
                var temperr=temp[this.index];
                //在页面上清除
                this.parentNode.parentNode.removeChild(this.parentNode);
                //在数据上清除  因为list的信息是放在数组中的，所以要执行for删除
                for(let j=0;j<that.data.length;j++){
                    if(that.data[i]==temperr){
                        that.templist.splice(j,1);
                    }
                }

            }
           //判断类型
            if(this.type.indexOf(this.data[i].type)<0){
                var tempdata=temp[i];

                for(var j=0;j<that.data.length;j++){
                    if(that.data[j]==tempdata){
                        that.data.splice(j,1);
                        that.templist.splice(j,1);
                    }
                }
                obj.notice.style.display="block";
                obj.notice.innerHTML="类型不对";
            }
            //判断大小
            if(this.data[i]){

            if(this.data[i].size>this.size){
                //删除
                var temparr=temp[i];
                for(let j=0;j<this.data.length;j++){
                    if(this.data[j]==temparr){
                        that.data.splice(j,1);
                        that.templist.splice(j,1);
                    }
                }
                obj.notice.style.display="block";
                obj.notice.innerHTML="文件太大";
            }

            }
        }

    }
    list(data){
        //点击上传
            let that=this;
            //list是每一个存放图片的盒子
            let lists=document.createElement('div');
            lists.style.cssText=that.listStyle;
            lists.style.position='relative';
            that.selectP.appendChild(lists);
        //做一个当文件出错的时候提示框
        let notice=document.createElement('div');
        notice.style.cssText=this.noticeStyle;
        notice.style.position='absolute';
        notice.innerHTML='文件出错';
        lists.appendChild(notice);
            //创建完成后执行预览
        if(this.type.indexOf(data.type)>-1) {
            //创建能够解析文件的信息
            var files = new FileReader();
            files.onload = function (e) {
                lists.style.background = "url(" + e.target.result + ")";
                lists.style.backgroundSize = 'cover';
            }
            files.readAsDataURL(data);
        }else{
            notice.innerHTML='类型错误';
            notice.style.display='block';
        }
            //做进度条
           let progress=document.createElement('div');
           progress.style.cssText=this.progressStyle;
           progress.style.position="absolute";
           lists.appendChild(progress);
           //做一个错误的提示框  鼠标移入出现，移出消失
           let error=document.createElement('div');
           error.style.cssText=this.errorStyle;
           error.style.position='absolute';
           error.innerHTML="X";
           lists.appendChild(error);
          return{
              list:lists,
              error:error,
              notice:notice,
              progress:progress,
          }
    }
    //点击上传的时候使用up方法
    up(url,callback){
        let that=this;
        this.upBtn.onclick=function(){
            for(let i=0;i<that.data.length;i++){
                var formobj=new FormData();
                formobj.append('file',that.data[i]);
                var ajax=window.XMLHttpRequest?new XMLHttpRequest():
                    ActiveXObject('Microsoft.XMLHTTP');
                //使用闭包来返回每一个数据
                var arr=[];
                !function(i,ajax){
                    //利用数组来存储每一个地址

                    ajax.onload=function(){
                        //请求成功的时候执行回调函数
                        if(callback){
                            arr.push(ajax.response);
                            callback(arr);
                        }
                    }
                    ajax.upload.onprogress=function(e){
                        let bl=e.loaded/e.total*100+"%";
                        that.templist[i].progress.style.width=bl;
                    }
                }(i,ajax)

                ajax.open('post',url,true);
                ajax.send(formobj);
            }

        }
    }
}