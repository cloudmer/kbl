<?php


namespace app\controllers;


use app\logic\UserLogic;
use yii\helpers\Url;
use yii\web\Controller;

class UserController extends Controller
{

    public $layout = false;

    /**
     * 登陆
     */
    public function actionSignIn() {
        if (!\Yii::$app->user->isGuest) {
            return $this->redirect(Url::toRoute('home/index'));
        }

        if (\Yii::$app->request->isPost) {
            $ary = UserLogic::getInstance()->signIn(\Yii::$app->request->post());
            return json_encode($ary);
        }
        return $this->render('/user/sign-in');
    }

}