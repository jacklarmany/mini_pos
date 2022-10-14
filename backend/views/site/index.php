<style>
    .jhover:hover {
        background-color: #f8f9fa !important;
        box-shadow: 2px 6px 8px #ccc !important;
    }
</style>
<div class="container mt-5 border-0">
    <div class="row mb-1">
        <div class="col-md-4">
            <div class="rounded jhover shadow-sm">
                <a href="<?= \yii\helpers\Url::toRoute('/categories/index') ?>" style="text-decoration: none;">
                    <div class="card p-3 text-center">
                        <!-- <i class="fa fa-3x fa-bottle-water"></i> -->
                        <p><img src="<?= \Yii::$app->request->baseUrl ?>/icons/dashboard/category-96.png" alt="" width="60"></p>
                        <div class=" mt-2" style="font-family: saysettha ot; font-weight:bold">
                            <h6><?= Yii::t('app', 'Categories') ?></h6>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="rounded jhover shadow-sm">
                <a href="<?= \yii\helpers\Url::toRoute('/menu/index') ?>" style="text-decoration: none;">
                    <div class="card p-3 text-center">
                        <!-- <i class="fa-3x fa fa-jug-detergent"></i> -->
                        <p><img src="<?= \Yii::$app->request->baseUrl ?>/icons/dashboard/menu-96.png" alt="" width="60"></p>
                        <div class=" mt-2" style="font-family: saysettha ot; font-weight:bold">
                            <h6><?= Yii::t('app', 'Menu') ?></h6>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="rounded jhover shadow-sm">
                <a href="<?= \yii\helpers\Url::toRoute('/menu/sale-product') ?>" style="text-decoration: none;">
                    <div class="card p-3 text-center">
                        <!-- <i class="fa fa-shopping-cart text-danger fa-3x"></i> -->
                        <p><img src="<?= \Yii::$app->request->baseUrl ?>/icons/dashboard/sale-96.png" alt="" width="60"></p>
                        <div class=" mt-2" style="font-family: saysettha ot; font-weight:bold">
                            <h6><?= Yii::t('app', 'Sale') ?></h6>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-4">
            <div class="rounded jhover shadow-sm">
                <a href="<?= \yii\helpers\Url::toRoute('/sale/index') ?>" style="text-decoration: none;">
                    <div class="card p-3 text-center">
                        <!-- <i class="fa fa-people-roof fa-3x"></i> -->
                        <p><img src="<?= \Yii::$app->request->baseUrl ?>/icons/dashboard/bill-96.png" alt="" width="60"></p>
                        <div class=" mt-2" style="font-family: saysettha ot; font-weight:bold">
                            <h6><?= Yii::t('app', 'Bills') ?></h6>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="rounded jhover shadow-sm">
                <a href="<?= \yii\helpers\Url::toRoute('/purchase/index') ?>" style="text-decoration: none;">
                    <div class="card p-3 text-center">
                        <!-- <i class="fa-solid fa fa-users-line fa-3x"></i> -->
                        <p><img src="<?= \Yii::$app->request->baseUrl ?>/icons/dashboard/purchase-96.png" alt="" width="60"></p>
                        <div class=" mt-2" style="font-family: saysettha ot; font-weight:bold">
                            <h6><?= Yii::t('app', 'Purchase') ?></h6>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- 777 -->
        <div class="col-md-4">
            <div class="rounded jhover shadow-sm">
                <a href="<?= \yii\helpers\Url::toRoute(['/sale/index', 'benifit' => 'true']) ?>" style="text-decoration: none;">
                    <div class="card p-3 text-center">
                        <!-- <i class="fa fa-money fa-3x"></i> -->
                        <p><img src="<?= \Yii::$app->request->baseUrl ?>/icons/dashboard/benefit-96.png" alt="" width="60"></p>
                        <div class=" mt-2" style="font-family: saysettha ot; font-weight:bold">
                            <h6><?= Yii::t('app', 'Benitfit') ?></h6>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<?php
$script = <<< JS
    // $("#theme2").hide();
    $("#btntheme1").click(function(){
        var theme = 1;
        $.post("index.php?r=site/change-theme-index&theme="+theme,function(data){
            $("#btheme1").show();
            $("#btheme2").hide();
            location.reload();
        })
    })
    $("#btntheme2").click(function(){
        var theme = 2;
        $.post("index.php?r=site/change-theme-index&theme="+theme,function(data){
            $("#btheme2").show(); 
            $("#btheme1").hide();
            location.reload();
        })
    })
    JS;
$this->registerJs($script);
?>