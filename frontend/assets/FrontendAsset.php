<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use common\assets\Html5shiv;
use rmrevin\yii\fontawesome\NpmFreeAssetBundle;
use yii\bootstrap4\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

/**
 * Frontend application asset
 */
class FrontendAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@frontend/web/bundle';
//    public $basePath = '@webroot';
//    public $baseUrl = '@web';

    /**
     * @var array
     */
    public $css = [
        'style.css',
        'css/bootstrap.min.css',
        'css/style.css',
        'css/responsive.css',
        'css/jquery.mCustomScrollbar.min.css',
        'https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css',
        'https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css',
    ];
    public $cssOptions=[
        'icon'=>'icon/calll.png',
        ];

    /**
     * @var array
     */
    public $js = [
        'app.js',
        'https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js',
        'https://oss.maxcdn.com/respond/1.4.2/respond.min.js',
        'js/jquery.min.js',
        'js/popper.min.js',
        'js/bootstrap.bundle.min.js',
        'js/jquery-3.0.0.min.js',
        'js/plugin.js',
        'js/jquery.mCustomScrollbar.concat.min.js',
        'js/custom.js',
        'https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js',
    ];

    /**
     * @var array
     */
    public $depends = [
        YiiAsset::class,
        BootstrapAsset::class,
        Html5shiv::class,
        NpmFreeAssetBundle::class,
    ];
}
