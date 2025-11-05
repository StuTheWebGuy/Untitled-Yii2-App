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
}
