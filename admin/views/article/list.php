<?php
use yii\helpers\Url;
use yii\helpers\Html;
use admin\assets\AppAsset;
?>
<table class="easyui-datagrid" style="width:100%;height: 100%;">
    <thead>
    <tr>
        <th data-options="field:'id',width:80">ID</th>
        <th data-options="field:'name',width:100">Name</th>
        <th data-options="field:'post',width:240">Post</th>
        <th data-options="field:'dateline',width:100">Dateline</th>
    </tr>
    </thead>
</table>



<script type="text/javascript">
    $(".easyui-datagrid").datagrid({
        pagination : true,
        pageNumber: 2,
        pageSize: 10,
        singleSelect : true,
        url : '<?= Url::toRoute("article/list") ?>',
        method : 'post',
        fitColumns: true
    });
    var toolbar = [{
        'text' : 'createCate',
        'iconCls':'icon-add',
        'handler' : function(){
            window.location.href = "index.php?r=cate/create";
        }
    }]
</script>