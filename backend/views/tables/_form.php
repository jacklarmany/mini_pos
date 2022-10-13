<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tables */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tables-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?php
    echo $form->field($model, 'status')->widget(\kartik\select2\Select2::className(), [
        'data' => [0 => Yii::t('app', 'Empty'), 1 => Yii::t('app', 'Not empty')],
        'options' => ['placeholder' => Yii::t('app', 'Select category ...')],
        'theme' => \kartik\Select2\Select2::THEME_BOOTSTRAP,
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ])->label(true);
    ?>
    <?= $form->field($model, 'sheet')->textInput(['type' => 'number', 'maxlength' => 2]) ?>

    <div class="form-group">
        <?php
        if ($model->id) {
            echo Html::submitButton(Yii::t('app','OK'), ['class' => 'btn btn-success']);
        } else {
            echo Html::submitButton(Yii::t('app','Save'), ['class' => 'btn btn-success']);
        }
        ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>