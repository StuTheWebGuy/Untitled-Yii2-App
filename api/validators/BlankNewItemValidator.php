<?php

declare(strict_types=1);

namespace app\validators;

use app\models\Category;
use Yii;
use yii\base\InvalidConfigException;
use app\db\ActiveRecord;
use yii\validators\Validator;

class BlankNewItemValidator extends Validator
{
    public $skipOnEmpty = false;
    public $skipOnError = false;

    /**
     * {@inheritdoc}
     *
     * @param ActiveRecord $model
     * @param string $attribute
     */
    public function validateAttribute($model, $attribute): void
    {
        /**
         * Adds a default name for blank items (boxes, categories, etc.) e.g. 'Untitled Category 16'
         */
        if ($model->$attribute === '')
        {
            $tableName = $model->tableNameSingular();
            $userId = Yii::$app->user->id;
            $count = $model::find()->where(['user_id' => $userId])->count();
            $model->$attribute = "Unnamed $tableName $count";
        }
    }
}
