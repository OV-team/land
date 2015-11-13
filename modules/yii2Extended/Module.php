<?php
namespace app\modules\yii2Extended;

use Yii;

class Module extends \yii\base\Module
{
    /**
     * Init module
     */
    public function init()
    {
        parent::init();
        Yii::setAlias('@olgert/yii2', __DIR__ . '/');
    }

}