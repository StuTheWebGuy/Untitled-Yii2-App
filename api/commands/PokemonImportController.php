<?php

namespace app\commands;

use app\models\PokemonSpecies;
use Throwable;
use Yii;
use yii\base\InvalidConfigException;
use yii\console\Controller;
use yii\httpclient\Client;
use yii\console\ExitCode;
use yii\httpclient\Exception;

/**
 * Class PokemonImportController.
 *
 * API for importing pokemon data from https://pokeapi.co/api/v2/
 */
class PokemonImportController extends Controller
{
    /**
     * Fetches a list of all pokemon from the external api and adds them to the database as a `PokemonSpecies` record
     *
     * @return integer
     *
     * @throws InvalidConfigException If the HTTP client is improperly configured.
     * @throws Exception If the HTTP request to the external API fails.
     * @see PokemonSpecies
     */
    public function actionFetch(): int
    {
        $client = new Client([
            'baseUrl' => 'https://pokeapi.co/api/v2/',
        ]);

        $response = $client->createRequest()
            ->setMethod('GET')
            ->setUrl('pokemon/?limit=-1')
            ->send();

        if ($response->isOk) {
            $data = $response->data;
            $this->stdout("Successfully fetched " . count($data['results']) . " results\n");

            // add to database
            foreach ($data['results'] as $pokemon) {
                try {
                    $species = new PokemonSpecies();
                    $url = $pokemon['url'];
                    $imageId = basename($url);

                    $species->name = $pokemon['name'];
                    $species->url = $url;
                    $species->image =  'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/dream-world/' . $imageId . '.svg';

                    if (!$species->save()) {
                        $this->stderr($pokemon['name'] . " (FAILED): " . json_encode($species->errors, JSON_THROW_ON_ERROR) . "\n");
                    } else {
                        $this->stdout($pokemon['name'] . "\n");
                    }
                } catch (Throwable $e) {
                    Yii::error($e->getMessage());
                    $this->stderr($e->getMessage() . "\n");
                }
            }

            return ExitCode::OK;
        }

        $this->stderr("Request failed: " . $response->statusCode . "\n");
        return ExitCode::UNSPECIFIED_ERROR;
    }
}
