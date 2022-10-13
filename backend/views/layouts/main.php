<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use backend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;

AppAsset::register($this);
$script = <<< JS
$(document).ready(function(){
    $("#backup").click(function(){
        window.location="index.php?r=product/backup";
    });
    $("#index").click(function(){
        window.location="index.php?r=site/index";
    });
    $("#manage-website").click(function(){
        window.location="index.php?r=site/manage-website";
    });
    $("#trashbin").click(function(){
        window.location="index.php?r=trash-bin/index";
    });
    $("#tables").click(function(){
        window.location="index.php?r=tables/index";
    });
    $("#users").click(function(){
        window.location="index.php?r=user/index";
    }); 
    $("#crefresh").click(function(){
        document.location.reload();
    });
    $("#cback").click(function(){
        window.history.back();
    });
    $("#ctogle").click(function(){
        $("#mcontent").toggle();
    });
});
JS;
$this->registerJs($script);

$this->title = Yii::t('app', 'Mini RT');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="icon" type="image/x-icon" href="<?= Yii::$app->request->baseUrl ?>/icons/logo-48.png ?>">
    <?php $this->head() ?>
    <style>
        .sidebar {
            margin: 0;
            padding: 0;
            width: 203px;
            background-color: #E6E6E6;
            position: fixed;
            height: 100%;
            overflow: auto;
            border: 2px outset #f1f1f1;
            border-top-right-radius: 5px;
            /* border-bottom-right-radius: 5px; */
        }

        .sidebar a {
            display: block;
            color: black;
            padding: 16px;
            text-decoration: none;
        }

        .sidebar a.active {
            background-color: #04AA6D;
            color: white;
        }

        .sidebar a:hover:not(.active) {
            background-color: #555;
            color: white;
        }

        div.content {
            margin-left: 200px;
            padding: 1px 16px;
        }

        @media screen and (max-width: 700px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .sidebar a {
                float: left;
            }

            div.content {
                margin-left: 0;
            }
        }

        @media screen and (max-width: 400px) {
            .sidebar a {
                text-align: center;
                float: none;
            }
        }
    </style>
</head>

<body class="h-100" style="background-color: #e9ecef !important;">
    <?php $this->beginBody() ?>
    <header>

        <div class="sidebar">
            <a class="font-weight-bold" href="<?= Yii::$app->request->baseUrl ?>">
                <img src="<?= Yii::$app->request->baseUrl ?>/icons/logo-48.png" width="30">
                <?= Yii::t('app', 'MINI-RT') ?>
            </a>
            <div class="row">
                <div class="col-md-12 border shadow-sm">
                    <hr class="p-0 m-0">
                    <div class="btn-group rounded btn-block">
                        <button title="<?= Yii::t('app', 'Info') ?>" id="tables" type="button" class="btn btn-sm btn-block text-left">
                            <img width="26" src="<?= Yii::$app->request->baseUrl ?>/icons/info-25.png">
                            <?= Yii::t('app', 'Tables') ?>
                        </button>
                    </div>
                    <hr class="p-0 m-0">
                    <div class="btn-group rounded btn-block">
                        <button title="<?= Yii::t('app', 'Info') ?>" id="users" type="button" class="btn btn-sm btn-block text-left">
                            <img width="26" src="<?= Yii::$app->request->baseUrl ?>/icons/user-25.png">
                            <?= Yii::t('app', 'Users') ?>
                        </button>
                    </div>
                    <hr class="p-0 m-0">
                    <div class="btn-group rounded btn-block">
                        <button title="<?= Yii::t('app', 'Info') ?>" id="info" type="button" class="btn btn-sm btn-block text-left">
                            <img width="26" src="<?= Yii::$app->request->baseUrl ?>/icons/info-25.png">เเเเเเเเเเเเเดเด้ด้ด้ด้ด
                        </button>
                    </div>
                    <hr class="p-0 m-0">
                    <div class="btn-group rounded btn-block">
                        <button title="<?= Yii::t('app', 'Info') ?>" id="info" type="button" class="btn btn-sm btn-block text-left">
                            <img width="26" src="<?= Yii::$app->request->baseUrl ?>/icons/info-25.png">เเเเเเเเเเเเเดเด้ด้ด้ด้ด
                        </button>
                    </div>
                    <hr class="p-0 m-0">
                    <div class="btn-group rounded btn-block">
                        <button title="<?= Yii::t('app', 'Info') ?>" id="info" type="button" class="btn btn-sm btn-block text-left">
                            <img width="26" src="<?= Yii::$app->request->baseUrl ?>/icons/info-25.png">เเเเเเเเเเเเเดเด้ด้ด้ด้ด
                        </button>
                    </div>
                    <hr class="p-0 m-0">
                </div>
            </div>
        </div>
    </header>
    <div class="content" id="content">
        <div class="row">
            <div class="col-md-6 mt-1">
                <?php echo Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]) ?>
            </div>
            <div class="col-md-6 text-right pt-1 pr-1">
                <div class="btn-group rounded">
                    <button title="<?= Yii::t('app', 'Dashboard') ?>" id="index" type="button" class="btn btn-sm bg-light" aria-haspopup="true" aria-expanded="false">
                        <img src="<?= Yii::$app->request->baseUrl ?>/icons/dashboard-25.png">
                    </button>
                </div>
                <div class="btn-group rounded m-0">
                    <button type="button" class="btn btn-sm bg-light rounded-0" aria-haspopup="true" aria-expanded="false">
                        <img src="<?= Yii::$app->request->baseUrl ?>/icons/setting-25.png" width="25">
                    </button>
                </div>
                <div class="btn-group m-0">
                    <button type="button" class="btn btn-sm bg-light rounded-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?= Yii::$app->request->baseUrl ?>/icons/language-25.png">
                    </button>
                    <div class="dropdown-menu dropdown-menu-right border-0 shadow rounded">
                        <a class="dropdown-item" href="index.php?r=language/change&lang=lo"><img src="<?= Yii::$app->request->baseUrl ?>/icon/lao25.png"><?= Yii::t('app', 'Lao') ?></a>
                        <a class="dropdown-item" href="index.php?r=language/change&lang=en"><img src="<?= Yii::$app->request->baseUrl ?>/icon/usa25.png"><?= Yii::t('app', 'English') ?></a>
                    </div>
                </div>
                <div class="btn-group m-0">
                    <button type="button" class="btn btn-sm bg-light rounded-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?= Yii::$app->request->baseUrl ?>/icons/user-25.png">
                    </button>
                    <div class="dropdown-menu dropdown-menu-right border-0 shadow rounded">
                        <a class="dropdown-item" href="index.php?r=user/profile&id=<?= Yii::$app->user->id ?>"><img src="<?= Yii::$app->request->baseUrl ?>/icons/edit-user-24.png"> <?= Yii::t('app', 'Profile') ?></a>
                        <?=
                        Html::a('<img src="' . Yii::$app->request->baseUrl . '/icons/logout-24.png">' . Yii::t('app', 'Signout'), ['site/logout'], [
                            'class' => 'dropdown-item',
                            'data' => [
                                'method' => 'post'
                            ]
                        ]);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="content" id="content">
        <div class="container-fluid">
            <div class="text-right">
                <?php Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]) ?>
            </div>
            <?php
            if (isset($this->params['breadcrumbs'])) {
                echo Alert::widget();
                echo $content;
            } else {
                echo $content;
            }
            ?>
        </div>
    </div>
    <br><br><br>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();

?>