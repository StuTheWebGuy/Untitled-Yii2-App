<?php

namespace app\rest;

use yii\filters\Cors;

/**
 * Class ActiveController
 *
 * Extends yii2's ActiveController class to add functionality.
 *
 * - Adds Cors handling
 */
class ActiveController extends \yii\rest\ActiveController
{
    /**
     * @inheritdoc
     *
     * @return array List of behaviours being changed
     */
    public function behaviors(): array
    {
        return ['cors' => ['class' => Cors::class]];
    }
}
