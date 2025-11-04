<?php

namespace app\controllers;

use app\models\PokemonInstance;
use yii\rest\ActiveController;

class PokemonInstancesController extends activeController
{
    public $modelClass = PokemonInstance::class;
}