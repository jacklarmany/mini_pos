<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TablesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tables';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .form-control {
        height: 27px !important;
    }

    th {
        padding: 10px;
    }
</style>
<div class="tables-index bg-white rounded shadow-sm">
    <p class="pt-1 pr-2 m-0 text-right ">
        <a href="index.php?r=site/index"><span><i class="text-danger fa fa-times-circle"></i></i></span></a>
    </p>
    <div class="tables-index bg-white rounded pr-3 pl-3 pb-3">
        <h4 class="mt-0"><?= Html::encode($this->title) ?></h4>
        <p class="text-right">
            <?= Html::a('Print', ['create'], ['class' => 'btn btn-sm btn-success']) ?>
            <?= Html::a('Create Table', ['create'], ['class' => 'btn btn-sm btn-success']) ?>
        </p>
        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' => ['class' => 'shadow-sm bg-white table-bordered table-hover', 'style' => 'width:100%'],
            'columns' => [
                // ['class' => 'yii\grid\SerialColumn'],

                [
                    'label' => Yii::t('app', 'ID'),
                    'attribute' => 'id',
                    'headerOptions' => ['style' => 'text-align:center'],
                    'contentOptions' =>  ['style' => 'text-align:center'],
                    'format' => 'html',
                    'value' => function ($data) {
                        return $data->id;
                    }
                ],
                [
                    'label' => Yii::t('app', 'Name'),
                    'attribute' => 'name',
                    'contentOptions' => ['style' => 'width:15%'],
                    'headerOptions' => ['style' => 'text-align:center'],
                    'filter' => \yii\helpers\ArrayHelper::map(\backend\models\Tables::find()->asArray()->all(), 'id', 'name'),
                    'value' => function ($data) {
                        return $data->name;
                    }
                ],
                // 'status',
                [
                    'label' => Yii::t('app', 'Status'),
                    'attribute' => 'status',
                    'headerOptions' => ['style' => 'text-align:center'],
                    'contentOptions' =>  ['style' => 'text-align:center'],
                    'format' => 'html',
                    'value' => function ($data) {
                        if ($data->status == 1) {
                            return "<span class='text-success fa fa-check-circle'></span> ບໍ່ວ່າງ...";
                        } else {
                            return "<span class='text-danger fa fa-times-circle'></span> ຍັງວ່າງ...";
                        }
                    }
                ],
                [
                    'label' => Yii::t('app', 'Seat'),
                    'attribute' => 'sheet',
                    'headerOptions' => ['style' => 'text-align:center'],
                    'contentOptions' =>  ['style' => 'text-align:center'],
                    'format' => 'html',
                    'value' => function ($data) {
                        return $data->sheet;
                    }
                ],
                [
                    'label' => Yii::t('app', 'Creator'),
                    'attribute' => 'user_id',
                    'headerOptions' => ['style' => 'text-align:center'],
                    'contentOptions' =>  ['style' => 'text-align:center'],
                    'format' => 'html',
                    'value' => function ($data) {
                        $user = \backend\models\User::find()->where(['id' => $data->user_id])->one();
                        if (is_object($user)) {
                            return $user->username;
                        }
                    }
                ],
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, \backend\models\Tables $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>


    </div>
</div>