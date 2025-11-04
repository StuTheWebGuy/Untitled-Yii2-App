<?php

namespace app\controllers;

use app\models\Team;
use app\rest\ActiveController;
use Yii;

class TeamsController extends ActiveController
{
    public $modelClass = Team::class;

    public function actionUsersCount($userId): int
    {
        return $this->modelClass::find()->where(['user_id' => $userId])->count();
    }
}