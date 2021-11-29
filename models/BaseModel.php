<?php

namespace app\models;

use Yii;


class BaseModel extends \yii\db\ActiveRecord
{
    public static function getDb()
    {
        return Yii::$app->get('db');
    }
}

?>