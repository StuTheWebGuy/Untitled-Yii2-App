<?php

namespace app\rest;

use yii\filters\Cors;
use yii\helpers\ArrayHelper;
use yii\rest\Serializer;

class ActiveController extends \yii\rest\ActiveController
{
    /**
     * @inheritdoc
     */
    public $serializer = [
        'class' => Serializer::class,
        'collectionEnvelope' => 'items',
    ];
    public function behaviors(): array
    {
        return ArrayHelper::merge(parent::behaviors(), ['cors' =>
            [
                'class' => Cors::class,
                'cors' => [
                    'Origin' => ['*'],
                    'Access-Control-Request-Method' => ['GET', 'HEAD', 'OPTIONS', 'DELETE', 'POST', 'PUT'],
                    'Access-Control-Request-Headers' => ['*'],
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Max-Age' => 3600,
                    'Access-Control-Allow-Headers' => ['*'],
                    'Access-Control-Allow-Origin' => ['*'],
                ]
            ]
        ]);
    }
}