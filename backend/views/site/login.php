<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

$script = <<< JS
$(document).ready(function(){
    $(".invalid-feedback").hide();
})

JS;
$this->registerJs($script);
$this->title = Yii::t('app', 'Login');
?>
<style>
    body {
        background: rgb(255, 255, 255);
        background: radial-gradient(circle, rgba(255, 255, 255, 1) 0%, rgba(255, 241, 241, 1) 21%, rgba(255, 94, 0, 0.39539565826330536) 100%);
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-5 p-5 mx-auto">
            <p class="text-right">
                <a class="m-0" href="<?= \yii\helpers\Url::toRoute(['language/change', 'lang' => 'lo']) ?>"><?= Yii::t('app', 'Lao') ?></a> |
                <a class="m-0" href="<?= \yii\helpers\Url::toRoute(['language/change', 'lang' => 'en']) ?>"><?= Yii::t('app', 'English') ?></a>
            </p>
            <div class="mx-auto p-5 shadow" style="margin-left: 30px; margin-right:30px; border-radius:10px; background-color:#fcfcfc">
                <p class="text-center mb-4 mt-0"><img src="<?= Yii::$app->request->baseUrl ?>/icons/login.png" class="rounded img-circle thumbnail"></p>
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <?= $form->field($model, 'username')->textInput(['style' => 'height:48px;', 'placeholder' => Yii::t('app', 'Username')])->label(false) ?>
                <?= $form->field($model, 'password')->passwordInput(['style' => 'height:48px;', 'placeholder' => Yii::t('app', 'Password')])->label(false) ?>
                <div class="row">
                    <div class="col-sm-6"> <?= $form->field($model, 'rememberMe')->checkbox()->label(Yii::t('app', 'rememberMe')) ?></div>
                    <div class="col-sm-6 text-right mb-2"><a href="index.php?r=site/request-password-reset"><span class='fa fa-key'></span> <?= Yii::t('app', 'Forgot password'); ?> </a></div>
                </div>
                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app', 'Login'), ['style' => 'height:50px;', 'class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>