<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SaleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sale-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php
    echo $form->field($model, 'bill_no')->widget(\kartik\select2\Select2::className(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Sale::find()->groupBy('bill_no')->all(), 'bill_no', 'bill_no'),
        'options' => ['placeholder' => Yii::t('app', 'bill no ...')],
        'theme' => \kartik\Select2\Select2::THEME_BOOTSTRAP,
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ])->label(false);
    ?>
    <?php ActiveForm::end(); ?>

</div>