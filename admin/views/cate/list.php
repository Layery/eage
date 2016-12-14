<?php
//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
//use yii\widgets\Breadcrumbs;
use yii\helpers\Html;
use yii\base\Widget;
use yii\grid\GridView;
use common\widgets\Alert;

?>
<table class="easyui-datagrid" style="width:100%;height: 100%;" data-options="rownumbers:true,singleSelect:true,url:'?r=cate/list',method:'post',toolbar:toolbar">
    <thead>
    <tr>
        <th data-options="field:'id',width:80">ID</th>
        <th data-options="field:'name',width:100">Name</th>
        <th data-options="field:'introduce',width:100,align:'right'">Introduce</th>
        <th data-options="field:'parent_id',width:80,align:'right'">ParentId</th>
        <th data-options="field:'dateline',width:240">Dateline</th>
    </tr>
    </thead>
<!--    <div style="margin-bottom:5px">-->
<!--        <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true"></a>-->
<!--        <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true"></a>-->
<!--        <a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true"></a>-->
<!--        <a href="#" class="easyui-linkbutton" iconCls="icon-cut" plain="true"></a>-->
<!--        <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true"></a>-->
<!--    </div>-->

</table>

<script type="text/javascript">

    var toolbar = [
        {
            text: '添加新栏目',
            iconCls: 'icon-add',
            handler: function () {
            }
        },
        {
            text:'编辑栏目',
            iconCls:'icon-edit',
            handler:function(){
            }
        }
    ];
</script>



