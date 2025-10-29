<?php

namespace app\controllers;

use app\models\PokemonSpecies;
use yii\rest\ActiveController;

class PokemonSpeciesController extends ActiveController
{
    public $modelClass = PokemonSpecies::class;
}