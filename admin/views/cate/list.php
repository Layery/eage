<?php
//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
//use yii\widgets\Breadcrumbs;
use yii\helpers\Html;
use yii\base\Widget;
use yii\helpers\Url;
use yii\grid\GridView;
use common\widgets\Alert;

?>

<table class="easyui-datagrid" style="width:100%;height: 100%;" >
    <thead>
        <tr>
            <th field="id" width="80">ID</th>
            <th field="name" width="100">Name</th>
            <th field="introduce" width="100" align="right">Introduce</th>
            <th field="parent_id" width="80" align="right">ParentId</th>
            <th field="dateline" width="240">Dateline</th>
        </tr>
    </thead>
</table>


<div id="toolbar">
    <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="javascript:$('#dg').edatagrid('addRow')">New</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="javascript:$('#dg').edatagrid('destroyRow')">Destroy</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="javascript:$('#dg').edatagrid('saveRow')">Save</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-undo" plain="true" onclick="javascript:$('#dg').edatagrid('cancelRow')">Cancel</a>
</div>





<script type="text/javascript">
    // 初始化dategrid
    $(".easyui-datagrid").datagrid({
        pagination : true,
        pageNumber: 2,
        pageSize: 10,
        singleSelect : true,
        url : '<?= Url::toRoute("cate/list") ?>',
        method : 'post',
        toolbar : $('#toolbar'),
        fitColumns: true
//        columns : [[
//            {field : 'id', title : 'ID', width : 80},
//            {field : 'name', title : 'NAME', width : 100, align : 'right'},
//            {field : 'introduce', title : 'Introduce', width : 200, align : 'right'},
//            {field : 'parent_id', title : 'ParentId', width : 80, align : 'right'},
//            {
//                field : 'dateline', title : 'Dateline', width: 300, align: 'right',
//                formatter: function(value, row, index) {
//                    var date = new Date(parseInt(value)*1000);
//                    var y = date.getFullYear();
//                    var m = date.getMonth()+1;
//                    var d = date.getDate();
//                    return y + '-' + m + '-' +d;
//                }
//            }
//        ]]
    });

    var toolbar = [{
        'text' : 'createCate',
        'iconCls':'icon-add',
        'handler' : function(){
            window.location.href = "index.php?r=cate/create";
        }
    }];


    var Common = {
        DateFormatter : function (value, row, index) {
            if (value == '') {
                return "";
            }
            //return ((index%2) == 0) ? "<span style='color:red'>" + value + "</span>" : "<span style='color:green'>" + value + "</span>";
            var date = new Date(parseInt(value)*1000);
            var y = date.getFullYear();
            var m = date.getMonth()+1;
            var d = date.getDate();
            return y + '-' + m + '-' +d;
        }

    };
</script>





