<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;
use Yii;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @author Nenad Zivkovic <nenad@freetuts.org>
 * 
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@themes';

    public $css = [
        'css/bootstrap.min.css',
        'css/style.css',
        'css/loaders_spinners.css',
        'css/animations.css',
    ];

    public $js = [
        'js/main.js',
        'js/timer.js',
        'js/css3-animate-it.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        //'app\assets\FontAwesomeAsset',
    ];
}
