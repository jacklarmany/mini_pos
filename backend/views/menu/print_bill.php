<?php

use yii\helpers\Html;

if (is_object($modelSale)) {
 ?>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 shadow p-4 rounded-0 bg-white">
                <p class="text-right">
                    <?php
                       echo Html::a('<span class="fa fa-times"></span> ' . Yii::t('app', 'Close'), ['sale-product'], ['class' => 'btnprint rounded btn btn-sm btn-danger mr-1']);
                       echo Html::a('<span class="fa fa-print"></span> ' . Yii::t('app', 'Print'), ['print-bill', 'export' => true, 'bill_no' => $modelSale->bill_no], ['target' => '_blank', 'class' => 'btnprint rounded btn btn-sm btn-success']);
                    ?>
                </p>
                <p style="text-align:center;color:#000">
                    <!-- <img src="<? //= Yii::$app->request->baseUrl ?>/icon/cooking-25.png"> -->
                    <span style="font-size:46px;color:#000;font-weight:bold">ຮ້ານ ອາຫຼົງ</span><br>
                    <span style="font-size:32px;color:#000;">ບ້ານ ຫຼັກສອງ</span><br>
                    <span style="font-size:32px;color:#000;">ເມືອງ ແລະ ແຂວງ ສາລະວັນ</span><br>
                    <span style="font-size:32px;color:#000;">ໂທ : 020 99751044, 030 9203437</span>
                </p>
                <hr style="border-top: 2px dotted #222 !important;">
                <table style="width:100%; border-collapse: collapse; font-family:Saysettha OT !important; font-size:36px;color:#000 !important">
                    <tr>
                        <th class='text-center' style="text-align:left;">ຊື່ເມນູ</th>
                        <th class='text-center' style="text-align:center;">ມູນຄ່າ</th>
                    </tr>
                    <?php
                    $serie = 1;
                    $prepareMenu = \backend\models\Sale::find()->where(['bill_no' => $modelSale->bill_no])->all();
                    $sumAmount = array();
                    foreach ($prepareMenu as $prepareMenuD) {
                        $sumAmount[] = $prepareMenuD->amount;
                    ?>
                        <tr>
                            <td style="padding:6px;"><?= $prepareMenuD->menu->name ?></td>
                            <td style="padding:6px;" class='text-right'><?= $prepareMenuD->qty . " x " . number_format($prepareMenuD->price, 2) ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <td colspan="3"><hr style="border-top: 2px dotted #111 !important;"></td>
                    </tr>
                    <tr>
                        <td style="padding:6px;font-weight:bold" colspan="1" border="0" class="text-center">ມູນຄ່າລວມ</td>
                        <td style="padding:6px;font-weight:bold" class="text-right"><?= number_format(array_sum($sumAmount), 2) ?></td>
                    </tr>
                </table>
                <hr style="border-top: 2px dotted #222 !important;">
                <p style="text-align:center;">
                    <!-- <img src="<? //= Yii::$app->request->baseUrl ?>/icon/cooking-25.png"> -->
                    <span style="font-size:46px;color:#000;font-weight:bold">( ຂໍຂອບໃຈ )</span><br>
                    <span style="font-size:32px;color:#000;">ທີ່ມາອຸດໜູນ</span><br>
                </p>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
<?php
}
else{
    echo "dddd";
}
?>