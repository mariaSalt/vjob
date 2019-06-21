<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prioriti".
 *
 * @property int $id
 * @property int $types_id
 * @property double $priority
 * @property int $elf_id
 */
class Preferences extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prioriti';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['types_id', 'elf_id'], 'default', 'value' => null],
            [['types_id', 'elf_id'], 'integer'],
            [['priority'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'types_id' => 'Types ID',
            'priority' => 'Priority',
            'elf_id' => 'Elf ID',
        ];
    }
}
