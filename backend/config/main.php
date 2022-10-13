<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'language' => 'lo',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'on beforeRequest' => function () {
        $lang = Yii::$app->request->get('lang', '');
        if (!empty($lang)) {
            if ($lang == 'en' || $lang == 'lo') {
                Yii::$app->language = $lang;
                Yii::$app->session->set('language', Yii::$app->language);
            } else {
                if (Yii::$app->session->has('language')) {
                    Yii::$app->language = Yii::$app->session->get('language');
                } else {
                    Yii::$app->language = 'lo';
                }
            }
        } else {
            if (Yii::$app->session->has('language')) {
                Yii::$app->language = Yii::$app->session->get('language');
            } else {
                Yii::$app->language = 'lo';
            }
        }
        // if (Yii::$app->user->id) {
        //     $time = date('YmdHis', strtotime(Yii::$app->params['timeOut']));
        //     if (Yii::$app->session->get('loginTimeOut') > strtotime(date('YmdHis'))) {
        //         Yii::$app->session->set('loginTimeOut', $time);
        //     } else {
        //         Yii::$app->response->redirect(['site/logout', 'data' => ['method' => 'post']]);
        //     }
        // }
    },
    /// START PAGINATION BOOTSTRAP4
    'container' => [
        'definitions' => [
            \yii\widgets\LinkPager::class => \yii\bootstrap4\LinkPager::class,
            'yii\bootstrap4\LinkPager' => [
                'firstPageLabel' => '<<',
                'lastPageLabel' => '>>',
                'prevPageLabel' => '<',
                'nextPageLabel' => '>',
            ]
        ],
    ], /// END PAGINATION BOOTSTRAP4

    /// MODULES
    'modules' => [
        'api' => [
            'class' => 'backend\moduls\api',
        ],
        'dynagrid' => [
            'class' => '\kartik\dynagrid\Module',
            // other module settings
            'defaultPageSize' => 20,
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module',
            // other module settings
        ],
        'translatemanager' => [
            'class' => 'lajax\translatemanager\Module',
//            'allowedIPs' => ['127.0.0.1'],
            'allowedIPs' => ['*'],
            'roles' => ['@'],
            'tables' => [                   // Properties of individual tables
                [
                    'connection' => 'db',   // connection identifier
                    'table' => '{{%language}}',         // table name
                    'columns' => ['name', 'name_ascii'] //names of multilingual fields
                ],
            ]
        ],
        /*'translatemanager' => [
             'class' => 'lajax\translatemanager\Module',
             'root' => '@app',               // The root directory of the project scan.
             'layout' => 'language',         // Name of the used layout. If using own layout use 'null'.
             'allowedIPs' => ['*'],          // IP addresses from which the translation interface is accessible.
             'roles' => ['@'],               // For setting access levels to the translating interface.
             'tmpDir' => '@backend/runtime', // Writable directory for the client-side temporary language files.
             // IMPORTANT: must be identical for all applications (the AssetsManager serves the JavaScript files containing language elements from this directory).
             'phpTranslators' => ['::t'],    // list of the php function for translating messages.
             'jsTranslators' => ['lajax.t'], // list of the js function for translating messages.
             'patterns' => ['*.js', '*.php'], // list of file extensions that contain language elements.
             //'ignoredCategories' => ['yii'], // these categories won’t be included in the language database.
             'ignoredItems' => ['config'],   // these files will not be processed.
             'scanTimeLimit' => null,        // increase to prevent "Maximum execution time" errors, if null the default max_execution_time will be used
             'searchEmptyCommand' => '!',    // the search string to enter in the 'Translation' search field to find not yet translated items, set to null to disable this feature
             'defaultExportStatus' => 1,     // the default selection of languages to export, set to 0 to select all languages by default
             'defaultExportFormat' => 'json', // the default format for export, can be 'json' or 'xml'
             'tables' => [                   // Properties of individual tables
                 [
                     'connection' => 'db',   // connection identifier
                     'table' => '{{%language}}',         // table name
                     'columns' => ['name', 'name_ascii'] //names of multilingual fields
                 ],
             ]
         ],*/
        'rbac' => [
            'class' => 'yii2mod\rbac\Module',

        ]
    ],

    /// COMPONENTS
    'components' => [
        'fcm' => [
            'class' => 'understeam\fcm\Client',
            'apiKey' => 'AAAASOzGcVg:APA91bFrGxRNQ7R_1WoURatHIf3CroCspwlyNFNdbdmCUY_3_jWQySI8aRD6ZWnHHeEXr3Zn-admYlUdJoVpAWRdWuntGuFyBK8Sr9gzDoUGHRjxF7M9JiJGjz80ucDou-pll9mmyXk-', // Server API Key (you can get it here: https://firebase.google.com/docs/server/setup#prerequisites)
        ],
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            'name' => 'advanced-backend', /// this is the name of the session cookie used for login on the backend
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => false,
            'showScriptName' => false,
            'rules' => [],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['guest', 'user'],
        ],

        /*'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages', // if advanced application, set @frontend/messages
                    'sourceLanguage' => 'en',
                    'fileMap' => [
                        //'main' => 'main.php',
                    ],
                ],
            ],
        ],*/
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'db' => 'db',
                    'sourceLanguage' => 'en', // Developer language
                    'sourceMessageTable' => '{{%language_source}}',
                    'messageTable' => '{{%language_translate}}',
                    'forceTranslation' => true,
                    'cachingDuration' => 86400,
                    'enableCaching' => false,
                ],
                'app' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'db' => 'db',
                    'sourceLanguage' => 'en', // Developer language
                    'sourceMessageTable' => '{{%language_source}}',
                    'messageTable' => '{{%language_translate}}',
                    'forceTranslation' => true,
                    'cachingDuration' => 86400,
                    'enableCaching' => false,
                ],
                'yii' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'db' => 'db',
                    'sourceLanguage' => 'en-GB', // Developer language
                    'sourceMessageTable' => '{{%language_source}}',
                    'messageTable' => '{{%language_translate}}',
                    'forceTranslation' => true,
                    'cachingDuration' => 86400,
                    'enableCaching' => false,
                ],
            ],
        ],
    ],
    'params' => $params,
];
