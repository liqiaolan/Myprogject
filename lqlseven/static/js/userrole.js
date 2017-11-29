BUI.use(['bui/grid','bui/data'],function(Grid,Data){
    var Grid = Grid,
        Store = Data.Store,
        enumObj = {"1" : "普通","2" : "优秀","3" : "精华"},
        columns = [
            {title : '等级ID',dataIndex :'rid'}, //editor中的定义等用于 BUI.Form.Field.Text的定义
            {title : '等级名称', dataIndex :'rname'},
            {title : '文章的数目',dataIndex : 'connum',},
            {title : '关注度',dataIndex : 'attentions',},
            {title : '点赞数',dataIndex : 'glnum',},
            {title : '文章权限',dataIndex : 'conpermiss',renderer : Grid.Format.multipleItemsRenderer(enumObj)},
            {title : '操作',renderer : function(){
                return '<span class="grid-command btn-edit">编辑</span>'
            }}
        ];

//依赖注入
    var isAddRemote = false,
        editing = new Grid.Plugins.DialogEditing({
            contentId : 'content', //设置隐藏的Dialog内容
            triggerCls : 'btn-edit', //触发显示Dialog的样式
            editor : {
                title : '自定义',
                width : 600,
                listeners : {
                    show : function(){
                        var form = this.get('form');
                        if(!isAddRemote){
                            var bField = form.getField('b');

                            isAddRemote = true;
                        }
                    }
                },
                success:function () {
                    var edtor=this;
                    form=edtor.get('form')
                    form.valid();
                    var type=editing.get("editType");
                    if(form.isValid()){
                        form.ajaxSubmit({
                            url:'index.php?m=admin&f=user&a=addrole&type='+type,
                            data:form.serializeToObject(),
                            type:'post',
                            dataType:'text',
                            success:function (e) {
                                if(e!="edit") {
                                    form.setFieldValue('rid', e)
                                }
                                edtor.accept();

                            }
                        })
                    }

                }
            }
        }),
        store = new Store({
            url:'index.php?m=admin&f=user&a=showuserrole',
            autoLoad:true
        }),
        grid = new Grid.Grid({
            render:'#grid',
            columns : columns,
            width : 700,
            forceFit : true,
            tbar:{ //添加、删除
                items : [{
                    btnCls : 'button button-small',
                    text : '<i class="icon-plus"></i>添加',
                    listeners : {
                        'click' : addFunction
                    }
                },
                    {
                        btnCls : 'button button-small',
                        text : '<i class="icon-remove"></i>删除',
                        listeners : {
                            'click' : delFunction
                        }
                    }]
            },
            plugins : [editing,Grid.Plugins.CheckSelection],
            store : store
        });

    grid.render();

    //添加记录
    function addFunction(){
        var newData = {b : 0};
        editing.add(newData,'a'); //添加记录后，直接编辑
    }
    //删除选中的记录
    function delFunction(){
        var selections = grid.getSelection();
        var data='';
        selections.map(function(a){
            data+=a['rid']+',';
        })
        data="("+data.slice(0,-1)+")";
        $.ajax({
            url:'index.php?m=admin&f=user&a=deluserrole',
            data:"rids="+data,
            type:'post',
            success:function (data) {
                if(data=="delete"){
                    //页面上删除
                    store.remove(selections);
                }else if(data=="no"){
                   location.href='index.php?m=admin&f=user&a=delpermiss';
                }
            }
        })

    }
});