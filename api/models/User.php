<?php

declare(strict_types=1);

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * Model class for the `{{%users}}` table.
 *
 * Represents an authenticable user of the application, who can login and logout
 * and who creates and owns related records in the database.
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $auth_key
 * @property string|null $email
 * @property string|null $created_at
 */
class User extends ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName(): string
    {
        return '{{%users}}';
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['auth_key' => $token]);
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors(): array
    {
        return [
            'timestamp' => ['class' => TimestampBehavior::class],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['username', 'email'], 'trim'],
            [['username', 'email', '!password', '!auth_key'], 'required'],
            [['username', 'email', '!password', '!auth_key'], 'string', 'max' => 255],
            [['email'], 'email'],
            [['username', 'email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }
}
