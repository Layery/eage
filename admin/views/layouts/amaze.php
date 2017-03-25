<?php
/**
 * Created by PhpStorm.
 * User: 未定义
 * Date: 2017/3/25
 * Time: 17:05
 */
use yii\helpers\Html;
use admin\assets\AppAsset;
use yii\helpers\Url;
AppAsset::register($this);
?>

<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <?= $this->render('_header') ?>
    <?= $this->render('_left') ?>
    <p></p>
    <br/>
    <?= $content ?>
    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>