<?php

namespace backend\models;

use Yii;
use \backend\models\base\PrepareMenu as BasePrepareMenu;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "prepare_menu".
 */
class PrepareMenu extends BasePrepareMenu
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
