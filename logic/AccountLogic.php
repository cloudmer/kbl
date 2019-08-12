<?php


namespace app\logic;


use app\library\Utils\MemberUtil;
use app\models\form\MemberForm;
use app\models\Member;
use yii\helpers\Url;

class AccountLogic extends BaseLogic
{

    /**
     * 注册
     *
     * @param array $_aryParam
     * @return array
     */
    public function signUp($_aryParam) {
        $model = new MemberForm();
        $model->load($_aryParam, '');
        $model->number = MemberUtil::generateRandomNumber();
        $model->create_at = date('Y-m-d H:i:s');
        $model->validate();
        foreach ($model->getFirstErrors() as $strErr) {
            return [ 'status' => -1, 'msg' => $strErr ];
        }
        if (!$model->save()) {
            return [ 'status' => -1, 'msg' => '注册失败' ];
        }
        return [ 'status' => 1, 'msg' => '注册成功', 'url' => Url::toRoute([ 'account/member', 'id' => \Yii::$app->db->getLastInsertID() ]) ];
    }

    /**
     * 会员详情
     *
     * @param integer $_intId 会员id
     * @return Member
     */
    public function memberInfo($_intId) {
        $aryMember = Member::findOne([ 'id' => $_intId ]);
        return $aryMember;
    }

}