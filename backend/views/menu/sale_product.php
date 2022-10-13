<?php

use app\models\PrepareMenu;
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
    .scroller {
        width: 100%;
        height: 77.5vh;
        overflow-y: scroll;
        scrollbar-color: rebeccapurple green;
        scrollbar-width: 100px;
        border-radius: 10px;
    }

    .scroller-table {
        width: 100%;
        height: 90vh;
        overflow-y: scroll;
        scrollbar-color: rebeccapurple green;
        scrollbar-width: 2px;
        border-radius: 10px;
    }

    .scroller-bill {
        width: 100%;
        height: 65vh;
        overflow-y: scroll;
        scrollbar-color: rebeccapurple green;
        scrollbar-width: 2px;
        border-radius: 10px;
    }

    .all {
        z-index: 3000;
        height: 100vh;
        padding: 5px;
    }

    #w4-error-0 {
        z-index: 4000;
    }

    .select2-dropdown {
        z-index: 3100 !important;
        position: absolute !important;
    }

    .modal {

        z-index: 3100 !important;

    }

    .all {
        background: white;
        position: absolute;
        top: 0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
    }

    .all {
        background-color: #E6E6E6 !important;
    }

    td {
        padding: 3px;
    }

    .product-grid {
        font-family: 'Poppins', sans-serif;
        text-align: center;
        transition: all 0.7s ease 0s;
    }

    .product-grid:hover {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15), 10px 10px rgba(0, 0, 0, 0.05);
    }

    .product-grid .product-image {
        overflow: hidden;
        position: relative;
    }

    .product-grid .product-image a.image {
        display: block;
    }

    .product-grid .product-image img {
        width: 100%;
        height: auto;
    }

    .product-grid .product-image .pic-1 {
        transition: all 200ms ease 0s;
    }

    .product-grid .product-image:hover .pic-1 {
        opacity: 0;
    }

    .product-grid .product-image .pic-2 {
        width: 100%;
        height: 100%;
        opacity: 0;
        position: absolute;
        top: 0;
        left: 0;
        transition: transform 3s;
    }

    .product-grid .product-image:hover .pic-2 {
        opacity: 1;
        transform: scale(1.5);
    }

    .product-grid .product-hot-label {
        color: #fff;
        background: #222;
        font-size: 14px;
        font-weight: 500;
        text-transform: capitalize;
        padding: 7px 12px;
        position: absolute;
        top: 0;
        left: 0;
    }

    .product-grid .product-links {
        background: #f1f1f1;
        width: 100%;
        padding: 0;
        margin: 0;
        list-style: none;
        opacity: 0;
        transform: scaleX(2);
        position: absolute;
        bottom: -50px;
        left: 0;
        transition: all 0.5s ease-in-out 0s;
    }

    .product-grid:hover .product-links {
        opacity: 1;
        transform: scaleX(1);
        bottom: 0;
    }

    .product-grid .product-links li {
        margin: 0 -2px;
        display: inline-block;
    }

    .product-grid .product-links li a {
        color: #444;
        font-size: 16px;
        line-height: 41px;
        width: 40px;
        height: 40px;
        display: block;
        position: relative;
        transition: all .2s ease-out;
    }

    .product-grid .product-links li a:hover {
        color: #fff;
        background-color: #88c000;
    }

    .product-grid .product-links li a:before,
    .product-grid .product-links li a:after {
        content: attr(data-tip);
        color: #fff;
        background-color: #222;
        font-size: 12px;
        line-height: 18px;
        padding: 5px 10px;
        white-space: nowrap;
        display: none;
        transform: translateX(-50%);
        position: absolute;
        left: 50%;
        top: -40px;
        transition: all 0.3s;
    }

    .product-grid .product-links li a:after {
        content: '';
        height: 15px;
        width: 15px;
        transform: translateX(-50%) rotate(45deg);
        top: -25px;
        z-index: -1;
    }

    .product-grid .product-links li a:hover:before,
    .product-grid .product-links li a:hover:after {
        display: block;
    }

    .product-grid .product-content {
        background: #fff;
        padding: 15px 12px;
        position: relative;
    }

    .product-grid .add-to-cart {
        color: #88c000;
        font-size: 15px;
        font-weight: 600;
        transform: translateX(-50%);
        position: absolute;
        top: 13px;
        left: 50%;
        opacity: 0;
        transition: all 1s ease 0s;
    }

    .product-grid:hover .add-to-cart {
        opacity: 1;
    }

    .product-grid .add-to-cart i.fas {
        font-size: 14px;
        margin: 0 5px 0 0;
    }

    .product-grid .title {
        font-size: 16px;
        font-weight: 500;
        text-transform: capitalize;
        margin: 0 0 10px;
        transition: all 0.3s ease 0s;
    }

    .product-grid .title a {
        color: #444;
    }

    .product-grid:hover .title {
        opacity: 0;
    }

    .product-grid .rating {
        color: #1c1a19;
        font-size: 12px;
        padding: 0;
        margin: 0 0 11px;
        list-style: none;
    }

    .product-grid .price {
        color: #88c000;
        font-size: 16px;
        font-weight: 700;
    }

    @media screen and (max-width: 990px) {
        .product-grid {
            margin: 0 0 30px;
        }
    }
