<?php


namespace app\controllers;


use app\logic\AccountLogic;
use yii\web\Controller;

/**
 * 账号
 *
 * Class AccountController
 * @package app\controllers
 */
class AccountController extends Controller
{

    // 布局关闭
    public $layout = false;

    /**
     * 进入页面
     */
    public function actionIndex() {
        return $this->render('index');
    }

    /**
     * 登陆
     */
    public function actionSignIn() {
        return $this->render('sign-up');
    }

    /**
     * 注册会员
     */
    public function actionSignUp() {
        if (\Yii::$app->request->isPost) {
            return json_encode(AccountLogic::getInstance()->signUp(\Yii::$app->request->post()));
        }
        return $this->render('sign-up');
    }

    /**
     * 注册会员成功
     */
    public function actionMember() {
        $aryMember = AccountLogic::getInstance()->memberInfo(\Yii::$app->request->get('id'));
        return $this->render('member', [
            'aryMember' => $aryMember
        ]);
    }

}