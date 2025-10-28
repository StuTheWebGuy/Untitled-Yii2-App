<?php

namespace app\controllers;

use Yii;
use yii\filters\Cors;
use app\rest\Controller;
use yii\web\Response;

class HealthController extends Controller
{
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
