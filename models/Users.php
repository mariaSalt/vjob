<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $role_id
 * @property string $fname
 * @property bool $status_user
 * @property int $created_at
 * @property int $last_login
 * @property int $last_logout
 * @property int $updated_at
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }
    public function signup()
    {

        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->fname = $this->fname;
        $user->status_user = $this->status_user;
        $user->role_id = $this->role_id;
        $user->created_at = time();
        $user->setPassword($this->password);
        return $user->save() ? $user : null;
    }

    public function rules()
    {
        return [
            [['role_id', 'created_at', 'last_login', 'last_logout', 'updated_at'], 'default', 'value' => null],
            [['role_id', 'created_at', 'last_login', 'last_logout', 'updated_at'], 'integer'],
            [['status_user'], 'boolean'],
            [['username'], 'string', 'max' => 30],
            [['password'], 'string', 'max' => 140],
            [['fname'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'role_id' => 'Role ID',
            'fname' => 'Fname',
            'status_user' => 'Status User',
            'created_at' => 'Created At',
            'last_login' => 'Last Login',
            'last_logout' => 'Last Logout',
            'updated_at' => 'Updated At',
        ];
    }
}
