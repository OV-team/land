<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class FrontAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl  = '@web';
    public $css      = [
        'css/bootstrap.min.css',
        'css/font-awesome.min.css',
        'css/animate.css',
        'css/owl.theme.css',
        'css/owl.carousel.css',
        'css/frontstyle/css-index.css',
    ];
    public $js       = [
        'js/bootstrap.min.js',
        'js/jquery.sticky.js',
        'js/wow.min.js',
        'js/owl.carousel.min.js',
        'js/mainpagecustom.js',
    ];
    public $depends  = [
        'yii\web\YiiAsset',
    ];
}
