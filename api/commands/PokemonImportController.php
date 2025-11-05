<?php

namespace app\commands;

use app\models\PokemonSpecies;
use Yii;
use yii\console\Controller;
use yii\httpclient\Client;
use yii\console\ExitCode;

class PokemonImportController extends Controller
{
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
                    $species->name = $pokemon['name'];
                    $species->url = $pokemon['url'];
                    if (!$species->save()) {
                        $this->stderr($pokemon['name'] . " (FAILED): " . json_encode($species->errors, JSON_THROW_ON_ERROR) . "\n");
                    } else {
                        $this->stdout($pokemon['name'] . "\n");
                    }
                } catch (\Throwable $e) {
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
