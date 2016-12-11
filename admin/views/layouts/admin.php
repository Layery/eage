<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Layery admin</title>
    <style type="text/css">
        .layout {
            border: red solid 2px;
            height:900px;
            width:100%;
        }
        .layout-left {
            float: left;
            width: 25%;
            height: auto;
            border: green solid 1px;
        }
        .layout-center {
            float: right;
            width: 73%;
            height: auto;
            border: black solid 1px;
        }
    </style>
</head>
<body>
<div id="layout" class="layout">
    <div class="layout-top">
        <?php $this->render('/common/top'); ?>
    </div>
    <div class="layout-left">
        <?php $this->render('/common/left'); ?>
    </div>
    <div class="layout-center">
        <?php echo $content;?>
    </div>
</div>
</body>
</html>