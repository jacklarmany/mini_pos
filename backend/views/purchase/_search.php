<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PurchaseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="purchase-search pr-5 pl-5">
    <h5><?= Yii::t('app', 'Search') ?></h5>
    <hr>
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'date')->widget(
                \yii\jui\DatePicker::classname(),
                [
                    'name' => 'searchFDate',
                    'value' => Yii::$app->request->get('searchFDate'),
                    'options' => ['autocomplete' => 'off', 'id' => 'fdate', 'placeholder' => Yii::t('app', 'ວັນທີ'), 'class' => 'form-control'],
                    'dateFormat' => 'yyyy-MM-dd',
                    'clientOptions' => [
                        'changeMonth' => true,
                        //'yearRange' => '1996:2099',
                        // 'yearRange' => "c-10:c+100",
                        'changeYear' => true,
                        'allowClear' => true,
                    ],
                ]
            )->label(false) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'menu_id')->widget(
                \kartik\select2\Select2::classname(),
                [
                    'name' => 'menu_id',
                    'data' => [\yii\helpers\ArrayHelper::map(\backend\models\Menu::find()->joinWith(['categories'])->where(['categories.id' => 1])->all(), 'id', 'name'), 2147483647 => Yii::t('app', 'ວັດຖຸດິບ-ລົງຕະຫຼາດ')],
                    'options' => ['placeholder' => '', 'id' => 'menu_id'],
                    'theme' => \kartik\Select2\Select2::THEME_BOOTSTRAP,
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]
            )->label(false);
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'description')->label(false) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
                <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>