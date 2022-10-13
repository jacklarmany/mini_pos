<?php

namespace backend\models;

use Yii;
use \backend\models\base\Tables as BaseTables;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tables".
 */
class Tables extends BaseTables
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
