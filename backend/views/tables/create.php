<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tables */

$this->title = 'Create Tables';
$this->params['breadcrumbs'][] = ['label' => 'Tables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tables-index bg-white rounded shadow-sm">
    <p class="pt-1 pr-2 m-0 text-right">
        <a href="#" id="cback"><span><i class="fa fa-arrow-circle-left"></i></i></span></a>
        <a href="index.php?r=site/index"><span><i class="text-danger fa fa-times-circle"></i></i></span></a>
    </p>
    <div class="tables-index bg-white rounded pr-3 pl-3 pb-3">
        <h4 class="mt-0"><?= Html::encode($this->title) ?></h4>
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>