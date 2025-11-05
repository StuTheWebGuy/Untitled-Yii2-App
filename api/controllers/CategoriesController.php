<?php

namespace app\controllers;

use app\models\Category;
use app\rest\ActiveController;

class CategoriesController extends ActiveController
{
    public $modelClass = Category::class;

    public function actionUsersCount($userId): int
    {
        return $this->modelClass::find()->where(['user_id' => $userId])->count();
    }
}