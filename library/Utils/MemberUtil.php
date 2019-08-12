<?php


namespace app\library\Utils;


class MemberUtil
{

    /**
     * 会员号字符前缀
     * @var string $strNumberPrefix
     */
    public $strNumberPrefix = 'CN';

    /**
     * 生成随机会员号
     */
    public static function generateRandomNumber() {
        return strtoupper('CN'.\Yii::$app->getSecurity()->generateRandomString(8));
    }

}