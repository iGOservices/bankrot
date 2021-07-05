<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "css/site.css",
        "css/style.css",
        "css/colors/purple.css",
    ];
    public $js = [
        "js/jquery-3.3.1.min.js",
        "js/jquery-migrate-3.0.0.min.js",
        "js/mmenu.min.js",
        "js/tippy.all.min.js",
        "js/simplebar.min.js",
        "js/bootstrap-slider.min.js",
        "js/bootstrap-select.min.js",
        "js/snackbar.js",
        "js/clipboard.min.js",
        "js/counterup.min.js",
        "js/magnific-popup.min.js",
        "js/slick.min.js",
        "js/custom.js",
        "js/chart.min.js",
        "js/main.js",
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
