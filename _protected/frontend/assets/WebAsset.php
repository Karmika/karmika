<?php
/**
 * -----------------------------------------------------------------------------
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 * -----------------------------------------------------------------------------
 */

namespace frontend\assets;

use yii\web\AssetBundle;
use Yii;

/**
 * -----------------------------------------------------------------------------
 * @author Qiang Xue <qiang.xue@gmail.com>
 *
 * @since 2.0
 * -----------------------------------------------------------------------------
 */
class WebAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    
    public $css = [
        'web/js/references/jQuery/jquery-ui.css',
        'web/css/custom.css',
        'web/css/font-awesome.min.css',
    ];
    public $js = [
      'web/js/references/angular/angular.min.js',
      'web/js/references/angular/angular-ui-router.min.js',
      'web/js/references/datepicker/angular-animate.js',
      'web/js/references/datepicker/ui-bootstrap-tpls-1.3.2.js',
      'web/js/references/jQuery/jquery.js',
      'web/js/references/jQuery/jquery-ui.js',
      'web/js/references/pagination/dirPagination.js',
      'web/js/app.js',
      'web/js/services.js',
      'web/js/factories.js',
      'web/js/directives.js',
      'web/js/others.js',
      'web/js/controllers/DatepickerPopupController.js',
      'web/js/controllers/HomeController.js',
      'web/js/controllers/BeneficiaryController.js',
      'web/js/controllers/BeneficiaryDetailsController.js',
      'web/js/controllers/BeneficiaryIndexController.js',
      'web/js/controllers/BeneficiarySuccessController.js',
      'web/js/controllers/BeneficiaryUpdateController.js',
      'web/js/controllers/PaymentController.js',
    ];
    
}

