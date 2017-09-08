<?php
/**
 * Created by PhpStorm.
 * User: 未定义
 * Date: 2017/3/25
 * Time: 17:05
 */
use yii\helpers\Html;
use admin\assets\AceAsset;

$this->title = 'study表单验证';
AceAsset::register($this);
?>

<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8"/>
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <meta name="description" content="overview &amp; stats"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <?php $this->head() ?>

    </head>
    <?php $this->beginBody() ?>
    <body>
    <?= $this->render('/common/ace/_ace_header') ?>
    <div class="main-container" id="main-container">
        <div class="main-container-inner">
            <a class="menu-toggler" id="menu-toggler" href="#">
                <span class="menu-text"></span>
            </a>

            <?= $this->render('/common/ace/_ace_sidebar') ?>

            <div class="main-content">
                <div class="breadcrumbs" id="breadcrumbs">
                    <script type="text/javascript">
                        try {
                            ace.settings.check('breadcrumbs', 'fixed')
                        } catch (e) {
                        }
                    </script>

                    <ul class="breadcrumb">
                        <li>
                            <i class="icon-home home-icon"></i>
                            <a href="#">Home</a>
                        </li>
                        <li class="active">Dashboard</li>
                    </ul><!-- .breadcrumb -->

                    <div class="nav-search" id="nav-search">
                        <form class="form-search">
                                <span class="input-icon">
                                    <input type="text" placeholder="Search ..." class="nav-search-input"
                                           id="nav-search-input" autocomplete="off"/>
                                    <i class="icon-search nav-search-icon"></i>
                                </span>
                        </form>
                    </div>
                </div>

                <?= $content ?>
            </div>
        </div>
        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
            <i class="icon-double-angle-up icon-only bigger-110"></i>
        </a>
    </div>

    <?php $this->endBody() ?>
    </body>
    </html>

<?php $this->endPage() ?>