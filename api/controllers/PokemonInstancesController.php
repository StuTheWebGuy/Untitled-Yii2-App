<?php

namespace app\controllers;

use app\models\PokemonInstance;
use app\rest\ActiveController;

/**
 * Class PokemonInstancesController
 *
 * REST API for managing `PokemonInstance` records.
 *
 * @see PokemonInstance
 */
class PokemonInstancesController extends ActiveController
{
    /**
     * @var string The model class associated with this controller.
     */
    public $modelClass = PokemonInstance::class;
}
