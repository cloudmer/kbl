<?php

namespace app\models;


use yii\base\NotSupportedException;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "ts_users".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $create_at
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ts_user';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'create_at'], 'required'],
            [['username', 'password'], 'string', 'max' => 32],
            [['username'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'                   => 'ID',
            'username'             => '用户名',
            'password'             => '密码',
            'create_at'            => '注册时间',
        ];
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        // TODO: Implement getId() method.
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
        return $this->getAuthKey() === $authKey;
    }

    /**
     * inheritdoc
     * @param int $id
     * @return self
     */
    public static function findIdentity($id)
    {
        // TODO: Implement findIdentity() method.
        return self::findOne([ 'id' => $id ]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * 获取用户认证信息
     *
     */
    public function getAuthInfo(){

    }

}