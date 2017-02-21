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

<table class="easyui-datagrid" style="width:100%;height: 100%;" data-options="rownumbers:true,singleSelect:true,url:'<?= Url::toRoute("cate/list") ?>',method:'post',toolbar:toolbar">
    <thead>
    <tr>
        <th data-options="field:'id',width:80">ID</th>
        <th data-options="field:'name',width:100">Name</th>
        <th data-options="field:'introduce',width:100,align:'right'">Introduce</th>
        <th data-options="field:'parent_id',width:80,align:'right'">ParentId</th>
        <th data-options="field:'dateline',width:240,formatter:Common.DateFormatter">Dateline</th>
    </tr>
    </thead>
</table>



<script type="text/javascript">
    var toolbar = [{
        'text' : 'createCate',
        'iconCls':'icon-add',
        'handler' : function(){
            window.location.href = "index.php?r=cate/create";
        }
    }];

    var Common = {
        DateFormatter: function ($dateline)
    };
</script>



