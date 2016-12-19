<?php
use yii\helpers\Url;
use yii\helpers\Html;
use admin\assets\AppAsset;
?>
<table class="easyui-datagrid" style="width:100%;height: 100%;" data-options="rownumbers:true,singleSelect:true,url:'<?= Url::toRoute("article/list") ?>',method:'post',toolbar:toolbar">
    <thead>
    <tr>
        <th data-options="field:'id',width:80">ID</th>
        <th data-options="field:'name',width:100">Name</th>
        <th data-options="field:'post',width:100,align:'right'">Post</th>
        <th data-options="field:'dateline',width:240">Dateline</th>
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
    }]
</script>