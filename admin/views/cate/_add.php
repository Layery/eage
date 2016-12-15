<?php
?>
<div style="width:100%;max-width:400px;padding:30px 60px;">
    <form id="ff" method="post">
        <div style="margin-bottom:20px">
            <input class="easyui-textbox" name="name" style="width:100%" data-options="label:'Name:',required:true">
        </div>
<!--        <div style="margin-bottom:20px">-->
<!--            <input class="easyui-textbox" name="email" style="width:100%" data-options="label:'Email:',required:true,validType:'email'">-->
<!--        </div>-->
<!--        <div style="margin-bottom:20px">-->
<!--            <input class="easyui-textbox" name="introduce" style="width:100%" data-options="label:'Subject:',required:true">-->
<!--        </div>-->
        <div style="margin-bottom:20px">
            <input class="easyui-textbox" name="introduce" style="width:100%;height:60px" data-options="label:'Message:',multiline:true">
        </div>
        <div style="margin-bottom:20px">
            <select class="easyui-combobox" name="parent" label="parent" style="width:100%">
                <option value="ar">Arabic</option>
            </select>
        </div>
    </form>
    <div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitForm()" style="width:80px">Submit</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearForm()" style="width:80px">Clear</a>
    </div>
</div>
<div id="test">
sgfasdasf
</div>
<script>

    function submitForm(){
        var test = $("#test");
        $('#ff').form('submit', {
            url : 'index.php?r=cate/create',
            success : function(data) {
                test.innerHTML += data;
            }
        });
    }


    function clearForm(){
        $('#ff').form('clear');
    }
</script>