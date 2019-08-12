<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ts_member".
 *
 * @property int $id 自增主键
 * @property string $identity_card 身份证号
 * @property string $number 会员账号
 * @property string $name 姓名
 * @property string $phone 联系电话
 * @property int $recommend_id 推荐id
 * @property string $create_at 注册时间
 */
class Member extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ts_member';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['identity_card', 'name', 'phone', 'create_at', 'number'], 'required'],
            [['recommend_id'], 'integer'],
            [['create_at'], 'safe'],
            [['identity_card'], 'string', 'max' => 18],
            [['number'], 'string', 'max' => 20],
            [['name'], 'string', 'max' => 32],
            [['phone'], 'string', 'max' => 11],
            [['identity_card'], 'unique'],
            [['number'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'identity_card' => '身份证号',
            'number' => '会员号',
            'name' => '姓名',
            'phone' => '电话',
            'recommend_id' => '推荐人id',
            'create_at' => '注册时间',
        ];
    }
}
