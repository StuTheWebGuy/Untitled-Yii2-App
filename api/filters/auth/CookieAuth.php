<?php

declare(strict_types=1);

namespace app\filters\auth;

use Yii;
use yii\filters\auth\AuthMethod;
use yii\web\IdentityInterface;

/**
 * todo
 */
class CookieAuth extends AuthMethod
{
    /**
     * {@inheritdoc}
     * @return ?IdentityInterface Returns the user model if logged in, otherwise null
     */
    public function authenticate($user, $request, $response): ?IdentityInterface
    {
        $isGuest = Yii::$app->user->isGuest;
        if (!$isGuest)
        {
            return Yii::$app->user->identity;
        }
        return null;
    }
}
