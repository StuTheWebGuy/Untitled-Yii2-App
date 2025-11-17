<?php

namespace app\controllers;

use app\models\Category;
use app\models\Team;
use app\rest\ActiveController;

/**
 * Class CategoriesController
 *
 * REST API for managing `Category` records.
 *
 * @see Category
 */
class CategoriesController extends ActiveController
{
    /**
     * @var string The model class associated with this controller.
     */
    public $modelClass = Category::class;
    public string $teamClass = Team::class;

    /**
     * Returns the total number of categories belonging to this user
     *
     * @param int $userId
     * @return int
     */
    public function actionUsersCount(int $userId): int // todo: move this to UsersController
    {
        return $this->modelClass::find()->where(['user_id' => $userId])->count();
    }

    /**
     * Returns the total number of teams in this category
     *
     * @param int $categoryId
     * @return int
     */
    public function actionTeamsCount(int $categoryId): int
    {
        return $this->teamClass::find()->where(['category_id' => $categoryId])->count();
    }

    /**
     * Returns the teams in this category
     *
     * @param int $categoryId
     * @return array
     */
    public function actionTeamsIndex(int $categoryId): array
    {
        return $this->teamClass::find()->where(['category_id' => $categoryId])->all();
    }
}
