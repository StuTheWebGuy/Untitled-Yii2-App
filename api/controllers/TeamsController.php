<?php

namespace app\controllers;

use app\models\Team;
use app\rest\ActiveController;
use Yii;
use yii\db\ActiveQuery;

/**
 * Class TeamsController
 *
 * REST API for managing `Team` records.
 *
 * @see Team
 */
class TeamsController extends ActiveController
{
    /**
     * @var string The model class associated with this controller.
     */
    public $modelClass = Team::class;

    /**
     * Returns the total number of teams belonging to a user
     *
     * @param int $userId
     * @return int
     */
    public function actionUsersCount(int $userId): int
    {
        return $this->modelClass::find()->where(['user_id' => $userId])->count();
    }

    /**
     * Returns the teams within a category
     *
     * @param int $categoryId
     * @return array
     */
    public function actionCategoryView(int $categoryId): array
    {
        return $this->modelClass::find()->where(['category_id' => $categoryId])->all();
    }
}
