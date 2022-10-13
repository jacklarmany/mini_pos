<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Sale */

$this->title = Yii::t('app', 'Create Sale');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sales'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-10 mx-auto">
    <div class="card bg-white rounded shadow border">
        <div class="card-header">
            <h4><?= Html::encode($this->title) ?></h4>
        </div>
        <div class="card-body bg-white">
            <p class="text-right">
                <?= Html::a('<span class="fa fa-file-pdf"></span> ' . Yii::t('app', 'Export to pdf'), ['create'], ['class' => 'btn btn-sm btn-success']) ?>
                <?= Html::a('<span class="fa fa-print"></span> ' . Yii::t('app', 'Print'), ['create'], ['class' => 'btn btn-sm btn-success']) ?>
                <?= Html::a('<span class="fa fa-plus-circle"></span> ' . Yii::t('app', 'Create Categories'), ['create'], ['class' => 'btn btn-sm btn-success']) ?>
            </p>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div>
    </div>
</div>