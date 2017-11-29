class editimg{
    constructor(){
        this.data=[];
    }
    up(url,callback) {
        //创建能够解析文件的信息
        var files = new FileReader();
        //获取文件信息
        that.data=this.files;
        let that=this;
        for (let i = 0; i < that.data.length; i++) {
            var formobj = new FormData();
            formobj.append('file', that.data[i]);
            var ajax = window.XMLHttpRequest ? new XMLHttpRequest() :
                ActiveXObject('Microsoft.XMLHTTP');
            //使用闭包来返回每一个数据
            var arr = [];
            !function (ajax) {
                //利用数组来存储每一个地址

                ajax.onload = function () {
                    //请求成功的时候执行回调函数
                    if (callback) {
                        console.log(ajax.response)
                        arr.push(ajax.response);
                        callback(arr);
                    }
                }
            }(ajax)

            ajax.open('post', url, true);
            ajax.send(formobj);
        }
    }
}