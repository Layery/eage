<?php
use yii\helpers\Html;
use common\widgets\Alert;

?>
<script type="text/javascript" src="/js/uedit/ueditor.config.js"></script>
<script type="text/javascript" src="/js/uedit/ueditor.all.min.js"></script>

<form class="form">
    <p>
        Blog Title : <input type="text">
    </p>

    <p class="uedit">
        <script id="ueditor" name="ueditor" type="text/plain">







        </script>
    </p>
</form>
<input type="button" value="test" id="test"/>
<script type="text/javascript">
    var ue = UE.getEditor('ueditor',{
        toolbars: [[
            'fullscreen', 'source', '|', 'undo', 'redo', '|',
            'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist',
            'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
            'indent', '|',
            'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
            'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
            'simpleupload', 'insertimage', 'emotion', 'scrawl', 'insertvideo', 'music', 'attachment', 'insertframe', 'insertcode', 'pagebreak', 'template', 'background', '|',
            'horizontal',
        ]]
    });
</script>


<script>
    $(function(){
        $("#test").bind('click',function(){
            var content = UE.getContent();
            console.log(content);
        });
    })
</script>