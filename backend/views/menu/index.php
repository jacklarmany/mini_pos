<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Menus');
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .form-control{
        height: 25px !important;
    }
    th{
        padding: 10px;
    }
</style>
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
                <?= Html::a('<span class="fa fa-plus-circle"></span> ' . Yii::t('app', 'Create Categories'), ['create'], ['class' => 'btn btn-sm btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'tableOptions' => ['class' => 'shadow-sm bg-white table-bordered table-hover', 'style' => 'width:100%'],
                'columns' => [
                    // ['class' => 'yii\grid\SerialColumn'],
                    // 'id',
                    [
                        'label' => Yii::t('app', 'Photos'),
                        'attribute' => 'photo',
                        'format' => 'html',
                        'value' => function ($data) {
                            return "
                        <a href='" . Yii::$app->request->baseUrl . "/images/" . $data->photo . "' target='_blank' title='ກົດທີ່ນີ້ເພື່ອເບິ່ງຮູບ'>
                            <img src='" . Yii::$app->request->baseUrl . "/images/" . $data->photo . "' width='40' class='p-0 m-0 thumbnail img-fluid rounded'>
                        </a>
                    ";
                        }
                    ],
                    'name',
                    'qty',
                    'prices',
                    [
                        'label' => Yii::t('app', 'Categories'),
                        'attribute' => 'categories_id',
                        'contentOptions' => ['style' => 'white-space:pre-line;'],
                        'format' => 'html',
                        'value' => function ($data) {
                            $category = \backend\models\Categories::find()->where(['id' => $data->categories_id])->one();
                            if (is_object($category)) {
                                return $category->name;
                            }
                        }
                    ],
                    //'user_id',//
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, \backend\models\Menu $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>

        </div>
    </div>
</div>