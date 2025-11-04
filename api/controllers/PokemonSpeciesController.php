<?php

namespace app\controllers;

use app\models\PokemonSpecies;
use app\rest\ActiveController;
use yii\helpers\ArrayHelper;

class PokemonSpeciesController extends ActiveController
{
    public $modelClass = PokemonSpecies::class;

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