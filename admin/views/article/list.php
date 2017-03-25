<?php
use yii\helpers\Url;
use yii\helpers\Html;
use admin\assets\AppAsset;
?>


<div class="comm_box">
    <table class="table table-bordered">
        <tr>
            <td>文章标题：</td>
            <td><input class="form-control columnF" data-column="1" id="col1_filter" name="title" type="text"></td>
            <td>作者：</td>
            <td><input class="form-control columnF" data-column="2" id="col2_filter" name="uid" type="text"></td>
            <td colspan="4" align="center">
                <input class="btn btn-primary" type="button" value="查询" id="allSearch">
            </td>
        </tr>
    </table>
</div>
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
  $(function(){
      $(".easyui-datagrid").datagrid({
          toolbar: toolbar,
          pagination : true,
          pageNumber: 1,
          pageSize: 10,
          singleSelect : true,
          url : '<?= Url::toRoute("article/list") ?>',
          method : 'post',
          fitColumns: true
      });
  });
  var toolbar = [{
      'text' : 'createArticle',
      'iconCls':'icon-add',
      'handler' : function(){
          window.location.href = "index.php?r=article/create";
      }
  }];

</script>