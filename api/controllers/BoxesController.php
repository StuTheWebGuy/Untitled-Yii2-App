<?php

namespace app\controllers;

use app\models\Box;
use app\rest\ActiveController;

/**
 * Class BoxesController
 *
 * REST API for managing `Box` records.
 *
 * @see Box
 */
class BoxesController extends ActiveController
{
    /**
     * @var string The model class associated with this controller.
     */
    public $modelClass = Box::class;

    /**
     * Returns the total number of boxes belonging to this user
     *
     * @param int $userId
     * @return int
     */
    public function actionUsersCount(int $userId): int
    {
        return $this->modelClass::find()->where(['user_id' => $userId])->count();
    }
}
