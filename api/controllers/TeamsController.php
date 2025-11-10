<?php

namespace app\controllers;

use app\models\Team;
use app\rest\ActiveController;
use Yii;

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
}
