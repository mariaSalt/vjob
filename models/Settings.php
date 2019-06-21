<?php
/**
 * Created by PhpStorm.
 * User: asmild
 * Date: 20.06.19
 * Time: 21:16
 */

namespace app\models;


use yii\db\ActiveRecord;

class Settings  extends ActiveRecord
{
    public static function tableName()
    {
        return 'jewels';
    }
}