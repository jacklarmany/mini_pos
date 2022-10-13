<?php

namespace backend\models;

use Yii;
use \backend\models\base\PurchaseDetail as BasePurchaseDetail;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "purchase_detail".
 */
class PurchaseDetail extends BasePurchaseDetail
{

    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                # custom behaviors
            ]
        );
    }

    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                # custom validation rules
            ]
        );
    }
}
