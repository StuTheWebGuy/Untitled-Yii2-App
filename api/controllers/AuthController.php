<?php

namespace app\controllers;

use app\models\forms\LoginForm;
use app\models\User;
use app\rest\Controller;
use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\web\BadRequestHttpException;
use yii\web\ServerErrorHttpException;

/**
 * Controller for handling authentication operations (login, logout).
 */
class AuthController extends Controller
{
    /**
     * Creates a new user session for the user, and logs them in to
     * the application.
     *
     * @return ?LoginForm Return form if it fails validation, otherwise null
     * @throws InvalidConfigException Body param parser not setup
     * @throws ServerErrorHttpException Failed to login user | User no longer exists
     * @throws BadRequestHttpException Request body is malformed
     */
    public function actionLogin(): ?LoginForm
    {
        $loginForm = new LoginForm();
        $isCorrectBody = $loginForm->load(Yii::$app->request->getBodyParams(), '');

        if (!$isCorrectBody)
        {
            throw new BadRequestHttpException('Request body is malformed');
        }

        $isValid = $loginForm->validate();

        if (!$isValid)
        {
            return $loginForm;
        }

        $user = User::find()->where([
            'username' => $loginForm->username
        ])->one();

        if (!$user)
        {
            throw new ServerErrorHttpException('User no longer exists');
        }

        $isLoggedIn = Yii::$app->user->login($user);

        if (!$isLoggedIn)
        {
            throw new ServerErrorHttpException('Failed to login user');
        }

        return null;
    }

    public function behaviors(): array
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'authenticator' => [
                'except' => ['login']
            ]
        ]);
    }

    /**
     * Destroys a user session, and logs the user out of the application.
     *
     * @return null
     * @throws ServerErrorHttpException Failed to log out user
     */
    public function actionLogout(): null
    {
        $isLoggedOut = Yii::$app->user->logout();
        if (!$isLoggedOut)
        {
            throw new ServerErrorHttpException('Failed to log out user');
        }
        return null;
    }
}
