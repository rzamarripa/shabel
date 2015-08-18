<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "USUARIOS".
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property integer $status
 * @property string $email
 * @property string $auth_key
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password_reset_token
 */
class USUARIOS extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'USUARIOS';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password_hash', 'email'], 'required'],
            [['username', 'password_hash', 'email', 'auth_key', 'password_reset_token'], 'string'],
            [['status', 'created_at', 'updated_at', 'empleado_did'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password_hash' => 'Password Hash',
            'status' => 'Status',
            'email' => 'Email',
            'auth_key' => 'Auth Key',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'password_reset_token' => 'Password Reset Token',
        ];
    }
}
