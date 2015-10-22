<?php

namespace core\modules\user\backend;

class Module extends \yii\base\Module
{
    public $title;
    public $menu;
    public $defaultRoute = 'manage/index';
    public $controllerNamespace = 'core\modules\user\backend\controllers';

    public function init()
    {
        parent::init();
        \Yii::configure($this, require(__DIR__ . '/config.php'));
    }
}
