<?php

namespace App\Api\Auth;

use App\Api\User\Dto\UserCredentials;
use App\Api\User\Service\UserService;

/**
 * Class Auth
 * @package App\Api\Auth
 */
class Auth
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * Auth constructor.
     *
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        session_start();
        $this->userService = $userService;
    }

    /**
     * @return void
     */
    public function checkLogged()
    {
       if (!$this->isAuthenticated()) {
            header('WWW-Authenticate: Basic realm="' . 'Login' . '"');
            header('HTTP/1.1 401 Unauthorized');
            unset($_SESSION['userName']);
            echo 'Authorization Required';
            exit;
        }
    }

    /**
     * @return bool
     */
    public function isAuthenticated()
    {
        $login = '';
        $password = '';

        if (isset($_SERVER['PHP_AUTH_USER'])) {
            $login = $_SERVER['PHP_AUTH_USER'];
            $password = $_SERVER['PHP_AUTH_PW'];
        }

        if (!$login || !$password) {
            return false;
        }

        $userCredentials = new UserCredentials();
        $userCredentials->setLogin($login);
        $userCredentials->setPassword($password);

        $user = $this->userService->getUserByCredentials($userCredentials);

        if ($user) {
            $_SESSION['userName'] = $user->getDisplay();

            return true;
        }

        return false;
    }

    /**
     * @return string
     */
    public function getUserName()
    {
        return $_SESSION['userName'] ?? '';
    }

    /**
     * @return void
     */
    public function logout()
    {
        session_destroy();
        unset($_SESSION['userName']);
    }
}
