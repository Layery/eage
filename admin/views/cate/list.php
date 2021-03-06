<?php

use yii\helpers\Html;
use yii\base\Widget;
use yii\helpers\Url;
use yii\grid\GridView;
use common\widgets\Alert;

?>
<div class="breadcrumbs" id="breadcrumbs">
    <script type="text/javascript">
        try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
    </script>

    <ul class="breadcrumb">
        <li>
            <i class="icon-home home-icon"></i>
            <a href="#">Home</a>
        </li>

        <li>
            <a href="#">Tables</a>
        </li>
        <li class="active">Simple &amp; Dynamic</li>
    </ul>

    <div class="nav-search" id="nav-search">
        <form class="form-search">
            <span class="input-icon">
                <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                <i class="icon-search nav-search-icon"></i>
            </span>
        </form>
    </div>
</div>
    <div class="page-content">
        <hr>
        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-6">
                <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                        <button type="button" class="am-btn am-btn-default" id="am-btn-create"><span class="am-icon-plus"></span> 新增</button>
                        <button type="button" class="am-btn am-btn-default" id="am-btn-delete"><span class="am-icon-delete"></span> 删除选中</button>
                    </div>
                </div>
            </div>
            <div class="am-u-sm-12 am-u-md-3">
                <div class="am-form-group">
                    <select data-am-selected="{btnSize: 'sm'}" id="am-form-select">
                        <option value="option1">所有类别</option>
                        <option value="option2">IT业界</option>
                        <option value="option3">数码产品</option>
                        <option value="option3">笔记本电脑</option>
                        <option value="option3">平板电脑</option>
                        <option value="option3">只能手机</option>
                        <option value="option3">超极本</option>
                    </select>
                </div>
            </div>
            <div class="am-u-sm-12 am-u-md-3">
                <div class="am-input-group am-input-group-sm">
                    <input type="text" class="am-form-field">
                    <span class="am-input-group-btn">
            <button class="am-btn am-btn-default" type="button">搜索</button>
          </span>
                </div>
            </div>
        </div>

        <div class="am-g">
            <div class="am-u-sm-12">
                <form class="am-form">
                    <table class="am-table am-table-striped am-table-hover table-main">
                        <tbody>
                        <!--<tr>
                            <td><input type="checkbox" /></td>
                            <td>15</td>
                            <td><a href="#">Business management</a></td>
                            <td>default</td>
                            <td class="am-hide-sm-only">测试1号</td>
                            <td class="am-hide-sm-only">2014年9月4日 7:28:47</td>
                            <td>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                                        <button class="am-btn am-btn-default am-btn-xs am-hide-sm-only"><span class="am-icon-copy"></span> 复制</button>
                                        <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</button>
                                    </div>
                                </div>
                            </td>
                        </tr>-->
                        <tr>
                            <?php
                            echo GridView::widget([
                                'dataProvider' => $data,
                                'columns' =>[
                                    [
                                        'class'=>'yii\grid\CheckboxColumn',
                                        'checkboxOptions' => function($model){
                                            return ['class' => 'gridview-check'];
                                        },
                                    ],
                                    'id',
                                    'name',
                                    'introduce',
                                    'parent_id',
                                    [
                                        'attribute'=>'dateline',
                                        'value'=> function($data) {return date('Y-m-d', $data['dateline']);},
                                    ],
                                    [
                                        'class' => 'yii\grid\ActionColumn',
//                                        'template' => '{update} {delete}',
                                        'template' => '{detail}{update} {delete}',
                                        'header' => '操作',
                                        'buttons' => [
                                            'detail' => function($url, $model, $key) {
                                                return Html::a('详情', 'javascript:;', ['onclick' => 'getDetail('.$model->id.')']);
                                            },

                                            'delete' => function($url, $model, $key) {
                                                $url = Url::toRoute('cate/delete');
                                                return Html::a('删除', 'javascript:;', ['onclick' => 'deleteById('.$model->id.')']);
                                            }
                                        ]
                                    ]
                                ],
                                'layout' => '{items}  {pager}'
                            ]);
                            ?>
                        </tr>
                        </tbody>
                    </table>
                    <!-- <div class="am-cf">
                         共 15 条记录
                         <div class="am-fr">
                             <ul class="am-pagination">
                                 <li class="am-disabled"><a href="#">«</a></li>
                                 <li class="am-active"><a href="#">1</a></li>
                                 <li><a href="#">2</a></li>
                                 <li><a href="#">3</a></li>
                                 <li><a href="#">4</a></li>
                                 <li><a href="#">5</a></li>
                                 <li><a href="#">»</a></li>
                             </ul>
                         </div>
                     </div>-->
                    <hr />
                </form>
            </div>

        </div>
    </div>


<script>
    $(function(){
        $("#am-btn-create").click(function(){
            window.location.href = "index.php?r=cate/create";
        });
        $.ajax({
            url: 'index.php?r=cate/list',
            type: 'POST',
            dataType: 'json',
            success: function(result) {
                var htmlStr = '';
                $.each(result, function(i) {
                    htmlStr += "<option value='"+ result[i]['parent_id']+"'>"+ result[i]['name']+"</option>";
                });
                $("#am-form-select").html(htmlStr);
            }
        })
    });

    function getDetail(id)
    {
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                alert(data);
            }
        })
    }

    function deleteById(id)
    {
        $.post('index.php?r=cate/delete',{id:id},function(data){
            if (data) {
                alert('删除成功');

            } else {
                alert('删除失败');
            }
        },'json');
    }
</script>
<script type="text/javascript">
    /* 初始化dategrid
    $(function(){
        $(".easyui-datagrid").datagrid({
            pagination : true,
            pageNumber: 1,
            pageSize: 10,
            singleSelect : true,
            url : '<?= Url::toRoute("cate/list") ?>',
            method : 'post',
            toolbar : toolbar,
            fitColumns: true
        columns : [[
            {field : 'id', title : 'ID', width : 80},
            {field : 'name', title : 'NAME', width : 100, align : 'right'},
            {field : 'introduce', title : 'Introduce', width : 200, align : 'right'},
            {field : 'parent_id', title : 'ParentId', width : 80, align : 'right'},
            {
                field : 'dateline', title : 'Dateline', width: 300, align: 'right',
                formatter: function(value, row, index) {
                    var date = new Date(parseInt(value)*1000);
                    var y = date.getFullYear();
                    var m = date.getMonth()+1;
                    var d = date.getDate();
                    return y + '-' + m + '-' +d;
                }
            }
        ]]
        });

    });*/
</script>




<tr data-key="0"><td><input type="checkbox" class="gridview-check" name="selection[]" value="1"></td><td>1</td><td>ceshi</td><td>asdf</td><td>0</td><td>1970-01-01</td><td><a href="/index.php?r=cate%2Fupdate&amp;id=0" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> <a href="javascript:;" onclick="getDetail(cate/list,1)">删除</a></td></tr>
