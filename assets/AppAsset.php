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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
      "css/bootstrap.min.css",
      "css/font-awesome.min.css",
      "css/smartadmin-production-plugins.min.css",
      "css/smartadmin-production.min.css",
      "css/smartadmin-skins.min.css",
      "css/smartadmin-rtl.min.css",
      "css/select2.css",      
      "css/datatable/dataTables.responsive.css",
    ];
    public $js = [
	    "js/jquery.1.11.2.js",
	    "js/bootstrap/bootstrap.min.js",
	    "js/app.config.js",
	    "js/notification/SmartNotification.min.js",
	    "js/notificaciones.js",
	    "js/plugin/jquery-touch/jquery.ui.touch-punch.min.js",
	    "js/smartwidgets/jarvis.widget.min.js",
	    "js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js",
	    "js/plugin/sparkline/jquery.sparkline.min.js",
	    "js/plugin/jquery-validate/jquery.validate.min.js",
	    "js/plugin/masked-input/jquery.maskedinput.min.js",
	    "js/plugin/select2/select2.min.js",
	    "js/plugin/bootstrap-slider/bootstrap-slider.min.js",
	    "js/plugin/msie-fix/jquery.mb.browser.min.js",
	    "js/plugin/fastclick/fastclick.min.js",
	    "js/speech/voicecommand.min.js",
	    "js/plugin/flot/jquery.flot.cust.min.js",
	    "js/plugin/flot/jquery.flot.resize.min.js",
	    "js/plugin/flot/jquery.flot.time.min.js",
	    "js/plugin/flot/jquery.flot.tooltip.min.js",
	    "js/plugin/vectormap/jquery-jvectormap-1.2.2.min.js",
	    "js/plugin/vectormap/jquery-jvectormap-world-mill-en.js",
	    "js/plugin/fullcalendar/jquery.fullcalendar.min.js",
	    "js/plugin/select2/select2.min.js",
	    "js/plugin/pace/pace.min.js",	
	    "js/app.min.js",
	    "js/accounting.min.js",
	    "js/datatable/jquery.dataTables.min.js",
	    "js/datatable/dataTables.bootstrap.js",
	    "js/datatable/dataTables.responsive.js",
	    "js/angular/angular.js",
	    "js/first.js",
	    "js/uiselect2.js",
	    "js/controllers/requisicion.js",
	    "js/select2.min.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
