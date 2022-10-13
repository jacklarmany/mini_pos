<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MenuSearch */
/* @var $form yii\widgets\ActiveForm */

$script = <<< JS
    $("#categories_id").change(function(){
        var categories_id = $(this).val();
        $.post("index.php?r=menu%2Fsale-product&MenuSearch[categories_id]=" + categories_id, function(data){
            $("#show").html(data);
            
    });
    });

    $("#menusearch-name").change(function(){
        var categories_id = $("#categories_id").val();
        var name = $(this).val();
        $.post("index.php?r=menu%2Fsale-product&MenuSearch[categories_id]="+ categories_id +"&MenuSearch[name]=" + name, function(data){
            $("#show").html(data);
        });
    });
JS;
$this->registerJs($script);
?>

<div class="menu-search">

    <?php $form = ActiveForm::begin([
        'action' => ['sale-product'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-4 pr-1 m-0">
            <?= $form->field($model, 'categories_id')->widget(
                \kartik\select2\Select2::classname(),
                [
                    'name' => 'categories_id',
                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Categories::find()->all(), 'id', 'name'),
                    'options' => ['placeholder' => Yii::t('app','==== CATEGORIES ===='), 'id' => 'categories_id'],
                    'theme' => \kartik\Select2\Select2::THEME_BOOTSTRAP,
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]
            )->label(false);
            ?>
        </div>
        <div class="col-md-8 pl-1 m-0">
            <?php
            if (isset($model->categories_id) && !empty($model->categories_id)) {
                echo $form->field($model, 'name')->widget(\kartik\select2\Select2::className(), [
                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Menu::find()->where(['categories_id' => $model->categories_id])->all(), 'name', 'name'),
                    'options' => ['placeholder' => Yii::t('app','==== MENU ====')],
                    'theme' => \kartik\Select2\Select2::THEME_BOOTSTRAP,
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ])->label(false);
            } else {
                echo $form->field($model, 'name')->widget(\kartik\select2\Select2::className(), [
                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Menu::find()->all(), 'name', 'name'),
                    'options' => ['placeholder' => Yii::t('app','==== MENU ====')],
                    'theme' => \kartik\Select2\Select2::THEME_BOOTSTRAP,
                    'pluginOptions' => [
                        'allowClear' => true,
                        // 'minimumInputLength' => 3,
                        // 'tags' => true,
                        // 'tokenSeparators' => [',', ' '],
                        // 'maximumInputLength' => 10
                        'limit' => 5,
                    ],
                ])->label(false);
            }
            ?>
            <?php //= $form->field($model, 'name') 
            ?>
        </div>
    </div>

    <div class="form-group">
        <?php // Html::submitButton('<i class="fa fa-search"></i> ' . Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php // $url = "index.php?r=menu/sale-product" ?>
        <?php // Html::a(Yii::t('app', 'Reset'), $url, ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>