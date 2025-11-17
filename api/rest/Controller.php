<?php

namespace app\rest;

use app\filters\auth\CookieAuth;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\QueryParamAuth;
use yii\filters\ContentNegotiator;
use yii\filters\Cors;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\rest\Serializer;
use yii\web\Response;

/**
 * Class Controller
 *
 * Extends yii2's Controller class to add functionality.
 *
 * - Adds Cors handling
 */
class Controller extends \yii\rest\Controller
{
    /**
     * @inheritdoc
     */
    public $serializer = [
        'class' => Serializer::class,
        'collectionEnvelope' => 'items',
    ];

    /**
     * {@inheritdoc}
     */
    public function behaviors(): array
    {
        return [
            'contentNegotiator' => [
                'class' => ContentNegotiator::class,
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
            'cors' => [
                'class' => Cors::class,
                'cors' => [
                    'Origin' => ['http://localhost:5173'],
                    'Access-Control-Request-Method' => [
                        'GET', 'HEAD', 'OPTIONS',
                        'DELETE', 'POST', 'PUT'
                    ],
                    'Access-Control-Request-Headers' => ['*'],
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Max-Age' => 3600,
                    'Access-Control-Allow-Headers' => ['*'],
                    'Access-Control-Allow-Origin' => ['*'],
                ]
            ],
            'authenticator' => [
                'class' => CompositeAuth::class,
                'authMethods' => [
                    QueryParamAuth::class,
                    CookieAuth::class
                ]
            ],
            'verbFilter' => [
                'class' => VerbFilter::class,
                'actions' => $this->verbs(),
            ],
        ];
    }
}
