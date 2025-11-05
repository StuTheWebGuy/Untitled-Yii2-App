<?php

namespace app\controllers;

use app\models\Format;
use app\rest\ActiveController;

class FormatController extends ActiveController
{
    public $modelClass = Format::class;
}
