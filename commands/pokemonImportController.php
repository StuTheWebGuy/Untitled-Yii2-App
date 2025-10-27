<?php

namespace app\commands;

use yii\console\Controller;
use yii\httpclient\Client;
use yii\console\ExitCode;

class pokemonImportController extends Controller
{
    public function actionFetch(): int
    {
        $client = new Client([
            'baseUrl' => 'https://pokeapi.co/api/v2/pokemon/',
        ]);

        $response = $client->createRequest()
            ->setMethod('GET')
            ->setUrl('entries')
            ->send();

        if ($response->isOk) {
            $data = $response->data;
            // Print some info
            $this->stdout("Fetched " . count($data['entries']) . " entries\n");
            return ExitCode::OK;
        }

        $this->stderr("Request failed: " . $response->statusCode . "\n");
        return ExitCode::UNSPECIFIED_ERROR;
    }
}
