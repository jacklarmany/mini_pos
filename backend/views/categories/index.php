<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategoriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Categories');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-md-12 mx-auto">
    <div class="rounded bg-white" style="border: 1px solid #ccc;">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6 pl-2 m-0"><h4><?= Html::encode($this->title) ?></h4></div>
                <div class="col-md-6 pr-2 m-0 text-right">
                    <a href="index.php?r=site/index"><span><i class="text-danger fa fa-times-circle"></i></i></span></a>
                </div>
            </div>
        </div>
        <div class="card-body bg-white">
            <p class="text-right">
                <?= Html::a('<span class="fa fa-file-pdf"></span> '. Yii::t('app', 'Export to pdf'), ['create'], ['class' => 'btn btn-sm btn-success']) ?>
                <?= Html::a('<span class="fa fa-print"></span> '. Yii::t('app', 'Print'), ['create'], ['class' => 'btn btn-sm btn-success']) ?>
                <?= Html::a('<span class="fa fa-plus-circle"></span> '. Yii::t('app', 'Create Categories'), ['create'], ['class' => 'btn btn-sm btn-success']) ?>
            </p>

            <?php // echo $this->render('_search', ['model' => $searchModel]); 
            ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,

                'tableOptions' => ['class' => 'shadow-sm bg-white table-bordered table-hover', 'style' => 'width:100%'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => Yii::t('app', 'Name'),
                        'attribute' => 'name',
                        'filter' => \yii\helpers\ArrayHelper::map(\backend\models\Categories::find()->asArray()->all(), 'name', 'name'),
                        'value' => function ($data) {
                            return $data->name;
                        }
                    ],
                    // 'user_id',
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, \backend\models\Categories $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>