<?php

namespace app\controllers;

use app\models\PokemonSpecies;
use yii\rest\ActiveController;

/**
 * Class PokemonSpeciesController
 *
 * REST API for managing `PokemonSpecies` records.
 *
 * @see PokemonSpecies
 */
class PokemonSpeciesController extends ActiveController
{
    /**
     * @var string The model class associated with this controller.
     */
    public $modelClass = PokemonSpecies::class;
}
