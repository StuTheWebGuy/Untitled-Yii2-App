<?php

declare(strict_types=1);

namespace app\models;

use app\validators\EmptyStringValidator;
use yii\behaviors\TimestampBehavior;
use app\db\ActiveRecord;

/**
 * Model class for the `{{%users}}` table.
 *
 * Represents an authenticate-able user of the application, who can login and logout
 * and who creates and owns related records in the database.
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $auth_key
 * @property string|null $email
 * @property int|null $created_at
 * @property int|null $updated_at
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
    public static function tableNameSingular(): string
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id): User|\yii\web\IdentityInterface|null
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null): User|\yii\web\IdentityInterface|null
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
    public function fields(): array
    {
        return [
            'id'
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['username', 'email'], 'trim'],
            [['email', 'username'], EmptyStringValidator::class],
            'passwordRequired' => [['!password'], 'required'],
            [['username', '!auth_key'], 'required'],
            [['username', 'email', '!password', '!auth_key'], 'string', 'max' => 255],
            [['email'], 'email'],
            [['username', 'email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getId(): int|string
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey(): ?string
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey): ?bool
    {
        return $this->auth_key === $authKey;
    }
}
