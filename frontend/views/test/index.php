<?php
use yii\helpers\Html;  
use frontend\assets\TestAsset;  
TestAsset::register($this);
$this->registerJsFile('@web/js/controllers/site-index.js');
$this->registerCssFile('@web/css/site.css');

?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <ul class="breadcrumb">
                <li>
                    <a href="#">主页</a> <span class="divider">/</span>
                </li>
                <li>
                    <a href="#">类目</a> <span class="divider">/</span>
                </li>
                <li class="active">
                    主题
                </li>
            </ul>
            <div class="page-header">
                <h1>
                    页标题范例 <small>此处编写页标题</small>
                </h1>
            </div>
            <dl>
                <dt>
                    Rolex
                </dt>
                <dd>
                    劳力士创始人为汉斯.威尔斯多夫，1908年他在瑞士将劳力士注册为商标。
                </dd>
                <dt>
                    Vacheron Constantin
                </dt>
                <dd>
                    始创于1775年的江诗丹顿已有250年历史，
                </dd>
                <dd>
                    是世界上历史最悠久、延续时间最长的名表之一。
                </dd>
                <dt>
                    IWC
                </dt>
                <dd>
                    创立于1868年的万国表有“机械表专家”之称。
                </dd>
                <dt>
                    Cartier
                </dt>
                <dd>
                    卡地亚拥有150多年历史，是法国珠宝金银首饰的制造名家。
                </dd>
            </dl>
            <p>
                <em>Git</em>是一个分布式的版本控制系统，最初由<strong>Linus Torvalds</strong>编写，用作Linux内核代码的管理。在推出后，Git在其它项目中也取得了很大成功，尤其是在Ruby社区中。
            </p>
        </div>
        <div class="col-md-4">
            <div class="row-fluid">
                <div class="span12">
                    <ol class="unstyled inline">
                        <li>
                            新闻资讯
                        </li>
                        <li>
                            体育竞技
                        </li>
                        <li>
                            娱乐八卦
                        </li>
                        <li>
                            前沿科技
                        </li>
                        <li>
                            环球财经
                        </li>
                        <li>
                            天气预报
                        </li>
                        <li>
                            房产家居
                        </li>
                        <li>
                            网络游戏
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>