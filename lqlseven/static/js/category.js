function formatProgress(value){
    if (value){
        var s = '<div style="width:100%;border:1px solid #ccc">' +
            '<div style="width:' + value + '%;background:#cc0000;color:#fff">' + value + '%' + '</div>'
        '</div>';
        return s;
    } else {
        return '';
    }
}
var editingId;
function edit(){
    if (editingId != undefined){
        $('#tg').treegrid('select', editingId);
        return;
    }
    var row = $('#tg').treegrid('getSelected');
    if (row){
        editingId = row.id
        $('#tg').treegrid('beginEdit', editingId);
    }
}
//使用ajax实现无刷新的修改
$('#tg').treegrid({'onAfterEdit': function (a,b) {
    //a代表修改的整行   b为改变的值
    if(!(b.cname||b.cinfo||b.cimg)){
        $.messager.alert('修改情况','未更新');
        return;
    }
    var obj={};
    obj['cid']=editingId;
    var str;
    var arr=new Array();
    for(let i in b){
        str=i+ "="+"'"+b[i]+"'";
        arr.push(str);
    }
    $.ajax({
        url:'index.php?m=admin&f=category&a=editcat',
        data:{
            obj:obj,
            arr:arr,
        },
        type:'post',
        dataType:'text',
        success:function (e) {
            if(e=='ok'){
                $.messager.alert('修改情况','修改成功');
            }else{
                $.messager.alert('修改情况','修改失败');
            }
        }
    })
}});
function save(){
    if (editingId != undefined){
        var t = $('#tg');

        t.treegrid('endEdit', editingId);
        editingId = undefined;

        //统计人数
        // var persons = 0;
        // var rows = t.treegrid('getChildren');
        // for(var i=0; i<rows.length; i++){
        //     var p = parseInt(rows[i].persons);
        //     if (!isNaN(p)){
        //         persons += p;
        //     }
        // }
        // var frow = t.treegrid('getFooterRows')[0];
        // frow.persons = persons;
        // t.treegrid('reloadFooter');   //重新刷新底部的信息
    }
}
function cancel(){
    if (editingId != undefined){
        $('#tg').treegrid('cancelEdit', editingId);
        editingId = undefined;
    }
}
function del() {
    //先判断是否选中
    if (editingId != undefined){
        $('#tg').treegrid('select', editingId);
        return;
    }
    var row = $('#tg').treegrid('getSelected');
    if (row){
        //弹出框确认删除
        $.messager.confirm('确认','确认删除?',function(move){
            if(move){
                var selectedRow = row['cid'] //获取选中行
            $.ajax({
                url:'index.php?m=admin&f=category&a=delcategory',
                data:{cid:row['cid']},
                type:'post',
                dataType:'text',
                success:function(e){
                    if(e!='ok'){
                        alert('删除失败');
                    }
                }
            });
            }
        })

        editingId = row.id
        $('#tg').treegrid('remove', editingId);
    }


}