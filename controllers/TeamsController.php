<?php

namespace app\controllers;

use app\models\Team;
use Yii;
use yii\rest\Controller;

class TeamsController extends Controller
{

    public string $modelClass = 'app\models\Team';

    public function actionIndex(): array
    {
        $res = Team::find()->all();
        if (!$res) {
            Yii::$app->response->statusCode = 404;
            return [
                'success' => false,
                'message' => 'No teams found',
            ];
        }
        Yii::$app->response->statusCode = 200;
        return [
            'success' => true,
            'data' => $res
        ];
    }

    public function actionView(int $id): array
    {
        $res = Team::find()->where(['id' => $id])->one();
        if (!$res) {
            Yii::$app->response->statusCode = 404;
            return [
                'success' => false,
                'message' => 'No team found with id ' . $id,
            ];
        }
        Yii::$app->response->statusCode = 200;
        return [
            'success' => true,
            'data' => $res
        ];
    }

    public function actionCreate(): array
    {
        $model = new Team();
        return $this->createOrUpdate($model, 201);
    }

    public function actionDelete(int $id): array
    {
        $model = Team::find()->where(['id' => $id])->one();
        if (!$model) {
            Yii::$app->response->statusCode = 404;
            return [
                'success' => false,
                'message' => 'No team found with id ' . $id,
            ];
        }
        try {
            $model->delete();
            Yii::$app->response->statusCode = 200;
            return [
                'success' => true,
                'data' => $model
            ];
        } catch (\Throwable $e) {
            Yii::error($e->getMessage());
            Yii::$app->response->statusCode = 500;
            return [
                'success' => false,
                'message' => $e->getMessage(),
            ];
        }
    }

    public function actionUpdate($id): array
    {
        $model = Team::find()->where(['id' => $id])->one();
        return $this->createOrUpdate($model, 200);
    }

    private function createOrUpdate($model, $successStatus): array
    {
        try {
            $data = Yii::$app->request->getBodyParams();
            if ($model->load($data, '') && $model->save()) {
                Yii::$app->response->statusCode = $successStatus;
                return [
                    'success' => true,
                    'data' => $model
                ];
            }
            Yii::$app->response->setStatusCode(400);
            return [
                'success' => false,
                'message' => 'Invalid data sent'
            ];
        } catch (\Throwable $e) {
            Yii::error($e->getMessage());
            Yii::$app->response->statusCode = 500;
            return [
                'success' => false,
                'message' => $e->getMessage(),
            ];
        }
    }
}