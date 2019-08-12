<?php


namespace app\controllers;


use app\logic\HomeLogic;

class HomeController extends BaseController
{

    public $layout = false;

    /**
     * 首页
     */
    public function actionIndex() {
        if (\Yii::$app->user->isGuest) {
            return $this->redirect('/user/sign-in');
        }

        return $this->render('index', [
            'user' => \Yii::$app->user->identity
        ]);
    }

    /**
     * 推广码
     */
    public function actionQr() {
        if (\Yii::$app->user->isGuest) {
            return $this->redirect('/user/sign-in');
        }

        return $this->render('qr', [
            'user' => \Yii::$app->user->identity
        ]);
    }

    /**
     * 我推广的成员
     */
    public function actionMember() {
        if (\Yii::$app->user->isGuest) {
            return $this->redirect('/user/sign-in');
        }

        return $this->render('member', [
            'user' => \Yii::$app->user->identity
        ]);
    }

    /**
     * 所有成员
     */
    public function actionMembers() {
        if (\Yii::$app->user->isGuest) {
            return $this->redirect('/user/sign-in');
        }

        return $this->render('members', [
            'user' => \Yii::$app->user->identity
        ]);
    }

    /**
     * 我的推广成员
     */
    public function actionMemberData() {
        $aryData = HomeLogic::getInstance()->member(\Yii::$app->user->id, \Yii::$app->request->get());
        $strHtml = $this->renderAjax('_ajaxData', [
            'data' => $aryData
        ]);
        echo json_encode([
            'html' => $strHtml,
        ]);
    }

    /**
     * 我的推广成员
     */
    public function actionMembersData() {
        $aryData = HomeLogic::getInstance()->members(\Yii::$app->user->id, \Yii::$app->request->get());
        $strHtml = $this->renderAjax('_ajaxData', [
            'data' => $aryData
        ]);
        echo json_encode([
            'html' => $strHtml,
        ]);
    }

    /**
     * 导出
     */
    public function actionExport() {
        HomeLogic::getInstance()->member(\Yii::$app->user->id, \Yii::$app->request->get());
    }

    /**
     * 我的团队
     */
    public function actionTeam() {
        if (\Yii::$app->user->isGuest) {
            return $this->redirect('/user/sign-in');
        }

        return $this->render('team', [
            'user' => \Yii::$app->user->identity
        ]);
    }

    /**
     * 我的团队 数据
     */
    public function actionTeamData() {
        $aryData = HomeLogic::getInstance()->team(\Yii::$app->user->id, \Yii::$app->request->get());
        $strHtml = $this->renderAjax('_ajaxTeam', [
            'data' => $aryData
        ]);
        echo json_encode([
            'html' => $strHtml,
        ]);
    }

}