</style>

<div class="all" id="show" style="border: 2px solid #999; margin-top:0; border-radius:0px;">
    <p class="text-right m-0 mb-2">
        <b id="refresh" title="<?= Yii::t('app', 'Refresh') ?>" class="text-right btn-outline-info border mb-1 mr-1 badge badge-default circle mr-0" style="cursor:pointer"><i class="fa fa-refresh"></i></b>
        <b id="ctogle" title="<?= Yii::t('app', 'Hid') ?>" class="text-right btn-outline-info border mb-1 mr-1 badge badge-default circle mr-0" style="cursor:pointer"><i class="fa fa-minus"></i></b>
        <b id="cbackss" title="<?= Yii::t('app', 'Close') ?>" class="text-right btn-outline-danger border mb-1 mr-1 badge badge-default circle ml-0" style="cursor:pointer"><a href="index.php?r=site" class="text-danger"><i class="fa fa-times"></i></a></b>
    </p>
    <div class="col-md-12 pr-5 pl-2">
        <div class="row">
            <div class="col-md-3 rounded">
                <div class="scroller-table p-3 text-center text-danger border shadow-sm">
                    <?php
                    $table = \backend\models\Tables::find()->where(['status' => 0])->all();
                    if (count($table) > 0) {
                        foreach ($table as $tableD) {
                            if ($tableD->id == Yii::$app->session->get('table_id')) {
                    ?>
                                <div class="card-body border bg-info shadow-sm rounded btn btn-outline-primary text-white btn-block">
                                    <i href="#" class="text-transparent">
                                        <h5 class="card-title font-weight-bolder"><?= $tableD['name'] ?></h5>
                                        <p class="card-text">ມີ <?= $tableD['sheet'] ?> ບ່ອນນັ່ງ</p>
                                    </i>
                                </div>
                            <?php
                            } else {
                            ?>
                                <a href="index.php?r=menu/select-table&id=<?= $tableD['id'] ?>" class="shadow-sm card-body btn btn-outline-primary btn-block" style="text-decoration:none">
                                    <h5 class="card-title font-weight-bolder"><?= $tableD['name'] ?></h5>
                                    <p class="card-text">ມີ <?= $tableD['sheet'] ?> ບ່ອນນັ່ງ</p>
                                </a>
                    <?php
                            }
                        }
                    } else {
                        echo "<h3><i class='fa fa-xmark-circle'></i></h3>";
                        echo "<h3>ບໍ່ມີໂຕະວ່າງ</h3>";
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-9 shadow-sm border rounded bg-white pt-2 ">
                <?php echo $this->render('_search', ['model' => $searchModel]); ?>
                <table style="width:100%">
                    <tr>
                        <td style="width:60%;" class="text-center">
                            <div class="scroller">
                                <div class="col-md-12 pb-3">
                                    <div class="row">
                                        <?php
                                        if (!empty($searchModel->categories_id) && !empty($searchModel->name)) {
                                            $menuList = \backend\models\Menu::find()
                                                ->where(['categories_id' => $searchModel->categories_id])
                                                ->andWhere(['name' => $searchModel->name])
                                                ->all();
                                        } elseif (empty($searchModel->categories_id) && !empty($searchModel->name)) {
                                            $menuList = \backend\models\Menu::find()
                                                ->where(['name' => $searchModel->name])
                                                ->orWhere(['like', 'name', $searchModel->name])
                                                ->all();
                                        } elseif (!empty($searchModel->categories_id) && empty($searchModel->name)) {
                                            $menuList = \backend\models\Menu::find()
                                                ->where(['categories_id' => $searchModel->categories_id])
                                                ->all();
                                        } else {
                                            $menuList = \backend\models\Menu::find()
                                                ->all();
                                        }
                                        if (is_array($menuList)) {
                                            foreach ($menuList as $menuListD) {
                                        ?>
                                                <div class="col-md-3 bg-white p-1 border mr-2 ml-4 mt-2 shadow-sm">
                                                    <div class="product-grid rounded">
                                                        <div class="product-image">
                                                            <a class="btn btn-primary image" data-toggle="modal" data-target="#myModal">
                                                                <img class="pic-1" src="<?= Yii::$app->request->baseUrl . "/images/" . $menuListD->photo ?>">
                                                                <img class="pic-2" src="<?= Yii::$app->request->baseUrl . "/images/" . $menuListD->photo ?>">
                                                            </a>
                                                            <!-- Button to Open the Modal -->
                                                            <?php
                                                            if ($menuListD->qty) {
                                                                echo "<span class='product-hot-label p-1 rounded'>" . $menuListD->qty . "</span>";
                                                            }
                                                            ?>
                                                            <ul class="product-links">
                                                                <li><button type="button" class="btn btn-danger mr-1" value="<?= $menuListD->id ?>&minus=true" data-tip="Add to Wishlist"><i class="fa fa-minus"></i></button></li>
                                                                <li><button type="button" class="btn btn-success ml-1" value="<?= $menuListD->id ?>&plus=true" data-tip="Compare"><i class="fa fa-plus"></i></button></li>
                                                            </ul>
                                                        </div>
                                                        <div class="product-content">
                                                            <ul class="rating mb-0" style="font-size: 14px">
                                                                <?= $menuListD->name ?>
                                                            </ul>
                                                            <div class="price" style="font-size: 15px"><?= number_format($menuListD->prices, 2) ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <?php
                                GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'columns' => [],
                                ]);
                                ?>
                            </div>
                        </td>
                        <td style="width: 40%; vertical-align:top; background-color:#fcfcfc" class="p-3 shadow rounded">
                            <a href="#" class="btn btn-sm btn-outline-primary" title="Check bill now" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a>
                            <a href="index.php?r=menu/set-waiting&waiting=true" class="btn btn-sm btn-warning" title="Check bill later"><i class="fa fa-shopping-cart"></i></a>
                            <?php
                            if (Yii::$app->session->get('table_id')) {
                                $tablename = \backend\models\Tables::find()->where(['id' => Yii::$app->session->get('table_id')])->one();
                                if (is_object($tablename)) {
                                    echo '<a href="#" class="btn btn-sm btn-info">' . $tablename->name . '</a>';
                                }
                            }
                            ?>
                            <hr class="mt-1">
                            <div class="scroller-bill">
                                <table style="width:100%;" class="result">
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-left">ຊື່ເມນູ</th>
                                        <th class="text-center">ຈໍານວນ</th>
                                        <th class="text-center">ລາຄາ</th>
                                        <th class="text-center">ລວມເປັນເງິນ</th>
                                        <th class="text-center">ແອັກເຊິນ</th>
                                    </tr>
                                    <?php
                                    $prepareMenu = \backend\models\PrepareMenu::find()
                                        ->where(['checkbill' => 'No'])
                                        ->all();
                                    $serie = 1;
                                    foreach ($prepareMenu as $prepareMenuD) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $serie++ ?></td>
                                            <td>
                                                <?php
                                                $menuN = \backend\models\Menu::find()->where(['id' => $prepareMenuD->menu_id])->one();
                                                if (is_object($menuN)) {
                                                    echo $menuN->name;
                                                }
                                                ?>
                                            </td>
                                            <td class="text-center"><?= $prepareMenuD->qty ?></td>
                                            <td class="text-right"><?= number_format($prepareMenuD->price, 2) ?></td>
                                            <td class="text-right"><?= number_format($prepareMenuD->amount, 2) ?></td>
                                            <td class="text-center">
                                                <a class="btn btn-outline-light btn-sm" href="<?= \yii\helpers\Url::toRoute(['menu/delete-prepare-menu', 'id' => $prepareMenuD->id]) ?>"><i class="fa fa-trash text-danger"></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </table>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal1 Show no check bill -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content shadow-lg border-0 modals">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">ຍັງບໍ່ທັນເຊັກບິນ</h5>
                <a type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body pl-3 pr-3">
                <div class="row">
                    <?php
                    $menuModel = \backend\models\PrepareMenu::find()
                        ->where(['checkbill' => 'Waiting'])
                        ->orWhere(['checkbill' => 'No'])
                        ->groupBy('table_id')
                        ->all();
                    foreach ($menuModel as $menuD) {
                    ?>
                        <div class="col-md-3 p-3 m-2 rounded shadow-sm border" style="background-color:#fcfcfc;">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>
                                        <?php
                                        $table = \backend\models\Tables::find()->where(['id' => $menuD->table_id])->one();
                                        echo $table->name;
                                        ?>
                                    </h4>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a title="<?= Yii::t('app', 'Order more') ?>" href="index.php?r=menu/order-more-menu&table_id=<?= $menuD->table_id ?>" class="btn btn-sm btn-success"><i class="fa fa-plus-circle"></i> </a>
                                    <a title="<?= Yii::t('app', 'Print bill') ?>" href="index.php?r=menu/print-bill&table_id=<?= $menuD->table_id ?>" class="btn btn-sm btn-primary"><i class="fa fa-print"></i></a>
                                </div>
                            </div>
                            <table border="1" width="100%">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center" width="45%">ຊື່ເມນູ</th>
                                    <th class="text-center" width="45%">ມູນຄ່າ</th>
                                </tr>
                                <?php
                                $menuModel2 = \backend\models\PrepareMenu::find()->where(['table_id' => $menuD->table_id, 'checkbill' => 'Waiting'])->all();
                                if ($menuModel2) {
                                    $count = 1;
                                    foreach ($menuModel2 as $menuD2) {
                                ?>
                                        <tr>
                                            <td><?= $count++ ?></td>
                                            <td>
                                                <?php
                                                echo $menuD2->menu->name;
                                                ?>
                                            </td>
                                            <td class="text-right"><?= $menuD2->qty . " x " . $menuD2->price ?></td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo Yii::t('app', 'More ordering...');
                                }
                                ?>
                                <tr>
                                    <td colspan="2">ລວມ</td>
                                    <td class="text-right font-weight-bold">
                                        <?php
                                        $sumAmount = \backend\models\PrepareMenu::find()
                                            ->where(['table_id' => $menuD->table_id, 'checkbill' => 'Waiting'])
                                            ->sum('amount');
                                        echo number_format($sumAmount, 2);
                                        ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!--  Modal 2  show image-->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Modal Heading</h4>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <?php
                // $photo = "ddd";
                ?>
                <img src="<?php //= Yii::$app->request->baseUrl . "/images/" . $photo 
                            ?>" width="200">
            </div>
        </div>
    </div>
</div>

<?php

$js = <<<JS
$(document).ready(function () {
    $(":button,#btnSelectMenu").click(function(){
        var menu_id = $(this).val();
        $.post("index.php?r=menu/select-menu&id="+ menu_id, function(op){
            $(".result").html(op);
        })

    }); 
    $("#w4-error-0").fadeOut(6000);
});
 
JS;
$this->registerJs($js);

?>