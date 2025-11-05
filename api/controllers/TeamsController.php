<?php

namespace app\controllers;

use app\models\Team;
use app\rest\ActiveController;
use Yii;

class TeamsController extends ActiveController
{
    public $modelClass = Team::class;
}
