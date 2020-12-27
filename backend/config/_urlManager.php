<?php

use webvimark\behaviors\multilanguage\MultiLanguageUrlManager;

return [
//    'class'=>MultiLanguageUrlManager::className(),
    'class' => yii\web\UrlManager::class,
    'enablePrettyUrl' => true,
    'showScriptName' => false,
//    'rules'=>[
//
//        '<_c:[\w \-]+>/<id:\d+>'=>'<_c>/view',
//        '<_c:[\w \-]+>/<_a:[\w \-]+>/<id:\d+>'=>'<_c>/<_a>',
//        '<_c:[\w \-]+>/<_a:[\w \-]+>'=>'<_c>/<_a>',
//
//        '<_m:[\w \-]+>/<_c:[\w \-]+>/<_a:[\w \-]+>'=>'<_m>/<_c>/<_a>',
//        '<_m:[\w \-]+>/<_c:[\w \-]+>/<_a:[\w \-]+>/<id:\d+>'=>'<_m>/<_c>/<_a>',
//
//    ],
];
