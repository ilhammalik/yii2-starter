<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
        'theme/css/bootstrap.min.css',
        'theme/css/plugins.css',
        'theme/css/main.css',
        'theme/css/wizard.css',
        'theme/css/themes.css',
        'theme/css/override.dashboard.css'
    ];
    public $js = [

        'theme/js/vendor/modernizr-2.7.1-respond-1.4.2.min.js',
        //'theme/js/vendor/bootstrap.min.js',
        'theme/js/plugins.js', 
        'theme/js/app.js', 
        'theme/js/wizard.js', 
        'tinymce/js/tinymce/tinymce.min.js',  
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
