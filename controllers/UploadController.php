<?php


namespace app\controllers;


use yii\web\Controller;
use yii\web\UploadedFile;

class UploadController extends Controller
{

    public $enableCsrfValidation = false;

    /**
     * 上传
     */
    public function actionIndex() {
        $image = UploadedFile::getInstanceByName('file');

        if ($image) {
            $imageName = $image->getBaseName();
            $ext = $image->getExtension();
            $rootPath = \Yii::$app->basePath.'/web/upload/';
            $path = $rootPath;
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $strNow = date('YmdHis');
            $fullName = $path.$imageName.'-'.$strNow.'.'.$ext;
            $rs = $image->saveAs($fullName);
            $strPath = '/upload/'.$imageName.'-'.$strNow.'.'.$ext;
            if ($rs) {
                return json_encode([ 'status' => 1, 'msg' => '上传成功', 'path' => $strPath ]);
            }
        }
        return json_encode([ 'status' => -1, 'msg' => '上传失败' ]);
    }

}