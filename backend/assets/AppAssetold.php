<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/login.css',
        'https://use.fontawesome.com/releases/v5.6.1/css/all.css',
        'theme/assets/pages/waves/css/waves.min.css',
        'theme/assets/css/bootstrap/css/bootstrap.min.css',
        'theme/assets/pages/waves/css/waves.min.css',
        'theme/assets/icon/themify-icons/themify-icons.css',
        'theme/assets/icon/icofont/css/icofont.css',
        'theme/assets/icon/font-awesome/css/font-awesome.min.css',
        'theme/assets/css/style.css',
        'theme/assets/css/jquery.mCustomScrollbar.css',
    ];
    public $js = [
        // 'theme/assets/js/jquery/jquery.min.js',      /// ຖ້າເປີດໃຊ້ໂຕນີ້ jquery ບໍ່ເຮັດວຽກ ສົງໄສມັນຕຳກັນ
        'theme/assets/js/jquery-ui/jquery-ui.min.js',
        'theme/assets/js/popper.js/popper.min.js',
        'theme/assets/js/bootstrap/js/bootstrap.min.js',
        'theme/assets/pages/waves/js/waves.min.js',
        'theme/assets/js/jquery-slimscroll/jquery.slimscroll.js',
        // 'theme/assets/js/SmoothScroll.js',
        'theme/assets/js/jquery.mCustomScrollbar.concat.min.js ',
        'theme/assets/js/pcoded.min.js',
        "theme/assets/js/vertical-layout.min.js",
        "theme/assets/js/jquery.mCustomScrollbar.concat.min.js",
        "theme/assets/js/script.js",
        "js/fieldset.js",
        'https://cdn.jsdelivr.net/npm/sweetalert2@11.4.2/dist/sweetalert2.all.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
