<?php


namespace app\logic;


use app\models\User;
use yii\helpers\Url;

class UserLogic extends BaseLogic
{

    /**
     * 注册
     *
     * @param array $_aryParam
     * @return array
     */
    public function signUp($_aryParam) {
        $model = new User();
        $model->create_at = date('Y-m-d H:i:s');
        $model->load($_aryParam, '');
        $model->validate();
        foreach ($model->getFirstErrors() as $strErr) {
            return [ 'status' => -1, 'msg' => $strErr ];
        }
        $model->password = md5($model->password);
        if (!$model->save()) {
            return [ 'status' => -1, 'msg' => '注册失败' ];
        }

        // 登陆
        \Yii::$app->user->login(User::findOne([ 'id' => \Yii::$app->db->getLastInsertID() ]), true ? 3600*24*30 : 0);
        return [ 'status' => 1, 'msg' => '注册成功', 'url' => Url::toRoute([ 'home/index' ]) ];
    }

    /**
     * 登陆
     *
     * @param array $_aryParam
     * @return array
     */
    public function signIn($_aryParam) {
        if (!isset($_aryParam['username']) || !$_aryParam['username']) {
            return [ 'status' => -1, 'msg' => '请填写用户账号' ];
        }
        if (!isset($_aryParam['password']) || !$_aryParam['password']) {
            return [ 'status' => -1, 'msg' => '请填写用户密码' ];
        }

        $objUser = User::findOne([ 'username' => $_aryParam['username'] ]);
        if (!$objUser) {
            return [ 'status' => -1, 'msg' => '账号或密码错误' ];
        }
        if ($objUser->password != md5($_aryParam['password'])) {
            return [ 'status' => -1, 'msg' => '账号或密码错误' ];
        }

        // 登陆
        \Yii::$app->user->login($objUser, true ? 3600*24*30 : 0);
        return [ 'status' => 1, 'msg' => '登陆成功', 'url' => Url::toRoute('home/index') ];
    }

}