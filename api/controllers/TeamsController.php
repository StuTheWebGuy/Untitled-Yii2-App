<?php

namespace app\controllers;

use app\models\PokemonInstance;
use app\models\PokemonSpecies;
use app\models\Team;
use app\rest\ActiveController;
use Yii;
use yii\db\ActiveQuery;

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
    public string $pokemonInstanceClass = PokemonInstance::class;
    public string $pokemonSpeciesClass = PokemonSpecies::class;

    /**
     * Returns the total number of teams belonging to a user
     *
     * @param int $userId
     * @return int
     */
    public function actionUsersCount(int $userId): int // todo: move this to UsersController
    {
        return $this->modelClass::find()->where(['user_id' => $userId])->count();
    }

    /**
     * Returns the teams within a category
     *
     * @param int $categoryId
     * @return array
     */
    public function actionCategoryView(int $categoryId): array
    {
        return $this->modelClass::find()->where(['category_id' => $categoryId])->all();
    }

    /**
     * Returns the pokemon instances + species within a team
     *
     * @param int $teamId
     * @return array
     */
    public function actionPokemonIndex(int $teamId): array // todo: fix me
    {
        $instances = $this->pokemonInstanceClass::find()->where(['team_id' => $teamId])->all();
        $species = array_map(fn($instance) => $this->pokemonSpeciesClass::find()->where(['id' => $instance->pokemon_species_id])->one(), $instances);
        return ['instances' => $instances, 'species' => $species];
    }
}
