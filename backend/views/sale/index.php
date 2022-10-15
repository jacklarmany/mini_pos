<?php

use backend\models\Menu;
use backend\models\Tables;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SaleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Sales');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-12 mx-auto">

    <!-- /// customer /// -->
    <!-- <div class="row m-0 p-0"> -->
    <div class="col-sm-10 mx-auto mb-3">
        <div class="p-4 bg-white shadow-sm rounded">
            <div class="card-body p-2">
                <h5 class="card-title m-0"><?= Yii::t('app', 'Bills') ?></h5>
                <hr class="m-1">
                <?php echo $this->render('_search', ['model' => $searchModel]);
                ?>
            </div>
        </div>
    </div>

    <?php
    $bill_no = $searchModel->bill_no;
    $saleModel = \backend\models\Sale::find()->groupBy('bill_no')->limit('2')->all();
    foreach ($saleModel as $saleModelD) {
    ?>
        <div class="col-sm-6 mx-auto p-2">
            <div class="p-3 bg-white shadow-sm rounded">
                <div class="card-body p-2 text-center">
                    <h5 class="card-title m-0">Bill no : <?= $saleModelD->bill_no ?></h5>
                    <hr class="m-1">
                    <div class="row">
                        <div class="col-md-6 m-0 p-0">
                            <p class="card-text p-0 m-0">10-20-2022</p>
                            <p class="card-text p-0 m-0">Table 5</p>
                        </div>
                        <div class="col-md-6 m-0 p-0 text-success">
                            <h4 class="mt-2"><?= $bill_no ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <!-- </div> -->


    <!-- /// from yii /// -->
    <!-- <div class="rounded bg-white" style="border: 1px solid #ccc;">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6 pl-2 m-0">
                    <h4><?= Html::encode($this->title) ?></h4>
                </div>
                <div class="col-md-6 pr-2 m-0 text-right">
                    <a href="index.php?r=site/index"><span><i class="text-danger fa fa-times-circle"></i></i></span></a>
                </div>
            </div>
        </div>
        <div class="card-body bg-white">
            <p class="text-right">
                <?= Html::a('<span class="fa fa-file-pdf"></span> ' . Yii::t('app', 'Export to pdf'), ['create'], ['class' => 'btn btn-sm btn-success']) ?>
                <?= Html::a('<span class="fa fa-print"></span> ' . Yii::t('app', 'Print'), ['create'], ['class' => 'btn btn-sm btn-success']) ?>
            </p>

            <?php //echo $this->render('_search', ['model' => $searchModel]); 
            ?> -->

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'shadow-sm bg-white table-bordered table-hover', 'style' => 'width:100%'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'bill_no',
            [
                'label' => Yii::t('app', 'Bill no'),
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'width:10%;text-align:center'],
                'attribute' => 'bill_no',
                'value' => function ($data) {
                    return $data->bill_no;
                }
            ],
            [
                'label' => Yii::t('app', 'Date/Time'),
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'width:20%'],
                'attribute' => 'date',
                'value' => function ($data) {
                    return $data->date . " " . $data->time;
                }
            ],
            [
                'label' => Yii::t('app', 'Table'),
                'attribute' => 'table_id',
                'contentOptions' => ['style' => 'width:15%'],
                'headerOptions' => ['style' => 'text-align:center'],
                'filter' => \yii\helpers\ArrayHelper::map(Tables::find()->asArray()->all(), 'id', 'name'),
                'value' => function ($data) {
                    return $data->table->name;
                }
            ],
            [
                'label' => Yii::t('app', 'Menu'),
                'attribute' => 'menu_id',
                'headerOptions' => ['style' => 'text-align:center'],
                'filter' => \yii\helpers\ArrayHelper::map(Menu::find()->asArray()->all(), 'id', 'name'),
                'value' => function ($data) {
                    return $data->menu->name;
                }
            ],
            [
                'attribute' => Yii::t('app', 'Qty'),
                'attribute' => 'qty',
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' =>  ['style' => 'text-align:center'],
                'value' => function ($data) {
                    return $data->qty;
                }
            ],
            [
                'attribute' => Yii::t('app', 'Price'),
                'attribute' => 'price',
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' =>  ['style' => 'text-align:right'],
                'value' => function ($data) {
                    return number_format($data->price, 2);
                }
            ],
            [
                'attribute' => Yii::t('app', 'Amount'),
                'attribute' => 'amount',
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' =>  ['style' => 'text-align:right'],
                'value' => function ($data) {
                    return number_format($data->amount, 2);
                }
            ],
            // [
            //     'class' => ActionColumn::className(),
            //     'urlCreator' => function ($action, \backend\models\Sale $model, $key, $index, $column) {
            //         return Url::toRoute([$action, 'id' => $model->id]);
            //     }
            // ],
        ],
    ]); ?>

    <!-- </div>
    </div>
</div> -->



    <?php
    $script = <<< JS
        $("#salesearch-bill_no").change(function(){
            var billno = $(this).val();
            $.post("index.php?r=sale%2Findex&SaleSearch%5Bbill_no%5D="+billno,function(op){
                $("#show").html(op);
            })
        });
    JS;
    $this->registerJs($script);
    ?>