<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\Cors;
use app\rest\Controller;
use yii\helpers\ArrayHelper;
use yii\web\Response;

/**
 * Class HealthController
 *
 * API for checking status of server.
 */
class HealthController extends Controller
{
    // todo: make a second version that doesnt require login
    public function behaviors(): array
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'roles' => ['@'],
                        'allow' => true,
                    ],
                ],
            ],
        ]);
    }

    /**
     * Simple server health check.
     *
     * @return array server status
     */
    public function actionCheck(): array
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return [
            'status' => '200',
            'message' => 'API is alive',
            'timestamp' => time()
        ];
    }
}
