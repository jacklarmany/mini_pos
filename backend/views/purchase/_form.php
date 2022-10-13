<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Purchase */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="purchase-form">

    <?php $form = ActiveForm::begin(); ?>

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
            ],
        ]
    ) ?>

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
    )->label(Yii::t('app', 'ເລືອກປະເພດ'));
    ?>
    <div class="row">
        <div class="col-6"></div>
        <div class="col-6">

        </div>
    </div>
    <?= $form->field($model, 'qty')->textInput() ?>
    <?= $form->field($model, 'price')->textInput() ?>
    <?= $form->field($model, 'amount')->textInput() ?>
    <?= $form->field($model, 'description')->textarea() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['id' => 'btnsubmit', 'class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

$js = <<<JS
$(document).ready(function () {
    $("#menu_id").change(function(){
        $("#btnsubmit").prop('disabled', true);
        var menu_id = $(this).val();
        if(menu_id == 2147483647){
            $("#btnsubmit").prop('disabled', false);
            $(".field-purchase-qty").hide();
            $(".field-purchase-price").hide();
            $(".field-purchase-description").show();
        }
        else{
            $("#btnsubmit").prop('disabled', false);
            $(".field-purchase-qty").show();
            $(".field-purchase-price").show();
            $(".field-purchase-description").show();
        }
    });

    $("#purchase-qty").keyup(function(){
        var qty = $(this).val();
        var price = $("#purchase-price").val();

        $.post("index.php?r=purchase/select-menu-amount&qty="+ qty +"&price=" + price, function(op){
            $("#purchase-amount").val(op);
        })
    });


    $("#purchase-price").keyup(function(){
        var price = $(this).val();
        var qty = $("#purchase-qty").val();

        $.post("index.php?r=purchase/select-menu-amount&qty="+ qty +"&price=" + price, function(op){
            $("#purchase-amount").val(op);
        })
    })

    // $("#w4-error-0").fadeOut(6000);
});
JS;
$this->registerJs($js);

?>