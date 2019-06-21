<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mined".
 *
 * @property int $id
 * @property int $type_id
 * @property int $gnome_id
 * @property int $status_mineral_id
 * @property int $mined_at
 * @property int $elf_id
 * @property int $master_gnome_id
 * @property int $purporsed_at
 * @property int $conformed_at_elf
 * @property bool $automatic
 */
class Mined extends \yii\db\ActiveRecord
{
    public function getType()
    {
        return $this->hasOne(Settings::className(), ['id' => 'type_id']);
    }


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mined';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id', 'gnome_id', 'status_mineral_id'], 'required'],
            [['type_id', 'gnome_id', 'status_mineral_id', 'mined_at', 'elf_id', 'master_gnome_id', 'purporsed_at', 'conformed_at_elf'], 'default', 'value' => null],
            [['type_id', 'gnome_id', 'status_mineral_id', 'mined_at', 'elf_id', 'master_gnome_id', 'purporsed_at', 'conformed_at_elf'], 'integer'],
            [['automatic'], 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_id' => 'Type ID',
            'gnome_id' => 'Gnome ID',
            'status_mineral_id' => 'Status Mineral ID',
            'mined_at' => 'Mined At',
            'elf_id' => 'Elf ID',
            'master_gnome_id' => 'Master Gnome ID',
            'purporsed_at' => 'Purporsed At',
            'conformed_at_elf' => 'Conformed At Elf',
            'automatic' => 'Automatic',
        ];
    }
}
