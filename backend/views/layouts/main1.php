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
        .btn-outline-danger {
            background-color: #fff;
        }

        .btn-outline-success {
            background-color: #fff;
        }

        .btn-outline-info {
            background-color: #fff;
        }

        .btn-outline-secondary {
            background-color: #fff;
        }

        .btn-outline-warning {
            background-color: #fff;
        }

        .btn-outline-primary {
            background-color: #fff;
        }
    </style>
</head>

<body class="h-100" style="background-color:#E6E6E6 !important;">
    <?php $this->beginBody() ?>
    <header>
        <nav id="w2" class="navbar bg-light navbar-expand-md fixed-top m-0 navbar pt-0 pb-0 pr-2 pl-2" style="background-color:#e9ecef; border:2px solid #BEBEBE">
            <div class="container-fluid p-0 m-0">
                <a class="navbar-brand font-weight-bold" href="<?= Yii::$app->request->baseUrl ?>" style="color: #222; border-radius:2px;">
                    <img src="<?= Yii::$app->request->baseUrl ?>/icons/logo-48.png" width="30">
                    <?= Yii::t('app', 'MINI-RT') ?>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#w2-collapse" aria-controls="w2-collapse" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div id="w2-collapse" class="collapse navbar-collapse">
                    <ul id="w3" class="navbar-nav ml-auto nav">
                        <div class="row">
                            <div class="col-md-12 border shadow-sm">
                                <div class="btn-group rounded">
                                    <button title="<?= Yii::t('app', 'Info') ?>" id="info" type="button" class="btn btn-sm bg-light" aria-haspopup="true" aria-expanded="false">
                                        <img width="26" src="<?= Yii::$app->request->baseUrl ?>/icons/info-25.png">
                                    </button>
                                    <button title="<?= Yii::t('app', 'Refresh') ?>" id="crefresh" type="button" class="btn btn-sm bg-light" aria-haspopup="true" aria-expanded="false">
                                        <img width="26" src="<?= Yii::$app->request->baseUrl ?>/icons/refresh-25.png">
                                    </button>
                                    <button title="<?= Yii::t('app', 'Trush bin') ?>" type="button" class="btn btn-sm bg-light" aria-haspopup="true" aria-expanded="false">
                                        <img src="<?= Yii::$app->request->baseUrl ?>/icon/delete-25.png">
                                    </button>
                                    <button title="<?= Yii::t('app', 'Backup') ?>" id="backup" type="button" class="btn btn-sm bg-light" aria-haspopup="true" aria-expanded="false">
                                        <img src="<?= Yii::$app->request->baseUrl ?>/icons/backup-25.png">
                                    </button>
                                    <button title="<?= Yii::t('app', 'Dashboard') ?>" id="index" type="button" class="btn btn-sm bg-light" aria-haspopup="true" aria-expanded="false">
                                        <img src="<?= Yii::$app->request->baseUrl ?>/icons/dashboard-25.png">
                                    </button>
                                    <button type="button" class="btn btn-sm bg-light rounded-0" aria-haspopup="true" aria-expanded="false">
                                        <img src="<?= Yii::$app->request->baseUrl ?>/icons/setting-25.png" width="25">
                                    </button>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm bg-light rounded-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="<?= Yii::$app->request->baseUrl ?>/icons/language-25.png">
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right border-0 shadow rounded">
                                        <a class="dropdown-item" href="index.php?r=language/change&lang=lo"><img src="<?= Yii::$app->request->baseUrl ?>/icon/lao25.png"><?= Yii::t('app', 'Lao') ?></a>
                                        <a class="dropdown-item" href="index.php?r=language/change&lang=en"><img src="<?= Yii::$app->request->baseUrl ?>/icon/usa25.png"><?= Yii::t('app', 'English') ?></a>
                                    </div>
                                </div>
                                <div class="btn-group">
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
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <br><br><br>
    <div class="p-4">
        <main role="main">
            <div class="container-fluid">
                <div class="text-right">
                    <?php Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]) ?>
                </div>
                <?php
                if (isset($this->params['breadcrumbs'])) {
                ?>
                    <!-- <div class="border-success p-0 shadow-lg text-secondary">
                        <p class="text-right m-0">
                            <b id="ctogle" class="text-right btn-outline-info border mb-1 mr-1 badge badge-default circle mr-0" style="cursor:pointer"><i class="fa fa-minus"></i></b>
                            <b id="cback" class="text-right btn-outline-danger border mb-1 mr-1 badge badge-default circle ml-0" style="cursor:pointer"><i class="fa fa-times"></i></b>
                        </p>
                        <div id="mcontent" class="text-black-50 bg-white mt-0"> -->
                    <?= Alert::widget() ?>
                    <?= $content ?>
                    <!-- </div>
                    </div> -->
                <?php
                } else {
                    echo $content;
                }
                ?>
            </div>
        </main>
        <!-- <footer class="footer mt-auto py-3 text-muted fixed-bottom mt-5">
            <div class="container">
                <p class="float-left">&copy; <?php Html::encode(Yii::$app->name) ?> <?php date('Y') ?></p>
                <p class="float-right"><?php Yii::powered() ?></p>
            </div>
        </footer> -->
        <br><br><br><br>
    </div>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();

?>

