<?php

namespace app\controllers;

use app\models\PokemonSpecies;
use app\rest\ActiveController;
use yii\helpers\ArrayHelper;

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

    /**
     * {@inheritdoc}
     */
    public function actions(): array
    {
        return ArrayHelper::merge(parent::actions(), [
            'index' => [
                'pagination' => [
                    'pageSizeLimit' => [1,10000],
                ]
            ]
        ]);
    }

    public function actionCount(): int
    {
        return $this->modelClass::find()->count();
    }
}
