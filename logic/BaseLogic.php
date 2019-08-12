<?php


namespace app\logic;


abstract class BaseLogic
{

    /**
     * 实现 单例模式 函数
     * @return static
     */
    public static function getInstance() {
        // TODO: Implement getInstance() method.
        static $_instance;
        if(!$_instance){
            $_instance = new static();
        }
        return $_instance;
    }

}