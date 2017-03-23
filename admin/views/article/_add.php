<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\widgets\Alert;

$rs = Url::toRoute('cate/list');
?>
<script type="text/javascript" src="/js/uedit/ueditor.config.js"></script>
<script type="text/javascript" src="/js/uedit/ueditor.all.min.js"></script>

<form id="ff" action="<?php echo Url::toRoute('article/create'); ?>" method="post">
    <table>
        <tr>
            <td>分类:</td>
            <td>
                <input id="cc" name="cate_id" style="width:100px"
                       url="<?php echo $rs; ?>"
                       valueField="id" textField="name">
                </input>
            </td>
        </tr>
        <tr>
            <td>标题:</td>
            <td><input name="name" type="text"></input></td>
        </tr>
        <tr>
            <td>文章:</td>
            <td>
                <p class="uedit">
                    <script id="ueditor" name="ueditor" type="text/plain"></script>
                </p>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="提交" id="test"/></td>
        </tr>
    </table>
</form>

<script type="text/javascript">
    var ue = UE.getEditor('ueditor',{
        toolbars: [[
            'fullscreen', 'source', '|', 'undo', 'redo', '|',
            'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist',
            'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
            'indent', '|',
            'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
            'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
//            'simpleupload', 'insertimage', 'emotion', 'scrawl', 'insertvideo', 'music', 'attachment', 'insertframe', 'insertcode', 'pagebreak', 'template', 'background', '|',
//            'horizontal',
        ]],
        initialFrameHeight: 400,
        initialFrameWidth: 800
    });
</script>


<script>
    $(function(){
        // 改表单为异步提交
        $("#ff").form({
        	url: 'index.php?r=article/create',
        	onSubmit: function(){
        		var contentHtml = ue.getContent();
        		if (contentHtml == '') {
        			$.messager.alert('warning', '请输入博客内容');
					return false;
        		}
        	},
        	success: function(data) {
                alert(data);
            }
        });
		
		
		// 栏目列表
        $('#cc').combobox({
            panelHeight: 'auto',
            formatter:function(row){
                return '<span class="item-text">'+row.name+'</span>';
            },
        });
    })
</script>
