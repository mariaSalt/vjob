<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\base\NotSupportedException;
use Yii;
class User extends ActiveRecord implements \yii\web\IdentityInterface
{
    const STATUS_DELETED = false;
    const STATUS_ACTIVE = true;
    public $authKey;
    public $accessToken;

    public function rules()
    {
        return [
            [['username','password'],'required'],
            ['status_user', 'default', 'value' => self::STATUS_ACTIVE],
            ['status_user', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
            ['fname','string','min'=>2,'max'=>255]
        ];
    }


    public static function tableName()
    {
        return 'users';
    }


    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id,'status_user'=>self::STATUS_ACTIVE]);
    }


    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.'); //ошибка, не поддерживается
    }


    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username,'status_user'=>self::STATUS_ACTIVE]);
    }



    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }


    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }


    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }
}
