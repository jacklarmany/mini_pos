<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PurchaseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Purchases';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    th {
        padding: 10px;
    }
</style>
<div class="project-search pt-3 pb-3 pl-5 pr-5 shadow-sm rounded mb-3">
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
</div>
<div class="col-md-12 mx-auto">
    <div class="rounded bg-white" style="border: 1px solid #ccc;">
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
                <?= Html::a('<span class="fa fa-plus-circle"></span> ' . Yii::t('app', 'Create purchase'), ['create'], ['class' => 'btn btn-sm btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
                'tableOptions' => ['class' => 'shadow-sm bg-white table-bordered table-hover', 'style' => 'width:100%'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    // 'id',
                    [
                        'label' => \Yii::t('app', 'Date'),
                        'attribute' => 'date',
                        'format' => 'html',
                        'value' => function ($data) {
                            return $data->date ? $data->date : "";
                        }
                    ],
                    [
                        'label' => \Yii::t('app', 'Menu'),
                        'attribute' => 'menu_id',
                        'format' => 'html',
                        'value' => function ($data) {
                            if ($data->menu_id == 2147483647) {
                                return "<span class='text-secondary'>" . \Yii::t('app', 'ລົງຕະຫຼາດ-ຊື້ວັດຖຸດິບ') . "</span>";
                            } else {
                                $menu = \backend\models\Menu::find()->where(['id' => $data->menu_id])->one();
                                if (is_object($menu)) {
                                    return $menu->name;
                                }
                            }
                        },
                    ],
                    [
                        'label' => \Yii::t('app', 'Qty'),
                        'attribute' => 'id',
                        'contentOptions' => ['class' => 'text-center pr-1'],
                        'value' => function ($data) {
                            $purchaseDetail = \backend\models\Purchase::find()->where(['id' => $data->id])->all();
                            foreach ($purchaseDetail as $purchaseDetailD) {
                                return $purchaseDetailD->qty ? number_format($purchaseDetailD->qty, 2) : "";
                            }
                        },
                    ],
                    [
                        'label' => \Yii::t('app', 'Price'),
                        'attribute' => 'id',
                        'contentOptions' => ['class' => 'text-right pr-1'],
                        'value' => function ($data) {
                            $purchaseDetail = \backend\models\Purchase::find()->where(['id' => $data->id])->all();
                            foreach ($purchaseDetail as $purchaseDetailD) {
                                return $purchaseDetailD->price ? number_format($purchaseDetailD->price, 2) : "";
                            }
                        },
                    ],
                    [
                        'label' => \Yii::t('app', 'Amount'),
                        'attribute' => 'id',
                        'contentOptions' => ['class' => 'text-right pr-1'],
                        'value' => function ($data) {
                            $purchaseDetail = \backend\models\Purchase::find()->where(['id' => $data->id])->all();
                            foreach ($purchaseDetail as $purchaseDetailD) {
                                return $purchaseDetailD->amount ? number_format($purchaseDetailD->amount, 2) : "";
                            }
                        },
                    ],
                    // 'user_id',
                    'description',
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, \backend\models\Purchase $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]);
            ?>
        </div>
    </div>
</div>