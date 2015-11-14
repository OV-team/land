<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppLteAsset extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte';
    public $css = [
//        'plugins/select2/select2.min.css'
    ];
    public $js = [
        'plugins/select2/select2.min.js'
    ];
    public $depends = [
        'dmstr\web\AdminLteAsset'
    ];
}
