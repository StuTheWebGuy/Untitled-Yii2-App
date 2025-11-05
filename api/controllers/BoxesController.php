<?php

namespace app\controllers;

use app\models\Box;
use app\rest\ActiveController;

class BoxesController extends ActiveController
{
    public $modelClass = Box::class;
}
