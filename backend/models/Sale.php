<?php

namespace backend\models;

use Yii;
use \backend\models\base\Sale as BaseSale;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "sale".
 */
class Sale extends BaseSale
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
