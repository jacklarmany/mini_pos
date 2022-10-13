<?php

use backend\models\Menu;
use backend\models\Tables;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\SaleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Sales');
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<div class="sale-index mx-auto col-10">
    <div class="project-search pt-3 pb-3 pl-5 pr-5 shadow-sm border rounded">
        <h5><?= Yii::t('app', 'Search') ?></h5>
        <hr>
        <?php $form = ActiveForm::begin([
            'action' => ['index', 'benifit' => 'true'],
            'method' => 'get',
        ]); ?>
        <div class="row pb-0">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </div>
                    <?php
                    // usage without model

                    echo \yii\jui\DatePicker::widget([
                        'name' => 'searchFDate',
                        'value' => Yii::$app->request->get('searchFDate'),
                        'options' => ['autocomplete' => 'off', 'id' => 'fdate', 'placeholder' => Yii::t('app', 'ວັນທີເລີ່ມ'), 'class' => 'form-control'],
                        'dateFormat' => 'dd-MM-yyyy',
                        'clientOptions' => [
                            'changeMonth' => true,
                            //'yearRange' => '1996:2099',
                            // 'yearRange' => "c-10:c+100",
                            'changeYear' => true,
                        ],
                    ]);
                    ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </div>
                    <?php
                    // usage without model
                    echo \yii\jui\DatePicker::widget([
                        'name' => 'searchTDate',
                        'value' => Yii::$app->request->get('searchTDate'),
                        'options' => ['autocomplete' => 'off', 'id' => 'tdate', 'placeholder' => Yii::t('app', 'ວັນທີສີ້ນສຸດ'), 'class' => 'form-control'],
                        'dateFormat' => 'dd-MM-yyyy',
                        'clientOptions' => [
                            'changeMonth' => true,
                            //'yearRange' => '1996:2099',
                            // 'yearRange' => "c-10:c+100",
                            'changeYear' => true,
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
        <div class="form-group ">
            <?= Html::submitButton('<span class="fa fa-search"></span> ' . Yii::t('app', 'Search'), ['class' => 'btn btn-outline-primary']) ?>
            <?php echo Html::a('<span class="fa fa-eraser"></span> ' . Yii::t('app', 'Reset'), ['index', 'benifit' => 'true'], ['class' => 'btn btn-outline-secondary']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    <br><br>
    <?php
    $fromDate = date('Y-m-d', strtotime(\Yii::$app->request->get('searchFDate')));
    $toDate = date('Y-m-d', strtotime(\Yii::$app->request->get('searchTDate')));
    if ($fromDate > $toDate && $toDate != "1970-01-01") {
    ?>
        <div id="w4-error-0" class="alert-danger alert alert-dismissible" role="alert">
            <i class="fa fa-exclamation-circle"> </i> ທ່ານເລືອກວັນທີບໍ່ຖືກ
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
        </div>
    <?php
    }
    ?>
    <div class="bg-white p-5 shadow-sm rounded">
        <h5>ສະຫຼຸບຜົນກໍາໄລ</h5>
        <?php // $this->render('_search_benifit', ['model' => $searchModel]); 
        /// ເງິນຂາຍເຄື່ອງ
        if (!empty(\Yii::$app->request->get('searchFDate')) && !empty(\Yii::$app->request->get('searchTDate'))) {
            $fromDate = date('Y-m-d', strtotime(\Yii::$app->request->get('searchFDate')));
            $toDate = date('Y-m-d', strtotime(\Yii::$app->request->get('searchTDate')));
            echo "<i class='fa fa-search'></i> ຜົນການຄົ້ນຫາລະຫວ່າງ ວັນທີ <b class='text-primary'>" . \Yii::$app->request->get('searchFDate') . "</b> ຫາ <b class='text-primary'>" . \Yii::$app->request->get('searchTDate') . "</b>";
            $saleModel = \backend\models\Sale::find()->where(['between', 'date', $fromDate, $toDate])->sum('amount');
        } elseif (!empty(\Yii::$app->request->get('searchFDate'))) {
            $fromDate = date('Y-m-d', strtotime(\Yii::$app->request->get('searchFDate')));
            $saleModel = \backend\models\Sale::find()->where(['date' => $fromDate])->sum('amount');
            echo "<i class='fa fa-search'></i> ຜົນການຄົ້ນຫາໃນ ວັນທີ <b class='text-primary'>" . \Yii::$app->request->get('searchFDate') . "</b>";
        } else {
            $saleModel = \backend\models\Sale::find()->sum('amount');
        }

        if (!empty(\Yii::$app->request->get('searchFDate')) && !empty(\Yii::$app->request->get('searchTDate'))) {
            $fromDate = date('Y-m-d', strtotime(\Yii::$app->request->get('searchFDate')));
            $toDate = date('Y-m-d', strtotime(\Yii::$app->request->get('searchTDate')));
            $purchaseModel = \backend\models\Purchase::find()->where(['between', 'date', $fromDate, $toDate])->sum('amount');
        } elseif (!empty(\Yii::$app->request->get('searchFDate'))) {
            $fromDate = date('Y-m-d', strtotime(\Yii::$app->request->get('searchFDate')));
            $purchaseModel = \backend\models\Purchase::find()->where(['date' => $fromDate])->sum('amount');
        } else {
            $purchaseModel = \backend\models\Purchase::find()->sum('amount');
        }
        ?>
        <table class="table bg-white shadow-sm">
            <thead>
                <tr>
                    <th style="width: 33%;">ຕົ້ນທຶນ</th>
                    <th style="width: 33%;">ຂາຍໄດ້</th>
                    <th style="width: 33%;">ກໍາໄລ</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-secondary"><?php echo number_format($purchaseModel, 2); ?>
                    <td class="text-primary"><?php echo number_format($saleModel, 2); ?>
                    </td>
                    <td class="text-success"><?php echo number_format($saleModel - $purchaseModel, 2); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'shadow-sm bg-white table-bordered table-hover', 'style' => 'width:100%'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'bill_no',
            'date',
            [
                'attribute' => Yii::t('app', 'Table'),
                'attribute' => 'table_id',
                'filter' => \yii\helpers\ArrayHelper::map(Tables::find()->asArray()->all(), 'id', 'name'),
                'value' => function ($data) {
                    return $data->table->name;
                }
            ],
            [
                'attribute' => Yii::t('app', 'Menu'),
                'attribute' => 'menu_id',
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


</div>