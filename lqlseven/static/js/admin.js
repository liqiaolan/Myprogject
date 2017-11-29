$(function(){
    //功能管理
    var flag=true;
    $('.modules>li').on('click','span',function(){
        if(flag){
            $(this).siblings('.modulelist').css({
                display:'block',
            })
            flag=false;

        }else{
            $(this).siblings('.modulelist').css({
                display:'none',
            })
            flag=true;
        }
    })

//    引入的js
    BUI.use('common/main',function(){
        var config = [{
            id:'menu',
            homePage : 'code',
            menu:[{
                text:'基本信息',
                items:[
                    {id:'code',text:'查看管理员',href:'index.php?m=admin&f=admin&a=adminmanage'},
                    {id:'main-menu',text:'添加管理员',href:'index.php?m=admin&f=admin&a=addadmin'},
                ]
            },{
                text:'级别管理',
                items:[
                    {id:'operation',text:'查看级别',href:'index.php?m=admin&f=admin&a=alevel'},
                ]
            }]
        },{
            id:'form',
            menu:[{
                text:'基本信息',
                items:[
                    {id:'code',text:'查看用户',href:'index.php?m=admin&f=user&a=showuser'},
                    {id:'example',text:'添加用户',href:'index.php?m=admin&f=user&a=adduser'},
                ]
            },{
                text:'角色管理',
                items:[
                    {id:'success',text:'查看角色',href:'index.php?m=admin&f=user&a=userrole'},

                ]
            }, {
                text: '订单管理',
                items: [
                    {id: 'grid', text: '查看订单', href: 'form/grid.html'},
                ]
            },
                {
                    text:'支付管理',
                    items:[
                        {id:'grid',text:'查看支付',href:'form/grid.html'},
                    ]
                },{
                    text:'访问管理',
                    items:[
                        {id:'grid',text:'查看访问',href:'form/grid.html'},
                    ]
                }]
        },{
            id:'search',
            menu:[{
                text:'留言管理',
                items:[
                    {id:'code',text:'查看留言',href:'index.php?m=admin&f=message&a=init'},
                ]
            },{
                text : '文章管理',
                items : [
                    {id : 'tab',text : '查看文章',href : 'index.php?m=admin&f=content&a=init'},
                ]
            }]
        },{
            id:'detail',
            menu:[{
                text:'分类信息',
                items:[
                    {id:'code',text:'查看分类',href:'index.php?m=admin&f=category&a=showcategory'},
                    {id:'example',text:'添加分类',href:'index.php?m=admin&f=category&a=addcategory'},
                ]
            }]
        },{
            id : 'chart',
            menu : [{
                text : '推荐位',
                items:[
                    {id:'code',text:'查看推荐位',href:'index.php?m=admin&f=recommend&a=init'},
                ]
            }]
        }];
        new PageUtil.MainPage({
            modulesConfig : config
        });
    });
})