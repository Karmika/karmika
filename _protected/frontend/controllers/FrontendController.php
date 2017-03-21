<?php
namespace frontend\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use Yii;

/**
 * FrontendController extends Controller and implements the behaviors() method
 * where you can specify the access control ( AC filter + RBAC) for
 * your controllers and their actions.
 */
class FrontendController extends Controller
{
    /**
     * Returns a list of behaviors that this component should behave as.
     * Here we use RBAC in combination with AccessControl filter.
     *
     * @return array
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'controllers' => ['article','beneficiary','payment'],
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'admin','allbeneficiaries',
                                        'createbeneficiary','getbeneficiary','updatebeneficiary','success',
                                        'sample','approvebeneficiary','rejectbeneficiary','createnominee',
                                        'createdependents','submitbeneficiary','searchbeneficiaries',
                                        'getbeneficiaryalldata','createcertificates','deletecertificate',
                                        'appliedbeneficiary',

                                        //Payment
                                        'index','create','allpayments','createpayment'
                                        ],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                    [
                        'controllers' => ['beneficiary'],
                        'actions' => ['index','create','update','allbeneficiaries', 'createbeneficiary',
                                      'getbeneficiary','updatebeneficiary','success','createnominee',
                                      'createdependents','submitbeneficiary','createcertificates',
                                      'deletecertificate'
                                    ],
                        'allow' => true,
                        'roles' => ['member'],
                    ],
                    [
                        'controllers' => ['article'],
                        'actions' => ['create', 'update', 'admin'],
                        'allow' => true,
                        'roles' => ['editor'],
                    ],
                    [
                        'controllers' => ['article'],
                        'actions' => ['index', 'view'],
                        'allow' => true
                    ],
                    [
                        // other rules
                    ],

                ], // rules

            ], // access

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ], // verbs

        ]; // return

    } // behaviors

} // AppController
